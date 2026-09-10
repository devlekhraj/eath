<?php

namespace Admin\Http\Controllers\Lookup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Admin\Models\Lookup;
use Illuminate\Support\Facades\Validator;

class LookupController extends Controller
{
    public function getLookups(Request $request)
    {
        $query = Lookup::query();

        if ($request->filled('code')) {
            $query->where('code', $request->input('code'));
        }

        $itineraryLookups = $query->get();

        $lookupCodes = [
            "itinerary_highlights",
            "package_highlights",
        ];

        return response()->json([
            'success' => true,
            'data' => $itineraryLookups,
            'lookupCodes' => $lookupCodes,
        ]);
    }

    public function storeUpdate(Request $request)
    {
        // Validate using $request->validate()
        $validated = $request->validate([
            'id' => 'nullable|integer|exists:lookups,id',
            'code' => 'required|string',
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        if (!empty($validated['id'])) {
            // Update existing record
            $lookup = Lookup::find($validated['id']);
            if (!$lookup) {
                return response()->json([
                    'message' => 'Itinerary lookup not found',
                ], 404);
            }

            $lookup->update([
                'code' => $validated['code'],
                'name' => $validated['name'],
                'icon' => $validated['icon'] ?? null,
            ]);

            $message = 'Lookup updated successfully';
        } else {
            // Create new record
            $lookup = Lookup::create([
                'code' => $validated['code'],
                'name' => $validated['name'],
                'icon' => $validated['icon'] ?? null,
            ]);

            $message = 'Lookup created successfully';
        }

        return response()->json([
            'message' => $message,
            'data' => $lookup,
        ]);
    }


    public function deleteItem($id, Request $request)
    {
        $itineraryLookup = Lookup::findOrFail($id);
        $itineraryLookup->delete();
        return response()->json([
            'message' => 'Itinerary lookup deleted successfully',
            'success' => true,
            'data' => $itineraryLookup,
        ]);
    }
}
