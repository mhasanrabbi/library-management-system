<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index');
});

# Categories (Alamgir)

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/manage/categories', [CategoryController::class, 'manage'])->name('manage.categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('manage.categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('manage.categories.store');
Route::get('/manage/categories/{id}/edit', [CategoryController::class, 'edit'])->name('manage.categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('manage.categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('manage.categories.destroy');







// Route::get('/manage/categories', [CategoryController::class, 'manage'])->name('manage.categories.index');
// Route::get('/categories/create', [CategoryController::class, 'create'])->name('manage.categories.create');
// Route::post('/categories', [CategoryController::class, 'store'])->name('manage.categories.store');
// Route::get('/manage/categories/{id}/edit', [CategoryController::class, 'edit'])->name('manage.categories.edit');
// Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('manage.categories.update');
// Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('manage.categories.destroy');