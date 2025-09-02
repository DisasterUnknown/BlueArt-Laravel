<?php

use App\Http\Controllers\BaseControllers\AdminController;
use App\Http\Controllers\BaseControllers\CustomerController;
use App\Http\Controllers\BaseControllers\SellerController;
use App\Http\Controllers\BaseControllers\ProductController;
use App\Http\Controllers\BaseControllers\SaleController;
use App\Http\Controllers\BaseControllers\ImageController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\PageControllers\SellerShopController;
use App\Http\Controllers\PageControllers\AddProductController;
use App\Http\Controllers\PageControllers\AboutUsController;
use App\Http\Controllers\PageControllers\Page404Controller;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () {
        return view('pages.home');
    })->name('home');
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

Route::get('/sellerShop', [SellerShopController::class, 'index'])
    ->name('sellerShop');
Route::get('/addProduct', [AddProductController::class, 'index'])
    ->name('addProduct');
Route::get('/aboutUs', [AboutUsController::class, 'index'])
    ->name('aboutUs');

Route::fallback([Page404Controller::class, 'index']);