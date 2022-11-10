<?php

use App\Http\Controllers\PublisherController;
use App\Models\Publisher;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});


Route::get('/publisher', [PublisherController::class, 'index'])->name('publisher.index');
Route::get('/publisher/create', [PublisherController::class, 'create'])->name('publisher.create');
Route::post('/publisher/store', [PublisherController::class, 'store'])->name('publisher.store');
Route::get('/publisher/{id}/edit', [PublisherController::class, 'edit'])->name('publisher.edit');
Route::put('/publisher/{id}', [PublisherController::class, 'update'])->name('publisher.update');
Route::get('/publisher/{id}', [PublisherController::class, 'destroy'])->name('publisher.delete');



