<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

// DEPARTMENT ROUTES
Route::middleware(['auth', 'verified', RoleMiddleware::class . ':department'])
  ->prefix('department')
  ->name('department.')
  ->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
      return view('department.dashboard');
    })->name('dashboard');

    // Student Checklist
    Route::get('/student-checklist', function () {
      return view('department.studentChecklist');
    })->name('studentChecklist');

    // Courses (Controller Method)
    Route::get('/courses', [CourseController::class, 'showCourses'])->name('courses');

    // Department - Programs and Instructors
    Route::get('/department', [DepartmentController::class, 'department'])->name('department');

    // Schedule (Controller method)
    Route::get('/schedule', [DepartmentController::class, 'schedule'])->name('schedule');
  });