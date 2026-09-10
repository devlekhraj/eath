<?php

namespace App\Providers;

use Admin\Models\Destination;
use Admin\Models\Blog;
use Admin\Models\Country;
use Admin\Models\TravelPackage;
use Admin\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
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
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
            if (config('app.url')) {
                URL::forceRootUrl(config('app.url'));
            }
        }

        View::composer('website.*', function ($view) {
            $settings = Cache::remember('website.settings', 600, function () {
                if (!Schema::hasTable('settings')) {
                    return [];
                }

                return Setting::pluck('value', 'code')->toArray();
            });

            $menus = Cache::remember('website.menus', 600, function () {
                if (!Schema::hasTable('destinations')) {
                    return [];
                }

                return Destination::query()->where('is_active', 1)
                    ->select(['id', 'name', 'slug'])
                    ->with(['treks:id,destination_id,name,slug'])
                    ->get()
                    ->map(function ($item) {
                        return [
                            'name' => $item->name,
                            'slug' => $item->slug,
                            'treks' => $item->treks->map(function ($trek) {
                                return [
                                    'name' => $trek->name,
                                    'slug' => $trek->slug,
                                ];
                            })->values(),
                        ];
                    })->toArray();
            });



            // Cache::delete('website.destinations.v2');
            $destinations = Cache::remember('website.destinations.v2', 600, function () {
                if (!Schema::hasTable('destinations')) {
                    return [];
                }

                return Destination::query()->where('is_active', 1)
                    ->select(['id', 'name', 'slug'])
                    ->get()
                    ->map(function ($destination) {
                        return [
                            'name' => $destination->name,
                            'slug' => $destination->slug,
                            'image' => $destination->image,
                            'id' => $destination->id,
                            'url' => $destination->url,
                        ];
                    })
                    ->toArray();
            });
            // dd($destinations);
            $countries = Cache::remember('website.countries', 600, function () {
                if (!Schema::hasTable('countries')) {
                    return [];
                }

                return Country::select(['id', 'name', 'country_code', 'phone_extension'])
                    ->get()
                    ->toArray();
            });

            $travelPackages = Cache::remember('website.travel_packages.v1', 600, function () {
                if (!Schema::hasTable('travel_packages')) {
                    return [];
                }

                return TravelPackage::query()->where('is_active', 1)
                    ->where('is_published', 1)
                    ->select(['id', 'name', 'slug', 'destination_id'])
                    ->orderBy('name')
                    ->get()
                    ->map(function ($package) {
                        return [
                            'id' => $package->id,
                            'name' => $package->name,
                            'slug' => $package->slug,
                            'destination_id' => $package->destination_id,
                        ];
                    })
                    ->toArray();
            });

            $travelPackagesByDestination = Cache::remember('website.travel_packages.by_destination.v1', 600, function () {
                if (!Schema::hasTable('travel_packages')) {
                    return [];
                }

                return TravelPackage::query()->where('is_active', 1)
                    ->where('is_published', 1)
                    ->select(['id', 'name', 'slug', 'destination_id'])
                    ->orderBy('name')
                    ->get()
                    ->groupBy('destination_id')
                    ->map(function ($group) {
                        return $group->map(function ($package) {
                            return [
                                'id' => $package->id,
                                'name' => $package->name,
                                'slug' => $package->slug,
                                'destination_id' => $package->destination_id,
                            ];
                        })->values();
                    })
                    ->tap(function ($collection) use (&$travelPackagesByDestination) {
                        $collection['__all'] = collect($travelPackages ?? [])->values();
                    })
                    ->toArray();
            });

            $safetyBlogs = Cache::remember('website.blogs.safety', 600, function () {
                if (!Schema::hasTable('blogs') || !Schema::hasTable('blog_categories')) {
                    return [];
                }

                return Blog::query()
                    ->where('is_active', 1)
                    ->whereRelation('category', 'slug', 'safety')
                    ->with('category:id,slug')
                    ->select(['id', 'title', 'slug', 'category_id', 'created_at'])
                    ->orderByDesc('created_at')
                    ->get();
            });


            $view->with([
                'settings' => $settings,
                'menus' => $menus,
                'destinations' => $destinations,
                'countries' => $countries,
                'safetyBlogs' => $safetyBlogs,
                'travelPackages' => $travelPackages,
                'travelPackagesByDestination' => $travelPackagesByDestination,
            ]);
        });
    }
}
