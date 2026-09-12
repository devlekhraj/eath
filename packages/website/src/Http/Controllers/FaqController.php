<?php

namespace Website\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Website\Services\WebsiteCatalogRepository;
use Website\Support\WebsiteAssetRegistry;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $query = is_string($request->query('q')) ? mb_substr(trim($request->query('q')), 0, 120) : '';
        $requestedCategory = is_string($request->query('category')) ? trim($request->query('category')) : '';
        $allFaqs = WebsiteCatalogRepository::getFaqs();
        $categories = [];

        foreach ($allFaqs as $faq) {
            $categories[$faq['category']] = ($categories[$faq['category']] ?? 0) + 1;
        }

        $category = array_key_exists($requestedCategory, $categories) ? $requestedCategory : '';
        $faqs = array_values(array_filter($allFaqs, function (array $faq) use ($query, $category): bool {
            if ($category !== '' && $faq['category'] !== $category) {
                return false;
            }

            if ($query === '') {
                return true;
            }

            return str_contains(mb_strtolower($faq['question']), mb_strtolower($query))
                || str_contains(mb_strtolower($faq['answer']), mb_strtolower($query));
        }));

        return view('website_preview.pages.faqs', [
            'heroImage' => WebsiteAssetRegistry::resolve('faq-hero', 'Himalayan trail landscape for frequently asked questions'),
            'faqs' => $faqs,
            'categories' => $categories,
            'query' => $query,
            'category' => $category,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'FAQ'],
            ],
        ]);
    }
}
