# 2026-09-13-21-54 - Prevent Duplicate Media Attachments

## Summary
Resolved MySQL 1062 duplicate key integrity constraint violation (`media_attachments.media_attachments_unique`) when attaching an already attached image to a model collection. Made `HasMediaAttachments::attachMediaAsset` idempotent by updating existing records, added server-side validation (422 response) in `DestinationController::attachMedia`, and added client-side duplicate prevention in `TabMedia.vue`.

## Detailed Changes
- **Trait `packages/admin/src/Models/Concerns/HasMediaAttachments.php`**:
  - In `attachMediaAsset()`: query existing attachment for the given `media_asset_id` and `collection`. If found, updates any provided non-null attributes (`title`, `alt_text`, `caption`, `custom_attributes`, `sort_order`) and returns the existing model instead of firing a duplicate `INSERT` query.
- **Controller `packages/admin/src/Http/Controllers/Destination/DestinationController.php`**:
  - In `attachMedia()`: added validation checking if the asset is already attached to the destination's gallery collection; returns a clear 422 JSON response (`This photo is already attached to the destination gallery.`) instead of an unhandled database exception.
- **Frontend `packages/admin/resources/admin/pages/destinations/detail_tabs/TabMedia.vue`**:
  - Added pre-dispatch check in `openLibraryPicker('gallery')` to notify the user immediately with a toast notification if the selected photo is already present in the gallery.
- **Test Suite `tests/Feature/AdminDestinationCrudTest.php`**:
  - Added test case `test_cannot_attach_duplicate_media_to_gallery()` to guarantee duplicate attachments are rejected with 422 and assert database state.

## Verification Commands & Outputs
- `php artisan test --filter=AdminDestinationCrudTest`
  - Output: `PASS Tests\Feature\AdminDestinationCrudTest (8 passed, 39 assertions, 2.70s)`
- `npm run build`
  - Output: `built in 18.59s` (0 errors)

## Next Steps
- Continue implementing remaining admin panel CRUD relationship features.
