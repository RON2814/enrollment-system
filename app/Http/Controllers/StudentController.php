<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    // This method should match the one used in the route definition
    public function studentInformation()
    {
        // Fetch the student data based on the authenticated user's ID
        $student = DB::table('students')
            ->join('addresses', 'students.address_id', '=', 'addresses.id') // address table
            ->join('programs', 'students.program_id', '=', 'programs.id') // program table
            // ->join('checklists', 'students.student_number', '=', 'checklists.student_number') 
            ->select(
                'students.student_number',
                'students.first_name',
                'students.middle_name',
                'students.last_name',
                'students.sex',
                'students.contact_number',
                'students.birthday',
                'students.classification',
                'addresses.house_number',
                'addresses.street',
                'addresses.barangay',
                'addresses.city',
                'addresses.province',
                'addresses.zip_code',
                'programs.title as program_name',
                'programs.major'
                // 'checklists.year', 
                // 'checklists.semester' 
            )
            ->where('students.student_number', Auth::user()->id) 
            ->first();

        return view('student.student-information', compact('student'));
    }
}
