<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardPetugasController;

// Route Landing Page
// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

// Route Login
Route::get('login', [logincontroller::class, 'showLoginForm'])->name('login');
Route::post('login', [logincontroller::class, 'login'])->name('signin');
Route::get('logout', [logincontroller::class, 'logout'])->name('logout');

// Route Register
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Route Dashboard
Route::get('/dashboard/masyarakat', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/admin', [DashboardAdminController::class, 'index'])->name('dashboardadministrator');
Route::get('/dashboard/petugas', [DashboardPetugasController::class, 'index'])->name('dashboardpetugas');
