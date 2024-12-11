<?php


use App\Http\Controllers\StudentController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

// Student Authentication / Routes
Route::middleware(['auth', 'verified', RoleMiddleware::class . ':student'])->name("student.")->group(function () {
  // STUDENT Dashboard
  Route::get('/dashboard', function () {
    return view('student.dashboard');
  })->name('dashboard');

  // Student Information Route
  Route::get('/student-information', [StudentController::class, "studentInformation"])->name('student-information');

  // Enrolled Subjects Route
  Route::get('/enrolled-sub', function () {
    return view('student.enrolled-sub');
  })->name('enrolled-sub');

  // Class Schedule Route
  Route::get('/schedule', function () {
    return view('student.schedule');
  })->name('schedule');

  // Student Grades Route
  Route::get('/grades',[StudentController::class, "studentInformation"])->name('student-grades');

  // Student Checklist Routes
  Route::get('/student-checklist', function () {
    return view('student.checklist.student-checklist');
  })->name('student-checklist');

  // Enrollment Module Route
  Route::get('/enrollment', [StudentController::class, "studentInformation"])->name('enrollment');
});