<?php

namespace App\Http\Controllers\Api\V1\Admin\TravelPackage;


use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Controllers\Controller;
use App\Models\PackageInclusion;
use App\Models\PackagePrice;

class PackagePriceController extends Controller
{

    public function storeUpdatePrice(Request $request, $id)
    {
        $validated = $request->validate([
            "id" => "nullable|exists:package_inclusions,id",
            "title" => "required|string",
            "is_economy" => "nullable|boolean",
            "is_default" => "nullable|boolean",
            "description" => "nullable|string",
            'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            "sort_order" => "nullable|integer",
            "travel_package_id" => "required|exists:travel_packages,id",
        ]);
        $validated["sort_order"] = $validated["sort_order"] ?? 0;

        // Retrieve the travel package
        $package = TravelPackage::findOrFail($id);

        // If 'id' is present, update the existing itinerary
        if (!empty($validated['id'])) {

            $price = PackagePrice::find($validated['id']);
            $price->update($validated);
        } else {
            // Remove unnecessary travel_package_id before creation
            unset($validated['travel_package_id']);
            $price = $package->prices()->create($validated);
        }

        return response()->json([
            'success' => true,
            'data' => $price,
            'message' => 'Price ' . (isset($validated['id']) ? 'updated' : 'created') . ' successfully.'
        ]);
    }



    public function deletePrice($id, Request $request)
    {
        $item = PackagePrice::findOrFail($id);
        $item->delete(); // This will perform a soft delete

        return response()->json(['message' => $item->title . ' deleted successfully.']);
    }
}
