<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\BaseControllers\UserCartController;

use App\Http\Controllers\PageControllers\Seller\SellerShopController;
use App\Http\Controllers\PageControllers\Seller\AddAndUpdateProductController;
use App\Http\Controllers\PageControllers\Seller\RequestUnbanProductController;
use App\Http\Controllers\PageControllers\Seller\salesPageController;
use App\Http\Controllers\PageControllers\Common\AboutUsController;
use App\Http\Controllers\PageControllers\Common\CategoriesController;
use App\Http\Controllers\PageControllers\Common\ViewProductController;
use App\Http\Controllers\PageControllers\Costomer\CartController;
use App\Http\Controllers\PageControllers\Costomer\CheckOutController;
use App\Http\Controllers\PageControllers\Admin\ViewBannedController;
use App\Http\Controllers\PageControllers\Admin\ViewKickController;
use App\Http\Controllers\PageControllers\Admin\ViewUsersController;
use App\Http\Controllers\PageControllers\Admin\ViewUnbanProductRequestController;
use App\Http\Controllers\PageControllers\Admin\ViewUnbanUserRequestController;
use App\Http\Controllers\PageControllers\Common\Page404Controller;
use App\Http\Controllers\PageControllers\Common\Page403Controller;
use App\Http\Controllers\PageControllers\Common\RequestUnban;

use App\Http\Middleware\RoleMiddleware;

// Authenticated 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Home 
    Route::get('/pages/common/home', function () {
        return view('pages.common.home');
    })->name('home');

    // Seller Routes
    Route::middleware(RoleMiddleware::class . ':seller')->group(function () {
        Route::get('/sellerShop', [SellerShopController::class, 'index'])
            ->name('pages.seller.sellerShop');
        Route::get('/addProduct/{product?}', [AddAndUpdateProductController::class, 'index'])
            ->name('addProduct');
        Route::get('/salesPage', [salesPageController::class, 'index'])
            ->name('salesPage');
        Route::get('/requestUnbanProduct/{product?}', [RequestUnbanProductController::class, 'index'])
            ->name('requestUnbanProduct');
        Route::post('/postRequestUnbanProduct', [RequestUnbanProductController::class, 'store'])
            ->name('postRequestUnbanProduct');
        Route::post('/add&UpdateProduct', [AddAndUpdateProductController::class, 'store'])
            ->name('add&UpdateProduct');
    });

    // Customer Routes
    Route::middleware(RoleMiddleware::class . ':customer')->group(function () {
        Route::get('/cart', [CartController::class, 'index'])
            ->name('cart');
        Route::get('/checkOutPage', [CheckOutController::class, 'index'])
            ->name('checkOutPage');
        Route::post('/checkOut', [CheckOutController::class, 'checkOut'])
            ->name('checkOut');
    });

    // Admin Routes 
    Route::middleware(RoleMiddleware::class . ':admin')->group(function () {
        Route::get('/viewBannedProducts', [ViewBannedController::class, 'index'])
            ->name('viewBannedProducts');
        Route::get('/viewKickUsers', [ViewKickController::class, 'index'])
            ->name('viewKickUsers');
        Route::get('/viewUsers', [ViewUsersController::class, 'index'])
            ->name('viewUsers');
        Route::get('/viewUnbanRequest', [ViewUnbanUserRequestController::class, 'index'])
            ->name('viewUnbanRequest');
        Route::get('/viewUnbanProductRequest', [ViewUnbanProductRequestController::class, 'index'])
            ->name('viewUnbanProductRequest');
    });

    // admin, seller, customer
    Route::middleware(RoleMiddleware::class . ':admin,seller,customer')->group(function () {
        Route::get('/categoriesPage/{category}', [CategoriesController::class, 'index'])
            ->name('categoriesPage');
        Route::get('/viewProductDetails{id}', [ViewProductController::class, 'index'])
            ->name('viewProductDetails');
        Route::get('/403', [Page403Controller::class, 'index'])->name('page403');
    });

    // customer, admin
    Route::middleware(RoleMiddleware::class . ':admin,customer')->group(function () {
        Route::post('/addToCart', [ViewProductController::class, 'productManagement'])->name('addToCart');
    });
});

// Public Routes
Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('home')   // if logged in
        : redirect()->route('login'); // if logged out
});

Route::get('/aboutUs', [AboutUsController::class, 'index'])
    ->name('aboutUs');

Route::get('/requestUnban', [RequestUnban::class, 'index'])
    ->name('requestUnban');
Route::post('/requestUnban', [RequestUnban::class, 'store'])
    ->name('requestUnban');

// Fallback Route
Route::fallback([Page404Controller::class, 'index']);
