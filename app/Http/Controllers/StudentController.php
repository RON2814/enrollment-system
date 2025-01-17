<?php

namespace App\Http\Controllers;

use App\Models\User; // Change to App\Models\Student if using a Student model
use App\Models\Roles\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Login a student
     */
    public function loginStudent(Request $request)
    {
        $validatedData = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required',
        ]);

        if (Auth::attempt(['student_id' => $validatedData['loginname'], 'password' => $validatedData['loginpassword']])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['loginname' => 'Invalid credentials.'])->onlyInput('loginname');
    }

    /**
     * Register a new student
     */
    public function registerStudent(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:20', Rule::unique('users', 'name')],
            'student_id' => ['required', 'string', 'unique:users,student_id', 'min:6', 'max:20'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:8', 'max:200'],
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        Auth::login($user);

        return redirect('/dashboard');
    }

    /**
     * Logout the current student
     */
    public function logoutStudent(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function index()
    {
        $student = Student::with(['address', 'program', 'checklist'])
            ->where('student_number', Auth::user()->id)
            ->first();

        if (!$student) {
            abort(404, 'Student information not found.');
        }

        return view('student.dashboard', compact('student'));
    }

    /**
     * Show student information
     */
    public function studentInformation()
    {
        $student = Student::with(['address', 'program', 'checklist'])
            ->where('student_number', Auth::user()->id)
            ->first();

        if (!$student) {
            abort(404, 'Student information not found.');
        }

        return view('student.student-information', compact('student'));
    }

    /**
     * Show student grades
     */
    public function studentGrades(Request $request)
    {
        $student = Student::with(['checklist'])
            ->where('student_number', Auth::user()->id)
            ->first();

        if (!$student) {
            abort(404, 'Student grades not found.');
        }

        $checklistQuery = $student->checklist();

        // Apply filters to the query
        if ($request->has('school_year')) {
            $checklistQuery->where('year', $request->school_year);
        }

        if ($request->has('semester')) {
            $checklistQuery->where('semester', $request->semester);
        }

        // Apply pagination
        $filteredChecklist = $checklistQuery->paginate(10); // Adjust the number per page as needed

        $yearLevels = $student->checklist->pluck('year')->unique();
        $semesters = $student->checklist->pluck('semester')->unique()->sortBy(function ($semester) {
            return $semester == 'First Semester' ? 0 : 1;
        });

        return view('student.student-grades', compact('student', 'yearLevels', 'semesters', 'filteredChecklist'));
    }


    /**
     * Show the Checklist page
     */
    public function studentViewChecklist(Request $request)
    {
        $student = Student::with(['checklist'])
            ->where('student_number', Auth::user()->id)
            ->first();

        if (!$student) {
            abort(404, 'Student information not found.');
        }

        // Retrieve the checklist and filter based on year and semester if provided in the request
        $checklist = $student->checklist;

        // Filter by year and semester if parameters are passed
        if ($request->has('year')) {
            $checklist = $checklist->where('year', $request->year);
        }

        if ($request->has('semester')) {
            $checklist = $checklist->where('semester', $request->semester);
        }

        // Pass the filtered checklist and other necessary data to the view
        return view('student.checklist.student-checklist', compact('student', 'checklist'));
    }



    /**
     * Show the enrollment module
     */
    public function enrollmentModule(Request $request)
    {
        // Fetch the current student
        $student = Student::with(['checklist.course', 'checklist.instructor', 'program'])
            ->where('student_number', Auth::user()->id)
            ->first();

        if (!$student) {
            abort(404, 'Student information not found.');
        }

        // Filter checklist for items that have grades and an instructor
        $checklistWithGrades = $student->checklist
            ->filter(function ($checklist) {
                return !is_null($checklist->grade) && !is_null($checklist->instructor);
            });

        // Get the highest year level and semester
        $highestYearLevel = $checklistWithGrades->max('year');
        $highestSemester = $checklistWithGrades
            ->where('year', $highestYearLevel)
            ->max('semester');

        // Filter the checklist to only include courses for the highest year level and semester
        $filteredChecklist = $checklistWithGrades->filter(function ($checklist) use ($highestYearLevel, $highestSemester) {
            return $checklist->year == $highestYearLevel && $checklist->semester == $highestSemester;
        });

        // Check for grade discrepancies
        $hasDiscrepancy = $filteredChecklist->contains(function ($checklist) {
            return in_array($checklist->grade, ['4.00', '5.00', 'INC', 'DROPPED']);
        });

        // Determine the evaluation status
        $evaluationStatus = 'UNDER REVIEW'; // Default status
        if (!$hasDiscrepancy && strtoupper($student->classification) === 'REGULAR') {
            $evaluationStatus = 'PROCEED';
        }

        if ($checklistWithGrades->isEmpty()) {
            return view('student.enrollment', ['student' => $student, 'checklistWithGrades' => $checklistWithGrades, 'filteredChecklist' => $filteredChecklist, 'evaluationStatus' => $evaluationStatus]);
        }

        // Pass the evaluation status to the view
        return view('student.enrollment', compact('student', 'filteredChecklist', 'highestYearLevel', 'highestSemester', 'evaluationStatus'));
    }

    public function evaluatedCourses(Request $request)
    {
        // Fetch the current student
        $student = Student::with(['checklist.course', 'checklist.instructor', 'program'])
            ->where('student_number', Auth::user()->id)
            ->first();

        if (!$student) {
            abort(404, 'Student not found.');
        }

        // Define mappings for year and semester
        $yearMapping = [
            'First Year' => 1,
            'Second Year' => 2,
            'Third Year' => 3,
            'Fourth Year' => 4,
        ];

        $semesterMapping = [
            'First Semester' => 1,
            'Second Semester' => 2,
            'Midyear' => 3,
        ];

        // Get the highest year level and semester (as integers)
        $highestYearLevel = $yearMapping[$student->checklist->max('year') ?? 'First Year'] ?? 1;
        $highestSemester = $semesterMapping[$student->checklist->where('year', $highestYearLevel)->max('semester') ?? 'First Semester'] ?? 1;

        // Determine the next year level and semester
        if ($highestSemester == 2) {
            // If the student is in the Second Semester, move to the next year and First Semester
            $nextYearLevel = $highestYearLevel + 1;
            $nextSemester = 1; // First Semester of the next year
        } elseif ($highestSemester == 1) {
            // If the student is in the First Semester, move to the Second Semester
            $nextYearLevel = $highestYearLevel;
            $nextSemester = 2;
        } else {
            // For Midyear, we will assume it's treated as moving to the next year and the first semester
            $nextYearLevel = $highestYearLevel + 1;
            $nextSemester = 1;
        }

        // Map back to string values for the next semester and year level
        $nextYearLevelString = array_search($nextYearLevel, $yearMapping);
        $nextSemesterString = array_search($nextSemester, $semesterMapping);

        // Filter checklist for courses in the next year level and semester
        $nextCourses = $student->checklist->filter(function ($checklist) use ($nextYearLevelString, $nextSemesterString) {
            return $checklist->year == $nextYearLevelString && $checklist->semester == $nextSemesterString;
        });

        return view('student.enrollment-eval.evaluated-courses', compact('student', 'nextCourses', 'nextYearLevelString', 'nextSemesterString'));
    }


    /**
     * Show the COR
     */
    public function showCOR()
    {
        // Fetch the student information
        $student = Student::where('student_number', Auth::user()->id)->first();

        if (!$student) {
            abort(404, 'Student not found.');
        }

        // Pass the student data to the view
        return view('student.enrollment-eval.cor', compact('student'));
    }
}
