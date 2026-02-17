<?php

namespace App\Http\Controllers\Api\V1\Admin\Destination;

use App\Http\Controllers\Controller;
use App\Http\Resources\DestinationListResource;
use App\Http\Resources\DestinationResource;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function saveDestination(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:destinations,name,'.$request->id,
            'id' => 'nullable|exists:destinations,id',
            'is_active' => 'nullable|boolean',
        ]);

        //         name: props.destination.name,
        //   slug: props.destination.slug,
        //   best_season: props.destination.best_season,
        //   is_active: props.destination.is_active,
        //   is_featured: props.destination.is_featured,
        //   highlights: props.destination.highlights,

        $data = $request->only(['name', 'sort_order']);

        $data['is_active'] = $request->boolean('is_active') ? 1 : 0;
        $category = Destination::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return response()->json([
            'success' => true,
            'data' => $category,
            'message' => $request->id ? 'Category updated successfully.' : 'Category created successfully.',
        ]);
    }

    public function updateDestination(Request $request, $id)
    {
        $rules = [
            'id' => 'nullable|exists:destinations,id',
            'best_season' => 'nullable|string',
            'highlights' => 'nullable|string',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
        ];
        if ($id) {
            $rules['name'] = 'nullable|string|max:255';
            $rules['slug'] = 'nullable|string|max:255';
        } else {
            $rules['name'] = 'required|string|max:255|unique:destinations,name';
            $rules['slug'] = 'required|string|max:255|unique:destinations,slug';
        }

        $request->validate($rules);

        $data = collect([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'is_active' => $request->has('is_active') ? (int) $request->boolean('is_active') : null,
            'is_featured' => $request->has('is_featured') ? (int) $request->boolean('is_featured') : null,
        ])->filter(function ($value, $key) use ($request) {
            return $request->has($key);
        })->all();
        try {
            $category = Destination::updateOrCreate(
                ['id' => $id],
                $data
            );
    
            return response()->json([
                'success' => true,
                'data' => $category,
                'message' => $request->id ? 'Category updated successfully.' : 'Category created successfully.',
            ],200);
            //code...
        } catch (\Throwable $th) {
            return response([
                "error" => $th->getMessage()
            ],422);
        }
    }

    public function getDestinations(Request $request)
    {
        $query = Destination::whereNull('deleted_at')
            ->with(['images.gallery'])
            ->withCount('images')
            ->withCount('treks');
        $destinations = $query->orderBy('sort_order', 'asc')->get();

        return response()->json([
            'success' => true,
            'data' => DestinationListResource::collection($destinations),
        ]);
    }

    public function toggleActive($id, Request $request)
    {
        $category = Destination::findOrFail($id);
        $category->is_active = $request->boolean('is_active');
        $category->save();

        $statusText = $category->is_active ? 'activated' : 'deactivated';

        return response()->json([
            'success' => true,
            'message' => "{$category->name} has been {$statusText}.",
            'name' => $category->name,
            'is_active' => $category->is_active,
        ]);
    }

    // public function delete($id, Request $request)
    // {
    //     $category = Destination::findOrFail($id);
    //     $category->delete(); // This will perform a soft delete

    //     return response()->json(['message' => 'Category deleted successfully.']);
    // }
    public function delete($id, Request $request)
    {
        $category = Destination::findOrFail($id);
        $name = $category->name;
        $category->delete(); // Performs a soft delete

        return response()->json([
            'success' => true,
            'message' => "{$name} has been deleted.",
            'name' => $name,
        ]);
    }

    public function show($id)
    {
        $destination = Destination::withCount('treks')->findOrFail($id);

        $destination->load('images.gallery.variants', 'galleries.gallery.variants');

        return response()->json([
            'success' => true,
            'data' => new DestinationResource($destination),
        ]);
    }
}
