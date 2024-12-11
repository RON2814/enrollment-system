<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManageUsers\StudentController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

// Admin Manage Users Routes
Route::middleware(['auth', 'verified', RoleMiddleware::class . ':admin'])
  ->prefix('admin')
  ->name('admin.')
  ->group(function () {
    Route::get("/dashboard", [AdminController::class, 'dashboard'])->name("dashboard");

    Route::get('/manage-users/student', [AdminController::class, 'manageStudent'])->name('manageUsers.student');
    Route::get('/manage-users/student/filter', [AdminController::class, 'filterStudents'])->name('manageUsers.student.filter');
    Route::get('/manage-users/registrar', [AdminController::class, 'manageRegistrar'])->name('manageUsers.registrar');
    Route::get('/manage-users/department', [AdminController::class, 'manageDepartment'])->name('manageUsers.department');
    Route::get('/manage-users/admin', [AdminController::class, 'manageAdmin'])->name('manageUsers.admin');

    // Add Student
    Route::post("/manage-users/student/store", [StudentController::class, 'store'])->name("manage-users.store-student");
  });