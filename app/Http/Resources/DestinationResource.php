<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DestinationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'summary' => $this->summary,
            'description' => $this->description,
            'region_label' => $this->region_label,
            'region' => $this->region_label,
            'gateway' => $this->gateway,
            'trailheads' => $this->trailheads,
            'permits' => $this->permits,
            'pacing_note' => $this->pacing_note,
            'operational_notice' => $this->operational_notice,
            'cta_title' => $this->cta_title,
            'cta_description' => $this->cta_description,
            'cta_primary_btn_text' => $this->cta_primary_btn_text,
            'cta_primary_btn_url' => $this->cta_primary_btn_url,
            'cta_secondary_btn_text' => $this->cta_secondary_btn_text,
            'cta_secondary_btn_url' => $this->cta_secondary_btn_url,
            'logistics' => $this->logistics ? $this->logistics->map(fn ($item) => [
                'id' => $item->id,
                'label' => $item->label,
                'value' => $item->value,
                'icon' => $item->icon,
                'sort_order' => $item->sort_order,
                'is_active' => (bool) $item->is_active,
            ]) : [],
            'sort_order' => $this->sort_order,
            'is_featured' => (bool) $this->is_featured,
            'is_active' => (bool) $this->is_active,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'hero_image_id' => $this->heroAttachment?->media_asset_id,
            'card_image_id' => $this->cardAttachment?->media_asset_id,
            'hero_image' => $this->heroAttachment?->mediaAsset ? [
                'id' => $this->heroAttachment->mediaAsset->id,
                'attachment_id' => $this->heroAttachment->id,
                'url' => $this->heroAttachment->mediaAsset->url,
                'filename' => $this->heroAttachment->mediaAsset->filename,
                'title' => $this->heroAttachment->title ?? $this->heroAttachment->mediaAsset->title,
                'alt_text' => $this->heroAttachment->alt_text ?? $this->heroAttachment->mediaAsset->alt_text,
                'caption' => $this->heroAttachment->caption ?? $this->heroAttachment->mediaAsset->caption,
            ] : null,
            'card_image' => $this->cardAttachment?->mediaAsset ? [
                'id' => $this->cardAttachment->mediaAsset->id,
                'attachment_id' => $this->cardAttachment->id,
                'url' => $this->cardAttachment->mediaAsset->url,
                'filename' => $this->cardAttachment->mediaAsset->filename,
                'title' => $this->cardAttachment->title ?? $this->cardAttachment->mediaAsset->title,
                'alt_text' => $this->cardAttachment->alt_text ?? $this->cardAttachment->mediaAsset->alt_text,
                'caption' => $this->cardAttachment->caption ?? $this->cardAttachment->mediaAsset->caption,
            ] : null,
            'gallery' => $this->galleryAttachments ? $this->galleryAttachments->map(fn ($attachment) => [
                'attachment_id' => $attachment->id,
                'id' => $attachment->media_asset_id,
                'url' => $attachment->mediaAsset?->url,
                'filename' => $attachment->mediaAsset?->filename,
                'title' => $attachment->title ?? $attachment->mediaAsset?->title,
                'alt_text' => $attachment->alt_text ?? $attachment->mediaAsset?->alt_text,
                'caption' => $attachment->caption ?? $attachment->mediaAsset?->caption,
                'sort_order' => $attachment->sort_order,
            ]) : [],
            'journeys_count' => $this->journeys_count ?? ($this->relationLoaded('journeys') ? $this->journeys->count() : 0),
            'treks_count' => $this->journeys_count ?? ($this->relationLoaded('journeys') ? $this->journeys->count() : 0),
            'journeys' => $this->relationLoaded('journeys') ? $this->journeys : [],
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
