# 2026-09-12 19:31 NPT - Admin Journey Form Overview and Description

## Summary
- Converted the Journey edit parent screen to load details from `/admin/journeys/{id}`.
- Converted the Overview tab to edit real `journeys` fields.
- Converted the Description tab to save Journey description content through `/admin/journeys`.
- Fixed the destination lookup response so the Journey form can populate destinations from the new `destinations` and `journeys` schema.

## Files Changed
- `packages/admin/resources/admin/pages/packages/PackageForm.vue`
  - Detail load now uses `/admin/journeys/{id}`.
  - Header URL now points to `/journeys/{slug}` instead of the old trek URL pattern.

- `packages/admin/resources/admin/pages/packages/form_section/FormOverview.vue`
  - Replaced package wording with Journey wording.
  - Saves to `/admin/journeys`.
  - Supports core Journey fields:
    - `name`
    - `slug`
    - `summary`
    - `subtitle`
    - `destination_id`
    - `duration_days`
    - `duration_nights`
    - `price`
    - `max_altitude_m`
    - `difficulty`
    - `accommodation_style`
    - `pace`
    - `is_active`
    - `is_featured`
  - Emits `refresh` after saving so the parent reloads fresh Journey data.

- `packages/admin/resources/admin/pages/packages/form_section/FormDescription.vue`
  - Saves Journey description content to `/admin/journeys`.
  - Preserves required identity fields needed by the Journey update endpoint:
    - `id`
    - `name`
    - `slug`
    - `summary`
    - `destination_id`
  - Supports content fields:
    - `description`
    - `overview_secondary`
    - `accommodation_note`
    - `logistics_note`
    - `safety_note`
    - `route_map_note`
  - Emits `refresh` after saving.

- `packages/admin/src/Http/Controllers/Destination/DestinationController.php`
  - Destination list now counts `journeys` instead of old `treks`.
  - Removed old eager-loads for deleted image/gallery relationships from the list endpoint.

- `app/Http/Resources/DestinationListResource.php`
  - Removed dependency on old `images` relation.
  - Added `journeys_count`.
  - Keeps `treks_count` as a temporary alias for legacy UI compatibility.

## Verification
- PHP syntax checks passed.
- Fresh SQLite migration and seed passed:
  - `DB_CONNECTION=sqlite DB_DATABASE=/private/tmp/eath_journey_form.sqlite php artisan migrate:fresh --seed --force`
- Authenticated API smoke test passed:
  - login
  - destination dropdown data
  - Journey list
  - Journey detail
  - Journey update with overview and description fields
- Production frontend build passed:
  - `npm run build`

## Next Phase
Continue the Journey form rebuild by converting nested tabs and endpoints:
1. Itinerary days.
2. Prices.
3. Services/inclusions/exclusions.
4. Highlights.
5. Departures.
6. Experiences and travel months.
7. Guide assignment.
8. Media image fields.
