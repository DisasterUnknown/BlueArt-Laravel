<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Home route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Login route
Route::get('/auth/login', function () {
    return view('auth/login');
})->name('login');

// Register route
Route::get('/auth/register', function () {
    return view('auth/register');
})->name('register');

