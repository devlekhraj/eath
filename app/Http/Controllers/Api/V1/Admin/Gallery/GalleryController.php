<?php

namespace App\Http\Controllers\Api\V1\Admin\Gallery;


use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $fullPath = public_path($relativePath);

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

        $gallery = Gallery::create([
            'filename' => $filename,
            'filepath' => $filepath,
            'mime_type' => $mimeType,
            'alt_text' => null,
        ]);

        $fullUrl = asset($filepath); // 👈 Generates full URL

        return response()->json([
            'success' => true,
            'data' => $gallery,
            'url' => $fullUrl, // 👈 Include full image URL in response
        ], 201);
    }
}
