<?php

namespace Admin\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Admin\Models\Blog;
use Admin\Models\Gallery;
use App\Services\GalleryImageService;
use Illuminate\Http\Request;

class BlogImageController extends Controller
{
    public function saveImage(Request $request, $blogId)
    {
        $blog = Blog::find($blogId);
        if (! $blog) {
            return response()->json([
                'ok' => false,
                'message' => 'Blog not found.',
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
                'usage_type' => $blog->getTable(),
                'usage_id' => $blog->id,
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

    public function useImage(Request $request, $blogId)
    {
        $blog = Blog::find($blogId);
        if (! $blog) {
            return response()->json([
                'ok' => false,
                'message' => 'Destination not found.',
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
                'usage_type' => $blog->getTable(),
                'usage_id' => $blog->id,
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
