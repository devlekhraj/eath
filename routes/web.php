<?php

use App\Http\Controllers\Api\V1\Admin\Gallery\GalleryController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    Route::get('/', fn () => view('admin'));
    Route::get('/{any}', fn () => view('admin'))->where('any', '.*');
});
Route::prefix('auth')->group(function () {
    Route::get('/', fn () => view('admin'));
    Route::get('/{any}', fn () => view('admin'))->where('any', '.*');
});

// Optional: Welcome page
Route::get('/', function () {
    // return view('website.index');
    return view('website.index');
});


Route::get('/packages/{id}', [WebsiteController::class,'show']);
Route::get('image/{filename}', [GalleryController::class,'getImage'])->name('image.view');
