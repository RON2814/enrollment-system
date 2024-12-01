<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Checklist\Instructor;

class DepartmentController extends Controller
{
    public function department()
    {
        $programs = Program::all();
        $instructors = Instructor::all();

        return view('department.department', compact('programs', 'instructors'));
    }
}
