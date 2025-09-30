<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\UserCheckoutController;
use Illuminate\Http\Request;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {

    // User
    Route::get('/user', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/updateUser', [UserController::class, 'updateProfile']);
    Route::put('/resetPassword', [AuthController::class, 'resetPassword']);
    Route::put('/checkOut', [UserCheckoutController::class, 'store']);

    // Products
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/products/category/{category}', [ProductController::class, 'category']);

    // Sales
    Route::get('/sales', [SaleController::class, 'index']);
    Route::get('/sales/{id}', [SaleController::class, 'show']);
    
    // Cart
    Route::get('/cart', [CartController::class, 'getUserCart']);        
    Route::post('/cart/add', [CartController::class, 'addToCart']);     
    Route::delete('/cart/remove/{productId}', [CartController::class, 'removeItem']);
    Route::delete('/cart/clear', [CartController::class, 'clearCart']); 
});
