<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('admins', AdminController::class);
Route::resource('customers', CustomerController::class);
Route::resource('sellers', SellerController::class);
Route::resource('products', ProductController::class);
Route::resource('sales', SaleController::class);
Route::resource('images', ImageController::class);

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('home')   // if logged in
        : redirect()->route('login'); // if logged out
});
