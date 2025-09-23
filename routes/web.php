<?php

use App\Http\Controllers\Api\V1\Admin\Gallery\GalleryController;
use App\Http\Controllers\Api\V1\Admin\Inquiry\InquiryController;
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
// Route::get('/', function () {

//     return view('website.index');
// });
Route::get('/',[WebsiteController::class,'index']);


Route::get('/packages/{slug}', [WebsiteController::class,'show']);
Route::get('/categories/{slug}', [WebsiteController::class,'categoryShow'])->name('category.show');
Route::get('/guide-profiles', [WebsiteController::class,'guideProfile']);
Route::get('/blogs', [WebsiteController::class,'blogs']);
Route::get('/blogs/{slug}', [WebsiteController::class,'blogDetail'])->name('blog.show');
Route::get('/fixed-departures/{slug}', [WebsiteController::class,'fixedDeparture'])->name('fixed.departure.show');


Route::get('image/{filename}', [GalleryController::class,'getImage'])->name('image.view');

Route::get('inquiry-form', [WebsiteController::class,'getInquiryForm'])->name('inquiry.form');
Route::post('inquiry', [WebsiteController::class,'store'])->name('inquiry.store');

Route::get('/faq', [WebsiteController::class,'faq']);
Route::get('/privacy-policy', [WebsiteController::class,'privacyPolicy']);
Route::get('/terms-and-conditions', [WebsiteController::class,'termsConditions']);
Route::get('/about-us', [WebsiteController::class,'aboutUs']);
Route::get('/contact-us', [WebsiteController::class,'contactUs']);