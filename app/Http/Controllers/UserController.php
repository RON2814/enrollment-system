<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function dashboard()
    {
        // Eager load the 'role' relationship to avoid N+1 queries
        $users = User::with('role')->get();

        // Return the view with the users data
        return view('admin.dashboard', compact('users'));
    }
}
