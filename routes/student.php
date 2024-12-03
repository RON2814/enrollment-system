<?php

use App\Http\Middleware\RoleMiddleware;

// Student Authentication / Routes
Route::middleware(['auth', 'verified', RoleMiddleware::class . ':student'])->name("student.")->group(function () {
  // STUDENT Dashboard
  Route::get('/dashboard', function () {
    return view('student.dashboard');
  })->name('dashboard');

  // Student Information Route
  Route::get('/student-information', function () {
    return view('student.student-information');
  })->name('student-information');

  // Enrolled Subjects Route
  Route::get('/enrolled-sub', function () {
    return view('student.enrolled-sub');
  })->name('enrolled-sub');

  // Class Schedule Route
  Route::get('/schedule', function () {
    return view('student.schedule');
  })->name('schedule');

  // Student Grades Route
  Route::get('/grades', function () {
    return view('student.student-grades');
  })->name('student-grades');

  // Student Checklist Routes
  Route::get('/student-checklist', function () {
    return view('student.checklist.student-checklist');
  })->name('student-checklist');

  // Enrollment Module Route
  Route::get('/enrollment', function () {
    return view('student.enrollment');
  })->name('enrollment');
});