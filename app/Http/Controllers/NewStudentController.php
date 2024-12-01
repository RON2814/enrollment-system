<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Program;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
      "password" => ["required", "string", "min:8"],
      "last_name" => ["required", "string", "max:50"],
      "first_name" => ["required", "string", "max:50"],
      "middle_name" => ["required", "string", "max:50"],
      "extension_name" => ["string", "max:10"],
      "contact_number" => ["string", "max:11"],
      "program_id" => ["required", "exists:programs,id"],
      "classification" => ["required", "in:regular,irregular,transferee,returnee"],
    ]);

    $address = Address::create([
      "street" => null,
      "barangay" => null,
      "city" => null,
      "province" => null,
      "zip_code" => null,
    ]);

    User::create([
      "id" => $request->student_number,
      "name" => $request->last_name . ", " . $request->first_name . " " . $request->middle_name,
      "password" => bcrypt($request->password),
      "role_id" => 1, // Student role
    ]);

    Student::create([
      "student_number" => $request->student_number,
      "last_name" => $request->last_name,
      "first_name" => $request->first_name,
      "middle_name" => $request->middle_name,
      "extension_name" => $request->extension_name,
      "contact_number" => $request->contact_number,
      "program_id" => $request->program_id,
      "classification" => $request->classification,
      "address_id" => $address->id,
    ]);

    return redirect()->route('index')->with('success', 'Student added successfully.');
  }
}
