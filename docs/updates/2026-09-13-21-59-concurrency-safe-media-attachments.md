# 2026-09-13-21-59 - Concurrency-Safe Media Attachments

## Summary
Resolved concurrency and race-condition duplicate key violations (`media_attachments.media_attachments_unique`) during single-asset collection syncs (such as `hero` and `card` banners). Wrapped sync operations in database transactions, converted blanket deletes to diff deletions, added a database exception safety net in `attachMediaAsset()`, and added client-side double-click/debounce guards in `MediaAssetPickerModal.vue` and `TabMedia.vue`.

## Detailed Changes
- **Trait `packages/admin/src/Models/Concerns/HasMediaAttachments.php`**:
  - In `syncMediaAttachment()`: wrapped operations in `DB::transaction(...)` and replaced blanket collection deletion with selective deletion of other assets: `->where('collection', $collection)->where('media_asset_id', '!=', $mediaAssetId)->delete()`. If the target asset is already the active hero/card, it avoids redundant delete-and-insert cycles.
  - In `attachMediaAsset()`: wrapped `->create()` in a `try/catch (QueryException $e)` block. Catches code 23000 / MySQL error 1062 and returns the existing attachment record, making it completely resilient to concurrent requests.
- **Frontend Components**:
  - In `packages/admin/resources/admin/components/media/MediaAssetPickerModal.vue`: added a `confirming` ref guard to `confirmSelection()` to avoid double-firing on rapid double-clicks.
  - In `packages/admin/resources/admin/pages/destinations/detail_tabs/TabMedia.vue`: added a `loadingRef` guard and `asset.id === currentId` early return to prevent dispatching duplicate API calls when re-selecting the existing image.

## Verification Commands & Outputs
- `php -l packages/admin/src/Models/Concerns/HasMediaAttachments.php`
  - Output: `No syntax errors detected in packages/admin/src/Models/Concerns/HasMediaAttachments.php`
- `php artisan test --filter=AdminDestinationCrudTest`
  - Output: `PASS Tests\Feature\AdminDestinationCrudTest (8 passed, 39 assertions, 2.36s)`
- `npm run build`
  - Output: `built in 22.39s` (0 errors)

## Next Steps
- Continue implementing remaining admin panel CRUD relationship features.
