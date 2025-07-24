<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\UserAuthController;
use App\Http\Controllers\Api\V1\Auth\AdminAuthController;
use App\Http\Controllers\Api\V1\Admin\Blog\BlogController;
use App\Http\Controllers\Api\V1\Admin\Gallery\GalleryController;
use App\Http\Controllers\Api\V1\Admin\BlogCategory\BlogCategoryController;
use App\Http\Controllers\Api\V1\Admin\TravelPackage\PackageCategoryController;
use App\Http\Controllers\Api\V1\Admin\TravelPackage\PackageInclusionController;
use App\Http\Controllers\Api\V1\Admin\TravelPackage\PackageItinareryController;
use App\Http\Controllers\Api\V1\Admin\TravelPackage\TravelPackageController;

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

    // Protected admin routes with auth:api_admin
    Route::middleware('auth:api_admin')->prefix('admin')->group(function () {

        Route::post('logout', [AdminAuthController::class, 'logout']);
        Route::post('refresh', [AdminAuthController::class, 'refresh']);
        Route::get('profile', [AdminAuthController::class, 'profile']);

        Route::get('travel-packages', [TravelPackageController::class, 'index']);
        Route::post('travel-packages', [TravelPackageController::class, 'storeUpdate']);
        Route::get('travel-packages/{id}', [TravelPackageController::class, 'show']);
        Route::patch('travel-packages/{id}/toggle-active', [TravelPackageController::class, 'toggleActive']);
        Route::delete('travel-packages/{id}/delete', [TravelPackageController::class, 'packageDelete']);

        Route::post('travel-packages/{id}/itinerary', [PackageItinareryController::class, 'storeItinerary']);
        Route::delete('package-itineraries/{id}/delete', [PackageItinareryController::class, 'deleteItinerary']);

        Route::post('travel-packages/{id}/inlusions', [PackageInclusionController::class, 'storeInclusion']);
        Route::delete('package-inclusions/{id}/delete', [PackageInclusionController::class, 'deleteInclusion']);



        Route::get('package-categories', [PackageCategoryController::class, 'getCategories']);
        Route::post('package-categories', [PackageCategoryController::class, 'saveCategory']);
        Route::patch('package-categories/{id}/toggle-active', [PackageCategoryController::class, 'toggleActive']);
        Route::delete('package-categories/{id}/delete', [PackageCategoryController::class, 'delete']);


        Route::get('blogs', [BlogController::class, 'index']);
        Route::post('blogs', [BlogController::class, 'storeUpdate']);
        Route::get('blogs/{id}', [BlogController::class, 'show']);
        Route::delete('blogs/{id}/delete', [BlogController::class, 'delete']);
        Route::patch('blogs/{id}/toggle-active', [BlogController::class, 'toggleActive']);
        Route::patch('blogs/{id}/toggle-publish', [BlogController::class, 'togglePublish']);

        Route::get('blog-categories', [BlogCategoryController::class, 'getCategories']);
        Route::post('blog-categories', [BlogCategoryController::class, 'saveCategory']);
        Route::get('blog-categories/{id}', [BlogCategoryController::class, 'show']);
        Route::patch('blog-categories/{id}/toggle-active', [BlogCategoryController::class, 'toggleActive']);
        Route::delete('blog-categories/{id}/delete', [BlogCategoryController::class, 'delete']);


        Route::get('galleries', [GalleryController::class, 'index']);
        Route::post('gallery-upload', [GalleryController::class, 'uploadImage']);
        Route::get('galleries/{id}', [GalleryController::class, 'show']);
        Route::delete('galleries/{id}/delete', [GalleryController::class, 'delete']);
    });
});
