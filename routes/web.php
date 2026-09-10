<?php

use Admin\Http\Controllers\Gallery\GalleryController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    Route::get('/', fn () => view('admin'));
    Route::get('/{any}', fn () => view('admin'))->where('any', '.*');
});
Route::prefix('auth')->group(function () {
    Route::get('/', fn () => view('admin'));
    Route::get('/{any}', fn () => view('admin'))->where('any', '.*');
});

Route::get('image/{filename}', [GalleryController::class,'getImage'])->name('image.view');
