<?php

namespace App\Http\Controllers;

use App\Models\Checklist\Checklist;
use App\Models\Section;
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
        $student = Student::where('student_number', Auth::user()->id)
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
        $student = Student::with(['checklist', 'checklist.instructor'])
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
     * Verify the student's enrollment status
     */
    public function verifyEnrollmentStatus()
    {
        $student = Student::with(relations: ['checklist', 'checklist.enrollment'])
            ->where('student_number', Auth::user()->id)->first();

        if (!$student) {
            abort(404, 'Student information not found.');
        }

        // Filter checklist for items that have grades and an instructor
        $checklistWithGrades = $student->checklist->filter(function ($checklist) {
            return !is_null($checklist->grade) && !is_null($checklist->instructor);
        });

        // Get highest year and semester
        if ($checklistWithGrades->isEmpty()) {
            $highestYearLevel = "First Year";
            $highestSemester = "First Semester";
        } else {
            $highestYearLevel = $checklistWithGrades->max('year');
            $highestSemester = $checklistWithGrades->where('year', $highestYearLevel)->max('semester');
        }

        // YearLevel and Semester Mappings
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


        // Determine the next year level and semester
        if ($highestYearLevel === 'Third Year' && $highestSemester === 'Second Semester') {
            $nextYearLevel = 'Third Year';
            $nextSemester = 'Midyear';
        } else {
            if ($highestSemester < 2) {
                $nextSemester = $semesterMapping[$highestSemester + 1];
                $nextYearLevel = $highestYearLevel;
            } else {
                $nextYearNumber = $yearMapping[$highestYearLevel] + 1;
                $nextYearLevel = array_search($nextYearNumber, $yearMapping);
                $nextSemester = 'First Semester';
            }
        }

        // Filter the checklist to only include courses for the highest year level and semester
        $filteredChecklist = $checklistWithGrades->filter(function ($checklist) use ($highestYearLevel, $highestSemester) {
            return $checklist->year == $highestYearLevel && $checklist->semester == $highestSemester;
        });

        // Check for grade discrepancies
        $hasDiscrepancy = $filteredChecklist->contains(function ($checklist) {
            return in_array($checklist->grade, ['4.00', '5.00', 'INC', 'DROPPED']);
        });

        $nextEnrollmentExist = $student->enrollment()
            ->where('year_level', $nextYearLevel)
            ->where('semester', $nextSemester)
            ->first();

        if (!$nextEnrollmentExist) {
            $section = Section::where('program_id', $student->program_id)
                ->where('year_level', $nextYearLevel)->first();
            if (!$section) {
                Section::create([
                    'program_id' => $student->program_id,
                    'year_level' => $nextYearLevel,
                    'section' => 0,
                    'current_student_enrolled' => 1,
                    'max_capacity' => 5,
                ]);
            } else {
                if ($section->current_student_enrolled < $section->max_capacity) {
                    $section->increment('current_student_enrolled');
                } else {
                    $section = Section::create([
                        'program_id' => $student->program_id,
                        'year_level' => $nextYearLevel,
                        'section' => $section->section + 1,
                        'current_student_enrolled' => 1,
                        'max_capacity' => 5,
                    ]);
                }
            }

            if (!$section) {
                $section->create([
                    'program_id' => $student->program_id,
                    'year_level' => $nextYearLevel,
                    'section' => 1,
                    'current_student_enrolled' => 0,
                    'max_capacity' => 5,
                ]);
            }
            if ($section && $section->current_student_enrolled < $section->max_capacity) {
                $section->increment('current_student_enrolled');
            }
            $newEnrollment = $student->enrollment()->create([
                'section_id' => $section->id,
                'year_level' => $nextYearLevel,
                'semester' => $nextSemester,
                'school_year_start' => date('Y'),
                'school_year_end' => date('Y') + 1,
                'status' => 'pending',
            ]);

            if ($hasDiscrepancy || $student->classification === 'Irregular') {
                $newEnrollment->update(['status' => 'under evaluation']);
                return redirect()->route('student.enrollment-eval.under-review');
            }

            if (!$hasDiscrepancy && strtoupper($student->classification) === 'REGULAR') {
                return redirect()->route('student.enrollment-eval.evaluated-courses');
            }
        }

        if ($nextEnrollmentExist->status === 'pending') {
            return redirect()->route('student.enrollment-eval.evaluated-courses');
        }

        // If the student is already enrolled, redirect to COR
        return redirect()->route('student.enrollment-eval.cor');
    }


    /**
     * Show the enrollment module
     */
    public function enrollmentModule(Request $request)
    {
        // Fetch the current student
        $student = Student::with(relations: ['checklist', 'checklist.instructor', 'checklist.enrollment'])
            ->where('student_number', Auth::user()->id)->first();

        if (!$student) {
            abort(404, 'Student information not found.');
        }

        // YearLevel and Semester Mappings
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

        // Filter checklist for items that have grades and an instructor
        $checklistWithGrades = $student->checklist->filter(function ($checklist) {
            return !is_null($checklist->grade) && !is_null($checklist->instructor);
        });

        // Get highest year and semester
        if ($checklistWithGrades->isEmpty()) {
            $highestYearLevel = "First Year";
            $highestSemester = "First Semester";
        } else {
            $highestYearLevel = $checklistWithGrades->max('year');
            $highestSemester = $checklistWithGrades->where('year', $highestYearLevel)->max('semester');
        }

        // Filter the checklist to only include courses for the highest year level and semester
        $filteredChecklist = $checklistWithGrades->filter(function ($checklist) use ($highestYearLevel, $highestSemester) {
            return $checklist->year == $highestYearLevel && $checklist->semester == $highestSemester;
        });

        // Determine the next year level and semester
        if ($highestYearLevel === 'Third Year' && $highestSemester === 'Second Semester') {
            $nextYearLevel = 'Third Year';
            $nextSemester = 'Midyear';
        } else {
            if ($highestSemester < 2) {
                $nextSemester = $semesterMapping[$highestSemester + 1];
                $nextYearLevel = $highestYearLevel;
            } else {
                $nextYearNumber = $yearMapping[$highestYearLevel] + 1;
                $nextYearLevel = array_search($nextYearNumber, $yearMapping);
                $nextSemester = 'First Semester';
            }
        }

        $nextEnrollmentExist = $student->enrollment()
            ->where('year_level', $nextYearLevel)
            ->where('semester', $nextSemester)
            ->first();

        if ($nextEnrollmentExist) {
            return redirect()->route('student.enrollment.verify-status');
        }

        return view('student.enrollment', compact('student', 'filteredChecklist', 'highestYearLevel', 'highestSemester'));
    }



    public function evaluatedCourses(Request $request)
    {
        // Get student with related data
        $student = Student::with(relations: ['checklist', 'checklist.instructor', 'checklist.enrollment'])
            ->where('student_number', Auth::user()->id)->first();

        if (!$student) {
            abort(404, 'Student not found.');
        }

        /* -------- WILL BE REMOVED -------- */
        // Filter checklist with grades and instructor
        $checklistWithGrades = $student->checklist->filter(function ($item) {
            return $item->grade && $item->instructor;
        });

        // Get highest year and semester
        if ($checklistWithGrades->isEmpty()) {
            $highestYearLevel = "First Year";
            $highestSemester = "First Semester";
        } else {
            $highestYearLevel = $checklistWithGrades->max('year');
            $highestSemester = $checklistWithGrades->where('year', $highestYearLevel)->max('semester');
        }

        // YearLevel and Semester Mappings
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

        // Determine the next year level and semester
        if ($highestYearLevel === 'Third Year' && $highestSemester === 'Second Semester') {
            $nextYearLevel = 'Third Year';
            $nextSemester = 'Midyear';
        } else {
            if ($highestSemester < 2) {
                $nextSemester = $semesterMapping[$highestSemester + 1];
                $nextYearLevel = $highestYearLevel;
            } else {
                $nextYearNumber = $yearMapping[$highestYearLevel] + 1;
                $nextYearLevel = array_search($nextYearNumber, $yearMapping);
                $nextSemester = 'First Semester';
            }
        }
        /* -------- WILL BE REMOVED -------- */

        // Get next courses
        $nextCourses = $student->checklist()->where('year', $nextYearLevel)
            ->where('semester', $nextSemester)->get();

        // Check existing enrollment
        $existingEnrollment = $student->enrollment()
            ->where('year_level', $nextYearLevel)
            ->where('semester', $nextSemester)
            ->first();

        // Studend if ENROLLED
        if ($existingEnrollment && $existingEnrollment->status === 'enrolled') {
            return redirect()->route('student.enrollment-eval.cor');
        }

        // If $existingEnrollment is true it will Update checklist with enrollment id
        if ($existingEnrollment) {
            $student->checklist()->where('year', $nextYearLevel)->where('semester', $nextSemester)
                ->update(['enrollment_id' => $existingEnrollment->id]);
        }

        return view('student.enrollment-eval.evaluated-courses', compact('student', 'nextCourses', 'nextYearLevel', 'nextSemester', 'existingEnrollment'));
    }

    public function showCOR()
    {
        // Get student with related data
        $student = Student::with(relations: ['checklist', 'checklist.enrollment'])
            ->where('student_number', Auth::user()->id)->first();

        if (!$student) {
            abort(404, 'Student not found.');
        }

        // YearLevel and Semester Mappings
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

        // Filter checklist with grades and instructor
        $checklistWithGrades = $student->checklist->filter(function ($item) {
            return $item->grade && $item->instructor;
        });

        // Get highest year and semester
        if ($checklistWithGrades->isEmpty()) {
            $nextYearLevel = "First Year";
            $nextSemester = "First Semester";
        } else {
            $highestYearLevel = $checklistWithGrades->max('year');
            $highestSemester = $checklistWithGrades->where('year', $highestYearLevel)->max('semester');
        }

        // Determine the next year level and semester
        if ($highestYearLevel === 'Third Year' && $highestSemester === 'Second Semester') {
            $nextYearLevel = 'Third Year';
            $nextSemester = 'Midyear';
        } else {
            if ($highestSemester < 2) {
                $nextSemester = $semesterMapping[$highestSemester + 1];
                $nextYearLevel = $highestYearLevel;
            } else {
                $nextYearNumber = $yearMapping[$highestYearLevel] + 1;
                $nextYearLevel = array_search($nextYearNumber, $yearMapping);
                $nextSemester = 'First Semester';
            }
        }

        // Get next courses
        $nextCourses = $student->checklist->filter(function ($item) use ($nextYearLevel, $nextSemester) {
            return $item->year == $nextYearLevel && $item->semester == $nextSemester && $item->course;
        });

        $latestEnrollment = $student->enrollment()->latest()->first();

        if ($latestEnrollment && $latestEnrollment->status !== 'enrolled') {
            $latestEnrollment->update(['status' => 'enrolled']);
        }

        // Calculate total units
        $totalUnits = $nextCourses->sum(function ($course) {
            return ($course->course->credit_unit_lecture ?? 0) + ($course->course->credit_unit_laboratory ?? 0);
        });

        // Calculate total hours
        $totalHours = $nextCourses->sum(function ($course) {
            return ($course->course->contact_hours_lecture ?? 0) + ($course->course->contact_hours_laboratory ?? 0);
        });

        return view('student.enrollment-eval.cor', compact('student', 'nextCourses', 'nextYearLevel', 'nextSemester', 'latestEnrollment', 'totalUnits', 'totalHours'));
    }
}
