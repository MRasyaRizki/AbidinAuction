<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\BidinController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardPetugasController;

// Route Login
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['web'])->group(function () {
    Route::post('login', [LoginController::class, 'login'])->name('signin');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::group(['guard' => 'petugas'], function () {
    Route::get('dashboardAdmin', [DashboardAdminController::class, 'index'])->name('dashboardAdmin');
});

// Route Register
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Route Dashboard
// Route::get('dashboardPetugas', [DashboardPetugasController::class, 'index'])->name('dashboardPetugas');


//route barang
//Route::get('/dashboard', [BarangController::class, 'index'])->name('dashboard');
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
// ROUTE TEST BUAT BE
Route::get('/kelolaBarang', [BarangController::class, 'kelola'])->name('kelolaBarang');
Route::get('/editBarang/{barang}', [BarangController::class, 'edit'])->name('editBarang');
Route::post('/updateBarang/{barang}', [BarangController::class, 'update'])->name('updateBarang');
Route::get('/hapusBarang/{barang}', [BarangController::class, 'destroy'])->name('hapusBarang');

Route::post('/TutuplelangBarang/{barang}', [LelangController::class, 'close'])->name('TutuplelangBarang');
Route::post('/lelangBarang/{barang}', [LelangController::class, 'make'])->name('lelangBarang');
Route::post('/bid/{lelang}', [BidinController::class, 'bid'])->name('bid');

//COMMENT DAN LIKE
Route::get('/laporan-lelang', [LaporanController::class, 'generateLaporan']);

Route::get('/managePetugas', [PetugasController::class, 'manage'])->name('managePetugas');
Route::get('/createPetugas', [PetugasController::class, 'create'])->name('createPetugas');
Route::post('/storePetugas', [PetugasController::class, 'store'])->name('storePetugas');
Route::get('/editPetugas/{petugas}', [PetugasController::class, 'edit'])->name('editPetugas');
Route::post('/updatePetugas/{petugas}', [PetugasController::class, 'update'])->name('updatePetugas');
Route::get('/destroyPetugas/{petugas}', [PetugasController::class, 'destroy'])->name('destroyPetugas');


// Route untuk dashboard admin (dengan CRUD barang)
// Route::middleware([AdminMiddleware::class])->group(function () {
//     Route::get('/admin/dashboard', [BarangController::class, 'index'])->name('admin.dashboard');
//     Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
//     // Route lain untuk fitur admin...
// });
