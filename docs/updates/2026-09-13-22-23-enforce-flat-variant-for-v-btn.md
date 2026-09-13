# Enforce Flat Variant for v-btn (Never Use Elevated)

**Timestamp:** 2026-09-13 22:23 (Nepal Time / NPT / UTC+05:45)

## Summary
- Established a project-wide rule in `admin-style.md`, `docs/admin-style.md`, `docs/modal.md`, and `.agents/rules/modal.md`: **Never use `elevated`; use `variant="flat"` instead for `<v-btn>` filled action and submit buttons**.
- Eliminated all occurrences of `variant="elevated"` across all admin panel views, modals, and components, replacing them with `variant="flat"`.

## Detailed Changes

### Documentation Standards
- **[`admin-style.md`](file:///Volumes/TOSHIBA/Herd/eath/admin-style.md) & [`docs/admin-style.md`](file:///Volumes/TOSHIBA/Herd/eath/docs/admin-style.md)**:
  - **Section 5 (Buttons)**: Updated Rule 2: Primary submit / call-to-action: `color="primary" variant="flat"` (**CRITICAL: Never use `elevated`; use `variant="flat"` instead of `elevated` for `<v-btn>`**).
  - **Section 7 (Modal & Dialog Standards)**: Updated dialog template example to `<v-btn color="primary" variant="flat" ...>`.
  - **Section 8 (Anti-Patterns Checklist)**: Added anti-pattern: `<v-btn variant="elevated">` &rarr; `<v-btn variant="flat">`.
- **[`docs/modal.md`](file:///Volumes/TOSHIBA/Herd/eath/docs/modal.md) & [`.agents/rules/modal.md`](file:///Volumes/TOSHIBA/Herd/eath/.agents/rules/modal.md)**:
  - Updated standard modal action button templates to `variant="flat"`.
  - Added explicit rule: "Never use elevated; use variant='flat' instead of elevated for `<v-btn>`."

### Components Updated to `variant="flat"`
- `packages/admin/resources/admin/pages/destinations/modal/Form.vue`: Changed Save button from `elevated` to `flat`.
- `packages/admin/resources/admin/pages/destinations/DestinationPage.vue`: Changed "Add Destination" button to `variant="flat"`.
- `packages/admin/resources/admin/pages/destinations/detail_tabs/TabMedia.vue`: Standardized Hero, Card thumbnail, and Gallery upload buttons to `variant="flat"`.
- `packages/admin/resources/admin/pages/media-assets/MediaAssetPage.vue`: Changed top upload buttons to `variant="flat"`.
- `packages/admin/resources/admin/pages/media-assets/modal/MediaUploadModal.vue`: Changed preview clear and Upload Media buttons to `variant="flat"`.
- `packages/admin/resources/admin/pages/media-assets/modal/MediaDetailModal.vue`: Changed Save button to `variant="flat"`.
- `packages/admin/resources/admin/pages/media-assets/modal/MediaDeleteModal.vue`: Changed Delete button to `variant="flat"`.
- `packages/admin/resources/admin/pages/faqs/FaqPage.vue` & `modal/FaqForm.vue` & `modal/FaqDelete.vue`: Replaced `variant="elevated"` with `variant="flat"`.
- `packages/admin/resources/admin/pages/website-sections/WebsiteSectionPage.vue` & `modal/WebsiteSectionForm.vue` & `modal/WebsiteSectionDelete.vue`: Replaced `variant="elevated"` with `variant="flat"`.
- `packages/admin/resources/admin/pages/newsletter-subscriptions/NewsletterSubscriptionPage.vue`: Replaced all `variant="elevated"` buttons with `variant="flat"`.
- `packages/admin/resources/admin/pages/inquiries/modal/InquiryDetailModal.vue` & `InquiryDeleteModal.vue`: Replaced `variant="elevated"` with `variant="flat"`.
- `packages/admin/resources/admin/pages/planner-submissions/modal/PlannerDetailModal.vue` & `PlannerDeleteModal.vue`: Replaced `variant="elevated"` with `variant="flat"`.

## Verification Commands & Outputs

```bash
npm run build
```
Output:
```text
vite v6.3.5 building for production...
transforming...
✓ built in 16.19s
```

```bash
php artisan test --filter=AdminDestinationCrudTest
```
Output:
```text
PASS  Tests\Feature\AdminDestinationCrudTest
✓ can list destinations                                                2.72s  
✓ can create destination with full logistics and seo                   0.12s  
✓ can update destination and associate images                          0.15s  
✓ can show destination with eager loaded images                        0.02s  
✓ can delete destination                                               0.02s  
✓ destination update creates polymorphic media attachments             0.02s  
✓ can attach and detach gallery media to destination                   0.05s  
✓ cannot attach duplicate media to gallery                             0.03s  

Tests:    8 passed (39 assertions)
Duration: 3.81s
```

## Next Steps
- Strictly ensure all future `<v-btn>` filled buttons use `variant="flat"`, never `elevated`.
