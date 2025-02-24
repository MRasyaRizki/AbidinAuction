<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardPetugasController;

// Route Login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('signin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Route Register
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Route Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('dashboardAdmin', [DashboardAdminController::class, 'index'])->name('dashboardAdmin');
Route::get('dashboardPetugas', [DashboardPetugasController::class, 'index'])->name('dashboardPetugas');

//route admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('barang', App\Http\Controllers\Admin\BarangController::class);
});
