<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorController;
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
    Route::get('/student-Evaluation', function () {
      return view('department.student-Evaluation');
    })->name('student-Evaluation');

    // Courses (Controller Method)
    Route::get('/courses', [CourseController::class, 'showCourses'])->name('courses');

    // Instructors
    Route::get('/instructor', [InstructorController::class, 'showInstructor'])->name('instructor');

    // Add instructor
    Route::post('/instructor', [InstructorController::class, 'addInstructor'])->name('instructor.add-instructor');

    //update instructor
    Route::patch('instructor/update-instructor/{id}', [InstructorController::class, 'updateInstructor'])->name('instructor.update-instructor');

    // Schedule (Controller method)
    Route::get('/schedule', [InstructorController::class, 'schedule'])->name('schedule');
  });
