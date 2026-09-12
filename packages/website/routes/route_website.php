<?php

use App\Http\Middleware\EnsureWebsiteAllowed;
use Illuminate\Support\Facades\Route;
use Website\Http\Controllers\ArticleController;
use Website\Http\Controllers\ComparisonController;
use Website\Http\Controllers\DepartureController;
use Website\Http\Controllers\DestinationController;
use Website\Http\Controllers\ExperienceController;
use Website\Http\Controllers\FaqController;
use Website\Http\Controllers\GuideController;
use Website\Http\Controllers\HomeController;
use Website\Http\Controllers\JourneyController;
use Website\Http\Controllers\NewsletterController;
use Website\Http\Controllers\PlannerController;
use Website\Http\Controllers\TravelMonthController;
use Website\Http\Controllers\TravelerStoryController;
use Website\Http\Controllers\WebsitePageController;

Route::name('website.')->middleware([EnsureWebsiteAllowed::class])->group(function () {
    // P01: Preview root / Homepage & Styleguide
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/style-guide', [HomeController::class, 'styleGuide'])->name('style-guide');
    Route::get('/styleguide', [HomeController::class, 'styleGuide'])->name('styleguide');

    // P02 & P03: Journeys / Treks
    Route::get('/treks', [JourneyController::class, 'index'])->name('treks.index');
    Route::get('/treks/{slug}/itinerary-modal', [JourneyController::class, 'itineraryModal'])->name('treks.itinerary.modal');
    Route::get('/treks/{slug}', [JourneyController::class, 'show'])->name('treks.show');

    // P04 & P05: Destinations / Regions
    Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
    Route::get('/destinations/{slug}', [DestinationController::class, 'show'])->name('destinations.show');

    // P06 & P07: Experiences
    Route::get('/experiences', [ExperienceController::class, 'index'])->name('experiences.index');
    Route::get('/experiences/{slug}', [ExperienceController::class, 'show'])->name('experiences.show');

    // P08 & P09: When to Go / Travel Months
    Route::get('/when-to-go', [TravelMonthController::class, 'index'])->name('months.index');
    Route::get('/when-to-go/{month}', [TravelMonthController::class, 'show'])->name('months.show');

    // P10: Compare Treks
    Route::get('/compare-treks', [ComparisonController::class, 'index'])->name('compare');
    Route::get('/compare-treks/state', [ComparisonController::class, 'state'])->name('compare.state');
    Route::post('/compare-treks/items', [ComparisonController::class, 'store'])->name('compare.items.store');
    Route::post('/compare-treks/items/set', [ComparisonController::class, 'set'])->name('compare.items.set');
    Route::post('/compare-treks/items/replace', [ComparisonController::class, 'replace'])->name('compare.items.replace');
    Route::delete('/compare-treks/items/{trekId}', [ComparisonController::class, 'destroy'])->name('compare.items.destroy');
    Route::delete('/compare-treks/items', [ComparisonController::class, 'clear'])->name('compare.items.clear');

    // P11 - P14: Guided Planner
    Route::get('/plan-my-trek', [PlannerController::class, 'index'])->name('planner.start');
    Route::get('/plan-my-trek/form', [PlannerController::class, 'form'])->name('planner.form');
    Route::post('/plan-my-trek/start', [PlannerController::class, 'start'])->name('planner.begin');
    Route::post('/plan-my-trek/reset', [PlannerController::class, 'reset'])->name('planner.reset');
    Route::get('/plan-my-trek/wizard', [PlannerController::class, 'wizard'])->name('planner.step');
    Route::post('/plan-my-trek/step', [PlannerController::class, 'step'])->name('planner.save_step');
    Route::post('/plan-my-trek/select', [PlannerController::class, 'select'])->name('planner.select');
    Route::get('/plan-my-trek/review', [PlannerController::class, 'review'])->name('planner.review');
    Route::get('/plan-my-trek/contact', [PlannerController::class, 'contact'])->name('planner.contact');
    Route::post('/plan-my-trek/submit', [PlannerController::class, 'submit'])->name('planner.submit');
    Route::get('/plan-my-trek/confirmation', [PlannerController::class, 'confirmation'])->name('planner.confirmation');

    // P15 & P16: Departures
    Route::get('/departures', [DepartureController::class, 'index'])->name('departures.index');
    Route::get('/departures/{departure_id}/modal', [DepartureController::class, 'modal'])->name('departures.modal');
    Route::get('/departures/{departure_id}/wizard', [DepartureController::class, 'wizard'])->name('departures.wizard');
    Route::post('/departures/inquire', [DepartureController::class, 'inquire'])->middleware('throttle:10,1')->name('departures.inquire');

    // P17: Travel Guide / Articles
    Route::get('/travel-guide', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/travel-guide/{slug}', [ArticleController::class, 'show'])->name('articles.show');

    // P18: About
    Route::get('/about', [WebsitePageController::class, 'about'])->name('about');

    // P19 & P20: Guides
    Route::get('/guides', [GuideController::class, 'index'])->name('guides.index');
    Route::get('/guides/{slug}', [GuideController::class, 'show'])->name('guides.show');

    // P21 & P22: Traveler Stories
    Route::get('/traveler-stories', [TravelerStoryController::class, 'index'])->name('stories.index');
    Route::get('/traveler-stories/{slug}', [TravelerStoryController::class, 'show'])->name('stories.show');

    // P23: Safety
    Route::get('/safety', [WebsitePageController::class, 'safety'])->name('safety');

    // P24: Responsible Travel
    Route::get('/responsible-travel', [WebsitePageController::class, 'responsible'])->name('responsible');

    // P25: Contact
    Route::get('/contact', [WebsitePageController::class, 'contact'])->name('contact');
    Route::post('/contact', [WebsitePageController::class, 'submitContact'])->name('contact.submit');

    // P26: FAQs
    Route::get('/faqs', [FaqController::class, 'index'])->name('faqs');

    // P27a–e: Policies
    Route::get('/privacy', [WebsitePageController::class, 'privacy'])->name('policy.privacy');
    Route::get('/terms', [WebsitePageController::class, 'terms'])->name('policy.terms');
    Route::get('/booking-conditions', [WebsitePageController::class, 'booking'])->name('policy.booking');
    Route::get('/cancellation', [WebsitePageController::class, 'cancellation'])->name('policy.cancellation');
    Route::get('/cookies', [WebsitePageController::class, 'cookies'])->name('policy.cookies');

    // Mutating website session state reset
    Route::post('/reset', [WebsitePageController::class, 'reset'])->name('reset');

    // Newsletter subscription (named website.newsletter.subscribe)
    Route::post('/newsletter/subscribe', [NewsletterController::class, 'store'])->name('newsletter.subscribe');

    // Fallback 404
    Route::fallback([WebsitePageController::class, 'fallback']);
});

// Also register un-prefixed newsletter.subscribe route for blade template compatibility
Route::post('/newsletter/subscribe', [NewsletterController::class, 'store'])->name('newsletter.subscribe');
