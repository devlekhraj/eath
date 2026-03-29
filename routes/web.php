<?php

use App\Http\Controllers\Api\V1\Admin\Gallery\GalleryController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Cache;
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
Route::get('/demo',[WebsiteController::class,'demo']);

Route::get('/privacy-policy', [WebsiteController::class,'privacyPolicy'])->name('privacy.policy');
Route::get('/terms-and-conditions', [WebsiteController::class,'termsConditions'])->name('terms.conditions');

Route::get('/contact-us', [WebsiteController::class,'contactUs'])->name('contact.us');

Route::get('/about-us', [WebsiteController::class,'aboutUs'])->name('about.our.story');
Route::get('/guide-profiles', [WebsiteController::class,'guideProfile'])->name('about.guide.profiles');

Route::get('/responsible-travels', [WebsiteController::class,'responsibleTravels'])->name('responsible.travels');

// Route::get('/destinations',[WebsiteController::class,'destinationPage'])->name('destination.page');
Route::get('/destinations/{slug}',[WebsiteController::class,'destinationShow'])->name('destination.detail');
Route::get('/treks/{destination}/{slug}', [WebsiteController::class,'show'])->name('trek.show');

Route::get('/packages/{slug}', [WebsiteController::class,'show']);
Route::get('/categories/{slug}', [WebsiteController::class,'categoryShow'])->name('category.show');
Route::get('/blogs', [WebsiteController::class,'blogs'])->name('blogs');
Route::get('/blogs/{slug}', [WebsiteController::class,'blogDetail'])->name('blog.show');
Route::get('/fixed-departures/{slug}', [WebsiteController::class,'fixedDeparture'])->name('fixed.departure.show');
Route::get('image/{filename}', [GalleryController::class,'getImage'])->name('image.view');
Route::get('inquiry-form', [WebsiteController::class,'getInquiryForm'])->name('inquiry.form');
Route::post('inquiry', [WebsiteController::class,'store'])->name('inquiry.store');
Route::post('footer-inquiry', [WebsiteController::class, 'storeFooterInquiry'])->name('footer.inquiry.store');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'store'])->name('newsletter.subscribe');
Route::get('/faq', [WebsiteController::class,'faq'])->name('faq');


Route::get('/cache/website-blogs-safety/reset', function () {
    Cache::forget('website.blogs.safety');

    return response()->json([
        'message' => 'Cache cleared: website.blogs.safety',
    ]);
})->name('cache.website.blogs.safety.reset');

Route::get('/{category_slug}/{blog_slug}', [WebsiteController::class, 'blogDetailByCategory'])
    ->name('blog.detail');
