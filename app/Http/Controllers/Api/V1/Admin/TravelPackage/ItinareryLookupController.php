<?php

namespace App\Http\Controllers\Api\V1\Admin\TravelPackage;

use Illuminate\Http\Request;
use App\Models\ItineraryLookup;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ItinareryLookupController extends Controller
{
    public function itineraryLookups()
    {
        $itineraryLookups = ItineraryLookup::all();
        return response()->json([
            'success' => true,
            'data' => $itineraryLookups,
        ]); 
    }

    public function storeUpdate(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'id' => 'nullable|integer|exists:itinerary_lookups,id',
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            // Return validation errors with 422 HTTP status
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        if ($request->filled('id')) {
            // Update existing record
            $itineraryLookup = ItineraryLookup::find($request->input('id'));
            if (!$itineraryLookup) {
                return response()->json([
                    'message' => 'Itinerary lookup not found',
                ], 404);
            }
            $itineraryLookup->update([
                'name' => $request->input('name'),
                'icon' => $request->input('icon'),
            ]);
            $message = 'Itinerary lookup updated successfully';
        } else {
            // Create new record
            $itineraryLookup = ItineraryLookup::create([
                'name' => $request->input('name'),
                'icon' => $request->input('icon'),
            ]);
            $message = 'Itinerary lookup created successfully';
        }

        return response()->json([
            'message' => $message,
            'data' => $itineraryLookup,
        ]);
    }

    public function deleteItem($id, Request $request)
    {
        $itineraryLookup = ItineraryLookup::findOrFail($id);
        $itineraryLookup->delete();
        return response()->json([
            'message' => 'Itinerary lookup deleted successfully',
            'success'=>true,
            'data' => $itineraryLookup,
        ]);
    }
}
