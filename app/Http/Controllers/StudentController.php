<?php

namespace App\Http\Controllers;

use App\Models\User; // Change to App\Models\Student if using a Student model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Login a student
     */
    public function loginStudent(Request $request)
    {
        // Validate incoming fields
        $validatedData = $request->validate([
            'loginname' => 'required', // Student ID or login name
            'loginpassword' => 'required', // Password for login
        ]);

        // Attempt login using student ID as username
        if (Auth::attempt(['student_id' => $validatedData['loginname'], 'password' => $validatedData['loginpassword']])) {
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); // Redirect to the intended page or dashboard
        }

        // If authentication fails, redirect back with an error
        return back()->withErrors(['loginname' => 'Invalid credentials.'])->onlyInput('loginname');
    }

    /**
     * Register a new student
     */
    public function registerStudent(Request $request)
    {
        // Validate incoming fields
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:20', Rule::unique('users', 'name')],
            'student_id' => ['required', 'string', 'unique:users,student_id', 'min:6', 'max:20'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:8', 'max:200'], // Secure password rules
        ]);

        // Encrypt password before saving it
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Create the new student in the database
        $user = User::create($validatedData); // Replace User with Student if using a separate model

        // Log the student in immediately after registration
        Auth::login($user);

        // Redirect to the dashboard or any intended page
        return redirect('/dashboard');
    }

    /**
     * Logout the current student
     */
    public function logoutStudent(Request $request)
    {
        // Log out the student
        Auth::logout();

        // Invalidate the session and regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the home page or login
        return redirect('/');
    }

    public function studentInformation()
    {
        // Retrieve the authenticated student's data
        $student = DB::table('students')
            ->join('addresses', 'students.address_id', '=', 'addresses.id')
            ->join('programs', 'students.program_id', '=', 'programs.id')
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
            )
            ->where('students.student_number', Auth::user()->id)
            ->first();

        // Redirect to the dashboard if the student record is not found
        if (!$student) {
            return redirect()->route('student.dashboard')->withErrors('Student information not found.');
        }

        // Determine the view dynamically based on the route name
        $routeName = request()->route()->getName();
        $view = match ($routeName) {
            'student.student-grades' => 'student.student-grades',
            'student.enrollment' => 'student.enrollment',
            default => 'student.student-information',
        };

        return view($view, compact('student'));
    }
}
