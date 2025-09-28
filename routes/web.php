<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TukangController as AdminTukangController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Tukang\TukangController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/tukang', AdminTukangController::class);
    Route::resource('/order', AdminOrderController::class);
});

// Tukang routes
Route::prefix('tukang')->group(function () {
    Route::get('/dashboard', [TukangController::class, 'index'])->name('tukang.dashboard');
    Route::post('/order/{id}/accept', [TukangController::class, 'acceptOrder'])->name('tukang.order.accept');
    Route::post('/order/{id}/reject', [TukangController::class, 'rejectOrder'])->name('tukang.order.reject');
    Route::post('/order/{id}/status', [TukangController::class, 'updateStatus'])->name('tukang.order.status');
});

// User routes
Route::prefix('user')->group(function () {
    Route::get('/dashboard', [OrderController::class, 'index'])->name('user.dashboard');
    Route::resource('/order', OrderController::class);
});
