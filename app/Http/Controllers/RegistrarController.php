<?php

namespace App\Http\Controllers;

use App\Models\Roles\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    public function dashboard()
    {
        return view("registrar.dashboard");
    }

    public function enrollmentLists()
    {
        // Retrieve students with related models and filter their checklists
        $students = Student::with([
            'program',
            'address',
            'user',
            'checklist' => function ($query) {
                $query->where('year', 'First Year') // Filter by first year
                    ->where('semester', 'First Semester'); // Filter by first semester
            }
        ])->get();

        
     

        return view("registrar.enrollment-list", compact("students"));
    }


    public function enrolledStudents()
    {
        $students = Student::with("program", "address", "user")->get();
        return view("registrar.enrolled-students", compact("students"));
    }

    public function recordStudents()
    {
        $students = Student::with("program", "address", "user")->get();
        return view("registrar.students-record", compact("students"));
    }
}
