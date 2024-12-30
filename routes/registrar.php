<?php

use App\Http\Controllers\ManageUsers\ManageStudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrarController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', RoleMiddleware::class . ':registrar'])
  ->prefix('registrar')
  ->name('registrar.')
  ->group(function () {

    // Dashboard
    Route::get('/dashboard', [RegistrarController::class, "dashboard"])->name('dashboard');

    //Enrollment List
    Route::get("/enrollment-list", [RegistrarController::class, 'enrollmentLists'])->name("enrollment-list");
    Route::get("/enrollment-list/search", [ManageStudentController::class, 'search'])->name("enrollment-list.search");


    // Student's Record
    Route::get("/record-of-students", [RegistrarController::class, 'recordOfStudents'])->name("record-of-students");
    Route::get("/record-of-students/search", [ManageStudentController::class, 'search'])->name("record-of-students.search");


  });