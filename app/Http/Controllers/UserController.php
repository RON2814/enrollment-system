<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Admin Dashboard
    public function dashboard()
    {
        // Fetch users for the dashboard (if needed)
        $users = User::all();

        // Return the view with the users data
        return view('admin.dashboard', compact('users'));
    }

    public function manageStudent()
    {
        return view('admin.manage-users.student');
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
