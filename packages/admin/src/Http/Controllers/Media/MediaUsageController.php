<?php

namespace Admin\Http\Controllers\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Admin\Models\GalleryUsage;

class MediaUsageController extends Controller
{
    public function updateItem(Request $request, $id)
    {
        $request->validate([
            'alt_text' => 'nullable|string|max:255',
            'caption' => 'nullable|string|max:1000',
            'description' => 'nullable|string|max:1000',
        ]);

        try {
            $usage = GalleryUsage::findOrFail($id);
            $usage->alt_text = $request->input('alt_text', $usage->alt_text);
            $usage->caption = $request->input('caption', $usage->caption);
            $usage->description = $request->input('description', $usage->description);
            $usage->save();

            return response()->json([
                'success' => true,
                'data' => $usage,
                'message' => 'Media usage updated.'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating media usage: ' . $th->getMessage()
            ], 500);
        }
    }
    public function delete(Request $request, $id)
    {

        try {
            $usage = GalleryUsage::findOrFail($id);
            $usage->delete();
    
            return response()->json([
                'success' => true,
                'message' => $usage->title . ' deleted.'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting media usage: ' . $th->getMessage()
            ], 500);
        }
    }
}
