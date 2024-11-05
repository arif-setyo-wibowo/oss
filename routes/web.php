<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Vendor\DashboardVendorController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Vendor\ProductController as productVendor;
use App\Http\Controllers\Vendor\OrderController as orderVendor;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::resource('/', DashboardController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('produk', ProdukController::class);
});

Route::prefix('vendor')->group(function () {
    Route::resource('/', DashboardVendorController::class);
    Route::resource('toko', VendorController::class);
    Route::resource('product', productVendor::class);
    Route::resource('order', orderVendor::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
