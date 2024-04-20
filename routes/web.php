<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DashboardController;

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

Route::middleware(['auth', 'admin'])->group(function () {
    // Routes untuk admin
    Route::resource('news', NewsController::class);
});

Route::middleware(['auth', 'user'])->group(function () {
    // Routes untuk user
    Route::get('news', [NewsController::class, 'index']);
    Route::get('news/{id}', [NewsController::class, 'show']);
});

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
