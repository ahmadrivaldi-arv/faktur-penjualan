<?php

use App\Livewire\CreateCustomer;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerPdfController;
use App\Http\Controllers\PenjualanPdfController;
use App\Livewire\CreatePenjualan;
use App\Livewire\CreateProduk;
use App\Livewire\CreatePerusahaan;
use App\Livewire\IndexCustomer;
use App\Livewire\EditPenjualan;
use App\Livewire\IndexPenjualan;
use App\Livewire\IndexProduk;
use App\Livewire\IndexPerusahaan;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/', \App\Http\Controllers\DashboardController::class)->name('dashboard');

    Route::group(['prefix' => 'perusahaan', 'as' => 'perusahaan.'], function () {
        Route::get('/', IndexPerusahaan::class)->name('index');
        Route::get('/create', CreatePerusahaan::class)->name('create');
    });

    Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
        Route::get('/', IndexCustomer::class)->name('index');
        Route::get('/create', CreateCustomer::class)->name('create');
        Route::get('/print', CustomerPdfController::class)->name('print');
    });

    Route::group(['prefix' => 'penjualan', 'as' => 'penjualan.'], function () {
        Route::get('/', IndexPenjualan::class)->name('index');
        Route::get('/create', CreatePenjualan::class)->name('create');
        Route::get('/{faktur}/edit', EditPenjualan::class)->name('edit');
        Route::get('/{faktur}/print', PenjualanPdfController::class)->name('print');
    });

    Route::group(['prefix' => 'produk', 'as' => 'produk.'], function () {
        Route::get('/', IndexProduk::class)->name('index');
        Route::get('/create', CreateProduk::class)->name('create');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
