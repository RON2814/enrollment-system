<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrarController;
use App\Http\Middleware\RoleMiddleware;

Route::middleware(['auth', 'verified', RoleMiddleware::class . ':registrar'])
  ->prefix('registrar')
  ->name('registrar.')
  ->group(function () {

    // Dashboard
    Route::get('/dashboard', [RegistrarController::class, "dashboard"])->name('dashboard');

    Route::get("/record-of-students", [RegistrarController::class, 'recordOfStudents'])->name("record-of-students");
    Route::get("/record-of-students/filter", [RegistrarController::class, 'filterStudents'])->name("record-of-students.filter");
  });