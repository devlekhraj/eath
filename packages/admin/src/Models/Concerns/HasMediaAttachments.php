<?php

namespace Admin\Models\Concerns;

use Admin\Models\MediaAsset;
use Admin\Models\MediaAttachment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property-read MediaAttachment|null $heroAttachment
 * @property-read MediaAttachment|null $cardAttachment
 * @property-read MediaAttachment|null $routeMapAttachment
 * @property-read Collection<int, MediaAttachment> $mediaAttachments
 * @property-read Collection<int, MediaAttachment> $galleryAttachments
 * @property-read Collection<int, MediaAsset> $mediaAssets
 * @property-read Collection<int, MediaAsset> $galleryAssets
 * @property-read MediaAsset|null $hero_image
 * @property-read MediaAsset|null $card_image
 * @property-read MediaAsset|null $route_map_image
 */
trait HasMediaAttachments
{
    public function mediaAttachments()
    {
        return $this->morphMany(MediaAttachment::class, 'attachable')->orderBy('sort_order');
    }

    public function heroAttachment()
    {
        return $this->morphOne(MediaAttachment::class, 'attachable')
            ->where('collection', MediaAttachment::COLLECTION_HERO);
    }

    public function cardAttachment()
    {
        return $this->morphOne(MediaAttachment::class, 'attachable')
            ->where('collection', MediaAttachment::COLLECTION_CARD);
    }

    public function routeMapAttachment()
    {
        return $this->morphOne(MediaAttachment::class, 'attachable')
            ->where('collection', MediaAttachment::COLLECTION_ROUTE_MAP);
    }

    public function galleryAttachments()
    {
        return $this->morphMany(MediaAttachment::class, 'attachable')
            ->where('collection', MediaAttachment::COLLECTION_GALLERY)
            ->orderBy('sort_order');
    }

    public function mediaAssets()
    {
        return $this->morphToMany(MediaAsset::class, 'attachable', 'media_attachments')
            ->withPivot(['id', 'collection', 'title', 'alt_text', 'caption', 'custom_attributes', 'sort_order'])
            ->withTimestamps()
            ->orderBy('sort_order');
    }

    public function galleryAssets()
    {
        return $this->morphToMany(MediaAsset::class, 'attachable', 'media_attachments')
            ->wherePivot('collection', MediaAttachment::COLLECTION_GALLERY)
            ->withPivot(['id', 'collection', 'title', 'alt_text', 'caption', 'custom_attributes', 'sort_order'])
            ->withTimestamps()
            ->orderBy('sort_order');
    }

    public function getHeroImageAttribute(): ?MediaAsset
    {
        return $this->heroAttachment?->mediaAsset;
    }

    public function getCardImageAttribute(): ?MediaAsset
    {
        return $this->cardAttachment?->mediaAsset;
    }

    public function getRouteMapImageAttribute(): ?MediaAsset
    {
        return $this->routeMapAttachment?->mediaAsset;
    }

    public function syncMediaAttachment(int $mediaAssetId, string $collection = MediaAttachment::COLLECTION_DEFAULT, array $attributes = []): MediaAttachment
    {
        return DB::transaction(function () use ($mediaAssetId, $collection, $attributes) {
            $this->mediaAttachments()
                ->where('collection', $collection)
                ->where('media_asset_id', '!=', $mediaAssetId)
                ->delete();

            return $this->attachMediaAsset($mediaAssetId, $collection, $attributes);
        });
    }

    public function attachMediaAsset(int $mediaAssetId, string $collection = MediaAttachment::COLLECTION_DEFAULT, array $attributes = []): MediaAttachment
    {
        $existing = $this->mediaAttachments()
            ->where('media_asset_id', $mediaAssetId)
            ->where('collection', $collection)
            ->first();

        if ($existing) {
            $updates = array_filter([
                'title' => $attributes['title'] ?? null,
                'alt_text' => $attributes['alt_text'] ?? null,
                'caption' => $attributes['caption'] ?? null,
                'custom_attributes' => $attributes['custom_attributes'] ?? null,
                'sort_order' => $attributes['sort_order'] ?? null,
            ], fn ($v) => $v !== null);

            if (!empty($updates)) {
                $existing->update($updates);
            }

            return $existing;
        }

        $sortOrder = $attributes['sort_order'] ?? null;
        if ($sortOrder === null && $collection === MediaAttachment::COLLECTION_GALLERY) {
            $sortOrder = (int) $this->mediaAttachments()->where('collection', $collection)->max('sort_order') + 1;
        }

        try {
            return $this->mediaAttachments()->create([
                'media_asset_id' => $mediaAssetId,
                'collection' => $collection,
                'title' => $attributes['title'] ?? null,
                'alt_text' => $attributes['alt_text'] ?? null,
                'caption' => $attributes['caption'] ?? null,
                'custom_attributes' => $attributes['custom_attributes'] ?? null,
                'sort_order' => $sortOrder ?? 0,
            ]);
        } catch (QueryException $e) {
            if (($e->errorInfo[1] ?? null) === 1062 || $e->getCode() == 23000) {
                return $this->mediaAttachments()
                    ->where('media_asset_id', $mediaAssetId)
                    ->where('collection', $collection)
                    ->firstOrFail();
            }

            throw $e;
        }
    }

    public function detachMediaCollection(string $collection): void
    {
        $this->mediaAttachments()->where('collection', $collection)->delete();
    }

    public function detachMediaAsset(int $mediaAssetId, ?string $collection = null): void
    {
        $query = $this->mediaAttachments()->where('media_asset_id', $mediaAssetId);
        if ($collection !== null) {
            $query->where('collection', $collection);
        }
        $query->delete();
    }
}
