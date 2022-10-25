<?php

use App\Http\Controllers\RackController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});
// Book Rack
Route::get('rack', [RackController::class, 'showRack']);
Route::get('add/rack', [RackController::class, 'addRack'])->name('add.rack');
Route::get('save/rack', [RackController::class, 'saveRack'])->name('save.rack');
Route::get('edit/rack/{id}', [RackController::class, 'editRack'])->name('edit.rack');
Route::put('update/rack', [RackController::class, 'updateRack'])->name('update.rack');
Route::delete('delete/rack/{id}', [RackController::class, 'deleteRack'])->name('delete.book.rack');
