<?php

use Admin\Http\Controllers\Media\MediaAssetController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', fn () => view('admin'));
    Route::get('/{any}', fn () => view('admin'))->where('any', '.*');
});
Route::prefix('auth')->group(function () {
    Route::get('/', fn () => view('admin'));
    Route::get('/{any}', fn () => view('admin'))->where('any', '.*');
});

Route::get('image/{filename}', [MediaAssetController::class, 'getImage'])->name('image.view');
