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
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.all')
        ->middleware('auth:admin');
    Route::get('dashboard/annual', [DashboardController::class, 'annual'])
        ->name('admin.annual')
        ->middleware('auth:admin');
    Route::get('dashboard/monthly', [DashboardController::class, 'monthly'])
        ->name('admin.monthly')
        ->middleware('auth:admin');
    Route::get('subscription/{subscription}', [DashboardController::class, 'showSubscription'])
        ->middleware('auth:admin')
        ->name('subscription.show');
    Route::post('logout', [DashboardController::class, 'logout'])->name('admin.logout');
});

Route::prefix('user')->group(function () {
    Route::post('login', [UserAuthController::class, 'login'])
        ->middleware('guest')
        ->name('user.login');
    Route::get('dashboard', [UserDashboardController::class, 'index'])->middleware('auth');

    // subscription
    Route::post('subscribe', [UserDashboardController::class, 'subscribe'])->name('user.subscribe');

    // log out
    Route::post('logout', [UserDashboardController::class, 'logout'])->name('user.logout');
});
