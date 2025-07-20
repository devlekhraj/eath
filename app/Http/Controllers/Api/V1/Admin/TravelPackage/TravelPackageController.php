<?php

namespace App\Http\Controllers\Api\V1\Admin\TravelPackage;


use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\PackageCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\PackageCategoryResource;

class TravelPackageController extends Controller
{
    public function index()
    {
        // Logic to retrieve travel packages
        $packages = TravelPackage::all();

        return response()->json([
            'success' => true,
            'data' => $packages
        ], 200);
    }
    public function show(Request $request, $id)
    {
        // Logic to retrieve travel packages
        $package = TravelPackage::find($id);

        return response()->json([
            'success' => true,
            'data' => $package
        ], 200);
    }

    public function storeUpdate(Request $request)
    {
        $id = $request->input('id');

        $rules = [
            'name'               => 'required|string|unique:travel_packages,name' . ($id ? ",$id" : ''),
            'description'        => 'nullable|string',
            'additional_info'    => 'nullable|string',
            'duration_days'      => 'nullable|integer|min:0',
            'duration_nights'    => 'nullable|integer|min:0',
            'altitude'           => 'nullable|numeric|min:0',
            'price'              => 'nullable|numeric|min:0',
            'start_date'         => 'nullable|date',
            'end_date'           => 'nullable|date|after_or_equal:start_date',
            'sort_order'         => 'nullable|integer',
            'is_active'          => 'nullable|boolean',
            'is_featured'        => 'nullable|boolean',
            'terms_conditions'   => 'nullable|string',
            'cancellation_policy' => 'nullable|string',
            'meta_title'         => 'nullable|string|max:255',
            'meta_description'   => 'nullable|string|max:255',
            'meta_keywords'      => 'nullable|string|max:255',
            'seo_url'            => 'nullable|string|max:255',
            'seo_image'          => 'nullable|string|max:255',
            'is_published'       => 'nullable|boolean',
            'published_at'       => 'nullable|date',
        ];

        $validated = $request->validate($rules);

        // Update or create logic
        $travelPackage = $id
            ? TravelPackage::findOrFail($id)->update($validated)
            : TravelPackage::create($validated);

        return response()->json([
            'success' => true,
            'data' => $id ? TravelPackage::find($id) : $travelPackage,
            'message' => $id ? 'Travel package updated successfully.' : 'Travel package created successfully.',
        ]);
    }






    public function saveCategory(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id'   => 'nullable|exists:package_categories,id',
            'seq_no' => 'nullable|integer',
            'id'          => 'nullable|exists:package_categories,id',
        ]);

        $data = $request->only(['name', 'description', 'parent_id']);

        $category = PackageCategory::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return response()->json([
            'success' => true,
            'data'    => $category,
            'message' => $request->id ? 'Category updated successfully.' : 'Category created successfully.'
        ]);
    }

    public function getCategories(Request $request)
    {
        $query = PackageCategory::with(['parent', 'children']);

        if ($request->query('type') === 'parent') {
            $query->whereNull('parent_id');
        }

        $categories = $query->get();

        return response()->json([
            'success' => true,
            'data'    => PackageCategoryResource::collection($categories),
        ]);
    }

    public function toggleActive($id, Request $request)
    {
        $category = PackageCategory::findOrFail($id);
        $category->is_active = $request->boolean('is_active');
        $category->save();

        return response()->json(['success' => true, 'message' => 'Status updated']);
    }
}
