<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Home route
Route::get('/', function () {
    return redirect('/home');
})->name('home');

// Login route
Route::get('/auth/login', function () {
    return view('auth/login');
})->name('login');

// Register route
Route::get('/auth/register', function () {
    return view('auth/register');
})->name('register');

// Home route
Route::get('/home', function () {
    return view('pages/home');
})->name('home');

// About Us route
Route::get('/aboutUs', function () {
    return view('pages/aboutUsPage');
})->name('aboutUs');

// Add Products route
Route::get('/addProduct', function () {
    return view('pages/addProductPage');
})->name('addProductPage');

// Cart Page route
Route::get('/cart', function () {
    return view('pages/cartPage');
})->name('cartPage');

// Categories Page route
Route::get('/categories', function () {
    return view('pages/categoriesPage');
})->name('categoriesPage');

// Check Out Page route
Route::get('/checkOut', function () {
    return view('pages/checkOutPage');
})->name('checkOutPage');

// page404 Page route
Route::get('/404', function () {
    return view('pages/page404');
})->name('page404');

// seller Shop route
Route::get('/sellerShop', function () {
    return view('pages/sellerShop');
})->name('sellerShop');

// user Profile Page route
Route::get('/userProfile', function () {
    return view('pages/userProfilePage');
})->name('userProfilePage');

// view Banned Products Page route
Route::get('/viewBannedProducts', function () {
    return view('pages/viewBannedProducts');
})->name('viewBannedProducts');

// view Kick Users Page route
Route::get('/viewKickUsers', function () {
    return view('pages/viewKickUsers');
})->name('viewKickUsers');

// view Product Details Page route
Route::get('/viewProductDetails', function () {
    return view('pages/viewProductDetails');
})->name('viewProductDetails');

// view Users Page route
Route::get('/viewUsers', function () {
    return view('pages/viewUsers');
})->name('viewUsers');

