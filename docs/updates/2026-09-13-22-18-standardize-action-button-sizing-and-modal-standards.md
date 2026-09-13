# Standardize Action Button Sizing & Modal Standards

**Timestamp:** 2026-09-13 22:18 (Nepal Time / NPT / UTC+05:45)

## Summary
- Documented the strict button sizing rule in `admin-style.md` and `docs/admin-style.md`: all action buttons across toolbars, forms, card actions, and dialogs must use standard default Vuetify sizing (never `size="small"`).
- Documented modal dialog formatting rules: `<v-card-title class="d-flex align-center justify-space-between py-0">`, form inputs wrapped in `<div class="mb-2">`, and `<v-card-actions class="justify-end">` without `<v-spacer />`.
- Cleaned up action buttons, anti-patterns, and modal action layouts across:
  - `admin-style.md` & `docs/admin-style.md`
  - `packages/admin/resources/admin/pages/destinations/detail_tabs/TabMedia.vue`
  - `packages/admin/resources/admin/pages/destinations/DestinationDetailPage.vue`
  - `packages/admin/resources/admin/pages/destinations/DestinationPage.vue`
  - `packages/admin/resources/admin/pages/destinations/modal/Form.vue`
  - `packages/admin/resources/admin/pages/destinations/modal/FormDelete.vue`
  - `packages/admin/resources/admin/pages/media-assets/modal/MediaUploadModal.vue`
  - `packages/admin/resources/admin/pages/media-assets/modal/MediaDetailModal.vue`
  - `packages/admin/resources/admin/components/media/MediaAssetPickerModal.vue`

## Detailed Changes

### Documentation (`admin-style.md` & `docs/admin-style.md`)
- **Section 5 (Buttons)**: Added explicit rule: "No `size="small"` for Action Buttons". Action buttons (page headers, toolbar actions, card action bars, form submit/save buttons, modal/drawer action buttons) must use standard default Vuetify sizing. Only compact inline table row actions or modal header close icon buttons may use small sizing.
- **Section 7 (Modal & Dialog Standards)**: Documented that modal action buttons must use default sizing and must sit together right-aligned (`class="justify-end"`) without `<v-spacer />`.
- **Section 8 (Anti-Patterns Checklist)**: Added entries discouraging `size="small"` on action buttons, `variant="flat"`, and `<v-spacer />` separating modal action buttons.

### Components & Modals
- `TabMedia.vue`: Standardized primary upload and action buttons to `variant="elevated"` (avoiding `variant="flat"`).
- `DestinationDetailPage.vue`: Removed `size="small"` from "Back to Destinations" navigation action button.
- `DestinationPage.vue`: Removed anti-pattern `class="elevation-0"` from `<v-data-table>` and upgraded "Add Destination" button to `variant="elevated"`.
- `Form.vue`: Changed Save button variant from `flat` to `elevated`.
- `FormDelete.vue`: Fixed target endpoint from `/admin/package-categories/...` to `/admin/destinations/...`, displayed destination name (`item.name || item.title`), and emitted `saved` on success.
- `MediaUploadModal.vue`: Removed `size="small"` from "Browse File" button, removed redundant `class="mb-2"` from inputs (since they are wrapped in `<div class="mb-2">`), and removed `<v-spacer />` from `<v-card-actions>`.
- `MediaDetailModal.vue`: Removed `<v-spacer />` from `<v-card-actions class="justify-end">`, removed redundant `class="mb-3"` from inputs, and streamlined copy URL text field container.
- `MediaAssetPickerModal.vue`: Removed `size="small"` from empty-state "Upload Image Now" button.

## Verification Commands & Outputs

```bash
npm run build
```
Output:
```text
vite v6.3.5 building for production...
transforming...
✓ built in 14.64s
```

```bash
php artisan test --filter=AdminDestinationCrudTest
```
Output:
```text
PASS  Tests\Feature\AdminDestinationCrudTest
✓ can list destinations                                                2.42s  
✓ can create destination with full logistics and seo                   0.11s  
✓ can update destination and associate images                          0.15s  
✓ can show destination with eager loaded images                        0.02s  
✓ can delete destination                                               0.02s  
✓ destination update creates polymorphic media attachments             0.02s  
✓ can attach and detach gallery media to destination                   0.05s  
✓ cannot attach duplicate media to gallery                             0.02s  

Tests:    8 passed (39 assertions)
Duration: 3.35s
```

## Next Steps
- Continue applying modal standards and action button sizing rules consistently in any new or touched admin views.
