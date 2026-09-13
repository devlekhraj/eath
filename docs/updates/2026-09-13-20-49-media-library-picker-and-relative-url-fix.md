# Direct Media Library Picker & Relative Asset URL Resolution

## Summary
Resolved image display and upload issues in the Destination Media & Visuals tab. Eliminated the legacy, broken `SelectGalleryImage` modal and replaced it with a modern, direct image management experience. Also fixed asset URL resolution in `MediaAsset` to use root-relative `/storage/` paths, preventing domain mismatch and cross-origin failures between `eathways.test` and `eath.test`.

## Detailed Changes
1. **Root-Relative Asset URLs (`packages/admin/src/Models/MediaAsset.php`)**:
   - Updated `getUrlAttribute()` to return root-relative `/storage/` URLs rather than hardcoding the `APP_URL` from `.env`. This ensures assets render immediately on whatever domain or host the application is viewed on (`eath.test`, `localhost`, etc.).

2. **Direct Resource Image Serialization (`app/Http/Resources/DestinationResource.php`)**:
   - Removed the strict `relationLoaded('heroImage')` condition check, allowing `hero_image` and `card_image` objects to be cleanly serialized and returned regardless of whether they were eager-loaded or lazy-loaded.

3. **Modern Media Library Picker Component (`packages/admin/resources/admin/components/media/MediaAssetPickerModal.vue`)**:
   - Built a dedicated, reusable Media Library Picker modal directly connected to the active `/api/v1/admin/media-assets` endpoint.
   - Includes real-time search, visual grid preview, dimensions, formatted file sizes, and quick upload support.

4. **Streamlined Media & Visuals Tab (`packages/admin/resources/admin/pages/destinations/detail_tabs/TabMedia.vue`)**:
   - Removed reliance on the legacy multi-tab `SelectGalleryImage` component.
   - Added direct native file upload buttons and click-to-upload dropzones: clicking "Upload Image" triggers the system file chooser, uploads the image directly to `/api/v1/admin/media-assets/upload`, associates the ID to the destination, and immediately renders the live preview.
   - Added "Media Library" button to choose from existing assets via `MediaAssetPickerModal`.
   - Added instant preview cards displaying filename, dimensions, and remove actions.

## Verification Commands & Outputs
- **PHP Feature Tests**:
  ```bash
  php artisan test --filter=AdminDestinationCrudTest
  # PASS Tests\Feature\AdminDestinationCrudTest (5 passed, 25 assertions)
  ```

- **Frontend Asset Build**:
  ```bash
  npm run build
  # ✓ built in 14.90s (0 errors)
  ```
