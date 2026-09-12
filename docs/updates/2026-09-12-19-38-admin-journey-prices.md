# 2026-09-12 19:38 NPT - Admin Journey Prices

## Summary
- Converted the Journey pricing tab from legacy package prices to the new `journey_prices` table.
- Added Journey-native price API routes while keeping old package price routes as temporary aliases.
- Updated the price list, edit modal, and delete modal to use Journey naming and endpoints.
- Added compatibility aliases in the Journey detail response so the existing UI table can continue to read `title`, `price`, and `is_default` while the database stores `name`, `price_minor`, and `is_primary`.

## Files Changed
- `packages/admin/src/Http/Controllers/TravelPackage/PackagePriceController.php`
  - Replaced legacy `PackagePrice` and `TravelPackage` usage with:
    - `Journey`
    - `JourneyPrice`
  - Saves to `journey_prices`.
  - Converts decimal `price` to integer `price_minor`.
  - Supports:
    - `name`
    - `price`
    - `price_minor`
    - `currency`
    - `pricing_basis`
    - `description`
    - `min_travelers`
    - `max_travelers`
    - `starts_on`
    - `ends_on`
    - `sort_order`
    - `is_primary`
    - `is_active`
  - Keeps `title` and `is_default` as accepted compatibility inputs.

- `packages/admin/routes/api.php`
  - Added:
    - `POST /api/v1/admin/journeys/{id}/prices`
    - `DELETE /api/v1/admin/journey-prices/{id}/delete`

- `packages/admin/src/Http/Controllers/TravelPackage/TravelPackageController.php`
  - Journey detail now serializes prices with:
    - `name`
    - `title`
    - `price_minor`
    - decimal `price`
    - `is_primary`
    - `is_default`

- `packages/admin/resources/admin/pages/packages/form_section/FormPricing.vue`
  - Saves prices to `/admin/journeys/{id}/prices`.
  - Uses `name` instead of `title`.
  - Shows primary price instead of old economy price wording.

- `packages/admin/resources/admin/pages/packages/modal/PackagePriceForm.vue`
  - Edits Journey prices through `/admin/journeys/{id}/prices`.
  - Uses `name`, `is_primary`, and `is_active`.

- `packages/admin/resources/admin/pages/packages/modal/PackagePriceDelete.vue`
  - Deletes through `/admin/journey-prices/{id}/delete`.

## Verification
- PHP syntax checks passed.
- Fresh SQLite migration and seed passed:
  - `DB_CONNECTION=sqlite DB_DATABASE=/private/tmp/eath_prices.sqlite php artisan migrate:fresh --seed --force`
- Authenticated API smoke test passed:
  - login
  - Journey list
  - create Journey price
  - update Journey price
  - Journey detail includes the created price
  - delete Journey price
- Production frontend build passed:
  - `npm run build`

## Next Phase
Continue Journey nested tabs with:
1. Services/inclusions/exclusions.
2. Journey-level highlights.
3. Departures.
4. Experiences and travel months.
5. Guide assignment.
6. Media image fields.
