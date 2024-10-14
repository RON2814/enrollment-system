<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = auth()->id();
    return view('login', ["user" => $user]);
});

Route::post('/register', [StudentController::class, 'registerStudent']);
Route::post("/logout", [StudentController::class, "logoutStudent"]);
Route::post("/login", [StudentController::class, "loginStudent"]);
