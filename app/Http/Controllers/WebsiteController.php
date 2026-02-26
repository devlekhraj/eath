<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Destination;
use App\Models\Faq;
use App\Models\FeaturedPackage;
use App\Models\Guide;
use App\Models\PackageCategory;
use App\Models\Page;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function demo()
    {
        return view('website.landing');
    }

    public function index(Request $request)
    {

        $packages = TravelPackage::where('is_active', 1)->limit(6)->get();
        $hotPackages = TravelPackage::where('is_active', 1)->offset(6)->limit(6)->get();

        $mainBanner = Banner::where('slug', 'main-home-banner')->first();
        $galleryImage = Banner::where('slug', 'gallery-images')->first();

        $destinations = Destination::where('is_active', 1)
        ->with('treks')
        ->get();

        $blogs = Blog::where([
            'is_active' => 1,
            'is_published' => 1,
        ])->orderByDesc('created_at')->limit(3)->get();

        $featuredPackages = FeaturedPackage::where('is_active', 1)
            ->orderBy('sort_order', 'asc')
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->get();

        $packageCategories = PackageCategory::where('is_active', 1)->get();


        $menus = Destination::where('is_active', 1)
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
        return view('website.index', compact('packages', 'mainBanner', 'destinations', 'blogs', 'featuredPackages', 'packageCategories', 'galleryImage', 'hotPackages','menus'));
    }

    public function show($destinationSlug = null, $slug)
    {
        $package = TravelPackage::where('slug', $slug)->first();
        $package->load('highlights', 'itineraries', 'prices', 'inclusions', 'exclusions', 'categories', 'economyPrice', 'priceStart', 'fixedDeparture');

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

        $relatedBlogs = Blog::latest()
            ->take(4)
            ->get();

        // return view('website.pages.travel_packages.index', compact('package', 'relatedPackages', 'parentCategories', 'relatedBlogs'));
        return view('website.pages.trek.index', compact('package', 'relatedPackages', 'parentCategories', 'relatedBlogs'));
    }

    public function fixedDeparture($slug)
    {
        $departure = FeaturedPackage::where('slug', $slug)->first();
        $departure->load('package');

        $relatedPackages = FeaturedPackage::where('id', '!=', $departure->id)
            ->where('is_active', 1)
            // ->where('is_published', 1)
            // ->with('categories')
            ->take(6) // Limit to 3 related packages
            ->get();

        // dd($relatedPackages);

        // $parentCategories = PackageCategory::whereNull('parent_id')
        //     ->withCount('travelPackages')              // count for parent
        //     ->with(['children' => function ($q) {
        //         $q->withCount('travelPackages');       // count for children
        //     }])
        //     ->get();

        $relatedBlogs = Blog::latest()
            ->take(4)
            ->get();

        $package = $departure->package;
        $parentCategories = [];

        // dd($departure->banner_url);

        return view('website.pages.fixed_departure.detail', compact('package', 'departure', 'relatedPackages', 'parentCategories', 'relatedBlogs'));
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

    public function destinationShow($slug)
    {
        $destination = Destination::where('slug', $slug)->firstOrFail();
        $destination->load('treks.images.gallery');

        return view('website.pages.destination.index', compact('destination'));
    }

    public function guideProfile()
    {
        $guideList = Guide::all();

        return view('website.pages.guide.index', compact('guideList'));
    }

    public function blogs()
    {
        $blogs = Blog::where([
            'is_active' => 1,
            'is_published' => 1,
        ])->orderByDesc('created_at')->get();

        return view('website.pages.blogs.index', compact('blogs'));
    }

    public function blogDetail($slug)
    {
        try {
            $blog = Blog::where('slug', $slug)->firstOrFail();

            // Fetch related blogs (same category, excluding current blog)
            $relatedBlogsQuery = Blog::where('id', '!=', $blog->id);
            if (!empty($blog->category_id)) {
                $relatedBlogsQuery->where('category_id', $blog->category_id);
            }
            $relatedBlogs = $relatedBlogsQuery
                ->latest()
                ->take(4)
                ->get();

            // Fetch all blog categories
            $blogCategories = BlogCategory::orderBy('name', 'asc')->get();

            return view('website.pages.blogs.blogDetail', compact('blog', 'relatedBlogs', 'blogCategories'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
    public function blogDetailByCategory($category_slug, $blog_slug)
    {
        try {
            $blog = Blog::where('slug', $blog_slug)->firstOrFail();

            // Fetch related blogs (same category, excluding current blog)
            $relatedBlogsQuery = Blog::where('id', '!=', $blog->id);
            if (!empty($blog->category_id)) {
                $relatedBlogsQuery->where('category_id', $blog->category_id);
            }
            $relatedBlogs = $relatedBlogsQuery
                ->latest()
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
    public function responsibleTravels()
    {
        $slug = 'responsible-travels';

        $page = Page::firstOrCreate(
            ['slug' => $slug],
            [
                'title' => 'Responsible Travels',
                'content' => 'Responsible travels content goes here.', // You can put default content here or leave empty
            ]
        );

        return view('website.pages.static_page.responsible-travels', compact('page'));
    }

    public function getInquiryForm(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'type' => 'required|string',
            'id' => 'nullable|integer',
        ]);
        $type = $request->type;
        $id = $request->id;

        return view('website.pages.inquiry.inquiry-form', compact('type', 'id'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile_no' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:500',
            'travel_date' => 'nullable|date',
            'number_of_people' => 'nullable|integer|min:1',
            'message' => 'nullable|string|max:1000',
            'type' => 'required|in:travel_packages,featured_packages',
            'id' => 'required|integer',
        ]);

        $package = null;
        switch ($request->type) {
            case 'travel_packages':
                $package = TravelPackage::findOrFail($request->id);

                break;
            case 'featured_packages':
                $package = FeaturedPackage::findOrFail($request->id); // Assuming featured packages also use the same ID
                break;
            default:
                return response()->json(['error' => 'Invalid inquiry type'], 400);
        }

        $inquiry = $package->inquiries()->create([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'email' => $request->input('email'),
            'mobile_no' => $request->input('mobile_no'),
            'country' => $request->input('country'),
            'custom_destination' => $request->input('custom_destination'),
            'description' => $request->input('description'),
            'travel_date' => $request->input('travel_date'),
            'number_of_people' => $request->input('number_of_people'),
            'message' => $request->input('message'),
            'status' => 'new',
        ]);

        $temp = view('website.pages.inquiry.inquiry-success')->render();

        return response()->json([
            'message' => 'Inquiry submitted successfully.',
            'inquiry' => $inquiry,
            'template' => $temp,
        ], 201);
    }
}
