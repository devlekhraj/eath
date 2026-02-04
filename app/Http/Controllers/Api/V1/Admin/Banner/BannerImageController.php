<?php
namespace App\Http\Controllers\Api\V1\Admin\Banner;


use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Gallery;
use App\Services\GalleryImageService;
use Illuminate\Http\Request;

class BannerImageController extends Controller
{
    public function saveImage(Request $request, $bannerId)
    {
        $banner = Banner::find($bannerId);
        if (! $banner) {
            return response()->json([
                'ok' => false,
                'message' => 'Banner not found.',
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
                'usage_type' => $banner->getTable(),
                'usage_id' => $banner->id,
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

    public function useImage(Request $request, $bannerId)
    {
        $banner = Banner::find($bannerId);
        if (! $banner) {
            return response()->json([
                'ok' => false,
                'message' => 'Banner not found.',
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
                'usage_type' => $banner->getTable(),
                'usage_id' => $banner->id,
            ],
            [
                'alt_text' => $data['alt_text'],
                'caption' => $data['caption'] ?? null,
                'description' => $data['description'] ?? null,
            ]
        );

        return response()->json([
            'ok' => true,
            'message' => 'Image associated with destination successfully.',
        ], 200);
    }
}
