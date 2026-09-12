<?php

use Admin\Http\Controllers\Auth\AdminAuthController;
use Admin\Http\Controllers\Dashboard\DashboardController;
use Admin\Http\Controllers\Journey\JourneyController;
use Admin\Http\Controllers\Journey\JourneyItineraryDayController;
use Admin\Http\Controllers\Journey\JourneyPriceController;
use Admin\Http\Controllers\Journey\JourneyServiceController;
use Admin\Http\Controllers\Journey\JourneyDepartureController;
use Admin\Http\Controllers\Journey\JourneyHighlightController;
use Admin\Http\Controllers\Destination\DestinationController;
use Admin\Http\Controllers\Destination\DestinationImageController;
use Admin\Http\Controllers\Experience\ExperienceController;
use Admin\Http\Controllers\TravelMonth\TravelMonthController;
use Admin\Http\Controllers\Guide\GuideController;
use Admin\Http\Controllers\Article\ArticleController;
use Admin\Http\Controllers\ArticleCategory\ArticleCategoryController;
use Admin\Http\Controllers\TravelerStory\TravelerStoryController;
use Admin\Http\Controllers\Inquiry\InquiryController;
use Admin\Http\Controllers\PlannerSubmission\PlannerSubmissionController;
use Admin\Http\Controllers\Newsletter\NewsletterSubscriptionController;
use Admin\Http\Controllers\WebsitePage\WebsitePageController;
use Admin\Http\Controllers\WebsiteSection\WebsiteSectionController;
use Admin\Http\Controllers\Media\MediaAssetController;
use Admin\Http\Controllers\Faq\FaqController;
use Admin\Http\Controllers\Settings\SettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1')->middleware('api')->group(function () {

    Route::post('admin/login', [AdminAuthController::class, 'login']);

    Route::middleware('auth:sanctum')->prefix('admin')->group(function () {

        Route::post('logout', [AdminAuthController::class, 'logout']);
        Route::get('profile', [AdminAuthController::class, 'profile']);
        Route::get('dashboard', [DashboardController::class, 'index']);

        // Journeys (Canonical CRUD & lifecycle)
        Route::get('journeys', [JourneyController::class, 'index']);
        Route::post('journeys', [JourneyController::class, 'storeUpdate']);
        Route::get('journeys/{id}', [JourneyController::class, 'show']);
        Route::patch('journeys/{id}/toggle-active', [JourneyController::class, 'toggleActive']);
        Route::patch('journeys/{id}/toggle-publish', [JourneyController::class, 'togglePublish']);
        Route::delete('journeys/{id}/delete', [JourneyController::class, 'destroy']);
        Route::delete('journeys/{id}', [JourneyController::class, 'destroy']);

        // Journey Highlights
        Route::post('journeys/{id}/highlights', [JourneyHighlightController::class, 'store']);
        Route::delete('journey-highlights/{id}/delete', [JourneyHighlightController::class, 'destroy']);
        Route::delete('journey-highlights/{id}', [JourneyHighlightController::class, 'destroy']);

        // Journey Itinerary Days & Highlights
        Route::post('journeys/{id}/itinerary-days', [JourneyItineraryDayController::class, 'store']);
        Route::delete('journey-itinerary-days/{id}/delete', [JourneyItineraryDayController::class, 'destroy']);
        Route::delete('journey-itinerary-days/{id}', [JourneyItineraryDayController::class, 'destroy']);
        Route::post('journey-itinerary-days/{id}/highlights', [JourneyItineraryDayController::class, 'storeHighlight']);
        Route::delete('journey-itinerary-highlights/{id}/delete', [JourneyItineraryDayController::class, 'destroyHighlight']);
        Route::delete('journey-itinerary-highlights/{id}', [JourneyItineraryDayController::class, 'destroyHighlight']);

        // Journey Prices
        Route::post('journeys/{id}/prices', [JourneyPriceController::class, 'store']);
        Route::delete('journey-prices/{id}/delete', [JourneyPriceController::class, 'destroy']);
        Route::delete('journey-prices/{id}', [JourneyPriceController::class, 'destroy']);

        // Journey Services (Inclusions & Exclusions)
        Route::post('journeys/{id}/services', [JourneyServiceController::class, 'store']);
        Route::delete('journey-services/{id}/delete', [JourneyServiceController::class, 'destroy']);
        Route::delete('journey-services/{id}', [JourneyServiceController::class, 'destroy']);

        // Journey Departures
        Route::get('departures', [JourneyDepartureController::class, 'index']);
        Route::post('journeys/{id}/departures', [JourneyDepartureController::class, 'store']);
        Route::patch('journeys/{journeyId}/departures/{departureId}', [JourneyDepartureController::class, 'update']);
        Route::delete('journeys/{journeyId}/departures/{departureId}', [JourneyDepartureController::class, 'destroy']);
        Route::delete('journey-departures/{id}/delete', [JourneyDepartureController::class, 'destroy']);
        Route::delete('journey-departures/{id}', [JourneyDepartureController::class, 'destroy']);
        Route::patch('departures/{id}/toggle-active', [JourneyDepartureController::class, 'toggleActive']);

        // Destinations
        Route::get('destinations', [DestinationController::class, 'getDestinations']);
        Route::post('destinations', [DestinationController::class, 'saveDestination']);
        Route::get('destinations/{id}', [DestinationController::class, 'show']);
        Route::patch('destinations/{id}/update', [DestinationController::class, 'updateDestination']);
        Route::delete('destinations/{id}/delete', [DestinationController::class, 'delete']);
        Route::delete('destinations/{id}', [DestinationController::class, 'delete']);
        Route::post('destinations/{destinationId}/save-image', [DestinationImageController::class, 'saveImage']);
        Route::post('destinations/{destinationId}/use-image', [DestinationImageController::class, 'useImage']);

        // Experiences
        Route::get('experiences', [ExperienceController::class, 'index']);
        Route::post('experiences', [ExperienceController::class, 'store']);
        Route::get('experiences/{id}', [ExperienceController::class, 'show']);
        Route::patch('experiences/{id}', [ExperienceController::class, 'update']);
        Route::delete('experiences/{id}/delete', [ExperienceController::class, 'destroy']);
        Route::delete('experiences/{id}', [ExperienceController::class, 'destroy']);
        Route::patch('experiences/{id}/toggle-active', [ExperienceController::class, 'toggleActive']);

        // Travel Months
        Route::get('travel-months', [TravelMonthController::class, 'index']);
        Route::get('travel-months/{id}', [TravelMonthController::class, 'show']);
        Route::patch('travel-months/{id}', [TravelMonthController::class, 'update']);
        Route::patch('travel-months/{id}/toggle-active', [TravelMonthController::class, 'toggleActive']);

        // Guides
        Route::get('guides', [GuideController::class, 'index']);
        Route::get('guides/{id}', [GuideController::class, 'show']);
        Route::post('guides', [GuideController::class, 'storeUpdate']);
        Route::patch('guides/{id}/bio', [GuideController::class, 'updateBio']);
        Route::delete('guides/{id}/delete', [GuideController::class, 'deleteGuide']);
        Route::delete('guides/{id}', [GuideController::class, 'deleteGuide']);
        Route::post('guides/{id}/review', [GuideController::class, 'guideReview']);
        Route::post('guides/{id}/trip', [GuideController::class, 'guideTrip']);

        // Articles & Sections
        Route::get('articles', [ArticleController::class, 'index']);
        Route::post('articles', [ArticleController::class, 'store']);
        Route::get('articles/{id}', [ArticleController::class, 'show']);
        Route::patch('articles/{id}', [ArticleController::class, 'update']);
        Route::delete('articles/{id}/delete', [ArticleController::class, 'delete']);
        Route::delete('articles/{id}', [ArticleController::class, 'delete']);
        Route::patch('articles/{id}/toggle-active', [ArticleController::class, 'toggleActive']);
        Route::patch('articles/{id}/toggle-publish', [ArticleController::class, 'togglePublish']);
        Route::post('articles/{id}/sections', [ArticleController::class, 'storeSection']);
        Route::delete('articles/{id}/sections/{sectionId}', [ArticleController::class, 'deleteSection']);
        Route::post('articles/{id}/journeys', [ArticleController::class, 'syncJourneys']);

        // Article Categories
        Route::get('article-categories', [ArticleCategoryController::class, 'index']);
        Route::post('article-categories', [ArticleCategoryController::class, 'store']);
        Route::get('article-categories/{id}', [ArticleCategoryController::class, 'show']);
        Route::patch('article-categories/{id}', [ArticleCategoryController::class, 'update']);
        Route::patch('article-categories/{id}/toggle-active', [ArticleCategoryController::class, 'toggleActive']);
        Route::delete('article-categories/{id}/delete', [ArticleCategoryController::class, 'delete']);
        Route::delete('article-categories/{id}', [ArticleCategoryController::class, 'delete']);

        // Traveler Stories
        Route::get('traveler-stories', [TravelerStoryController::class, 'index']);
        Route::post('traveler-stories', [TravelerStoryController::class, 'store']);
        Route::get('traveler-stories/{id}', [TravelerStoryController::class, 'show']);
        Route::patch('traveler-stories/{id}', [TravelerStoryController::class, 'update']);
        Route::delete('traveler-stories/{id}/delete', [TravelerStoryController::class, 'destroy']);
        Route::delete('traveler-stories/{id}', [TravelerStoryController::class, 'destroy']);
        Route::patch('traveler-stories/{id}/toggle-active', [TravelerStoryController::class, 'toggleActive']);
        Route::patch('traveler-stories/{id}/toggle-publish', [TravelerStoryController::class, 'togglePublish']);

        // Inquiries
        Route::get('inquiries', [InquiryController::class, 'index']);
        Route::post('inquiries', [InquiryController::class, 'storeUpdate']);
        Route::get('inquiries/{id}', [InquiryController::class, 'show']);
        Route::patch('inquiries/{id}', [InquiryController::class, 'update']);
        Route::patch('inquiries/{id}/status', [InquiryController::class, 'updateStatus']);
        Route::delete('inquiries/{id}/delete', [InquiryController::class, 'delete']);
        Route::delete('inquiries/{id}', [InquiryController::class, 'destroy']);

        // Planner Submissions
        Route::get('planner-submissions', [PlannerSubmissionController::class, 'index']);
        Route::get('planner-submissions/{id}', [PlannerSubmissionController::class, 'show']);
        Route::patch('planner-submissions/{id}', [PlannerSubmissionController::class, 'update']);
        Route::patch('planner-submissions/{id}/status', [PlannerSubmissionController::class, 'updateStatus']);
        Route::delete('planner-submissions/{id}/delete', [PlannerSubmissionController::class, 'destroy']);
        Route::delete('planner-submissions/{id}', [PlannerSubmissionController::class, 'destroy']);

        // Newsletter Subscriptions
        Route::get('newsletter-subscriptions', [NewsletterSubscriptionController::class, 'index']);
        Route::post('newsletter-subscriptions', [NewsletterSubscriptionController::class, 'store']);
        Route::get('newsletter-subscriptions/{id}', [NewsletterSubscriptionController::class, 'show']);
        Route::patch('newsletter-subscriptions/{id}/toggle-subscription', [NewsletterSubscriptionController::class, 'toggleSubscription']);
        Route::delete('newsletter-subscriptions/{id}/delete', [NewsletterSubscriptionController::class, 'destroy']);
        Route::delete('newsletter-subscriptions/{id}', [NewsletterSubscriptionController::class, 'destroy']);

        // Website Pages & Sections
        Route::get('website-pages', [WebsitePageController::class, 'index']);
        Route::post('website-pages', [WebsitePageController::class, 'store']);
        Route::get('website-pages/{id}', [WebsitePageController::class, 'show']);
        Route::patch('website-pages/{id}', [WebsitePageController::class, 'update']);
        Route::delete('website-pages/{id}/delete', [WebsitePageController::class, 'destroy']);
        Route::delete('website-pages/{id}', [WebsitePageController::class, 'destroy']);
        Route::patch('website-pages/{id}/toggle-active', [WebsitePageController::class, 'toggleActive']);
        Route::patch('website-pages/{id}/toggle-publish', [WebsitePageController::class, 'togglePublish']);
        Route::post('website-pages/{id}/sections', [WebsitePageController::class, 'storeSection']);
        Route::delete('website-pages/{id}/sections/{sectionId}', [WebsitePageController::class, 'deleteSection']);

        // Website Sections (Global / Homepage)
        Route::get('website-sections', [WebsiteSectionController::class, 'index']);
        Route::post('website-sections', [WebsiteSectionController::class, 'store']);
        Route::get('website-sections/{id}', [WebsiteSectionController::class, 'show']);
        Route::patch('website-sections/{id}', [WebsiteSectionController::class, 'update']);
        Route::delete('website-sections/{id}/delete', [WebsiteSectionController::class, 'destroy']);
        Route::delete('website-sections/{id}', [WebsiteSectionController::class, 'destroy']);
        Route::patch('website-sections/{id}/toggle-active', [WebsiteSectionController::class, 'toggleActive']);

        // Media Assets (Canonical Media Manager)
        Route::get('media-assets', [MediaAssetController::class, 'index']);
        Route::post('media-assets', [MediaAssetController::class, 'upload']);
        Route::post('media-assets/upload', [MediaAssetController::class, 'upload']);
        Route::get('media-assets/{id}', [MediaAssetController::class, 'show']);
        Route::patch('media-assets/{id}', [MediaAssetController::class, 'update']);
        Route::delete('media-assets/{id}/delete', [MediaAssetController::class, 'destroy']);
        Route::delete('media-assets/{id}', [MediaAssetController::class, 'destroy']);
        Route::post('media-assets/{id}/attach', [MediaAssetController::class, 'attach']);
        Route::delete('media-attachments/{id}', [MediaAssetController::class, 'detach']);

        // FAQs
        Route::get('faqs', [FaqController::class, 'index']);
        Route::get('faqs/categories', [FaqController::class, 'categories']);
        Route::post('faqs', [FaqController::class, 'storeUpdate']);
        Route::get('faqs/{id}', [FaqController::class, 'show']);
        Route::patch('faqs/{id}', [FaqController::class, 'update']);
        Route::patch('faqs/{id}/toggle-active', [FaqController::class, 'toggleActive']);
        Route::delete('faqs/{id}/delete', [FaqController::class, 'delete']);
        Route::delete('faqs/{id}', [FaqController::class, 'destroy']);

        // Website Settings
        Route::get('settings', [SettingController::class, 'index']);
        Route::post('settings', [SettingController::class, 'storeUpdate']);
        Route::get('settings/{key}', [SettingController::class, 'show']);
    });
});
