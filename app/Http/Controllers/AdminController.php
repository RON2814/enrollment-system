<?php

namespace App\Http\Controllers;

use App\Models\Roles\Student;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Admin Dashboard
    public function dashboard()
    {
        $users = User::all();

        return view('admin.dashboard', compact('users'));
    }

    public function manageStudent()
    {
        $students = Student::with("program", "address", "user")->get();

        return view('admin.manage-users.student', compact('students'));
    }
    

    public function filterStudents(Request $request)
    {
        $programId = $request->input('program_id');
        $query = Student::with('program', 'address', 'user');

        if ($programId && $programId != 'all') {
            $query->where('program_id', $programId);
        }

        $students = $query->get();

        return response()->json($students);
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
