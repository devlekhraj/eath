<?php

namespace App\Providers;

use App\Models\PackageCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Eloquent queries should NOT be here
    }

    public function boot(): void
    {
        // Now it's safe to run Eloquent queries here
        $trekkingInNepal = PackageCategory::where('slug', 'trekking-in-nepal')
            ->with('children.travelPackages')
            ->first();

        $helicopterTour = PackageCategory::where('slug', 'helicopter-tour')
            ->with('travelPackages')
            ->first();

        View::share('trekkingInNepal', $trekkingInNepal);
        View::share('helicopterTour', $helicopterTour);
    }
}
