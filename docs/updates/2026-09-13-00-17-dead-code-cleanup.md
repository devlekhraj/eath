# Dead Code & Unused Functions Cleanup Across Admin Vue Files

**Date**: 2026-09-13 00:17 NPT (UTC+05:45)
**Type**: Code Cleanliness & Ponytail Compliance
**Scope**: Admin Panel Vue Components

---

## Summary

Scanned all admin `*.vue` files for uncalled functions, unused event handlers, and orphan imports according to the Ponytail Coding Principles ("Prefer deletion over unnecessary addition", "No dead code").

---

## Changes

1. **[JourneyPage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/journeys/JourneyPage.vue)**:
   - Removed uncalled functions: `toggleActive()` and `togglePublished()`.
   - Removed unused imports: `toggleJourneyActive`, `toggleJourneyPublish`, `computed`, `formatDateTime`.

2. **[ArticlePage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/articles/ArticlePage.vue)**:
   - Removed uncalled functions: `toggleActive()` and `togglePublished()`.
   - Removed unused imports: `toggleArticleActiveApi`, `toggleArticlePublishApi`.

3. **Gallery Update Forms (Duplicate/Orphaned Helpers)**:
   - Removed unused `slugifyName()` helper across 4 duplicate form components:
     - `components/gallery/FormGalleryUpdate.vue`
     - `pages/destinations/detail_tabs/gallery_form/FormGalleryUpdate.vue`
     - `pages/journeys/form_section/gallery_form/FormGalleryUpdate.vue`
     - `pages/website-sections/gallery_form/FormGalleryUpdate.vue`

4. **[FormHighlights.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/destinations/form_section/FormHighlights.vue)**:
   - Removed dead/orphaned `handleSubmit()` and `deleteItem()` (modal-based operations handled by separate modal components).

5. **[FormAdd.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/journey-departures/modal/FormAdd.vue)**:
   - Removed unused `onSlugInput()` and unused `slugEdited` ref.

---

## Verification

```bash
cd packages/admin && npm run build
# ✓ built in 18.12s (exit code 0, 0 errors)
```
