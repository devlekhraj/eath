# Admin Media Manager Rebuild

**Date & Time**: 2026-09-12 20:25 NPT (UTC+05:45)  
**Author**: Antigravity Assistant  
**Status**: Completed  
**Phase**: Phase 07 (Media Manager: `media_assets`, `media_variants`, `media_attachments`)

---

## 1. Summary

Rebuilt the Admin Media Manager around the new database models (`media_assets`, `media_variants`, `media_attachments`) with full upload, SHA-1 deduplication, metadata editing, attachments management, and safe deletion.

- **Backend**:
  - Connected public storage symlink (`php artisan storage:link`) for direct web serving from `/storage/media/...`.
  - Updated `Admin\Models\MediaAsset` with `url` and `formatted_size` accessors, and relationships (`variants`, `attachments`).
  - Created `MediaAssetController`:
    - File upload handling (`mimes:jpeg,png,jpg,gif,svg,webp,avif` up to 25 MB).
    - SHA-1 hash deduplication preventing duplicate file uploads.
    - Automatic dimension extraction (`getimagesize`) and readable title generation.
    - Public disk storage in structured hashed subfolders (`media/{hash_prefix}/{filename}`).
    - Full CRUD endpoints: `index`, `show`, `upload`, `update`, `destroy` (with force-delete protection when attachments exist), `attach`, and `detach`.
    - Maintained backward-compatibility aliases for legacy `/admin/galleries` and `/admin/gallery-upload`.
  - Registered canonical API routes (`/admin/media-assets`, `/admin/media-assets/upload`, `/admin/media-assets/{id}/attach`, `/admin/media-attachments/{id}`).
- **Frontend API**:
  - Created `packages/admin/resources/admin/api/media-assets.api.ts` with typed interfaces (`MediaAssetItem`, `MediaVariantItem`, `MediaAttachmentItem`) and helper methods.
- **Frontend Views**:
  - Rebuilt `GalleryPage.vue` with:
    - Dynamic dual-view modes: **Grid View** (responsive card cards with aspect ratio, badges, and quick actions) and **Data Table View** (SN, preview thumbnail, title, dimensions, size, attachments count, uploaded date, actions).
    - Live text search across title, filename, alt text, and caption.
    - Upload button with modal dialog.
  - Created `MediaUploadModal.vue`:
    - Drag-and-drop zone with instant local preview, file size/dimension inspection, and SEO metadata inputs (title, alt text, caption).
  - Created `MediaDetailModal.vue`:
    - Full image preview, one-click public URL copy to clipboard, detailed technical file specs, and editable metadata.
  - Created `MediaDeleteModal.vue`:
    - Safeguard modal displaying thumbnail, usage count, and warning with force-delete checkbox.
  - Universal zero border-radius (`rounded-0 !important`), zero drop-shadows, and standard Vuetify colors.

---

## 2. Detailed Changes

### Backend
- `packages/admin/src/Models/MediaAsset.php`:
  - Added `$appends = ['url', 'formatted_size']`.
  - Added `variants()` and `attachments()` Eloquent relationships.
  - Added `getUrlAttribute()` and `getFormattedSizeAttribute()`.
- `packages/admin/src/Http/Controllers/Media/MediaAssetController.php`:
  - Complete REST controller handling uploads, content deduplication, metadata editing, attachments, and deletion safeguards.
- `packages/admin/routes/api.php`:
  - Registered canonical `/admin/media-assets` endpoints and backward-compatible `/admin/galleries` routes.

### Frontend
- `packages/admin/resources/admin/api/media-assets.api.ts`:
  - Typed API module with full CRUD and attachment methods.
- `packages/admin/resources/admin/pages/gallery/GalleryPage.vue`:
  - Responsive media browser supporting Grid and Table layouts.
- `packages/admin/resources/admin/pages/gallery/modal/MediaUploadModal.vue`:
  - Drag-and-drop file upload with live preview and title generation.
- `packages/admin/resources/admin/pages/gallery/modal/MediaDetailModal.vue`:
  - Media asset inspector with copy URL button and metadata updating.
- `packages/admin/resources/admin/pages/gallery/modal/MediaDeleteModal.vue`:
  - Deletion dialog with attachment warning and force-delete toggle.
- `packages/admin/resources/admin/router/index.ts`:
  - Added `/admin/media` route alias and updated route metadata.

---

## 3. Verification Commands & Outputs

1. **PHP Syntax Verification**:
   ```bash
   php -l packages/admin/src/Models/MediaAsset.php
   php -l packages/admin/src/Http/Controllers/Media/MediaAssetController.php
   php -l packages/admin/routes/api.php
   ```
   *Output*: All files passed without syntax errors.

2. **Live Image Upload & API Smoke Test**:
   - `POST /api/v1/admin/media-assets/upload`: Status 201 Created (Returned URL: `https://eathways.test/storage/media/ed/test-hero-image-ede82381.jpg`).
   - `PATCH /api/v1/admin/media-assets/{id}`: Status 200 OK.
   - `POST /api/v1/admin/media-assets/{id}/attach`: Status 201 Created.
   - `DELETE /api/v1/admin/media-attachments/{id}`: Status 200 OK.
   - `DELETE /api/v1/admin/media-assets/{id}`: Status 200 OK.

3. **Frontend Production Build**:
   ```bash
   npm run build
   ```
   *Output*: Build succeeded cleanly in 14.09s (`GalleryPage-rq30pkWm.js` 22.57 kB).

---

## 4. Next Steps

- Proceed to **Phase 08: Leads and Operations** (`inquiries`, `planner_submissions`, `newsletter_subscriptions`).
