<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DahsboardController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', [AuthController::class, 'index'])->name('auth.index');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::post('/users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');
