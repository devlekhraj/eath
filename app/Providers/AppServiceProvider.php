<?php

namespace App\Providers;

use App\Models\Destination;
use App\Models\Blog;
use App\Models\Country;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
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

                return Destination::where('is_active', 1)
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

                return Destination::where('is_active', 1)
                    ->select(['id', 'name', 'slug'])
                    ->get()
                    ->map(function ($destination) {
                        return [
                            'name' => $destination->name,
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

                return Country::select(['id', 'name', 'country_code','phone_extension'])
                    ->get()
                    ->toArray();
            });

            $safetyBlogs = Cache::remember('website.blogs.safety', 600, function () {
                if (!Schema::hasTable('blogs') || !Schema::hasTable('blog_categories')) {
                    return [];
                }

                return Blog::query()
                    ->join('blog_categories as bc', 'bc.id', '=', 'blogs.category_id')
                    ->select([
                        'blogs.title',
                        'blogs.slug',
                        'blogs.category_id',
                        'bc.slug as category_slug',
                    ])
                    ->where([
                        'blogs.is_active' => 1,
                    ])
                    ->where('bc.slug', 'safety')
                    ->orderByDesc('blogs.created_at')
                    ->get();
            });
 
     
            $view->with([
                'settings' => $settings,
                'menus' => $menus,
                'destinations' => $destinations,
                'countries' => $countries,
                'safetyBlogs' => $safetyBlogs,
            ]);
        });
    }
}
