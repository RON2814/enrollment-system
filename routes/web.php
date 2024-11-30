<?php

use App\Http\Controllers\NewStudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Welcome Page
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name("index");

Route::fallback(function () {
    return redirect()->route('index');
});

// STUDENT Dashboard
Route::get('/dashboard', function () {
    return view('student.dashboard');
})->middleware(['auth', 'verified', RoleMiddleware::class . ':student'])
    ->name('student.dashboard');

// Student Information Route
Route::get('/student-information', function () {
    return view('student.student-information');
})->middleware(['auth', 'verified', RoleMiddleware::class . ':student'])
    ->name('student.student-information');

// Enrolled Subjects Route
Route::get('/enrolled-sub', function () {
    return view('student.enrolled-sub');
})->middleware(['auth', 'verified', RoleMiddleware::class . ':student'])
    ->name('student.enrolled-sub');

// Class Schedule Route
Route::get('/schedule', function () {
    return view('student.schedule');
})->middleware(['auth', 'verified', RoleMiddleware::class . ':student'])
    ->name('student.schedule');

// Student Grades Route
Route::get('/grades', function () {
    return view('student.student-grades');
})->middleware(['auth', 'verified', RoleMiddleware::class . ':student'])
    ->name('student.student-grades');

// Enrollment Module Route
Route::get('/enrollment', function () {
    return view('student.enrollment');
})->middleware(['auth', 'verified', RoleMiddleware::class . ':student'])
    ->name('student.enrollment');

// Department Routes
Route::middleware(['auth', 'verified', RoleMiddleware::class . ':department'])->prefix('department')->name('department.')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('department.dashboard');
    })->name('dashboard');

    // Student Checklist
    Route::get('/student-checklist', function () {
        return view('department.studentChecklist');
    })->name('studentChecklist');

    // Courses
    Route::get('/courses', function () {
        return view('department.courses');
    })->name('courses');

    // Program
    Route::get('/program', function () {
        return view('department.program');
    })->name('program');

    // Instructors
    Route::get('/instructors', function () {
        return view('department.instructors');
    })->name('instructor');

    // Schedule
    Route::get('/schedule', function () {
        return view('department.schedule');
    })->name('schedule');
});


// REGISTRAR Dashboard
Route::get('/registrar/dashboard', function () {
    return view('registrar.dashboard');
})->middleware(['auth', 'verified', RoleMiddleware::class . ':registrar'])
    ->name('registrar.dashboard');

// ADMIN Dashboard Route
Route::get('/admin/dashboard', [UserController::class, 'dashboard'])
    ->middleware(['auth', 'verified', RoleMiddleware::class . ':admin'])
    ->name('admin.dashboard');

// Admin Manage Users Routes
Route::middleware(['auth', 'verified', RoleMiddleware::class . ':admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/manage-users/student', [UserController::class, 'manageStudent'])->name('manageUsers.student');
        Route::get('/manage-users/registrar', [UserController::class, 'manageRegistrar'])->name('manageUsers.registrar');
        Route::get('/manage-users/department', [UserController::class, 'manageDepartment'])->name('manageUsers.department');
        Route::get('/manage-users/admin', [UserController::class, 'manageAdmin'])->name('manageUsers.admin');
    });


// Profile Management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Add Student with registrar role
Route::get("/registrar/add-student", [NewStudentController::class, 'create'])
    ->middleware(['auth', 'verified', RoleMiddleware::class . ':registrar'])
    ->name("registrar.add-student");

Route::post("/registrar/add-student", [ProfileController::class, 'store'])
    ->middleware(['auth', 'verified', RoleMiddleware::class . ':registrar'])
    ->name("registrar.store-student");

// Add Student with admin role
Route::get("/admin/add-student", [NewStudentController::class, 'create'])
    ->middleware(['auth', 'verified', RoleMiddleware::class . ':admin'])
    ->name("admin.add-student");

Route::post("/admin/add-student", [NewStudentController::class, 'store'])
    ->middleware(['auth', 'verified', RoleMiddleware::class . ':admin'])
    ->name("admin.store-student");

Route::view("/view-test", "layout.app");

// Include Auth Routes
require __DIR__ . '/auth.php';
