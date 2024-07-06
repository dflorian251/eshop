<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('other.index');
});

Route::get('/eshop', [ItemController::class , 'getIndex'])->name('eshop.index');

Route::get('/eshop/{id}', [ItemController::class, 'getItem'])->name('eshop.item');

Route::group(['prefix' => 'admin'], function() {
    Route::get('', [ItemController::class, 'getAdminIndex'])->name('admin.index');
    
    Route::get('/create', function() {
        return view('admin.create');
    })->name('admin.create');

    Route::post('/create', [ItemController::class, 'adminCreateItem'])->name('admin.create');

    Route::get('/edit/{id}', [ItemController::class, 'getAdminEdit'])->name('admin.edit');

    Route::post('/edit', [ItemController::class, 'adminUpdateItem'])->name('admin.update');
});
