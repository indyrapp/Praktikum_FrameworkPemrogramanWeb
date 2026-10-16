<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return 'Toko Toserba Baru adalah toko yang menyediakan berbagai kebutuhan.';
});

Route::get('/products', function () {
    return 'Daftar Produk';
});

Route::get('/products/create', function () {
    return 'Form Tambah Produk';
});

Route::post('/products/store', function () {
    return 'Produk berhasil disimpan';
});

Route::get('/suppliers', function () {
    return 'Daftar Supplier';
});

Route::get('/suppliers/create', function () {
    return view('supplier');
});

Route::post('/suppliers/store', function () {
    return 'Data supplier berhasil disimpan';
});

Route::get('/customers', function () {
    return 'Daftar Pelanggan';
});

Route::get('/transactions', function () {
    return 'Daftar Transaksi';
});

Route::post('/transactions/store', function () {
    return 'Transaksi berhasil disimpan';
});

//login
Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');
 
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest')
    ->name('login.store');
 
//logout
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('/reports/sales', [ReportController::class,'sales'])->name('report.sales');
});
 
Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('/pos', [PosController::class, 'store'])->name('pos.store');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
});

Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::get('/pos/history', function () {
        return 'Riwayat Transaksi Saya';
    })->name('pos.history');
});