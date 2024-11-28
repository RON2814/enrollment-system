<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Check if the 'remember' checkbox was checked
        $remember = $request->filled('remember');  // This will return true if 'remember' is checked, false otherwise.

        // Authenticate the user with 'remember' flag
        if (Auth::attempt($request->only('email', 'password'), $remember)) {
            // Regenerate the session to avoid session fixation
            $request->session()->regenerate();

            // Get the logged-in user's role
            $loggedInUserRole = $request->user()->role;

            // Redirect based on user role
            if ($loggedInUserRole == 'department') {
                return redirect()->intended(route('department.dashboard', absolute: false));
            } elseif ($loggedInUserRole == 'registrar') {
                return redirect()->intended(route('registrar.dashboard', absolute: false));
            } elseif ($loggedInUserRole == 'admin') {
                return redirect()->intended(route('admin.dashboard', absolute: false));
            }

            // Default redirect when no matching role
            return redirect()->intended(route('student.dashboard', absolute: false));
        }

        // If login fails, return back with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Logout the user
        Auth::guard('web')->logout();

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
