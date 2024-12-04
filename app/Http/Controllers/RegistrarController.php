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

    public function recordOfStudents()
    {
        $students = Student::with("program", "address")->get();
        return view("registrar.record-of-students", compact("students"));
    }
}
