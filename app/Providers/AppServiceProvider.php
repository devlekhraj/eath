<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\PackageCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Eloquent queries should NOT be here
    }

    public function boot(): void
    {
        if (Schema::hasTable('package_categories') && Schema::hasTable('travel_packages')) {

            $trekkingInNepal = PackageCategory::where('slug', 'trekking-in-nepal')
                ->with(['children' => function ($query) {
                    $query->whereHas('travelPackages');
                }, 'children.travelPackages'])
                ->first();

            $helicopterTour = PackageCategory::where('slug', 'helicopter-tour')
                ->with('travelPackages')
                ->first();
        } else {
            // Default empty values
            $trekkingInNepal = null;
            $helicopterTour = null;
        }

        if (Schema::hasTable('settings')) {
            $settings = Setting::pluck('value', 'code')->toArray();
        } else {
            $settings = [];
        }

        View::share('trekkingInNepal', $trekkingInNepal);
        View::share('helicopterTour', $helicopterTour);
        View::share('settings', $settings);
    }
}
