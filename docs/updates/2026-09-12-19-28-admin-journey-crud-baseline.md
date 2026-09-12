# 2026-09-12 19:28 NPT - Admin Journey CRUD Baseline

## Summary
- Converted the legacy package listing and quick-create/delete flow to use the new `journeys` table.
- Added professional `/admin/journeys` API routes while keeping `/admin/travel-packages` as temporary compatibility aliases.
- Updated the Journey list UI and quick-create modal to use Journey naming and the new endpoint.
- Verified the authenticated Journey API flow through Sanctum.

## Files Changed
- `packages/admin/src/Http/Controllers/TravelPackage/TravelPackageController.php`
  - Replaced legacy `TravelPackage`, `PackageCategory`, and `TravelPackageHighlight` usage with:
    - `Journey`
    - `Destination`
    - `JourneyHighlight`
  - `index()` now lists journeys with destination, guide, itinerary day count, and departure count.
  - `show()` now returns a Journey detail payload with:
    - destination
    - guide
    - experiences
    - travel months
    - itinerary days
    - highlights
    - services
    - prices
    - departures
    - assigned guides
  - `storeUpdate()` now creates/updates `journeys`.
  - Quick-create supports the current minimal modal by creating a draft journey with safe defaults:
    - first available destination
    - generated draft summary
    - `duration_days = 1`
    - `duration_nights = 0`
    - `price_minor = 0`
    - inactive and unpublished by default
  - `toggleActive()`, `togglePublish()`, and delete now operate on journeys.
  - Highlight create/update/delete now targets `journey_highlights`.

- `packages/admin/routes/api.php`
  - Added new Journey routes:
    - `GET /api/v1/admin/journeys`
    - `POST /api/v1/admin/journeys`
    - `GET /api/v1/admin/journeys/{id}`
    - `POST /api/v1/admin/journeys/{id}/highlights`
    - `PATCH /api/v1/admin/journeys/{id}/toggle-active`
    - `PATCH /api/v1/admin/journeys/{id}/toggle-publish`
    - `DELETE /api/v1/admin/journeys/{id}/delete`
  - Kept old `/api/v1/admin/travel-packages` routes as aliases during migration.

- `packages/admin/resources/admin/pages/packages/PackagePage.vue`
  - The list now reads from `admin/journeys`.
  - Active/publish toggles now call `admin/journeys`.
  - Visible copy now says Journey instead of Package.
  - Row links now go to `adminJourneyForm`.

- `packages/admin/resources/admin/pages/packages/modal/PackageAdd.vue`
  - Quick create now posts to `/admin/journeys`.
  - Visible copy now says Journey.
  - Redirects to `adminJourneyForm`.

- `packages/admin/resources/admin/pages/packages/modal/PackageDelete.vue`
  - Delete now calls `/admin/journeys/{id}/delete`.

## Verification
- PHP syntax checks passed.
- Fresh SQLite migration and seed passed:
  - `DB_CONNECTION=sqlite DB_DATABASE=/private/tmp/eath_journeys_crud.sqlite php artisan migrate:fresh --seed --force`
- Authenticated API smoke test passed:
  - `POST /api/v1/admin/login` -> `200`
  - `GET /api/v1/admin/journeys` -> `200`
  - `POST /api/v1/admin/journeys` -> `200`
  - `GET /api/v1/admin/journeys/{id}` -> `200`
  - `PATCH /api/v1/admin/journeys/{id}/toggle-active` -> `200`
  - `PATCH /api/v1/admin/journeys/{id}/toggle-publish` -> `200`
  - `DELETE /api/v1/admin/journeys/{id}/delete` -> `200`
- Production frontend build passed:
  - `npm run build`

## Important Notes
- The controller class name is still `TravelPackageController` for now, but its implementation is Journey-backed. A later cleanup phase should rename the controller namespace/class to `JourneyController` after remaining legacy route references are removed.
- The current full Journey form still uses legacy package internals in several child tabs. That form is intentionally left for the next Journey CRUD phase.
- Legacy nested endpoints for itinerary, inclusions/services, prices, departures, and media are still present and should be converted one by one to the new Journey schema.

## Next Phase
Continue Journey CRUD by rebuilding the full edit form and nested endpoints:
1. Journey overview/details form.
2. Itinerary days.
3. Prices.
4. Services/inclusions/exclusions.
5. Highlights.
6. Departures.
7. Experiences and travel months.
8. Guide assignment.
9. Media image attachment fields.
