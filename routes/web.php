<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Vendor\DashboardVendorController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('admin.index');
    });
});


Route::prefix('vendor')->group(function () {
    Route::controller(DashboardVendorController::class)->group(function () {
        Route::get('/', 'index')->name('vendor.index');
    });
});