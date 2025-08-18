<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Banner;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\FeaturedPackage;
use App\Models\PackageCategory;

class WebsiteController extends Controller
{
    public function index(Request $request)
    {

        $packages = TravelPackage::all();

        $mainBanner = Banner::where('is_active', 1)->first();

        $blogs = Blog::where([
            "is_active" => 1,
            "is_published" => 1,
        ])->orderByDesc('created_at')->limit(3)->get();

        $featuredPackages = FeaturedPackage::where('is_active', 1)
            ->orderBy('sort_order', 'asc')
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->get();

            

        return view('website.index', compact('packages', 'mainBanner', 'blogs','featuredPackages'));
    }
    public function show($slug)
    {
        $package = TravelPackage::where('slug', $slug)->first();
        $package->load('highlights', 'itineraries', 'prices', 'inclusions', 'exclusions', 'categories', 'economyPrice', 'priceStart');


        $relatedPackages = TravelPackage::where('id', '!=', $package->id)
            ->where('is_active', 1)
            ->where('is_published', 1)
            ->with('categories')
            ->take(6) // Limit to 3 related packages
            ->get();

        // dd($relatedPackages);

        $parentCategories = PackageCategory::whereNull('parent_id')
            ->withCount('travelPackages')              // count for parent
            ->with(['children' => function ($q) {
                $q->withCount('travelPackages');       // count for children
            }])
            ->get();


        return view('website.pages.travel_packages.index', compact('package', 'relatedPackages', 'parentCategories'));
    }

    public function categoryShow($slug)
    {
        $category = PackageCategory::where('slug', $slug)->firstOrFail();
        $category->load('travelPackages');

        $parentCategories = PackageCategory::whereNull('parent_id')
            ->withCount('travelPackages')              // count for parent
            ->with(['children' => function ($q) {
                $q->withCount('travelPackages');       // count for children
            }])
            ->get();

        return view('website.pages.travel_packages.category', compact('category', 'parentCategories'));
    }

    public function guideProfile()
    {
        return view('website.pages.guide.index');
    }

    public function blogs()
    {
        $blogs = Blog::where([
            "is_active" => 1,
            "is_published" => 1,
        ])->orderByDesc('created_at')->get();
        return view('website.pages.blogs.index', compact('blogs'));
    }
    public function blogDetail($slug)
    {
        try {
            $blog = Blog::where('slug', $slug)->firstOrFail();

            // Fetch related blogs (same category, excluding current blog)
            $relatedBlogs = Blog::latest()
                ->take(4)
                ->get();

            // Fetch all blog categories
            $blogCategories = BlogCategory::orderBy('name', 'asc')->get();

            return view('website.pages.blogs.blogDetail', compact('blog', 'relatedBlogs', 'blogCategories'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }



    public function faq()
    {
        $faqs = Faq::orderBy('sort_order', 'asc')->get();

        return view('website.pages.static_page.faq', compact('faqs'));
    }
    public function privacyPolicy()
    {

        $slug = 'privacy-policy';

        $page = Page::firstOrCreate(
            ['slug' => $slug],
            [
                'title' => 'Privacy Policy',
                'content' => 'Privacy Policy', // You can put default content here or leave empty
            ]
        );

        return view('website.pages.static_page.privacy-policy', compact('page'));
    }
    public function termsConditions()
    {
        $slug = 'terms-conditions';

        $page = Page::firstOrCreate(
            ['slug' => $slug],
            [
                'title' => 'Terms and Conditions',
                'content' => 'terms and conditions', // You can put default content here or leave empty
            ]
        );

        return view('website.pages.static_page.terms-conditions', compact('page'));
    }
    public function aboutUs()
    {
        $slug = 'about-us';

        $page = Page::firstOrCreate(
            ['slug' => $slug],
            [
                'title' => 'About Us',
                'content' => 'about us', // You can put default content here or leave empty
            ]
        );

        return view('website.pages.static_page.about-us', compact('page'));
    }
    public function contactUs()
    {
        return view('website.pages.static_page.contact-us');
    }
}
