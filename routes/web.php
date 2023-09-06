<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use Illuminate\Support\Facades\Route;

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
})->name('login');

Route::prefix('admin')->group(function () {
    Route::get('login', [DashboardController::class, 'loginView']);
    Route::post('login', [AuthController::class, 'login'])
        ->middleware('guest:admin')
        ->name('admin.login');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth:admin');
});

Route::prefix('user')->group(function () {
    Route::post('login', [UserAuthController::class, 'login'])
        ->middleware('guest')
        ->name('user.login');
    Route::get('dashboard', [UserDashboardController::class, 'index'])->middleware('auth');

    // subscription
    Route::post('subscribe', [UserDashboardController::class, 'subscribe'])->name('user.subscribe');
});
