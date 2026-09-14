# Journey Detail Dynamic CRUD & Public Website Alignment

## Summary
Made every section of the Journey/Trek Detail page (`/treks/{slug}`) fully dynamic and manageable from the Admin Panel (`/admin/journeys/:id`), while honoring the Zero Breakage Policy (providing contextual fallbacks), Universal Zero Border-Radius Policy on the public website, standard Vuetify styling in the Admin Panel, and strict Eloquent model location conventions (`Admin\Models`).

## Detailed Changes
1. **Database Schema & Migrations**:
   - Created `database/migrations/2026_09_14_114000_add_detail_content_fields_to_journeys_table.php`: Added `preparation_note`, `packing_note`, `operational_notice`, `cta_title`, `cta_description`, `cta_primary_btn_text`, `cta_primary_btn_url`, `cta_secondary_btn_text`, and `cta_secondary_btn_url` to `journeys`.
   - Created `database/migrations/2026_09_14_114500_create_journey_safety_items_table.php`: Created relational table `journey_safety_items` (`id`, `journey_id`, `title`, `description`, `icon`, `sort_order`, `is_active`, timestamps).

2. **Models & Relationships**:
   - Created `packages/admin/src/Models/JourneySafetyItem.php` under `Admin\Models` with relations and attribute casts.
   - Updated `packages/admin/src/Models/Journey.php`: Added new detail fields to `$fillable`, added `safetyItems()` `hasMany` relationship, and verified polymorphic `HasMediaAttachments` integration.

3. **Admin Panel Controller & Routes**:
   - `packages/admin/src/Http/Controllers/Journey/JourneyController.php`:
     - Added validation and synchronization for `safety_items`, `preparation_note`, `packing_note`, `operational_notice`, and `cta_*` fields in `storeUpdate`.
     - Serialized all new notes, CTA fields, and `safety_items` in `serializeJourney`.
     - Eager-loaded `safetyItems` in `show()`.
   - `packages/admin/routes/api.php`:
     - Enabled both `PUT` and `PATCH` for `journeys/{id}`.

4. **Admin Panel UI**:
   - Created `packages/admin/resources/admin/pages/journeys/detail_tabs/TabFaqs.vue`: Added entity-scoped polymorphic FAQ management for journeys (`faqable_type = 'journey'`, `faqable_id = journey.id`).
   - Registered `TabFaqs` in `packages/admin/resources/admin/pages/journeys/JourneyDetailPage.vue`.
   - Updated `packages/admin/resources/admin/pages/journeys/detail_tabs/TabOverview.vue`:
     - Added textareas for `preparation_note`, `packing_note`, and `operational_notice`.
     - Added dynamic interactive repeater for `safety_items` (Add Protocol, Remove, Move Up/Down, sort order, active switch).
     - Added bottom Call-To-Action (CTA) banner configuration card with customizable title, description, and button links.

5. **Public Website Catalog & Blade Template**:
   - `packages/website/src/Services/WebsiteCatalogRepository.php`:
     - Eager-loaded `heroAttachment.mediaAsset`, `galleryAttachments.mediaAsset`, and `safetyItems` in `findTrek()`.
     - In `journeyToArray()`, resolved `heroAttachment` into `$trek['image']`, resolved `galleryAttachments` into `$trek['gallery']`, and formatted `safety_items` and detail notes.
   - `packages/website/resources/views/website_preview/pages/treks/show.blade.php`:
     - Added top `Field Advisory & Operational Notice` banner rendered conditionally when `operational_notice` is present.
     - Made Section 12 `#preparation` dynamic: renders `preparation_note` and `packing_note` with contextual fallbacks.
     - Made Section 13 `#logistics` dynamic: renders `logistics_note` with fallback.
     - Made Section 14 `#safety` dynamic: loops over `$trek['safety_items']` with default standard protocol card fallbacks.
     - Made Section 15 `#gallery` dynamic: loops over `$trek['gallery']` without hardcoded image references.
     - Made Section 19 Final CTA dynamic: renders `cta_title`, `cta_description`, and customizable buttons with default fallbacks.
   - `packages/website/resources/views/website_preview/pages/home/section-05-departures.blade.php`:
     - Guarded departure `trek_id` / `id` resolution with null-coalescing fallbacks.

6. **Seeders & Tests**:
   - Updated `database/seeders/WebsiteDemoSeeder.php`: Added `journey_safety_items` truncate, seeded realistic safety items (certified guides, pulse oximeter, emergency hyperbaric oxygen, satellite inReach), preparation notes, and CTA banner data.
   - Updated `tests/Feature/AdminJourneyCrudTest.php`: Added tests for updating journey detail notes and safety items via API, and verifying zero-breakage rendering on the public website.

## Verification Commands & Outputs
- `php artisan migrate` -> Passed (Migrations applied cleanly)
- `php artisan db:seed --class=WebsiteDemoSeeder` -> Passed (Database seeded with realistic safety protocols)
- `php artisan test --filter=AdminJourneyCrudTest` -> Passed (6 passed, 73 assertions)
- `php artisan test --filter=WebsiteDestinationDetailTest` -> Passed (1 passed)
- `php artisan test --filter=AdminDestinationCrudTest` -> Passed (11 passed)
- `php artisan test --filter=AdminFaqPolymorphicTest` -> Passed (4 passed)
- `npm run build` -> Passed (Built in 19.16s, `JourneyDetailPage` bundled cleanly)

## Next Steps
- Verify visual appearance of custom safety items and operational advisory banners in browser subagent if desired.
