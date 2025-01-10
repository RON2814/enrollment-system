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
        $students = Student::with(['program', 'address', 'user', 'checklist' => function($query) {
            $query->where('year', 'First Year')
                  ->where('semester', 'First Semester');
        }])
        ->latest()
        ->paginate(7);
    
        return view("registrar.enrollment-list", compact("students"));
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
}
