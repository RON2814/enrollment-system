<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\View\View;
use Request;

class NewStudentController extends Controller
{
  public function create(): View
  {
    // Fetch all roles from the database
    $programs = Program::all();

    return view('students.add-student', compact('programs'));
  }

  public function store(Request $request)
  {
    $request->validate([
      "student_number" => ["required", "string", "max:10"],
      "last_name" => ["required", "string", "max:50"],
      "first_name" => ["required", "string", "max:50"],
      "middle_name" => ["required", "string", "max:50"],
      "contact_number" => ["required", "string", "max:11"],
      "program_id" => ["required", "exists:programs,id"],
    ]);
  }
}
