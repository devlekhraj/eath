<?php

namespace Admin;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        Relation::morphMap([
            'destination' => \Admin\Models\Destination::class,
            'journey'     => \Admin\Models\Journey::class,
            'experience'  => \Admin\Models\Experience::class,
            'article'     => \Admin\Models\Article::class,
            'guide'       => \Admin\Models\Guide::class,
            'website_page' => \Admin\Models\WebsitePage::class,
        ]);
    }
}
