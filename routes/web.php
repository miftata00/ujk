<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;


// =====================
// GUEST (belum login)
// =====================

// halaman login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// halaman register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// proses register
Route::post('/register', [AuthController::class, 'register'])->name('register.process');


// =====================
// HARUS LOGIN
// =====================

Route::middleware(['auth'])->group(function () {

    // logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // CRUD Produk
    Route::resource('product', ProductController::class);
    // Supplier
    Route::resource('supplier', SupplierController::class);


});


// =====================
// kalau akses root saat belum login
// =====================

Route::get('/', function () {
    return redirect('/login');
});