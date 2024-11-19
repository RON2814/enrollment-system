<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('posts.index');
})->name("home");

Route::get('/login', function () {
    return view('auth.login');
})->name("login");