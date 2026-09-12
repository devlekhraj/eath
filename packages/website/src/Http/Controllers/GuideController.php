<?php

namespace Website\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Website\Services\WebsiteCatalogRepository;

class GuideController extends Controller
{
    public function index()
    {
        $guides = WebsiteCatalogRepository::getGuides();

        return view('website_preview.pages.guides.index', [
            'title' => 'Meet Our Mountain Guides',
            'metaDescription' => 'Explore sample mountain guide and trek leader profiles illustrating Himalayan route leadership and expedition pacing for EATH.',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Guides'],
            ],
            'guides' => $guides,
        ]);
    }

    public function show(string $slug)
    {
        $guide = WebsiteCatalogRepository::findGuide($slug);
        abort_unless($guide, 404);

        return view('website_preview.pages.guides.show', [
            'title' => "{$guide['name']} | Mountain Guide Profile",
            'metaDescription' => "Sample mountain guide profile for {$guide['name']} ({$guide['role']}) illustrating route leadership and expedition pacing for EATH.",
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Guides', 'url' => route('website.guides.index')],
                ['label' => $guide['name']],
            ],
            'guide' => $guide,
        ]);
    }
}
