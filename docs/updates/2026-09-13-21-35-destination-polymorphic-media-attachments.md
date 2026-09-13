# 2026-09-13-21-35 - Destination Polymorphic Media Attachments

## Summary
Migrated destination media storage and management from direct foreign keys (`hero_image_id`, `card_image_id`) to polymorphic collections in `media_attachments` (`hero`, `card`, `gallery`) linking to `media_assets`. Maintained dual-sync backward compatibility so that legacy columns remain populated while all new UI interactions, API endpoints, and models leverage polymorphic attachments.

## Detailed Changes
- **Trait `Admin\Models\Concerns\HasMediaAttachments`**:
  - Enhanced `syncMediaAttachment()` and `detachMediaCollection()` to dynamically update legacy columns `hero_image_id` and `card_image_id` when present on the host model without triggering unnecessary events (`updateQuietly`).
  - Implemented `attachMediaAsset()` with auto-incrementing `sort_order` for gallery attachments.
- **Controller `Admin\Http\Controllers\Destination\DestinationController`**:
  - Eager loads `['heroAttachment.mediaAsset', 'cardAttachment.mediaAsset', 'galleryAttachments.mediaAsset', 'heroImage', 'cardImage']` in `index`, `getDestinations`, `show`, `saveDestination`, and `updateDestination`.
  - Added `attachMedia` (`POST /api/v1/admin/destinations/{id}/media-attachments`) and `detachMedia` (`DELETE /api/v1/admin/destinations/{id}/media-attachments/{attachmentId}`) endpoints.
- **Resources `DestinationResource` & `DestinationListResource`**:
  - Seamlessly serializes `hero_image`, `card_image`, and `gallery` from polymorphic attachments with fallback to legacy `heroImage` / `cardImage` relations.
- **Frontend `TabMedia.vue`**:
  - Implemented Hero Banner and Card Thumbnail upload and selection using `MediaAssetPickerModal`.
  - Added comprehensive Destination Gallery section enabling multiple photo direct uploads and selection from media asset library with deletion controls.
  - Exported `attachDestinationMediaApi` and `detachDestinationMediaApi` in `destinations.api.ts`.
- **Testing `AdminDestinationCrudTest`**:
  - Added test verifying polymorphic `media_attachments` table records for `hero` and `card` collections upon destination update.
  - Added test verifying attach and detach of destination gallery media.

## Verification Commands & Outputs
- `php artisan test --filter=AdminDestinationCrudTest`
  - Output: `PASS Tests\Feature\AdminDestinationCrudTest (7 passed, 34 assertions)`
- `npm run build`
  - Output: `✓ built in 19.07s` (all Vue and TypeScript assets compiled cleanly)

## Next Steps
- Apply the same polymorphic media attachments pattern across Journeys / Packages, Guides, and Experiences.
