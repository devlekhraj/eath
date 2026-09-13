# Add Route Map Support to Journey TabMedia

## Summary
Integrated dedicated Route Map image management into the Journey `TabMedia.vue` component, completing the trio of primary media collections (Hero Banner, Card Thumbnail, and Route Map) alongside the Journey Gallery.

## Detailed Changes

### `packages/admin/resources/admin/pages/journeys/detail_tabs/TabMedia.vue`
- **Balanced 3-Column Layout**: Adjusted Hero Banner, Card Thumbnail, and Route Map cards to `cols="12" md="4"` on desktop, ensuring a uniform visual presentation.
- **Route Map Hidden File Input**: Added `<input ref="routeMapFileInputRef" ... @change="handleDirectUpload('route_map', $event)" />` for direct file upload support.
- **Route Map Card**:
  - Image preview displaying filename, dimensions, alt text, or empty upload dropzone.
  - Action buttons compliant with modal and button standards:
    - `Remove` (`variant="outlined" color="error"`) with confirmation modal.
    - `Edit Alt Text` (`variant="outlined" color="primary"`) launching metadata edit modal.
    - `Media Library` (`variant="outlined" color="secondary"`) opening `MediaAssetPickerModal`.
    - `Upload Image / Replace Image` (`variant="flat" color="primary"`).
- **Component Script Handling**:
  - Added `routeMapFileInputRef`, `loadingRouteMap`, and `routeMapImage` computed property.
  - Extended `handleDirectUpload` with `'route_map'`, mapping to `'route_map_image_id'`.
  - Extended `openLibraryPicker` to support `'route_map'`.
  - Extended `openEditModal` and `handleSaveEdit` to edit Route Map alt text, title, and caption.
  - Extended `promptRemoveImage` and `executeRemove` to handle detaching/clearing the Route Map attachment (`route_map_image_id: null`).

## Verification Commands & Outputs

### 1. Frontend Build Verification
```bash
npm run build
```
Output:
```
✓ built in 22.07s
```

### 2. Journey Backend Tests
```bash
php artisan test --filter=AdminJourneyCrudTest
```
Output:
```
   PASS  Tests\Feature\AdminJourneyCrudTest
  ✓ can show journey with media attachments                              2.63s  
  ✓ can attach and update journey media attachment                       0.13s  
  ✓ journey store update creates polymorphic media attachments           0.05s  

  Tests:    3 passed (35 assertions)
  Duration: 3.39s
```

### 3. Destination Backend Tests
```bash
php artisan test --filter=AdminDestinationCrudTest
```
Output:
```
   PASS  Tests\Feature\AdminDestinationCrudTest
  ✓ can list destinations                                                0.74s  
  ✓ can create destination with full logistics and seo                   0.03s  
  ✓ can update destination and associate images                          0.02s  
  ✓ can show destination with eager loaded images                        0.02s  
  ✓ can delete destination                                               0.02s  
  ✓ destination update creates polymorphic media attachments             0.02s  
  ✓ can attach and detach gallery media to destination                   0.02s  
  ✓ cannot attach duplicate media to gallery                             0.02s  
  ✓ can update media attachment alt text and meta                        0.02s  

  Tests:    9 passed (46 assertions)
  Duration: 0.92s
```

## Next Steps
- Continue verifying other Journey tabs or forms if further standardization is requested.
