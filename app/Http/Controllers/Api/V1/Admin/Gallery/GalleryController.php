<?php

namespace App\Http\Controllers\Api\V1\Admin\Gallery;


use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\FeaturedPackage;
use App\Models\GalleryUsage;
use App\Models\Guide;
use Illuminate\Support\Facades\File;


class GalleryController extends Controller
{
    public function index()
    {
        // Logic to retrieve travel packages
        $packages = Gallery::all();

        return response()->json([
            'success' => true,
            'data' => $packages
        ], 200);
    }
    public function show(Request $request, $id)
    {
        // Logic to retrieve travel packages
        $package = Gallery::find($id);

        return response()->json([
            'success' => true,
            'data' => $package
        ], 200);
    }




    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $image = $request->file('image');

        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $safeName = Str::slug($originalName, '-');
        $extension = $image->getClientOriginalExtension();

        $year = now()->format('Y');
        $month = now()->format('m');
        $relativePath = "gallery/{$year}/{$month}";
        $fullPath = storage_path($relativePath);

        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0755, true);
        }

        $timeString = date('His'); // e.g., 143205 for 2:32:05 PM
        $filename = $safeName . '-' . $timeString . '.' . $extension;
        $counter = 0;

        while (File::exists($fullPath . '/' . $filename)) {
            $counter++;
            $filename = $safeName . '-' . $timeString . '-' . $counter . '.' . $extension;
        }


        $mimeType = $image->getMimeType();
        $image->move($fullPath, $filename);

        $filepath = "{$relativePath}/{$filename}";
        $fileSize = File::size($fullPath . '/' . $filename); // in bytes
        $gallery = Gallery::create([
            'filename' => $filename,
            'filepath' => $filepath,
            'mime_type' => $mimeType,
            'file_size' => $fileSize,
            'alt_text' => null,
            'image_url' => route('image.view', ['filename' => $filename]),
        ]);


        if ($request->has('usage_type') && $request->has('usage_id')) {
            $usageType = $request->input('usage_type');
            $usageId = $request->input('usage_id');
            $galleryUsage = $gallery->usages()->create([
                "usage_type" => $usageType,
                "usage_id" => $usageId
            ]);

            switch ($request->usage_type) {
                case 'blogs':
                    $blog = Blog::find($request->usage_id);
                    $blog->cover_image = $filename;
                    $blog->save();
                    break;
                case 'guides':
                    $blog = Guide::find($request->usage_id);
                    $blog->photo = $filename;
                    $blog->save();
                    break;
                case 'featured_packages':
                    $data = FeaturedPackage::find($request->usage_id);
                    $data->banner = $filename;
                    $data->save();
                    break;
                default:
                    break;
            }
        }

        return response()->json([
            'success' => true,
            "filename" => $filename,
            'data' => $gallery,
            "gallery_usage" => isset($galleryUsage) ? $galleryUsage : null,
            'url' => route('image.view', ['filename' => $filename]),
        ], 201);
    }

    public function getImage($filename)
    {
        $file = Gallery::where('filename', $filename)->first();
        if (!$file) {
            return response()->file(public_path('images/logo.png'));
        }

        $filePath = storage_path($file->filepath);

        if (!file_exists($filePath)) {
            return response()->file(public_path('images/logo.png'));
        }

        return response()->file($filePath, [
            'Content-Type' => mime_content_type($filePath),
        ]);
    }

    public function delete($imageId)
    {
        $image = GalleryUsage::find($imageId);

        if (!$image) {
            return response()->json(['message' => 'Image not found'], 404);
        }

        $image->delete();

        return response()->json(['message' => 'Image deleted successfully']);
    }
}
