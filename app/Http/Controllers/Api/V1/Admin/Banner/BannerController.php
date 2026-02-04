<?php

namespace App\Http\Controllers\Api\V1\Admin\Banner;

use App\Http\Controllers\Controller;
use App\Http\Resources\BannerListResource;
use App\Http\Resources\BannerResource;
use App\Models\Banner;
use Illuminate\Http\Request;


class BannerController extends Controller
{
    public function index()
    {
        // Logic to retrieve travel packages
        $bannerList = Banner::withCount('images')->latest()->get();

        return response()->json([
            'success' => true,
            'data' => BannerListResource::collection($bannerList)
        ], 200);
    }

    public function storeUpdate(Request $request)
    {
        // Validation rules
        $validated = $request->validate([
            'id' => 'nullable|exists:banners,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'aspect_ratio' => 'nullable|numeric|min:0.01|max:99.99',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if ($request->has('is_active')) {
            $validated['is_active'] = $request->boolean('is_active') ? 1 : 0;
        }

        if ($request->id) {
            $banner = Banner::findOrFail($request->id);
            $banner->update($validated);
        } else {
            $banner = Banner::create($validated);
        }

        return response()->json([
            'message' => 'Banner saved successfully.',
            'data' => $banner,
        ]);
    }


    public function show(Request $request, $id)
    {
        // Logic to retrieve travel packages
        $banner = Banner::find($id);
        $banner->load('images');

        return response()->json([
            'success' => true,
            'data' => new BannerResource($banner)
        ], 200);
    }
    public function toggleActive($id, Request $request)
    {
        $banner = Banner::findOrFail($id);
        $isActive = $request->boolean('is_active');

        $banner->is_active = $isActive;
        $banner->save();

        $status = $isActive ? 'active' : 'inactive';
        $message = "{$banner->name} is now {$status}.";

        return response()->json(['success' => true, 'message' => $message]);
    }



    public function deleteBanner($id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            return response()->json(['message' => 'Bannmer not found'], 404);
        }

        $banner->delete();

        return response()->json(['message' => $banner->name . ' deleted successfully']);
    }
}
