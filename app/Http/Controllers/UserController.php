<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        // Fetch users
        $users = User::all(); // You can modify this if you need a specific query

        // Pass $users variable to the view
        return view('admin.dashboard', compact('users'));
    }

    public function profile()
    {
        return view('admin.profile'); // Adjust the view path as needed
    }
}
