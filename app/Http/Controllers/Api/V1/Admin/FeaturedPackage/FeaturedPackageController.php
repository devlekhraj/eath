<?php

namespace App\Http\Controllers\Api\V1\Admin\FeaturedPackage;


use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FeaturedPackage;

class FeaturedPackageController extends Controller
{
    public function index()
    {
        // Logic to retrieve travel packages
        $inquiry = FeaturedPackage::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $inquiry
        ], 200);
    }
    public function show(Request $request, $id)
    {
        // Retrieve the travel package by ID or fail with 404
        $page = FeaturedPackage::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $page,
            'message' => 'Page retrieved.'
        ], 200);
    }
    public function delete(Request $request, $id)
    {
        // Retrieve the travel package by ID or fail with 404
        $inquiry = FeaturedPackage::findOrFail($id);
        $inquiry->delete();

        return response()->json([
            'success' => true,
            'message' => $inquiry->title . ' deleted.'
        ], 200);
    }



    public function storeUpdate(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                'unique:featured_packages,slug,' . ($request->id ?? 'NULL'),
            ],
            'highlight' => 'required|string',
            'description' => 'required|string',
            'start_date' => $request->id
                ? 'required|date'
                : 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'group_size' => 'required|integer|min:1',
            'package_id' => 'required|exists:travel_packages,id',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string|max:255',
        ];

        $validated = $request->validate($rules);

        // Use updateOrCreate
        $package = FeaturedPackage::updateOrCreate(
            ['id' => $request->id ?? 0], // condition
            $validated                     // fields to update or create
        );

        $message = $request->id ? 'Featured Package updated successfully' : 'Featured Package created successfully';

        return response()->json([
            'message' => $message,
            'data' => $package,
        ]);
    }


    public function toggleActive($id, Request $request)
    {
        $featured = FeaturedPackage::findOrFail($id);
        $isActive = $request->boolean('is_active');

        $featured->is_active = $isActive ? 1 : 0;
        $featured->save();

        $message = $isActive ? $featured->title . ' is now active.' : $featured->title . ' is now inactive.';

        return response()->json(['success' => true, 'message' => $message]);
    }

    public function togglePublish($id, Request $request)
    {
        $featured = FeaturedPackage::findOrFail($id);
        $isPublished = $request->boolean('is_published');

        $featured->is_published = $isPublished ? 1 : 0;

        if ($isPublished && is_null($featured->published_at)) {
            $featured->published_at = now();  // Set current datetime if null
        }

        $featured->save();

        $message = $isPublished ? $featured->title . ' is published now.' : $featured->title . ' is unpublished now.';

        return response()->json(['success' => true, 'message' => $message]);
    }
}
