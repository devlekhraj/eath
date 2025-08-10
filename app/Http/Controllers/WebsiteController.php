<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\TravelPackage;

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

        return view('website.index', compact('packages', 'mainBanner', 'blogs'));
    }
    public function show($slug)
    {
        $package = TravelPackage::where('slug', $slug)->first();
        $package->load('highlights', 'itineraries', 'prices', 'inclusions', 'exclusions', 'categories', 'economyPrice', 'priceStart');

        return view('website.pages.travel_packages.index', compact('package'));
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
            $blog = Blog::where('slug', $slug)->first();

            return view('website.pages.blogs.blogDetail', compact('blog'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
            //throw $th;
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
        // $slug = 'contact-us';

        // $page = Page::firstOrCreate(
        //     ['slug' => $slug],
        //     [
        //         'title' => 'Contact Us',
        //         'content' => 'Contact Us', // You can put default content here or leave empty
        //     ]
        // );

        return view('website.pages.static_page.contact-us');
    }
}
