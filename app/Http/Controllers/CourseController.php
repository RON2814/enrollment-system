<?php

namespace App\Http\Controllers;

use App\Models\Checklist\Course;

class CourseController extends Controller
{
    public function showCourses()
    {
        // Fetch all courses from the database
        $courses = Course::all();

        return view('department.courses', compact('courses'));
    }
}
