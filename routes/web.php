<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/about', function () {
    return '<h1>Profil POS Barokah Mart</h1><p>Sistem pencatatan kasir dan manajemen stok modern.</p>';
});

// --- RUTE AUTHENTICATION ---
Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest')->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

// Rute Khusus Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    
    // UserController dimatikan sementara agar tidak bikin error
    // Route::resource('users', UserController::class);

    Route::get('/categories', function () {
        return 'Halaman Categories';
    })->name('categories.index');

    Route::get('/products', function () {
        return 'Halaman Produk';
    })->name('products.index');

    Route::get('/report/sales', function () {
        return 'Halaman Laporan Penjualan';
    })->name('report.sales');
});

// Rute Admin & Kasir
Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', function () {
        return 'Halaman Transaksi POS';
    })->name('pos.index');
});

// Rute Riwayat Transaksi
Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', function () {
        return 'Halaman Transaksi POS';
    })->name('pos.index');

    // Tambahan untuk Riwayat Transaksi khusus kasir
    Route::get('/pos/history', function () {
        return 'Halaman Riwayat Transaksi Kasir';
    })->name('pos.history');
});