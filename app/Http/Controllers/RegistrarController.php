<?php

namespace App\Http\Controllers;

use App\Models\Roles\Student;
use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    public function dashboard()
    {
        return view("registrar.dashboard");
    }

    public function enrollmentLists()
    {
        $students = Student::with("program", "address", "user")->get();
        return view("registrar.enrollment-list", compact("students"));
    }

    public function enrollmentLists()
    {
        $students = Student::with("program", "address", "user")->get();
        return view("registrar.enrollment-list", compact("students"));
    }

    public function enrolledStudents()
    {
        $students = Student::with("program", "address", "user")->get();
        return view("registrar.enrolled-students", compact("students"));
    }
}
