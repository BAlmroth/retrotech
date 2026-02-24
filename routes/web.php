<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

Route::view('/', 'index')->name('login')->middleware('guest');

Route::post('login', LoginController::class);

Route::get('dashboard', DashboardController::class)->middleware('auth');

Route::get('logout', LogoutController::class);