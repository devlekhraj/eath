<?php

namespace App\Http\Controllers\Api\V1\Admin\Guide;


use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GuideResource;
use App\Models\Blog;
use App\Models\GalleryUsage;
use App\Models\Guide;
use Illuminate\Support\Facades\File;


class GuideController extends Controller
{
    public function index()
    {
        // Logic to retrieve travel packages
        $guideList = Guide::latest()->get();

        return response()->json([
            'success' => true,
            'data' => GuideResource::collection($guideList)
        ], 200);
    }

    public function storeUpdate(Request $request, $id = null)
    {
        // Validation rules
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:guides,email' . ($id ? ",$id" : ''),
            'phone_no' => 'required|string|max:20',
            'language_spoken' => 'required|array',
            'language_spoken.*' => 'string|max:50', // each language must be string max 50 chars
            'bio' => 'nullable|string',
            'license_number' => 'nullable|string|max:100',
            'experience_years' => 'nullable|integer|min:0|max:100',
            'status' => 'nullable|in:active,inactive,deleted,pending,suspended',
        ]);

        if ($id) {
            $guide = Guide::findOrFail($id);
            $guide->update($validated);
        } else {
            $guide = Guide::create($validated);
        }

        return response()->json([
            'message' => 'Guide saved successfully',
            'data' => $guide,
        ]);
    }

    public function show(Request $request, $id)
    {
        // Logic to retrieve travel packages
        $package = Guide::find($id);

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

        $filename = $safeName . '.' . $extension;
        $counter = 0;
        while (File::exists($fullPath . '/' . $filename)) {
            $counter++;
            $filename = $safeName . '-' . $counter . '.' . $extension;
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
            $gallery->usages()->create([
                "usage_type" => $usageType,
                "usage_id" => $usageId
            ]);

            switch ($request->usage_type) {
                case 'blogs':
                    $blog = Blog::find($request->usage_id);
                    $blog->cover_image = $filename;
                    $blog->save();
                    break;
                default:
                    break;
            }
        }

        return response()->json([
            'success' => true,
            "filename" => $filename,
            'data' => $gallery,
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

    public function deleteGuide($id)
    {
        $guide = Guide::find($id);

        if (!$guide) {
            return response()->json(['message' => 'guide not found'], 404);
        }

        $guide->delete();

        return response()->json(['message' => $guide->name. ' deleted successfully']);
    }
}
