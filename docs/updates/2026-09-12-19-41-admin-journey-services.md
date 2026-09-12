# 2026-09-12 19:41 NPT - Admin Journey Services

## Summary
- Converted the Journey include/exclude tab from legacy package inclusions to the new `journey_services` table.
- Added Journey-native service API routes.
- Kept UI compatibility by returning `inclusions` and `exclusions` arrays from Journey detail, backed by `journey_services`.

## Files Changed
- `packages/admin/src/Http/Controllers/TravelPackage/PackageInclusionController.php`
  - Replaced legacy `PackageInclusion` and `TravelPackage` usage with:
    - `Journey`
    - `JourneyService`
  - Saves services to `journey_services`.
  - Maps old `is_excluded` input to standard service `type`:
    - `inclusion`
    - `exclusion`

- `packages/admin/routes/api.php`
  - Added:
    - `POST /api/v1/admin/journeys/{id}/services`
    - `DELETE /api/v1/admin/journey-services/{id}/delete`

- `packages/admin/src/Http/Controllers/TravelPackage/TravelPackageController.php`
  - Journey detail now serializes:
    - `services`
    - `inclusions`
    - `exclusions`

- `packages/admin/resources/admin/pages/packages/form_section/FormInclude.vue`
  - Saves to `/admin/journeys/{id}/services`.
  - Passes `journeyId` to the edit modal.

- `packages/admin/resources/admin/pages/packages/modal/IncludeExcludeForm.vue`
  - Updates services through `/admin/journeys/{id}/services`.
  - Deletes through `/admin/journey-services/{id}/delete`.

- `packages/admin/resources/admin/pages/packages/modal/DeleteIncludeItem.vue`
  - Deletes through `/admin/journey-services/{id}/delete`.

## Verification
- PHP syntax checks passed.
- Fresh SQLite migration and seed passed:
  - `DB_CONNECTION=sqlite DB_DATABASE=/private/tmp/eath_services.sqlite php artisan migrate:fresh --seed --force`
- Authenticated API smoke test passed:
  - login
  - Journey list
  - create inclusion service
  - create exclusion service
  - Journey detail includes both arrays
  - delete inclusion service
  - delete exclusion service
- Production frontend build passed:
  - `npm run build`

## Next Phase
Continue Journey nested tabs with:
1. Journey-level highlights.
2. Departures.
3. Experiences and travel months.
4. Guide assignment.
5. Media image fields.
