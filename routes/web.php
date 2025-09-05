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

use App\Http\Controllers\PageControllers\Seller\SellerShopController;
use App\Http\Controllers\PageControllers\Seller\AddAndUpdateProductController;
use App\Http\Controllers\PageControllers\Common\AboutUsController;
use App\Http\Controllers\PageControllers\Common\CategoriesController;
use App\Http\Controllers\PageControllers\Common\ViewProductController;
use App\Http\Controllers\PageControllers\Costomer\CartController;
use App\Http\Controllers\PageControllers\Costomer\CheckOutController;
use App\Http\Controllers\PageControllers\Admin\ViewBannedController;
use App\Http\Controllers\PageControllers\Admin\ViewKickController;
use App\Http\Controllers\PageControllers\Admin\ViewUsersController;
use App\Http\Controllers\PageControllers\Common\Page404Controller;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/pages/common/home', function () {
        return view('pages.common.home');
    })->name('home');
    
    Route::get('/sellerShop', [SellerShopController::class, 'index'])
        ->name('pages.seller.sellerShop');

    // Seller Add and Update Products Rout 
    Route::get('/addProduct/{product?}', [AddAndUpdateProductController::class, 'index'])
        ->name('addProduct');
    Route::post('/add&UpdateProduct', [AddAndUpdateProductController::class, 'store'])->name('add&UpdateProduct');

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart');
    Route::get('/viewBannedProducts', [ViewBannedController::class, 'index'])
        ->name('viewBannedProducts');
    Route::get('/viewKickUsers', [ViewKickController::class, 'index'])
        ->name('viewKickUsers');
    Route::get('/viewUsers', [ViewUsersController::class, 'index'])
        ->name('viewUsers');
    Route::get('/categoriesPage/{category}', [CategoriesController::class, 'index'])
        ->name('categoriesPage');
    Route::get('/checkOutPage', [CheckOutController::class, 'index'])
        ->name('checkOutPage');
    Route::get('/viewProductDetails{id}', [ViewProductController::class, 'index'])
        ->name('viewProductDetails');
});

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('home')   // if logged in
        : redirect()->route('login'); // if logged out
});


Route::get('/aboutUs', [AboutUsController::class, 'index'])
    ->name('aboutUs');

Route::fallback([Page404Controller::class, 'index']);
