<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Roles\Student;

class DepartmentController extends Controller
{

    public function dashboard()
    {
        // Fetching total number of students
        $total = Student::count(); // Total users in the system
    
        // Fetching number of students in Computer Science
        $cs = Student::whereHas('program', function ($query) {
            $query->where('title', 'BSCS');
        })->count();
    
        // Fetching number of students in Information Technology
        $it = Student::whereHas('program', function ($query) {
            $query->where('title', 'BSIT');
        })->count();

        $advising = Student::whereHas('enrollment', function ($query) {
            $query->where('status', 'under evaluation');
        })->count();
    
        // Pass the data to the view
        return view("department.dashboard", compact('total', 'cs', 'it', 'advising'));
    }
    
}
