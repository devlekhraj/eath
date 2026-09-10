<?php

namespace Admin\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use Admin\Models\Gallery;
use Admin\Models\GalleryUsage;
use App\Services\GalleryImageService;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        // Logic to retrieve travel packages
        $packages = Gallery::all();

        return response()->json([
            'success' => true,
            'data' => $packages,
        ], 200);
    }

    public function show(Request $request, $id)
    {
        // Logic to retrieve travel packages
        $package = Gallery::find($id);

        return response()->json([
            'success' => true,
            'data' => $package,
        ], 200);
    }

     public function uploadImage(Request $request)
    {
        $data = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:10240'],
            'alt_text' => ['required', 'string', 'min:5', 'max:150'],
            'caption' => ['nullable', 'string', 'max:200'],
            'description' => ['nullable', 'string', 'max:500'],
        ]);

        $file = $request->file('image');
        $service = app(GalleryImageService::class);
        $result = $service->upload($file);

        return response()->json([
            'ok' => true,
            'deduped' => $result['deduped'],
            'message' => $result['deduped'] ? 'Image already uploaded.' : null,
            'data' => $result['gallery'],
            'paths' => $result['paths'],
            'warning' => $result['warning'],
        ], 200);
    }

    public function getImage($filename)
    {
        $file = Gallery::where('filename', $filename)->first();
        if (! $file) {
            return response()->file(public_path('images/logo.png'));
        }

        $filePath = storage_path($file->filepath);

        if (! file_exists($filePath)) {
            return response()->file(public_path('images/logo.png'));
        }

        return response()->file($filePath, [
            'Content-Type' => mime_content_type($filePath),
        ]);
    }

    public function delete($imageId)
    {
        $image = GalleryUsage::find($imageId);

        if (! $image) {
            return response()->json(['message' => 'Image not found'], 404);
        }

        $image->delete();

        return response()->json(['message' => 'Image deleted successfully']);
    }

    private function formatBytes(int $bytes): string
    {
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2).' MB';
        }

        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 2).' KB';
        }

        return $bytes.' B';
    }
}
