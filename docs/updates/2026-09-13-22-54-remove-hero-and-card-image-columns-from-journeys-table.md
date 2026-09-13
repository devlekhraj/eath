# Remove Hero and Card Image Columns from Journeys Table

**Date & Time (Nepal Time / NPT / UTC+05:45):** 2026-09-13 22:54  
**Scope:** Database & Admin Backend (`database/migrations/`, `packages/admin/`)  

---

## Summary

Removed legacy `hero_image_id` and `card_image_id` foreign key columns directly from the `journeys` table migration, following the exact same polymorphic media attachments pattern established for `destinations`. The `Journey` model's `$fillable` array was updated, and `JourneyController` now persists hero and card images strictly via the polymorphic `media_attachments` table with `hero` and `card` collections.

---

## Detailed Changes

1. **Migration `database/migrations/2025_07_18_165611_create_journeys_table.php`**:
   - Removed `$table->foreignId('hero_image_id')` and `$table->foreignId('card_image_id')`.
   - Decoupled `journeys` schema from direct foreign keys to `media_assets`.

2. **Model `Admin\Models\Journey` (`packages/admin/src/Models/Journey.php`)**:
   - Removed `'hero_image_id'` and `'card_image_id'` from `$fillable`.
   - Utilizes `HasMediaAttachments` trait for `heroAttachment()`, `cardAttachment()`, `galleryAttachments()`, and dynamic accessors (`hero_image`, `card_image`).

3. **Controller `Admin\Http\Controllers\Journey\JourneyController`**:
   - In `storeUpdate`: Retained API validation for `hero_image_id` and `card_image_id`, but excluded them from the journey table payload.
   - Synchronizes `hero` and `card` collections via `syncMediaAttachment()` and `detachMediaCollection()`.
   - In `serializeJourney`: Resolves `hero_image_id` and `card_image_id` directly from `heroAttachment` and `cardAttachment`.

4. **Controller `Admin\Http\Controllers\Journey\JourneyDepartureController`**:
   - Removed selection of nonexistent `hero_image_id` column in `with(['journey:id,name,slug,duration_days,duration_nights', 'journey.heroAttachment.mediaAsset'])`.

5. **Feature Tests `tests/Feature/AdminJourneyCrudTest.php`**:
   - Added `test_journey_store_update_creates_polymorphic_media_attachments()` testing API creation with `hero_image_id` and `card_image_id`, checking `media_attachments` entries, accessors, serialization, and removal.

---

## Verification Commands & Outputs

1. **Database Migration & Seeding**:
   ```bash
   php artisan migrate:fresh --seed
   ```
   *Output:* Dropped all tables, migrated 43 migrations, seeded admin, countries, and website demo data successfully.

2. **Column Inspection**:
   ```bash
   php artisan tinker --execute="print_r(Schema::getColumnListing('journeys'));"
   ```
   *Output:* Confirmed `hero_image_id` and `card_image_id` columns are removed from `journeys`.

3. **Backend Feature Tests**:
   ```bash
   php artisan test --filter=AdminJourneyCrudTest
   ```
   *Output:* `PASS Tests\Feature\AdminJourneyCrudTest (3 passed, 30 assertions, 0.88s)`.

   ```bash
   php artisan test --filter=AdminDestinationCrudTest
   ```
   *Output:* `PASS Tests\Feature\AdminDestinationCrudTest (9 passed, 46 assertions, 0.94s)`.

4. **Frontend Build**:
   ```bash
   npm run build
   ```
   *Output:* Verified clean production build with Vite.

---

## Next Steps

- Apply the same polymorphic media pattern to remaining entities (Guides, Experiences, Website Pages) when requested.
