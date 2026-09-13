# 2026-09-13-21-43 - Remove Legacy Image Column Dual Write

## Summary
Removed legacy `hero_image_id` and `card_image_id` dual-write synchronization and attribute fallbacks from `HasMediaAttachments`. The trait is now fully decoupled from entity column schemas and operates purely through polymorphic `media_attachments`.

## Detailed Changes
- **`packages/admin/src/Models/Concerns/HasMediaAttachments.php`**:
  - Simplified `getHeroImageAttribute()` and `getCardImageAttribute()` to resolve directly from `heroAttachment?->mediaAsset` and `cardAttachment?->mediaAsset` without legacy model attribute fallbacks.
  - Cleaned up `syncMediaAttachment()`: removed `in_array(..., $this->getFillable())` and `updateQuietly` dual-writes.
  - Cleaned up `detachMediaCollection()` and `detachMediaAsset()`: removed `updateQuietly(['..._image_id' => null])` legacy reset calls.

## Verification Commands & Outputs
- `php -l packages/admin/src/Models/Concerns/HasMediaAttachments.php`
  - Output: `No syntax errors detected in packages/admin/src/Models/Concerns/HasMediaAttachments.php`
- `php artisan test --filter=AdminDestinationCrudTest`
  - Output: `PASS Tests\Feature\AdminDestinationCrudTest (7 passed, 35 assertions, 0.76s)`

## Next Steps
- Continue implementing remaining admin panel CRUD relationship features.
