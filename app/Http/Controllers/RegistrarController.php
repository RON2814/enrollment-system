<?php

namespace App\Http\Controllers;

use App\Models\Roles\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Checklist\Instructor;
use App\Models\Checklist\Checklist;

class RegistrarController extends Controller
{
    public function dashboard()
    {
        return view("registrar.dashboard");
    }

    public function enrollmentLists()
    {
        $students = Student::with("program", "address", "user")
            ->paginate(7);

        return view("registrar.enrollment-lists", compact("students"));
    }


    public function enrolledStudents()
    {
        $students = Student::with("program", "address", "user")->get();
        return view("registrar.enrolled-students", compact("students"));
    }

    public function cor()
    {
        $students = Student::with("program", "address", "user")->get();
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

        // Prepare update data
        $updateData = [];

        if ($request->has("grades.$course_code")) {
            $updateData['grade'] = $request->input("grades.$course_code");
        }

        if ($request->has("instructors.$course_code")) {
            $instructor_id = $request->input("instructors.$course_code");
            if ($instructor_id) {
                $updateData['instructor_id'] = $instructor_id;
            }
        }

        // Only update if there's data to change
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
