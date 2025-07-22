<?php

namespace App\Http\Controllers\Api\V1\Admin\TravelPackage;


use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Controllers\Controller;
use App\Http\Resources\TravelPackageResource;
use App\Models\PackageItierary;

class PackageItinareryController extends Controller
{

    public function storeItinerary(Request $request, $id)
    {
        $validated = $request->validate([
            "id" => "nullable|exists:package_itieraries,id",
            "title" => "required|string",
            "description" => "required|string",
            "sort_order" => "nullable|integer",
            "travel_package_id" => "required|exists:travel_packages,id",
        ]);

        $validated["sort_order"] = $validated["sort_order"] ?? 0;

        // Retrieve the travel package
        $package = TravelPackage::findOrFail($id);

        // If 'id' is present, update the existing itinerary
        if (!empty($validated['id'])) {
            $itinerary = $package->itineraries()->findOrFail($validated['id']);
            $itinerary->update($validated);
        } else {
            // Remove unnecessary travel_package_id before creation
            unset($validated['travel_package_id']);
            $itinerary = $package->itineraries()->create($validated);
        }

        return response()->json([
            'success' => true,
            'data' => $itinerary,
            'message' => 'Itinerary ' . (isset($validated['id']) ? 'updated' : 'created') . ' successfully.'
        ]);
    }

    public function storeUpdate(Request $request)
    {
        $id = $request->input('id');

        $rules = [
            'name'                => 'required|string|unique:travel_packages,name' . ($id ? ",$id" : ''),
            'description'         => 'nullable|string',
            'additional_info'     => 'nullable|string',
            'duration_days'       => 'nullable|integer|min:0',
            'duration_nights'     => 'nullable|integer|min:0',
            'altitude'            => 'nullable|numeric|min:0',
            'price'               => 'nullable|numeric|min:0',
            'start_date'          => 'nullable|date',
            'end_date'            => 'nullable|date|after_or_equal:start_date',
            'sort_order'          => 'nullable|integer',
            'is_active'           => 'nullable|boolean',
            'is_featured'         => 'nullable|boolean',
            'terms_conditions'    => 'nullable|string',
            'cancellation_policy' => 'nullable|string',
            'meta_title'          => 'nullable|string|max:255',
            'meta_description'    => 'nullable|string|max:255',
            'meta_keywords'       => 'nullable|string|max:255',
            'seo_url'             => 'nullable|string|max:255',
            'seo_image'           => 'nullable|string|max:255',
            'is_published'        => 'nullable|boolean',
            'published_at'        => 'nullable|date',
            'category_ids'        => 'nullable|array',
            'category_ids.*'      => 'integer|exists:package_categories,id',
        ];

        $validated = $request->validate($rules);
        unset($validated['category_ids']);

        if ($id) {
            $travelPackage = TravelPackage::findOrFail($id);
            $travelPackage->update($validated);
        } else {
            $travelPackage = TravelPackage::create($validated);
        }

        if (isset($request['category_ids'])) {
            $travelPackage->categories()->sync($request['category_ids']);
        } else if ($id) {
            $travelPackage->categories()->detach();
        }

        return response()->json([
            'success' => true,
            'data'    => $travelPackage->fresh()->load('categories'),
            'message' => $id ? 'Travel package updated successfully.' : 'Travel package created successfully.',
        ]);
    }

    public function packageDelete($id, Request $request)
    {
        $category = TravelPackage::findOrFail($id);
        $category->delete(); // This will perform a soft delete

        return response()->json(['message' => 'Category deleted successfully.']);
    }








    public function toggleActive($id, Request $request)
    {
        $category = TravelPackage::findOrFail($id);
        $category->is_active = $request->boolean('is_active');
        $category->save();

        return response()->json(['success' => true, 'message' => 'Status updated']);
    }

    public function deleteItinerary($id, Request $request)
    {
        $category = PackageItierary::findOrFail($id);
        $category->delete();


        return response()->json(['success' => true, 'message' => 'Itinerary Deleted']);
    }
}
