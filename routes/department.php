<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EvaluationController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

// DEPARTMENT ROUTES
Route::middleware(['auth', 'verified', RoleMiddleware::class . ':department'])
  ->prefix('department')
  ->name('department.')
  ->group(function () {

    // Dashboard
    Route::get('/dashboard', [DepartmentController::class, 'dashboard'])->name('dashboard');


    Route::get('/student-Evaluation/student/', [EvaluationController::class, 'index'])->name('student-Evaluation');


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
