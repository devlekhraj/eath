# 2026-09-13-21-42 - Fix HasMediaAttachments Property Annotations

## Summary
Resolved static analysis warning (`Undefined property '$heroAttachment'`) on `HasMediaAttachments` by adding `@mixin \Illuminate\Database\Eloquent\Model` and `@property-read` PHPDoc annotations to the trait. Also streamlined the `getHeroImageAttribute` and `getCardImageAttribute` accessors to eliminate redundant database `exists()` checks.

## Detailed Changes
- **`packages/admin/src/Models/Concerns/HasMediaAttachments.php`**:
  - Added PHPDoc block to trait `HasMediaAttachments`:
    - `@mixin \Illuminate\Database\Eloquent\Model`
    - `@property-read MediaAttachment|null $heroAttachment`
    - `@property-read MediaAttachment|null $cardAttachment`
    - `@property-read Collection<int, MediaAttachment> $mediaAttachments`
    - `@property-read Collection<int, MediaAttachment> $galleryAttachments`
    - `@property-read Collection<int, MediaAsset> $mediaAssets`
    - `@property-read Collection<int, MediaAsset> $galleryAssets`
    - `@property-read MediaAsset|null $hero_image`
    - `@property-read MediaAsset|null $card_image`
  - Simplified `getHeroImageAttribute()` and `getCardImageAttribute()`: removed unnecessary `exists()` query checks preceding the dynamic relationship access.

## Verification Commands & Outputs
- `php -l packages/admin/src/Models/Concerns/HasMediaAttachments.php`
  - Output: `No syntax errors detected in packages/admin/src/Models/Concerns/HasMediaAttachments.php`
- `php artisan test --filter=AdminDestinationCrudTest`
  - Output: `PASS Tests\Feature\AdminDestinationCrudTest (7 passed, 35 assertions, 0.80s)`

## Next Steps
- Continue implementing remaining admin panel CRUD relationship features.
