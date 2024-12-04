<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Program;
use App\Models\Roles\Student;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Admin Dashboard
    public function dashboard()
    {
        $users = User::all();

        return view('admin.dashboard', compact('users'));
    }

    public function manageStudent()
    {
        $students = Student::with('program', 'address', 'user')->get();
        
        $programs = Program::all();
    
        return view('admin.manage-users.student', compact('students', 'programs'));
    }
    

    public function manageRegistrar()
    {
        return view('admin.manage-users.registrar');
    }

    public function manageDepartment()
    {
        return view('admin.manage-users.department');
    }

    public function manageAdmin()
    {
        return view('admin.manage-users.admin');
    }

}
