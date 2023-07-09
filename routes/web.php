<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    AuthController,
    CutiController,
    DepartemenController,
    UserController
};
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'proseslogin'])->name('proseslogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('departemen')->name('departemen.')->group(function () {
        Route::get('/', [DepartemenController::class, 'index'])->name('index');
        Route::get('/create', [DepartemenController::class, 'create'])->name('create');
        Route::post('/create', [DepartemenController::class, 'store'])->name('store');
        Route::post('/show/{departemen}', [DepartemenController::class, 'show'])->name('show');
        Route::get('/update/{departemen}', [DepartemenController::class, 'edit'])->name('edit');
        Route::post('/update/{departemen}', [DepartemenController::class, 'update'])->name('update');
        Route::delete('/delete/{departemen}', [DepartemenController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('cuti')->name('cuti.')->group(function () {
        Route::get('/', [CutiController::class, 'index'])->name('index');
        Route::get('/create', [CutiController::class, 'create'])->name('create');
        Route::post('/create', [CutiController::class, 'store'])->name('store');
        // Route::post('/show/{cuti}', [CutiController::class, 'show'])->name('show');
        // Route::get('/update/{cuti}', [CutiController::class, 'edit'])->name('edit');
        Route::post('/update/{cuti}', [CutiController::class, 'update'])->name('update');
        // Route::delete('/delete/{cuti}', [CutiController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/create', [UserController::class, 'store'])->name('store');
        Route::post('/show/{user}', [UserController::class, 'show'])->name('show');
        Route::get('/update/{user}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('destroy');
    });
});
