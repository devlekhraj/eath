# Remove Route Map Image Column from Journeys Table

**Date & Time (Nepal Time / NPT / UTC+05:45):** 2026-09-13 22:58  
**Scope:** Database & Admin Backend (`database/migrations/`, `packages/admin/`)  

---

## Summary

Removed legacy `route_map_image_id` foreign key column from the `journeys` table migration, standardizing all journey image assets to be managed exclusively via the polymorphic `media_attachments` table under the `route_map` collection. Updated the `Journey` model, `HasMediaAttachments` trait, `JourneyController`, and feature tests.

---

## Detailed Changes

1. **Migration `database/migrations/2025_07_18_165611_create_journeys_table.php`**:
   - Removed `$table->foreignId('route_map_image_id')` foreign key column.
   - The `journeys` table now contains zero direct foreign keys to `media_assets`.

2. **Model `Admin\Models\Journey` (`packages/admin/src/Models/Journey.php`)**:
   - Removed `'route_map_image_id'` from `$fillable`.

3. **Trait `Admin\Models\Concerns\HasMediaAttachments` (`packages/admin/src/Models/Concerns/HasMediaAttachments.php`)**:
   - Added `routeMapAttachment()` relationship (`morphOne` with `collection = MediaAttachment::COLLECTION_ROUTE_MAP`).
   - Added `getRouteMapImageAttribute()` accessor resolving the underlying `MediaAsset`.
   - Updated docblock annotations for `$routeMapAttachment` and `$route_map_image`.

4. **Controller `Admin\Http\Controllers\Journey\JourneyController`**:
   - Synchronized `route_map_image_id` into `media_attachments` with `COLLECTION_ROUTE_MAP` in `storeUpdate` (detaching if null).
   - Eager loaded `routeMapAttachment.mediaAsset` across `show`, `storeUpdate`, and media management endpoints.
   - Serialized `route_map_image_id` and structured `route_map_image` object from `routeMapAttachment`.

5. **Feature Tests `tests/Feature/AdminJourneyCrudTest.php`**:
   - Updated `test_journey_store_update_creates_polymorphic_media_attachments()` with assertions for attaching `route_map_image_id` into `media_attachments`, verifying the `route_map_image` accessor, and confirming unlinking on `null`.

---

## Verification Commands & Outputs

1. **Database Migration & Seed**:
   ```bash
   php artisan migrate:fresh --seed
   ```
   *Output:* Dropped all tables, migrated 43 migrations, and seeded database cleanly.

2. **Column Inspection**:
   ```bash
   php artisan tinker --execute="print_r(Schema::getColumnListing('journeys'));"
   ```
   *Output:* Verified that `route_map_image_id` (along with `hero_image_id` and `card_image_id`) no longer exists on `journeys`.

3. **Backend Feature Tests**:
   ```bash
   php artisan test --filter=AdminJourneyCrudTest
   ```
   *Output:* `PASS Tests\Feature\AdminJourneyCrudTest (3 passed, 35 assertions, 2.24s)`.

   ```bash
   php artisan test --filter=AdminDestinationCrudTest
   ```
   *Output:* `PASS Tests\Feature\AdminDestinationCrudTest (9 passed, 46 assertions, 1.73s)`.

---

## Next Steps

- Proceed with any other models (e.g. Experiences, Guides, Articles, Pages) requiring migration to `media_attachments`.
