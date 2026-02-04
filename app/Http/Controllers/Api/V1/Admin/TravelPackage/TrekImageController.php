<?php
namespace App\Http\Controllers\Api\V1\Admin\TravelPackage;



use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Controllers\Controller;
use App\Services\GalleryImageService;

class TrekImageController extends Controller
{
    public function saveImage(Request $request, $trekId)
    {
        $trek = TravelPackage::find($trekId);
        if (! $trek) {
            return response()->json([
                'ok' => false,
                'message' => 'Trek not found.',
            ], 404);
        }

        $data = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'alt_text' => ['required', 'string', 'min:5', 'max:150'],
            'caption' => ['nullable', 'string', 'max:200'],
            'description' => ['nullable', 'string', 'max:500'],
        ]);

        $file = $request->file('image');
        $service = app(GalleryImageService::class);
        $result = $service->upload($file);

        $result['gallery']->usages()->updateOrCreate(
            [
                'usage_type' => $trek->getTable(),
                'usage_id' => $trek->id,
            ],
            [
                'alt_text' => $data['alt_text'],
                'caption' => $data['caption'] ?? null,
                'description' => $data['description'] ?? null,
            ]
        );

        return response()->json([
            'ok' => true,
            'deduped' => $result['deduped'],
            'message' => $result['deduped'] ? 'Image already uploaded.' : null,
            'data' => $result['gallery'],
            'paths' => $result['paths'],
            'warning' => $result['warning'],
        ], 200);
    }

    public function useImage(Request $request, $trekId)
    {
        $trek = TravelPackage::find($trekId);
        if (! $trek) {
            return response()->json([
                'ok' => false,
                'message' => 'Trek not found.',
            ], 404);
        }

        $data = $request->validate([
            'gallery_id' => ['required', 'exists:galleries,id'],
            'alt_text' => ['required', 'string', 'min:5', 'max:150'],
            'caption' => ['nullable', 'string', 'max:200'],
            'description' => ['nullable', 'string', 'max:500'],
        ]);

        $gallery = Gallery::find($data['gallery_id']);
        if (! $gallery) {
            return response()->json([
                'ok' => false,
                'message' => 'Gallery not found.',
            ], 404);
        }

        $gallery->usages()->updateOrCreate(
            [
                'usage_type' => $trek->getTable(),
                'usage_id' => $trek->id,
            ],
            [
                'alt_text' => $data['alt_text'],
                'caption' => $data['caption'] ?? null,
                'description' => $data['description'] ?? null,
            ]
        );

        return response()->json([
            'ok' => true,
            'message' => 'Image associated with trek successfully.',
        ], 200);
    }
}
