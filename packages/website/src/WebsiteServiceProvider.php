<?php

namespace Website;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class WebsiteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::addLocation(__DIR__.'/../resources/views');

        Route::middleware('web')->group(__DIR__.'/../routes/route_website.php');
    }
}
