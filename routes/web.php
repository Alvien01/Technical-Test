<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TukangController as AdminTukangController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Tukang\TukangController;
use App\Http\Controllers\User\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->middleware(['auth','role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/tukang', AdminTukangController::class);
    Route::resource('/order', AdminOrderController::class);
});
Route::prefix('tukang')->middleware(['auth','role:tukang'])->group(function () {
    Route::get('/dashboard', [TukangController::class, 'index'])->name('tukang.dashboard');
    Route::post('/order/{id}/accept', [TukangController::class, 'acceptOrder'])->name('tukang.order.accept');
    Route::post('/order/{id}/reject', [TukangController::class, 'rejectOrder'])->name('tukang.order.reject');
    Route::post('/order/{id}/status', [TukangController::class, 'updateStatus'])->name('tukang.order.status');
});
Route::prefix('user')->middleware(['auth','role:user'])->group(function () {
    Route::get('/dashboard', [OrderController::class, 'index'])->name('user.dashboard');
    Route::resource('/order', OrderController::class);
});
