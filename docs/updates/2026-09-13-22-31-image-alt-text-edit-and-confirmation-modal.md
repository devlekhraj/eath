# Image Alt Text Editing and Confirmation Modal for TabMedia

**Timestamp:** 2026-09-13 22:31 (Nepal Time / NPT / UTC+05:45)

## Summary
- Added image Alt Text (and metadata title/caption) editing support for every destination image (Hero banner, Card thumbnail, and Gallery photos) in `TabMedia.vue`.
- Added a dedicated backend API route `PATCH /api/admin/destinations/{id}/media-attachments/{attachmentId}` and controller method `DestinationController::updateMediaAttachment` with full validation and `DestinationResource` response.
- Implemented a confirmation modal dialog before removing or detaching any image (Hero banner, Card thumbnail, or Gallery photo) with image preview and context-aware messaging.
- Ensured all newly introduced and existing modals in `TabMedia.vue` strictly adhere to project modal standards: `<v-card-title class="d-flex align-center justify-space-between py-0">`, form inputs wrapped in `<div class="mb-2">`, `<v-card-actions class="justify-end">`, no `<v-spacer />`, and filled action buttons using `variant="flat"`.

## Detailed Changes

### Backend API & Controller
- **[`packages/admin/routes/api.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/routes/api.php)**:
  - Added route `PATCH destinations/{id}/media-attachments/{attachmentId}` mapped to `DestinationController::updateMediaAttachment`.
- **[`packages/admin/src/Http/Controllers/Destination/DestinationController.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Http/Controllers/Destination/DestinationController.php)**:
  - Added `updateMediaAttachment(Request $request, $id, $attachmentId)` method. Validates `alt_text`, `title`, `caption`, and `sort_order`, updates the polymorphic `MediaAttachment` model, and returns a refreshed `DestinationResource`.
- **[`tests/Feature/AdminDestinationCrudTest.php`](file:///Volumes/TOSHIBA/Herd/eath/tests/Feature/AdminDestinationCrudTest.php)**:
  - Added automated test `test_can_update_media_attachment_alt_text_and_meta` asserting that attachment metadata is updated and returned in the resource payload.

### Frontend API Client
- **[`packages/admin/resources/admin/api/destinations.api.ts`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/api/destinations.api.ts)**:
  - Exported `updateDestinationMediaApi(destinationId, attachmentId, payload)` calling `PATCH /destinations/{destinationId}/media-attachments/{attachmentId}`.

### Component Implementation (`TabMedia.vue`)
- **[`packages/admin/resources/admin/pages/destinations/detail_tabs/TabMedia.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/destinations/detail_tabs/TabMedia.vue)**:
  - **Alt Text Previews**: Rendered active alt text beneath the Hero image preview, Card thumbnail preview, and on each Gallery grid item card.
  - **Edit Alt Text Buttons**: Added `Edit Alt Text` action buttons on Hero and Card thumbnail cards, and compact `Edit` buttons on each gallery grid card.
  - **Edit Image Details Modal**: Created `<v-dialog v-model="editDialog.open" max-width="540px" persistent>` with:
    - Standard `py-0` header with title and close icon button.
    - Image thumbnail and asset filename preview banner.
    - Fields for `alt_text` (SEO & Accessibility), `title`, and `caption`, each wrapped in `<div class="mb-2">`.
    - Modal actions: Cancel text button and `Save Changes` button (`variant="flat" color="primary"`).
    - Persists via `updateDestinationMediaApi` (or falls back to `attachDestinationMediaApi` if no attachment record existed yet).
  - **Confirm Removal Modal**: Created `<v-dialog v-model="deleteDialog.open" max-width="440px">` with:
    - Standard `py-0` header with title and close icon button.
    - Preview image thumbnail and descriptive warning text.
    - Actions: Cancel button and Remove button (`variant="flat" color="error"`).
    - `promptRemoveImage()` and `promptRemoveGallery()` replace instant unlinks with confirmation.

## Verification Commands & Outputs

```bash
php artisan test --filter=AdminDestinationCrudTest
```
Output:
```text
PASS  Tests\Feature\AdminDestinationCrudTest
✓ can list destinations                                                1.92s  
✓ can create destination with full logistics and seo                   0.05s  
✓ can update destination and associate images                          0.07s  
✓ can show destination with eager loaded images                        0.02s  
✓ can delete destination                                               0.02s  
✓ destination update creates polymorphic media attachments             0.02s  
✓ can attach and detach gallery media to destination                   0.03s  
✓ cannot attach duplicate media to gallery                             0.02s  
✓ can update media attachment alt text and meta                        0.02s  

Tests:    9 passed (46 assertions)
Duration: 2.65s
```

```bash
npm run build
```
Output:
```text
vite v6.3.5 building for production...
transforming...
✓ built in 20.84s
```

## Next Steps
- Admin users can now manage alt text for accessibility and SEO across all destination media and safely remove images with confirmation dialogs.
