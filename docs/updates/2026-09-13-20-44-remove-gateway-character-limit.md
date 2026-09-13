# Remove Gateway Character Limit and Align with Database Text Schema

## Summary
Fixed validation error on `gateway` field in destination update endpoint (`/api/v1/admin/destinations/{id}/update`). The database column `gateway` is defined as `text` in `destinations` table, but the controller validation had an arbitrary `'max:255'` limit. Removed the restriction in `DestinationController` and upgraded the admin UI input in `TabLogistics.vue` to `v-textarea`.

## Detailed Changes
1. **Controller Validation Update (`packages/admin/src/Http/Controllers/Destination/DestinationController.php`)**:
   - In both `saveDestination` and `updateDestination`, updated `'gateway' => ['nullable', 'string']` to remove the arbitrary `max:255` limit, matching the `text` column in the database migration.

2. **Admin UI Input Upgrade (`packages/admin/resources/admin/pages/destinations/detail_tabs/TabLogistics.vue`)**:
   - Converted the `gateway` input from a single-line `v-text-field` to an auto-growing `v-textarea` (`rows="2" auto-grow`) to comfortably handle comprehensive transit and flight notes.

3. **Feature Test Coverage (`tests/Feature/AdminDestinationCrudTest.php`)**:
   - Updated `test_can_update_destination_and_associate_images` to explicitly test updating a destination with a long `gateway` description (> 255 characters).

## Verification Commands & Outputs
- **Automated Feature Test**:
  ```bash
  php artisan test --filter=AdminDestinationCrudTest
  # PASS Tests\Feature\AdminDestinationCrudTest (5 passed, 25 assertions)
  ```

- **Frontend Asset Build**:
  ```bash
  npm run build
  # ✓ built in 19.61s
  ```
