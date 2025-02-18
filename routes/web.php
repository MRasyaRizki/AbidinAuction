<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Index
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Routes untuk Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes untuk Register
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Redirect setelah login
Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard')->middleware('checkRole:admin');

    Route::get('/petugas', function () {
        return view('petugas.dashboard');
    })->name('petugas.dashboard')->middleware('checkRole:petugas');

    Route::get('/masyarakat', function () {
        return view('masyarakat.dashboard');
    })->name('masyarakat.dashboard')->middleware('checkRole:masyarakat');
});
