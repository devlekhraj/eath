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

    public function updateDestination(Request $request)
    {
        $id = $request->id;
        $rules = [
            'name' => 'required|string|max:255|unique:destinations,name,'.($id ?? 'NULL'),
            'id' => 'nullable|exists:destinations,id',
            'best_season' => 'nullable|string',
            'highlights' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
        ];
        if ($id) {
            $rules['slug'] = 'nullable|string|max:255';
        } else {
            $rules['slug'] = 'required|string|max:255|unique:destinations,slug';
        }

        $request->validate($rules);

        $data = $request->only([
            'name',
            'slug',
            'best_season',
            // 'highlights',
            'is_active',
            'is_featured',
        ]);

        // if ($request->has('highlights')) {
        //     $highlights = $request->input('highlights');
        //     if (is_string($highlights)) {
        //         $lines = array_values(array_filter(array_map('trim', preg_split("/\r\n|\r|\n/", $highlights))));
        //         $data['highlights'] = json_encode($lines);
        //     }
        // }

        $data['is_active'] = $request->boolean('is_active') ? 1 : 0;
        $data['is_featured'] = $request->boolean('is_featured') ? 1 : 0;
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
            ->with(['images.gallery']);
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
        $destination = Destination::findOrFail($id);

        $destination->load('images.gallery.variants', 'galleries.gallery.variants');

        return response()->json([
            'success' => true,
            'data' => new DestinationResource($destination),
        ]);
    }
}
