<?php

namespace Website\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Website\Services\WebsiteCatalogRepository;

class TravelerStoryController extends Controller
{
    public function index(Request $request)
    {
        $selectedRegion = $request->query('region');
        $selectedTrek = $request->query('trek');

        $allRegions = WebsiteCatalogRepository::getRegions();
        $allTreks = WebsiteCatalogRepository::getTreks();

        $filters = [];
        if (!empty($selectedRegion)) {
            $filters['region'] = $selectedRegion;
        }
        if (!empty($selectedTrek)) {
            $filters['trek'] = $selectedTrek;
        }

        $stories = WebsiteCatalogRepository::getStories($filters);
        $isFiltered = !empty($filters);

        if ($isFiltered) {
            $featuredStory = null;
            $supportingStories = $stories;
        } else {
            $featuredStory = $stories[0] ?? null;
            $supportingStories = array_slice($stories, 1);
        }

        return view('website_preview.pages.stories.index', [
            'title' => 'Traveler Stories & Field Perspectives',
            'metaDescription' => 'Explore sample traveler narratives and photo-led hiking stories illustrating route perspectives, daily pacing, and trail planning for EATH.',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Traveler Stories'],
            ],
            'allRegions' => $allRegions,
            'allTreks' => $allTreks,
            'selectedRegion' => $selectedRegion,
            'selectedTrek' => $selectedTrek,
            'isFiltered' => $isFiltered,
            'featuredStory' => $featuredStory,
            'supportingStories' => $supportingStories,
            'stories' => $stories,
        ]);
    }

    public function show(string $slug)
    {
        $story = WebsiteCatalogRepository::findStory($slug);
        abort_unless($story, 404);

        $trek = $story['trek'] ?? WebsiteCatalogRepository::findTrek($story['trek_id']);
        $allStories = WebsiteCatalogRepository::getStories();
        $otherStories = array_values(array_filter($allStories, fn ($s) => $s['slug'] !== $story['slug']));

        return view('website_preview.pages.stories.show', [
            'title' => "{$story['title']} | Traveler Story",
            'metaDescription' => "Sample traveler narrative for {$story['title']} ({$story['traveler_name']}) illustrating route perspectives, trail pacing, and Himalayan planning for EATH.",
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Traveler Stories', 'url' => route('website.stories.index')],
                ['label' => $story['title']],
            ],
            'story' => $story,
            'trek' => $trek,
            'otherStories' => $otherStories,
        ]);
    }
}
