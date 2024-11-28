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

  }
}
