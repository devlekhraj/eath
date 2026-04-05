<?php

use App\Http\Controllers\Api\V1\Admin\Banner\BannerController;
use App\Http\Controllers\Api\V1\Admin\Banner\BannerImageController;
use App\Http\Controllers\Api\V1\Admin\Blog\BlogController;
use App\Http\Controllers\Api\V1\Admin\Blog\BlogImageController;
use App\Http\Controllers\Api\V1\Admin\BlogCategory\BlogCategoryController;
use App\Http\Controllers\Api\V1\Admin\Customers\CustomerController;
use App\Http\Controllers\Api\V1\Admin\Destination\DestinationController;
use App\Http\Controllers\Api\V1\Admin\Destination\DestinationImageController;
use App\Http\Controllers\Api\V1\Admin\FAQ\FaqController;
use App\Http\Controllers\Api\V1\Admin\FeaturedPackage\FeaturedPackageController;
use App\Http\Controllers\Api\V1\Admin\Gallery\GalleryController;
use App\Http\Controllers\Api\V1\Admin\Guide\GuideController;
use App\Http\Controllers\Api\V1\Admin\Inquiry\InquiryController;
use App\Http\Controllers\Api\V1\Admin\Lookup\LookupController;
use App\Http\Controllers\Api\V1\Admin\Media\MediaUsageController;
use App\Http\Controllers\Api\V1\Admin\Page\PageController;
use App\Http\Controllers\Api\V1\Admin\Settings\SettingController;
use App\Http\Controllers\Api\V1\Admin\TravelPackage\PackageCategoryController;
use App\Http\Controllers\Api\V1\Admin\TravelPackage\PackageInclusionController;
use App\Http\Controllers\Api\V1\Admin\TravelPackage\PackageItinareryController;
use App\Http\Controllers\Api\V1\Admin\TravelPackage\PackagePriceController;
use App\Http\Controllers\Api\V1\Admin\TravelPackage\TravelPackageController;
use App\Http\Controllers\Api\V1\Admin\TravelPackage\TrekDepartureController;
use App\Http\Controllers\Api\V1\Admin\TravelPackage\TrekImageController;
use App\Http\Controllers\Api\V1\Admin\Booking\BookingController;
use App\Http\Controllers\Api\V1\Auth\AdminAuthController;
use App\Http\Controllers\Api\V1\Auth\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('api')->group(function () {

    // User login route (no auth middleware, but api middleware applied from above)
    Route::post('user/login', [UserAuthController::class, 'login']);

    // Protected user routes with auth:api
    Route::middleware('auth:api')->prefix('user')->group(function () {
        Route::post('logout', [UserAuthController::class, 'logout']);
        Route::post('refresh', [UserAuthController::class, 'refresh']);
        Route::post('me', [UserAuthController::class, 'me']);
    });

    // Admin login route (no auth middleware)
    Route::post('admin/login', [AdminAuthController::class, 'login']);
    Route::post('admin/refresh', [AdminAuthController::class, 'refresh']);

    // Protected admin routes with auth:api_admin
    Route::middleware('auth:api_admin')->prefix('admin')->group(function () {

        Route::post('logout', [AdminAuthController::class, 'logout']);
        Route::get('profile', [AdminAuthController::class, 'profile']);

        Route::get('travel-packages', [TravelPackageController::class, 'index']);
        Route::post('travel-packages', [TravelPackageController::class, 'storeUpdate']);
        Route::get('travel-packages/{id}', [TravelPackageController::class, 'show']);
        Route::post('travel-packages/{id}/highlight', [TravelPackageController::class, 'packageHighlight']);

        Route::patch('travel-packages/{id}/toggle-active', [TravelPackageController::class, 'toggleActive']);
        Route::patch('travel-packages/{id}/toggle-publish', [TravelPackageController::class, 'togglePublish']);
        Route::delete('travel-packages/{id}/delete', [TravelPackageController::class, 'packageDelete']);

        Route::delete('travel-package-highlight/{id}/delete', [TravelPackageController::class, 'packageHighlightDelete']);

        Route::post('travel-packages/{id}/itinerary', [PackageItinareryController::class, 'storeItinerary']);
        Route::delete('package-itineraries/{id}/delete', [PackageItinareryController::class, 'deleteItinerary']);
        Route::post('package-itineraries/{id}/highlight', [PackageItinareryController::class, 'itineraryHighight']);

        Route::delete('itinerary-highlights/{id}/delete', [PackageItinareryController::class, 'itineraryHighightDelete']);

        Route::get('lookups', [LookupController::class, 'getLookups']);
        Route::post('lookups', [LookupController::class, 'storeUpdate']);
        Route::delete('lookups/{id}/delete', [LookupController::class, 'deleteItem']);

        Route::post('travel-packages/{id}/inlusions', [PackageInclusionController::class, 'storeInclusion']);
        Route::delete('package-inclusions/{id}/delete', [PackageInclusionController::class, 'deleteInclusion']);

        Route::post('travel-packages/{id}/prices', [PackagePriceController::class, 'storeUpdatePrice']);
        Route::delete('package-prices/{id}/delete', [PackagePriceController::class, 'deletePrice']);

        Route::post('treks/{trekId}/save-image', [TrekImageController::class, 'saveImage']);
        
        Route::post('treks/{trekId}/use-image', [TrekImageController::class, 'useImage']);
        Route::post('treks/{id}/fixed-departures', [TrekDepartureController::class, 'store']);
        Route::patch('treks/{trekId}/fixed-departures/{departureId}', [TrekDepartureController::class, 'update']);
        Route::delete('treks/{trekId}/fixed-departures/{departureId}', [TrekDepartureController::class, 'destroy']);



        Route::get('package-categories', [PackageCategoryController::class, 'getCategories']);
        Route::post('package-categories', [PackageCategoryController::class, 'saveCategory']);
        Route::patch('package-categories/{id}/toggle-active', [PackageCategoryController::class, 'toggleActive']);
        Route::delete('package-categories/{id}/delete', [PackageCategoryController::class, 'delete']);

        // destinations
        Route::get('destinations', [DestinationController::class, 'getDestinations']);
        Route::post('destinations', [DestinationController::class, 'saveDestination']);
        Route::get('destinations/{id}', [DestinationController::class, 'show']);
        Route::patch('destinations/{id}/update', [DestinationController::class, 'updateDestination']);

        Route::post('destinations/{destinationId}/save-image', [DestinationImageController::class, 'saveImage']);
        Route::post('destinations/{destinationId}/use-image', [DestinationImageController::class, 'useImage']);
        Route::delete('destinations/{id}/delete', [DestinationController::class, 'delete']);

        Route::get('blogs', [BlogController::class, 'index']);
        Route::post('blogs', [BlogController::class, 'store']);
        Route::get('blogs/{id}', [BlogController::class, 'show']);
        Route::patch('blogs/{id}/update', [BlogController::class, 'update']);
        Route::delete('blogs/{id}/delete', [BlogController::class, 'delete']);
        Route::patch('blogs/{id}/toggle-active', [BlogController::class, 'toggleActive']);
        Route::patch('blogs/{id}/toggle-publish', [BlogController::class, 'togglePublish']);

        Route::post('blogs/{blogId}/save-image', [BlogImageController::class, 'saveImage']);
        Route::post('blogs/{blogId}/use-image', [BlogImageController::class, 'useImage']);

        Route::get('blog-categories', [BlogCategoryController::class, 'getCategories']);
        Route::post('blog-categories', [BlogCategoryController::class, 'saveCategory']);
        Route::get('blog-categories/{id}', [BlogCategoryController::class, 'show']);
        Route::patch('blog-categories/{id}/toggle-active', [BlogCategoryController::class, 'toggleActive']);
        Route::delete('blog-categories/{id}/delete', [BlogCategoryController::class, 'delete']);


        Route::get('galleries', [GalleryController::class, 'index']);
        Route::post('gallery-upload', [GalleryController::class, 'uploadImage']);

        Route::get('galleries/{id}', [GalleryController::class, 'show']);
        Route::delete('galleries/{id}/delete', [GalleryController::class, 'delete']);

        Route::get('guides', [GuideController::class, 'index']);
        Route::get('guides/{id}', [GuideController::class, 'show']);
        Route::delete('guides/{id}/delete', [GuideController::class, 'deleteGuide']);
        Route::post('guides', [GuideController::class, 'storeUpdate']);
        Route::patch('guides/{id}/bio', [GuideController::class, 'updateBio']);

        Route::post('guides/{id}/review', [GuideController::class, 'guideReview']);
        Route::post('guides/{id}/trip', [GuideController::class, 'guideTrip']);

        //  banners

        Route::get('banners', [BannerController::class, 'index']);
        Route::get('banners/{id}', [BannerController::class, 'show']);
        Route::post('banners/{bannerId}/save-image', [BannerImageController::class, 'saveImage']);
        Route::post('banners/{bannerId}/use-image', [BannerImageController::class, 'useImage']);

        Route::post('banners', [BannerController::class, 'storeUpdate']);
        Route::patch('banners/{id}/toggle-active', [BannerController::class, 'toggleActive']);
        Route::delete('banners/{id}/delete', [BannerController::class, 'deleteBanner']);

        Route::get('settings', [SettingController::class, 'index']);
        Route::post('settings', [SettingController::class, 'storeUpdate']);
        Route::get('settings/{id}', [SettingController::class, 'show']);
        Route::delete('settings/{id}/delete', [SettingController::class, 'deleteSetting']);

        Route::get('pages', [PageController::class, 'index']);
        Route::get('pages/{id}', [PageController::class, 'show']);
        Route::post('pages', [PageController::class, 'storeUpdate']);
        Route::patch('pages/{id}/toggle-active', [PageController::class, 'toggleActive']);
        Route::delete('pages/{id}/delete', [PageController::class, 'pageDelete']);

        Route::get('faqs', [FaqController::class, 'index']);
        Route::post('faqs', [FaqController::class, 'storeUpdate']);
        Route::get('faqs/{id}', [FaqController::class, 'show']);
        Route::delete('faqs/{id}/delete', [FaqController::class, 'delete']);

        Route::get('inquiries', [InquiryController::class, 'index']);
        Route::post('inquiries', [InquiryController::class, 'storeUpdate']);
        Route::get('inquiries/{id}', [InquiryController::class, 'show']);
        Route::delete('inquiries/{id}/delete', [InquiryController::class, 'delete']);

        Route::get('customers', [CustomerController::class, 'index']);
        Route::post('customers', [CustomerController::class, 'storeUpdate']);
        Route::get('customers/{id}', [CustomerController::class, 'show']);
        Route::delete('customers/{id}/delete', [CustomerController::class, 'delete']);

        Route::get('featured-packages', [FeaturedPackageController::class, 'index']);
        Route::post('featured-packages', [FeaturedPackageController::class, 'storeUpdate']);
        Route::get('featured-packages/{id}', [FeaturedPackageController::class, 'show']);
        Route::patch('featured-packages/{id}/toggle-active', [FeaturedPackageController::class, 'toggleActive']);
        Route::delete('featured-packages/{id}/delete', [FeaturedPackageController::class, 'delete']);

        Route::patch('media-usages/{id}/update', [MediaUsageController::class, 'updateItem']);
        Route::delete('media-usages/{id}/delete', [MediaUsageController::class, 'delete']);

        Route::get('bookings', [BookingController::class, 'index']);
        Route::post('bookings', [BookingController::class, 'storeUpdate']);
        Route::get('bookings/{id}', [BookingController::class, 'show']);
        Route::delete('bookings/{id}/delete', [BookingController::class, 'delete']);
    });
});
