<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\TravelPackage;

class WebsiteController extends Controller
{
    public function index(Request $request)
    {

        $packages = TravelPackage::all();

        $mainBanner = Banner::where('is_active', 1)->first();


        // $trekkingInNepal = PackageCategory::where('slug', 'trekking-in-nepal')->with('children.travelPackages')->first();


        // $helicopterTour = PackageCategory::where('slug', 'helicopter-tour')->with('travelPackages')->first();

        return view('website.index', compact('packages', 'mainBanner'));
    }
    public function show($slug)
    {
        $package = TravelPackage::where('slug', $slug)->first();
        $package->load('highlights', 'itineraries', 'prices', 'inclusions', 'exclusions', 'categories');

        return view('website.pages.travel_packages.index', compact('package'));
    }
    public function guideProfile()
    {
        return view('website.pages.guide.index');
    }
    public function faq()
    {
        return view('website.pages.faq.index');
    }
    public function blogs()
    {
        $blogs = Blog::where([
            "is_active"=>1,
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
}
