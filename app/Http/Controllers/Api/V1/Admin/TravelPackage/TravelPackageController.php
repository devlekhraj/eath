<?php

namespace App\Http\Controllers\Api\V1\Admin\TravelPackage;


use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\PackageCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\PackageCategoryResource;
use App\Http\Resources\TravelPackageResource;
use App\Models\TravelPackageHighlight;

class TravelPackageController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int) $request->input('per_page', 20);
        $perPage = max(1, min($perPage, 100));
        $packages = TravelPackage::with('images', 'destination')->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $packages->items(),
            'meta' => [
                'current_page' => $packages->currentPage(),
                'last_page' => $packages->lastPage(),
                'per_page' => $packages->perPage(),
                'total' => $packages->total(),
            ],
        ], 200);
    }
    public function show(Request $request, $id)
    {
        // Retrieve the travel package by ID or fail with 404
        $package = TravelPackage::with('images','destination','departures.bookings.user')->findOrFail($id);

      

        return response()->json([
            'success' => true,
            'data' => new TravelPackageResource($package),  // Use `new` here
            'message' => 'Travel package retrieved successfully.',

        ], 200);
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
            // 'terms_conditions'    => 'nullable|string',
            // 'cancellation_policy' => 'nullable|string',
            'meta_title'          => 'nullable|string|max:255',
            'meta_description'    => 'nullable|string|max:255',
            'meta_keywords'       => 'nullable|string|max:255',
            'seo_url'             => 'nullable|string|max:255',
            'seo_image'           => 'nullable|string|max:255',
            'is_published'        => 'nullable|boolean',
            'published_at'        => 'nullable|date',
            'destination_id'      => 'nullable|exists:destinations,id',
            // 'category_ids'        => 'nullable|array',
            // 'category_ids.*'      => 'integer|exists:package_categories,id',
        ];

        $validated = $request->validate($rules);
        // dd($validated);
        // unset($validated['category_ids']);

        if ($id) {
            $travelPackage = TravelPackage::findOrFail($id);
            $travelPackage->update($validated);
        } else {
            $travelPackage = TravelPackage::create($validated);
        }

        // if (isset($request['category_ids'])) {
        //     $travelPackage->categories()->sync($request['category_ids']);
        // } else if ($id) {
        //     $travelPackage->categories()->detach();
        // }
        // $travelPackage->destina

        return response()->json([
            'success' => true,
            'data'    => $travelPackage->fresh()->load('categories'),
            'message' => $id ? 'Travel package updated successfully.' : 'Travel package created successfully.',
        ]);
    }


    public function packageHighlight($id, Request $request)
    {

        $validated = $request->validate([
            "id" => "nullable|exists:travel_package_highlights,id",
            "travel_package_id" => "required|exists:travel_packages,id",
            "lookup_id" => "required|exists:lookups,id",
            "description" => "required|string",
            "sort_order" => "nullable|integer",
        ]);

        $validated["sort_order"] = $validated["sort_order"] ?? 0;


        if (!empty($validated['id'])) {

            // UPDATE existing highlight
            // $highlight = $itinerary->highlights()->findOrFail($validated['id']);
            $highlight = TravelPackageHighlight::find($validated['id']);
            $highlight->update($validated);
            $message = 'Itinerary highlight updated successfully.';
        } else {

            // unset($validated['itinerary_id']);
            // CREATE new highlight
            $highlight = TravelPackageHighlight::create($validated);
            // $highlight = $itinerary->highlights()->create($validated);
            $message = 'Itinerary highlight created successfully.';
        }

        return response()->json([
            'success' => true,
            'data' => $highlight,
            'message' => $message,
        ]);
    }



    public function packageDelete($id, Request $request)
    {
        $package = TravelPackage::findOrFail($id);
        $package->delete(); // This will perform a soft delete

        return response()->json(['message' => $package->name . ' deleted successfully.']);
    }

    public function packageHighlightDelete($id, Request $request)
    {
        $highlight = TravelPackageHighlight::findOrFail($id);
        $highlight->delete(); // This will perform a soft delete

        return response()->json(['message' => $highlight->highlight_name . ' deleted successfully.']);
    }








    public function toggleActive($id, Request $request)
    {
        $travelPackage = TravelPackage::findOrFail($id);
        $travelPackage->is_active = $request->boolean('is_active');
        $travelPackage->save();

        $statusText = $travelPackage->is_active ? 'activated' : 'deactivated';

        return response()->json([
            'success' => true,
            'message' => "{$travelPackage->name} has been {$statusText}.",
            'name' => $travelPackage->name,
            'is_active' => $travelPackage->is_active,
        ]);
    }

    public function togglePublish($id, Request $request)
    {
        $package = TravelPackage::findOrFail($id);
        $isPublished = $request->boolean('is_published');

        $package->is_published = $isPublished ? 1 : 0;

        if ($isPublished && is_null($package->published_at)) {
            $package->published_at = now();  // Set current datetime if null
        }

        $package->save();

        $message = $isPublished ? $package->name . ' is published now.' : $package->name . ' is unpublished now.';

        return response()->json(['success' => true, 'message' => $message]);
    }
}
