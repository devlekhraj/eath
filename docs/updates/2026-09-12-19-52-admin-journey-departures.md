# 2026-09-12 19:52 NPT - Admin Journey Departures Rebuild

## Summary
- Bound Journey departure management directly to the `journey_departures` table and `Admin\Models\JourneyDeparture`.
- Added clean RESTful API routes for departures while maintaining working legacy aliases:
  - `POST /api/v1/admin/journeys/{id}/departures`
  - `PATCH /api/v1/admin/journeys/{journeyId}/departures/{departureId}`
  - `DELETE /api/v1/admin/journeys/{journeyId}/departures/{departureId}`
  - `DELETE /api/v1/admin/journey-departures/{id}/delete`
  - Legacy `treks/{id}/fixed-departures` routes remain operational as backward-compatibility aliases.
- Serialized departures in `TravelPackageController::show()` with eager-loaded `departures.plannerSubmissions`, exposing clean departure fields and UI compatibility aliases:
  - `code`, `start_date`, `end_date`, `status` (`open`, `limited`, `full`, `closed`, `cancelled`)
  - `total_seats`, `total_seat`, `available_seats`
  - `price_minor`, `cost`, `price`, `currency`
  - `booking_deadline`, `notes`, `sort_order`, `is_active`
  - `bookings`, `booking_count`
- Handled legacy status mapping gracefully (`active` -> `open`, `inactive` -> `closed`).
- Updated Admin Vue components following `AGENTS.md` guidelines (zero border-radius `rounded-0`, zero ordinary drop-shadows, hairline borders):
  - `FormFixedDeparture.vue`: Enhanced table with total seats, available seats, clean status chip colorings, and expandable booking record drawers.
  - `FixedDepartureForm.vue`: Dynamic multi-row addition with start/end date validation, seats, and cost fields.
  - `EditFixedDepartureForm.vue`: Full status options, available seats, departure code, and notes fields.
  - `ConfirmDeleteModal.vue`: Zero border-radius deletion confirmation dialog.
  - `treks.api.ts`: Updated API client pointing to Journey departure routes.

## Files Changed
- `packages/admin/src/Models/JourneyDeparture.php`
  - Added `plannerSubmissions()` and `bookings()` relationships.
- `packages/admin/src/Http/Controllers/TravelPackage/TrekDepartureController.php`
  - Replaced deleted models with `Journey` and `JourneyDeparture`.
  - Implemented flexible batch and single departure creation, updating, deletion, and status normalization.
- `packages/admin/src/Http/Controllers/TravelPackage/TravelPackageController.php`
  - Eager-loaded `departures.plannerSubmissions`.
  - Added `serializeDeparture()` helper with full booking snapshots and cost aliases.
- `packages/admin/routes/api.php`
  - Registered clean Journey departures routes alongside legacy trek departure aliases.
- `packages/admin/resources/admin/api/treks.api.ts`
  - Updated API helpers to use Journey departures endpoints with fallback aliases.
- `packages/admin/resources/admin/pages/packages/form_section/FormFixedDeparture.vue`
  - Updated table headers, status chip colors, and bookings expandable drawer with sharp zero-radius geometry.
- `packages/admin/resources/admin/pages/packages/form_section/modal/FixedDepartureForm.vue`
  - Updated multi-row form styling and payload formatting.
- `packages/admin/resources/admin/pages/packages/form_section/modal/EditFixedDepartureForm.vue`
  - Added full status enum choices (`open`, `limited`, `full`, `closed`, `cancelled`), capacity fields, and notes.
- `packages/admin/resources/admin/pages/packages/form_section/modal/ConfirmDeleteModal.vue`
  - Enforced zero border-radius modal action buttons and styling.

## Verification
- PHP syntax checks passed on all modified PHP files:
  - `php -l packages/admin/src/Models/JourneyDeparture.php`
  - `php -l packages/admin/src/Http/Controllers/TravelPackage/TrekDepartureController.php`
  - `php -l packages/admin/src/Http/Controllers/TravelPackage/TravelPackageController.php`
  - `php -l packages/admin/routes/api.php`
- Fresh SQLite migration and seed passed:
  - `DB_CONNECTION=sqlite DB_DATABASE=/private/tmp/eath_departures.sqlite php artisan migrate:fresh --seed --force`
- Authenticated API smoke test passed:
  - Journey detail retrieves seeded departures with correct seats, cost, and status.
  - `POST /api/v1/admin/journeys/1/departures` creates new departure.
  - `PATCH /api/v1/admin/journeys/1/departures/{id}` updates dates, seats, cost, and status (`limited`).
  - Journey show reflects updated departure data.
  - `DELETE /api/v1/admin/journey-departures/{id}/delete` successfully deletes departure.
  - Legacy create, update (normalizing `inactive` to `closed`), and delete endpoints verified.
- Production frontend build passed:
  - `npm run build` completed cleanly in 21.40s.

## Next Phase
Proceed to the next slice in the rebuild sequence:
- **Phase 05F / Journey Taxonomies & Guide Assignment**:
  - Experiences (`experience_journey`)
  - Travel Months (`journey_month`)
  - Guides assignment (`guide_journey` / `journey.guide_id`)
  - Media asset selection for Hero, Card, and Route Map images
