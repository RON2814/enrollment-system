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

    public function recordOfStudents()
    {
        $students = Student::with("program", "address", "user")->get();
        return view("registrar.record-of-students", compact("students"));
    }
}
