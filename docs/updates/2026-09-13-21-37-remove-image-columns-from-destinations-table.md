# 2026-09-13-21-37 - Remove Image Columns from Destinations Table

## Summary
Removed legacy `hero_image_id` and `card_image_id` foreign key columns directly from the original `destinations` migration file (`2025_07_18_165610_create_destinations_table.php`), removed them from the `Destination` model's `$fillable` array and relations, and verified with `php artisan migrate:fresh --seed`. All destination images are now exclusively stored and managed through the polymorphic `media_attachments` and `media_assets` tables.

## Detailed Changes
- **Migration `2025_07_18_165610_create_destinations_table.php`**:
  - Removed `$table->foreignId('hero_image_id')` and `$table->foreignId('card_image_id')`.
  - Fully decoupled `destinations` table definition from `media_assets`.
- **Model `Admin\Models\Destination`**:
  - Removed `hero_image_id` and `card_image_id` from `$fillable`.
  - Removed legacy `heroImage()` and `cardImage()` relations; accessors `$destination->hero_image` and `$destination->card_image` are handled via the `HasMediaAttachments` trait.
- **Controller `Admin\Http\Controllers\Destination\DestinationController`**:
  - Unset `hero_image_id` and `card_image_id` from destination record payload before persisting to avoid schema mismatch.
  - Automatically attached/detached `hero` and `card` collections in `media_attachments`.
  - Removed legacy relationship eager loads in queries.
- **Resources `DestinationResource` & `DestinationListResource`**:
  - Simplified image serialization to resolve directly from `heroAttachment` and `cardAttachment`.
- **Tests `AdminDestinationCrudTest`**:
  - Re-verified all test cases asserting directly against `media_attachments`.

## Verification Commands & Outputs
- `php artisan migrate:fresh --seed`
  - Output: Dropped all tables, ran 43 migrations, seeded database successfully.
- `php artisan test --filter=AdminDestinationCrudTest`
  - Output: `PASS Tests\Feature\AdminDestinationCrudTest (7 passed, 35 assertions, 0.90s)`.

## Next Steps
- Continue with Journeys/Trips, Guides, and Experiences to remove their respective direct image columns in favor of `media_attachments`.
