<?php

use App\Http\Controllers\VendorsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

# Vendors (Azhar)
Route::get('vendors', [VendorsController::class, 'index'])->name('vendors.index');
Route::get('vendors/create', [VendorsController::class, 'create'])->name('vendors.create');
Route::post('/vendors', [VendorsController::class, 'store'])->name('vendors.store');
Route::get('vendors/{id}/edit', [VendorsController::class, 'edit'])->name('vendors.edit');
Route::put('/vendors/{id}', [VendorsController::class, 'update'])->name('vendors.update');
Route::delete('/vendors/{id}', [VendorsController::class, 'destroy'])->name('vendors.destroy');
