<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function getStudentData()
    {
        // Query to count students for each program
        $data = DB::table('students')
            ->select('programs.title', DB::raw('COUNT(students.id) as total'))
            ->join('programs', 'students.program_id', '=', 'programs.id')
            ->groupBy('programs.title')
            ->get();

        // Transform data into the required format
        $chartData = [
            'bscs' => $data->where('title', 'BSCS')->first()->total ?? 0,
            'it' => $data->where('title', 'IT')->first()->total ?? 0,
        ];

        return response()->json($chartData);
    }

    public function dashboard()
    {
        // Fetch student data
        $studentData = $this->getStudentData();

        // Pass the data to the view
        return view('department.dashboard', [
            'totalStudents' => $studentData['bscs'] + $studentData['it'],  // Total students
            'bscs' => $studentData['bscs'],  // BSCS students
            'it' => $studentData['it']      // IT students
        ]);
    }
}
