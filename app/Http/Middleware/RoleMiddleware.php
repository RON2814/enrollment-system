<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        // Redirect based on roles
        switch ($userRole) {
            case 'admin':
                if ($role !== 'admin') {
                    return redirect()->route('admin.dashboard');
                }
                break;

            case 'department':
                if ($role !== 'department') {
                    return redirect()->route('department.dashboard');
                }
                break;

            case 'registrar':
                if ($role !== 'registrar') {
                    return redirect()->route('registrar.dashboard');
                }
                break;

            case 'student':
                if ($role !== 'student') {
                    return redirect()->route('dashboard');
                }
                break;

            default:
                return redirect()->route('login'); // Redirect unknown roles to login
        }

        return $next($request);
    }
}
