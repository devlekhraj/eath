# 2026-09-12 19:35 NPT - Admin Journey Itinerary Days

## Summary
- Converted the Journey itinerary tab from legacy package itinerary tables to the new `journey_itinerary_days` table.
- Converted itinerary highlights from old lookup-based highlights to the new `journey_itinerary_highlights` table.
- Added Journey-native API routes while preserving legacy route aliases during migration.
- Updated Journey detail loading so each itinerary day includes its highlights.

## Files Changed
- `packages/admin/src/Http/Controllers/TravelPackage/PackageItinareryController.php`
  - Now writes to:
    - `journey_itinerary_days`
    - `journey_itinerary_highlights`
  - Supports itinerary day fields:
    - `day_number`
    - `title`
    - `route`
    - `description`
    - `location_label`
    - `altitude_m`
    - `altitude_label`
    - `walking_hours`
    - `walking_hours_label`
    - `accommodation_label`
    - `meal_note`
    - `is_acclimatization`
    - `sort_order`

- `packages/admin/routes/api.php`
  - Added new Journey itinerary routes:
    - `POST /api/v1/admin/journeys/{id}/itinerary-days`
    - `DELETE /api/v1/admin/journey-itinerary-days/{id}/delete`
    - `POST /api/v1/admin/journey-itinerary-days/{id}/highlights`
    - `DELETE /api/v1/admin/journey-itinerary-highlights/{id}/delete`
  - Old package itinerary routes remain as aliases for now.

- `packages/admin/src/Models/JourneyItineraryDay.php`
  - Added `highlights()` relationship.

- `packages/admin/src/Http/Controllers/TravelPackage/TravelPackageController.php`
  - Journey detail now eager-loads `itineraryDays.highlights`.

- `packages/admin/resources/admin/pages/packages/form_section/FormPackageItinery.vue`
  - Reads `travelPackage.itinerary_days`.
  - Displays day number, route, altitude, walking hours, and highlights.
  - Uses Journey wording in buttons and modal titles.

- `packages/admin/resources/admin/pages/packages/modal/ItineraryForm.vue`
  - Saves itinerary days to `/admin/journeys/{id}/itinerary-days`.
  - Deletes itinerary days through `/admin/journey-itinerary-days/{id}/delete`.
  - Uses Journey itinerary fields instead of legacy package fields.

- `packages/admin/resources/admin/pages/packages/modal/ItineraryHighlightsForm.vue`
  - Removed old lookup dependency.
  - Saves simple title/description highlights to `/admin/journey-itinerary-days/{id}/highlights`.
  - Deletes highlights through `/admin/journey-itinerary-highlights/{id}/delete`.

## Verification
- PHP syntax checks passed.
- Fresh SQLite migration and seed passed:
  - `DB_CONNECTION=sqlite DB_DATABASE=/private/tmp/eath_itinerary.sqlite php artisan migrate:fresh --seed --force`
- Authenticated API smoke test passed:
  - login
  - Journey list
  - create itinerary day
  - create itinerary highlight
  - Journey detail includes the created day and highlight
  - delete itinerary highlight
  - delete itinerary day
- Production frontend build passed:
  - `npm run build`

## Next Phase
Continue the Journey nested tabs with:
1. Prices.
2. Services/inclusions/exclusions.
3. Journey-level highlights.
4. Departures.
5. Experiences and travel months.
6. Guide assignment.
7. Media image fields.
