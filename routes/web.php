<?php

use App\Http\Controllers\NewStudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Student Dashboard
Route::get('/student/dashboard', function () {
    return view('student.dashboard');
})->middleware(['auth', 'verified', RoleMiddleware::class . ':student'])
    ->name('student.dashboard');

// Department Dashboard
Route::get('/department/dashboard', function () {
    return view('department.dashboard');
})->middleware(['auth', 'verified', RoleMiddleware::class . ':department'])
    ->name('department.dashboard');

// Registrar Dashboard
Route::get('/registrar/dashboard', function () {
    return view('registrar.dashboard');
})->middleware(['auth', 'verified', RoleMiddleware::class . ':registrar'])
    ->name('registrar.dashboard');

// Admin Dashboard Route
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

// Include Auth Routes
require __DIR__ . '/auth.php';
