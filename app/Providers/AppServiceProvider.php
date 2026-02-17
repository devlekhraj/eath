<?php

namespace App\Providers;

use App\Models\Destination;
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

            $view->with([
                'settings' => $settings,
                'menus' => $menus,
            ]);
        });
    }
}
