<?php

namespace App\Http\Controllers\Api\V1\Admin\TravelPackage;


use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Controllers\Controller;
use App\Http\Resources\TravelPackageResource;
use App\Models\PackageInclusion;
use App\Models\PackageItierary;

class PackageInclusionController extends Controller
{

    public function storeInclusion(Request $request, $id)
    {
        $validated = $request->validate([
            "id" => "nullable|exists:package_inclusions,id",
            "title" => "required|string",
            "description" => "required|string",
            "sort_order" => "nullable|integer",
            "is_excluded" => "required|boolean",
            "travel_package_id" => "required|exists:travel_packages,id",
        ]);

        $validated["sort_order"] = $validated["sort_order"] ?? 0;

        // Retrieve the travel package
        $package = TravelPackage::findOrFail($id);

        // If 'id' is present, update the existing itinerary
        if (!empty($validated['id'])) {
            $inclusion = $package->inclusions()->findOrFail($validated['id']);
            $inclusion->update($validated);
        } else {
            // Remove unnecessary travel_package_id before creation
            unset($validated['travel_package_id']);
            $inclusion = $package->inclusions()->create($validated);
        }

        return response()->json([
            'success' => true,
            'data' => $inclusion,
            'message' => 'Itinerary ' . (isset($validated['id']) ? 'updated' : 'created') . ' successfully.'
        ]);
    }

  

    public function deleteInclusion($id, Request $request)
    {
        $item = PackageInclusion::findOrFail($id);
        $item->delete(); // This will perform a soft delete

        return response()->json(['message' => $item->title.' deleted successfully.']);
    }
}
