<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;

Route::view('/', 'index')->name('login')->middleware('guest');

Route::post('login', LoginController::class);

Route::get('logout', LogoutController::class);

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth');

//products
Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
});

//brands
Route::get('/brands/{brand}', [ProductController::class, 'brand'])
    ->name('products.byBrand')
    ->middleware('auth');