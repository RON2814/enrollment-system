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

    public function advising()
    {
        // Fetch students who have an enrollment with 'under evaluation' status and related submitted data
        $students = Student::with([
            'program',
            'address',
            'user',
            'checklist.course',  // Fetch associated courses
            'checklist.instructor',  // Fetch associated instructors
            'enrollment'  // Fetch enrollment details
        ])
            ->whereHas('enrollment', function ($query) {
                $query->where('status', 'enrolled');
            })
            ->get();

        // Get the list of instructors (you can filter if needed)
        $instructors = Instructor::all();

        $courses = Course::all();

        // Return the view with the necessary data
        return view('department.advising', compact('students', 'instructors', 'courses'));
    }
}
