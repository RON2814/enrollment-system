<?php

namespace App\Http\Controllers;

use App\Models\Roles\Student;
use App\Models\Checklist\Instructor;
use App\Models\Checklist\Course;
use App\Models\Program;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display the student evaluation page with student data.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {
        // Fetch students with related models (program, address, user, checklist with course and instructor)
        $students = Student::with("program", "address", "user", "checklist.course", "checklist.instructor")->get();

        // Get all the checklists for the students
        $checklist = $students->map(function ($student) {
            return $student->checklist;
        })->flatten(); // Flatten to a single level

        // Get the list of instructors
        $instructors = Instructor::all();

        // Get course codes from the checklist
        $courseCodes = $checklist->pluck('course_code')->toArray();

        // Fetch all courses without any filtering
        $courses = Course::all();


        // Return the view with the necessary data
        return view('department.student-Evaluation', compact('students', 'checklist', 'instructors', 'courses'));
    }
}
