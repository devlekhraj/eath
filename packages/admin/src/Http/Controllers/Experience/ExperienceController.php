<?php

namespace Admin\Http\Controllers\Experience;

use App\Http\Controllers\Controller;
use Admin\Models\Experience;
use Admin\Models\MediaAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ExperienceController extends Controller
{
    public function index(Request $request)
    {
        $query = Experience::query()
            ->withCount('journeys')
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc');

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        if ($request->boolean('active_only')) {
            $query->where('is_active', true);
        }

        if ($request->has('per_page') && $request->input('per_page') !== 'all') {
            $perPage = max(1, min((int) $request->input('per_page', 20), 100));
            $data = $query->paginate($perPage);
        } else {
            $data = $query->get();
        }

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        $experience = Experience::with([
            'heroAttachment.mediaAsset',
            'cardAttachment.mediaAsset',
            'galleryAttachments.mediaAsset',
            'highlights',
            'prepQuestions',
            'journeys.destination',
        ])->withCount('journeys')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $this->serializeExperience($experience),
        ]);
    }

    public function store(Request $request)
    {
        return $this->saveExperience($request, null);
    }

    public function update(Request $request, $id)
    {
        return $this->saveExperience($request, (int) $id);
    }

    protected function saveExperience(Request $request, ?int $id)
    {
        $targetId = $id ?? $request->input('id');

        $validated = $request->validate([
            'id' => ['nullable', 'integer', 'exists:experiences,id'],
            'name' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('experiences', 'name')->ignore($targetId)],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('experiences', 'slug')->ignore($targetId)],
            'summary' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'emphasis' => ['nullable', 'string'],
            'cues' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_featured' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:300'],
            'cta_title' => ['nullable', 'string', 'max:255'],
            'cta_description' => ['nullable', 'string'],
            'cta_primary_btn_text' => ['nullable', 'string', 'max:255'],
            'cta_primary_btn_url' => ['nullable', 'string', 'max:500'],
            'cta_secondary_btn_text' => ['nullable', 'string', 'max:255'],
            'cta_secondary_btn_url' => ['nullable', 'string', 'max:500'],
            'hero_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
            'card_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
            'highlights' => ['nullable', 'array'],
            'prep_questions' => ['nullable', 'array'],
        ]);

        if (array_key_exists('name', $validated) && empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $heroImageId = $validated['hero_image_id'] ?? null;
        $cardImageId = $validated['card_image_id'] ?? null;
        $highlightsData = $validated['highlights'] ?? null;
        $prepQuestionsData = $validated['prep_questions'] ?? null;
        unset($validated['hero_image_id'], $validated['card_image_id'], $validated['highlights'], $validated['prep_questions'], $validated['id']);

        if ($targetId) {
            $experience = Experience::findOrFail($targetId);
            $experience->update($validated);
        } else {
            $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name'] ?? 'experience');
            $validated['sort_order'] = $validated['sort_order'] ?? 0;
            $validated['is_featured'] = $request->boolean('is_featured');
            $validated['is_active'] = $request->has('is_active') ? $request->boolean('is_active') : true;
            $experience = Experience::create($validated);
        }

        if ($request->has('hero_image_id')) {
            if ($heroImageId) {
                $experience->syncMediaAttachment((int) $heroImageId, MediaAttachment::COLLECTION_HERO);
            } else {
                $experience->detachMediaCollection(MediaAttachment::COLLECTION_HERO);
            }
        }

        if ($request->has('card_image_id')) {
            if ($cardImageId) {
                $experience->syncMediaAttachment((int) $cardImageId, MediaAttachment::COLLECTION_CARD);
            } else {
                $experience->detachMediaCollection(MediaAttachment::COLLECTION_CARD);
            }
        }

        if ($request->has('highlights') && is_array($highlightsData)) {
            $experience->highlights()->delete();
            foreach ($highlightsData as $index => $hItem) {
                if (!empty(trim($hItem['title'] ?? ''))) {
                    $experience->highlights()->create([
                        'title' => trim($hItem['title']),
                        'description' => trim($hItem['description'] ?? ''),
                        'sort_order' => isset($hItem['sort_order']) ? (int) $hItem['sort_order'] : ($index + 1),
                        'is_active' => isset($hItem['is_active']) ? (bool) $hItem['is_active'] : true,
                    ]);
                }
            }
        }

        if ($request->has('prep_questions') && is_array($prepQuestionsData)) {
            $experience->prepQuestions()->delete();
            foreach ($prepQuestionsData as $index => $qItem) {
                if (!empty(trim($qItem['title'] ?? ''))) {
                    $experience->prepQuestions()->create([
                        'title' => trim($qItem['title']),
                        'body' => trim($qItem['body'] ?? ($qItem['description'] ?? '')),
                        'sort_order' => isset($qItem['sort_order']) ? (int) $qItem['sort_order'] : ($index + 1),
                        'is_active' => isset($qItem['is_active']) ? (bool) $qItem['is_active'] : true,
                    ]);
                }
            }
        }

        $fresh = $experience->fresh()->load([
            'heroAttachment.mediaAsset',
            'cardAttachment.mediaAsset',
            'galleryAttachments.mediaAsset',
            'highlights',
            'prepQuestions',
            'journeys.destination',
        ])->loadCount('journeys');

        return response()->json([
            'success' => true,
            'message' => $targetId ? 'Experience updated successfully.' : 'Experience created successfully.',
            'data' => $this->serializeExperience($fresh),
        ], $targetId ? 200 : 201);
    }

    public function attachMedia(Request $request, $id)
    {
        $experience = Experience::findOrFail($id);

        $validated = $request->validate([
            'media_asset_id' => ['required', 'integer', 'exists:media_assets,id'],
            'collection' => ['nullable', 'string', Rule::in([
                MediaAttachment::COLLECTION_HERO,
                MediaAttachment::COLLECTION_CARD,
                MediaAttachment::COLLECTION_GALLERY,
                MediaAttachment::COLLECTION_DEFAULT,
            ])],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'caption' => ['nullable', 'string', 'max:500'],
        ]);

        $collection = $validated['collection'] ?? MediaAttachment::COLLECTION_GALLERY;
        $mediaAssetId = (int) $validated['media_asset_id'];
        $attributes = [
            'alt_text' => $validated['alt_text'] ?? null,
            'title' => $validated['title'] ?? null,
            'caption' => $validated['caption'] ?? null,
        ];

        if (in_array($collection, [MediaAttachment::COLLECTION_HERO, MediaAttachment::COLLECTION_CARD], true)) {
            $experience->syncMediaAttachment($mediaAssetId, $collection, $attributes);
        } else {
            $experience->attachMediaAsset($mediaAssetId, $collection, $attributes);
        }

        $fresh = $experience->fresh()->load([
            'heroAttachment.mediaAsset',
            'cardAttachment.mediaAsset',
            'galleryAttachments.mediaAsset',
            'highlights',
            'prepQuestions',
            'journeys.destination',
        ])->loadCount('journeys');

        return response()->json([
            'success' => true,
            'message' => 'Media attached successfully.',
            'data' => $this->serializeExperience($fresh),
        ]);
    }

    public function updateMediaAttachment(Request $request, $id, $attachmentId)
    {
        $experience = Experience::findOrFail($id);
        $attachment = $experience->mediaAttachments()->findOrFail($attachmentId);

        $validated = $request->validate([
            'alt_text' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'caption' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $attachment->update($validated);

        $fresh = $experience->fresh()->load([
            'heroAttachment.mediaAsset',
            'cardAttachment.mediaAsset',
            'galleryAttachments.mediaAsset',
            'highlights',
            'prepQuestions',
            'journeys.destination',
        ])->loadCount('journeys');

        return response()->json([
            'success' => true,
            'message' => 'Image details updated successfully.',
            'data' => $this->serializeExperience($fresh),
        ]);
    }

    public function detachMedia($id, $attachmentId)
    {
        $experience = Experience::findOrFail($id);
        $attachment = $experience->mediaAttachments()->findOrFail($attachmentId);
        $attachment->delete();

        $fresh = $experience->fresh()->load([
            'heroAttachment.mediaAsset',
            'cardAttachment.mediaAsset',
            'galleryAttachments.mediaAsset',
            'highlights',
            'prepQuestions',
            'journeys.destination',
        ])->loadCount('journeys');

        return response()->json([
            'success' => true,
            'message' => 'Media removed successfully.',
            'data' => $this->serializeExperience($fresh),
        ]);
    }

    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        $name = $experience->name;
        $experience->delete();

        return response()->json([
            'success' => true,
            'message' => "Experience '{$name}' deleted successfully.",
        ]);
    }

    public function toggleActive($id, Request $request)
    {
        $experience = Experience::findOrFail($id);
        $experience->is_active = $request->boolean('is_active');
        $experience->save();

        $statusText = $experience->is_active ? 'activated' : 'deactivated';

        return response()->json([
            'success' => true,
            'message' => "Experience '{$experience->name}' has been {$statusText}.",
            'is_active' => $experience->is_active,
            'data' => $this->serializeExperience($experience),
        ]);
    }

    protected function serializeExperience(Experience $exp): array
    {
        return [
            'id' => $exp->id,
            'name' => $exp->name,
            'slug' => $exp->slug,
            'summary' => $exp->summary,
            'description' => $exp->description,
            'emphasis' => $exp->emphasis,
            'cues' => $exp->cues,
            'sort_order' => $exp->sort_order,
            'is_featured' => (bool) $exp->is_featured,
            'is_active' => (bool) $exp->is_active,
            'meta_title' => $exp->meta_title,
            'meta_description' => $exp->meta_description,
            'cta_title' => $exp->cta_title,
            'cta_description' => $exp->cta_description,
            'cta_primary_btn_text' => $exp->cta_primary_btn_text,
            'cta_primary_btn_url' => $exp->cta_primary_btn_url,
            'cta_secondary_btn_text' => $exp->cta_secondary_btn_text,
            'cta_secondary_btn_url' => $exp->cta_secondary_btn_url,
            'journeys_count' => $exp->journeys_count ?? ($exp->relationLoaded('journeys') ? $exp->journeys->count() : 0),
            'hero_image' => ($exp->relationLoaded('heroAttachment') && $exp->heroAttachment?->mediaAsset) ? [
                'id' => $exp->heroAttachment->mediaAsset->id,
                'attachment_id' => $exp->heroAttachment->id,
                'url' => $exp->heroAttachment->mediaAsset->url,
                'filename' => $exp->heroAttachment->mediaAsset->filename,
                'title' => $exp->heroAttachment->title ?? $exp->heroAttachment->mediaAsset->title,
                'alt_text' => $exp->heroAttachment->alt_text ?? $exp->heroAttachment->mediaAsset->alt_text,
                'caption' => $exp->heroAttachment->caption ?? $exp->heroAttachment->mediaAsset->caption,
            ] : null,
            'card_image' => ($exp->relationLoaded('cardAttachment') && $exp->cardAttachment?->mediaAsset) ? [
                'id' => $exp->cardAttachment->mediaAsset->id,
                'attachment_id' => $exp->cardAttachment->id,
                'url' => $exp->cardAttachment->mediaAsset->url,
                'filename' => $exp->cardAttachment->mediaAsset->filename,
                'title' => $exp->cardAttachment->title ?? $exp->cardAttachment->mediaAsset->title,
                'alt_text' => $exp->cardAttachment->alt_text ?? $exp->cardAttachment->mediaAsset->alt_text,
                'caption' => $exp->cardAttachment->caption ?? $exp->cardAttachment->mediaAsset->caption,
            ] : null,
            'gallery_images' => ($exp->relationLoaded('galleryAttachments') && $exp->galleryAttachments) ? $exp->galleryAttachments->map(fn ($attachment) => [
                'id' => $attachment->mediaAsset->id,
                'attachment_id' => $attachment->id,
                'url' => $attachment->mediaAsset->url,
                'filename' => $attachment->mediaAsset->filename,
                'title' => $attachment->title ?? $attachment->mediaAsset->title,
                'alt_text' => $attachment->alt_text ?? $attachment->mediaAsset->alt_text,
                'caption' => $attachment->caption ?? $attachment->mediaAsset->caption,
                'sort_order' => $attachment->sort_order,
            ])->values() : [],
            'highlights' => ($exp->relationLoaded('highlights') && $exp->highlights) ? $exp->highlights->map(fn ($item) => [
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,
                'sort_order' => $item->sort_order,
                'is_active' => (bool) $item->is_active,
            ])->values() : [],
            'prep_questions' => ($exp->relationLoaded('prepQuestions') && $exp->prepQuestions) ? $exp->prepQuestions->map(fn ($item) => [
                'id' => $item->id,
                'title' => $item->title,
                'body' => $item->body,
                'sort_order' => $item->sort_order,
                'is_active' => (bool) $item->is_active,
            ])->values() : [],
            'journeys' => ($exp->relationLoaded('journeys') && $exp->journeys) ? $exp->journeys->map(fn ($j) => [
                'id' => $j->id,
                'name' => $j->name,
                'slug' => $j->slug,
                'duration_days' => $j->duration_days,
                'difficulty' => $j->difficulty,
                'price_minor' => $j->price_minor,
                'is_active' => (bool) $j->is_active,
                'destination_name' => $j->destination?->name,
            ])->values() : [],
        ];
    }
}
