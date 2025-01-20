<?php

namespace App\Http\Controllers;

use App\Models\Roles\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Checklist\Instructor;
use App\Models\Checklist\Course;
use App\Models\Checklist\Checklist;

class RegistrarController extends Controller
{
    public function dashboard()
    {
        // Fetching total number of students
        $total = Student::count(); // Total users in the system

        // Fetching number of students in Computer Science
        $cs = Student::whereHas('program', function ($query) {
            $query->where('title', 'BSCS');
        })->count();

        // Fetching number of students in Information Technology
        $it = Student::whereHas('program', function ($query) {
            $query->where('title', 'BSIT');
        })->count();

        // Fetching number of students based on year level
        $year1 = Student::whereHas('enrollment', function ($query) {
            $query->where('year_level', 'First Year');
        })->count();

        $year2 = Student::whereHas('enrollment', function ($query) {
            $query->where('year_level', 'Second Year');
        })->count();

        $year3 = Student::whereHas('enrollment', function ($query) {
            $query->where('year_level', 'Third Year');
        })->count();

        $year4 = Student::whereHas('enrollment', function ($query) {
            $query->where('year_level', 'Fourth Year');
        })->count();

        // Fetching number of pending enrollments
        $pending = Student::whereHas('enrollment', function ($query) {
            $query->where('status', 'pending');
        })->count();

        // Pass the data to the view
        return view("registrar.dashboard", compact('total', 'cs', 'it', 'year1', 'year2', 'year3', 'year4', 'pending'));
    }

    // RegistrarController.php

    public function searchStudent(Request $request)
    {
        $query = $request->input('query');
        $programId = $request->input('program_id');

        // Modify the query to handle search and filtering
        $students = Student::query()
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('student_number', 'like', "%{$query}%")
                    ->orWhere('first_name', 'like', "%{$query}%")
                    ->orWhere('last_name', 'like', "%{$query}%");
            })
            ->when($programId && $programId !== 'all', function ($queryBuilder) use ($programId) {
                return $queryBuilder->where('program_id', $programId);
            })
            ->get();

        // Return the student data as JSON for the AJAX request
        return response()->json($students);
    }



    public function enrollmentLists()
    {
        $students = Student::with("program", "address", "user", "checklist.course", "checklist.instructor", "enrollment")->get();
        $instructors = Instructor::all();
        $courses = Course::all();

        return view("registrar.enrollment-lists", compact('students', 'instructors', 'courses'));
    }



    public function cor()
    {
        $students = Student::with("program", "address", "user", "enrollment")->get();
        return view("registrar.cor", compact("students"));
    }

   

    public function recordStudents()
    {
        $students = Student::with("program", "address", "user")->get();
        return view("registrar.students-record", compact("students"));
    }

    public function checklist($student_id)
    {
        $student = Student::with('program', 'address', 'user')->findOrFail($student_id);
        $checklist = $student->checklist;
        $instructors = Instructor::orderBy('last_name')->orderBy('first_name')->get();

        return view('registrar.checklist', compact('student', 'checklist', 'instructors'));
    }


    public function updateChecklist(Request $request, $student_number)
    {
        $student = Student::where('student_number', $student_number)->firstOrFail();
    
        foreach ($student->checklist as $item) {
            $course_code = $item->course_code;
            $updateData = [];
    
            if ($request->has("grades.$course_code")) {
                $grade = $request->input("grades.$course_code");
                $updateData['grade'] = $grade;
    
                // If the grade is CREDITED, set instructor_id to null
                if (strtoupper($grade) === 'CREDITED') {
                    $updateData['instructor_id'] = null;
                } else {
                    // Otherwise, retain instructor if provided
                    if ($request->has("instructor_ids.$course_code")) {
                        $instructor_id = $request->input("instructor_ids.$course_code");
                        if ($instructor_id) {
                            $updateData['instructor_id'] = $instructor_id;
                        }
                    }
                }
            }
    
            if (!empty($updateData)) {
                Checklist::where('student_number', $student_number)
                    ->where('course_code', $course_code)
                    ->update($updateData);
            }
        }
    
        return redirect()->route('registrar.checklist', ['student_number' => $student_number])
            ->with('success', 'Checklist updated successfully!');
    }
    


}
