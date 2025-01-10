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

    Route::get("/record-of-students", [RegistrarController::class, 'recordOfStudents'])->name("record-of-students");
    Route::get("/record-of-students/search", [ManageStudentController::class, 'search'])->name("record-of-students.search");

    Route::get("/enrollment-lists", [RegistrarController::class, 'enrollmentLists'])->name("enrollment-lists");
    Route::post("/enrollment-lists/store", [ManageStudentController::class, 'store'])->name("enrollment-lists.store");
    Route::patch("/enrollment-lists/update/{student_id}", [ManageStudentController::class, 'update'])->name("enrollment-lists.update");

    Route::get("enrolled-students", [RegistrarController::class, 'enrolledStudents'])->name("enrolled-students");
    Route::get("students-record", [RegistrarController::class, 'recordStudents'])->name("students-record");
  });