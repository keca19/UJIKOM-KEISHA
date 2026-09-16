<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\KontakController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Berita
Route::get('/berita', [BeritaController::class, 'userIndex'])->name('berita.index');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

// Halaman Galeri
Route::get('/galeri', [GaleriController::class, 'userIndex'])->name('galeri.index');
Route::get('/galeri/{id}', [GaleriController::class, 'userShow'])->name('galeri.show');

// Form Kirim Pesan Kontak
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');


/*
|--------------------------------------------------------------------------
| Auth & Guest Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Admin Routes (Protected Auth & Prevent Back)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'prevent-back'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Kelola Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // Kelola Galeri
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
    Route::put('/galeri/{id}', [GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

    // Kelola Kontak
    Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::put('/kontak/{id}/read', [KontakController::class, 'markAsRead'])->name('kontak.read');
    Route::delete('/kontak/{id}', [KontakController::class, 'destroy'])->name('kontak.destroy');

});