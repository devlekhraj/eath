# Allow Partial Updates on Journey (Fix 422 Name Field Required)

## Summary
Fixed an issue where partial updates (such as updating or detaching images like `route_map_image_id`, `hero_image_id`, `card_image_id`, or SEO metadata) failed with HTTP 422 (`The name field is required.`). `JourneyController::storeUpdate()` now conditionally requires `name` only on new journey creation and supports partial updates when a journey `id` is present.

## Detailed Changes

### `packages/admin/src/Http/Controllers/Journey/JourneyController.php`
- **Conditional Validation on Update**: Changed validation rule for `name` to:
  ```php
  'name' => [
      $isUpdate ? 'sometimes' : 'required',
      'string',
      'max:255',
      Rule::unique('journeys', 'name')->ignore($id),
  ],
  ```
- **Isolated Update Branch**:
  - When `$isUpdate` is true, loads existing journey with `Journey::findOrFail($id)` and updates only the attributes provided in `$request`, preventing accidental overwrites of existing fields (such as `is_active`, `duration_days`, etc.).
  - Generates `slug` from `name` only if `name` is present in the payload and `slug` is not explicitly provided.
  - Safely casts price and currency if present.
- **Added `update` Action**:
  - Implemented `public function update(Request $request, $id)` delegating to `storeUpdate` with merged `id`.

### `packages/admin/routes/api.php`
- Added routes mirroring `destinations/{id}/update`:
  ```php
  Route::patch('journeys/{id}/update', [JourneyController::class, 'update']);
  Route::patch('journeys/{id}', [JourneyController::class, 'update']);
  ```

### `tests/Feature/AdminJourneyCrudTest.php`
- Added `test_can_partially_update_journey_media_without_name`:
  - Validates that `POST /api/v1/admin/journeys` with `{ "id": 1, "route_map_image_id": 11 }` succeeds with 200 OK without requiring `name`.
  - Confirms media attachment is created and other journey attributes remain unchanged.
  - Validates that `PATCH /api/v1/admin/journeys/{id}/update` also succeeds for partial media detachment.

## Verification Commands & Outputs

### Backend Journey Tests
```bash
php artisan test --filter=AdminJourneyCrudTest
```
Output:
```
   PASS  Tests\Feature\AdminJourneyCrudTest
  ✓ can show journey with media attachments                              2.53s  
  ✓ can attach and update journey media attachment                       0.06s  
  ✓ journey store update creates polymorphic media attachments           0.04s  
  ✓ can partially update journey media without name                      0.03s  

  Tests:    4 passed (46 assertions)
  Duration: 3.27s
```

### Backend Destination Tests
```bash
php artisan test --filter=AdminDestinationCrudTest
```
Output:
```
   PASS  Tests\Feature\AdminDestinationCrudTest
  ✓ can list destinations                                                0.78s  
  ✓ can create destination with full logistics and seo                   0.03s  
  ✓ can update destination and associate images                          0.02s  
  ✓ can show destination with eager loaded images                        0.02s  
  ✓ can delete destination                                               0.02s  
  ✓ destination update creates polymorphic media attachments             0.02s  
  ✓ can attach and detach gallery media to destination                   0.02s  
  ✓ cannot attach duplicate media to gallery                             0.02s  
  ✓ can update media attachment alt text and meta                        0.02s  

  Tests:    9 passed (46 assertions)
  Duration: 1.01s
```

## Next Steps
- User can now attach, replace, and remove route maps, hero banners, and card images in `TabMedia.vue` without encountering the 422 error.
