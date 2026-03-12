<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;

Route::view('/', 'index')->name('login')->middleware('guest');
Route::post('login', LoginController::class);

Route::middleware('auth')->group(function () {
    Route::post('/logout', LogoutController::class)->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Products
    Route::resource('products', ProductController::class);
    Route::get('/products/{product}/confirm-delete', [ProductController::class, 'confirmDelete'])
        ->name('products.confirmDelete');

    // Brands
    Route::resource('brands', BrandController::class);
    Route::get('/brands/{brand}/confirm-delete', [BrandController::class, 'confirmDelete'])
        ->name('brands.confirmDelete');
});