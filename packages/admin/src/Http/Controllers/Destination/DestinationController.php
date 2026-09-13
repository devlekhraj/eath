<?php

namespace Admin\Http\Controllers\Destination;

use App\Http\Controllers\Controller;
use App\Http\Resources\DestinationListResource;
use App\Http\Resources\DestinationResource;
use Admin\Models\Destination;
use Admin\Models\MediaAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        return $this->getDestinations($request);
    }

    public function getDestinations(Request $request)
    {
        $query = Destination::query()
            ->with([
                'heroAttachment.mediaAsset',
                'cardAttachment.mediaAsset',
            ])
            ->withCount('journeys')
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc');

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('region_label', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        if ($request->boolean('active_only')) {
            $query->where('is_active', true);
        }

        $destinations = $query->get();

        return response()->json([
            'success' => true,
            'data' => DestinationListResource::collection($destinations),
        ]);
    }

    public function show($id)
    {
        $destination = Destination::query()
            ->withCount('journeys')
            ->with([
                'heroAttachment.mediaAsset',
                'cardAttachment.mediaAsset',
                'galleryAttachments.mediaAsset',
                'journeys' => function ($q) {
                    $q->select(['id', 'destination_id', 'name', 'slug', 'duration_days', 'price_minor', 'is_active'])
                      ->orderBy('sort_order')
                      ->orderBy('name');
                },
            ])
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new DestinationResource($destination),
        ]);
    }

    public function saveDestination(Request $request)
    {
        $id = $request->input('id');

        $validated = $request->validate([
            'id' => ['nullable', 'integer', 'exists:destinations,id'],
            'name' => ['required', 'string', 'max:255', Rule::unique('destinations', 'name')->ignore($id)],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('destinations', 'slug')->ignore($id)],
            'summary' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'region_label' => ['nullable', 'string', 'max:255'],
            'gateway' => ['nullable', 'string'],
            'trailheads' => ['nullable', 'string'],
            'permits' => ['nullable', 'string'],
            'pacing_note' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_featured' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:300'],
            'hero_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
            'card_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
        ]);

        $heroImageId = $validated['hero_image_id'] ?? null;
        $cardImageId = $validated['card_image_id'] ?? null;
        unset($validated['hero_image_id'], $validated['card_image_id']);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->has('is_active') ? $request->boolean('is_active') : true;

        $destination = Destination::updateOrCreate(
            ['id' => $id],
            $validated
        );

        if ($request->has('hero_image_id')) {
            if ($heroImageId) {
                $destination->syncMediaAttachment((int) $heroImageId, MediaAttachment::COLLECTION_HERO);
            } else {
                $destination->detachMediaCollection(MediaAttachment::COLLECTION_HERO);
            }
        }

        if ($request->has('card_image_id')) {
            if ($cardImageId) {
                $destination->syncMediaAttachment((int) $cardImageId, MediaAttachment::COLLECTION_CARD);
            } else {
                $destination->detachMediaCollection(MediaAttachment::COLLECTION_CARD);
            }
        }

        return response()->json([
            'success' => true,
            'data' => new DestinationResource($destination->fresh()->load([
                'heroAttachment.mediaAsset',
                'cardAttachment.mediaAsset',
                'galleryAttachments.mediaAsset',
            ])->loadCount('journeys')),
            'message' => $id ? 'Destination updated successfully.' : 'Destination created successfully.',
        ], $id ? 200 : 201);
    }

    public function updateDestination(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);

        $validated = $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('destinations', 'name')->ignore($id)],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('destinations', 'slug')->ignore($id)],
            'summary' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'region_label' => ['nullable', 'string', 'max:255'],
            'gateway' => ['nullable', 'string'],
            'trailheads' => ['nullable', 'string'],
            'permits' => ['nullable', 'string'],
            'pacing_note' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_featured' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:300'],
            'hero_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
            'card_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
        ]);

        $heroImageId = $validated['hero_image_id'] ?? null;
        $cardImageId = $validated['card_image_id'] ?? null;
        unset($validated['hero_image_id'], $validated['card_image_id']);

        if (array_key_exists('name', $validated) && !array_key_exists('slug', $validated)) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $destination->update($validated);

        if ($request->has('hero_image_id')) {
            if ($heroImageId) {
                $destination->syncMediaAttachment((int) $heroImageId, MediaAttachment::COLLECTION_HERO);
            } else {
                $destination->detachMediaCollection(MediaAttachment::COLLECTION_HERO);
            }
        }

        if ($request->has('card_image_id')) {
            if ($cardImageId) {
                $destination->syncMediaAttachment((int) $cardImageId, MediaAttachment::COLLECTION_CARD);
            } else {
                $destination->detachMediaCollection(MediaAttachment::COLLECTION_CARD);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Destination updated successfully.',
            'data' => new DestinationResource($destination->fresh()->load([
                'heroAttachment.mediaAsset',
                'cardAttachment.mediaAsset',
                'galleryAttachments.mediaAsset',
            ])->loadCount('journeys')),
        ]);
    }

    public function attachMedia(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);
        $validated = $request->validate([
            'media_asset_id' => ['required', 'integer', 'exists:media_assets,id'],
            'collection' => ['nullable', 'string', Rule::in(MediaAttachment::COLLECTIONS)],
            'title' => ['nullable', 'string', 'max:255'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'caption' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $collection = $validated['collection'] ?? MediaAttachment::COLLECTION_GALLERY;

        if (in_array($collection, [MediaAttachment::COLLECTION_HERO, MediaAttachment::COLLECTION_CARD])) {
            $destination->syncMediaAttachment($validated['media_asset_id'], $collection, $validated);
        } else {
            $isAlreadyAttached = $destination->mediaAttachments()
                ->where('media_asset_id', $validated['media_asset_id'])
                ->where('collection', $collection)
                ->exists();

            if ($isAlreadyAttached) {
                return response()->json([
                    'success' => false,
                    'message' => 'This photo is already attached to the destination gallery.',
                ], 422);
            }

            $destination->attachMediaAsset($validated['media_asset_id'], $collection, $validated);
        }

        return response()->json([
            'success' => true,
            'message' => 'Media attached successfully.',
            'data' => new DestinationResource($destination->fresh()->load([
                'heroAttachment.mediaAsset',
                'cardAttachment.mediaAsset',
                'galleryAttachments.mediaAsset',
            ])->loadCount('journeys')),
        ]);
    }

    public function updateMediaAttachment(Request $request, $id, $attachmentId)
    {
        $destination = Destination::findOrFail($id);
        $attachment = $destination->mediaAttachments()->findOrFail($attachmentId);

        $validated = $request->validate([
            'alt_text' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'caption' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $attachment->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Image details updated successfully.',
            'data' => new DestinationResource($destination->fresh()->load([
                'heroAttachment.mediaAsset',
                'cardAttachment.mediaAsset',
                'galleryAttachments.mediaAsset',
            ])->loadCount('journeys')),
        ]);
    }

    public function detachMedia($id, $attachmentId)
    {
        $destination = Destination::findOrFail($id);
        $attachment = $destination->mediaAttachments()->findOrFail($attachmentId);
        $attachment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Media removed successfully.',
            'data' => new DestinationResource($destination->fresh()->load([
                'heroAttachment.mediaAsset',
                'cardAttachment.mediaAsset',
                'galleryAttachments.mediaAsset',
            ])->loadCount('journeys')),
        ]);
    }

    public function toggleActive($id, Request $request)
    {
        $destination = Destination::findOrFail($id);
        $destination->is_active = $request->boolean('is_active');
        $destination->save();

        $statusText = $destination->is_active ? 'activated' : 'deactivated';

        return response()->json([
            'success' => true,
            'message' => "Destination '{$destination->name}' has been {$statusText}.",
            'name' => $destination->name,
            'is_active' => $destination->is_active,
        ]);
    }

    public function delete($id, Request $request)
    {
        $destination = Destination::findOrFail($id);
        $name = $destination->name;
        $destination->delete();

        return response()->json([
            'success' => true,
            'message' => "Destination '{$name}' deleted successfully.",
            'name' => $name,
        ]);
    }
}
