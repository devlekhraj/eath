# Centralize All Admin Modal Forms to modal-form/*

**Date & Time**: 2026-09-14 14:55 (NPT / UTC+05:45)
**Scope**: `packages/admin/resources/admin/modal-form/*`, `packages/admin/resources/admin/pages/*`

## Summary
Centralized all modal form components across the Admin panel into a single structured directory: `packages/admin/resources/admin/modal-form/<domain>/`. Cleaned up duplicate/scattered `modal/` directories across all entity pages and updated all import statements throughout the application to reference `@/modal-form/<domain>/<Component>.vue`.

## Detailed Changes

1. **Central Directory Structure**:
   - Created `packages/admin/resources/admin/modal-form/` with domain-scoped subdirectories:
     - `articles/` (`ArticleAdd.vue`, `ArticleDelete.vue`, `ArticleSectionModal.vue`, `CategoryForm.vue`, `CategoryDelete.vue`)
     - `destinations/` (`Form.vue`, `FormDelete.vue`)
     - `experiences/` (`Form.vue`, `FormDelete.vue`)
     - `faqs/` (`FaqForm.vue`, `FaqDelete.vue`)
     - `guides/` (`GuideForm.vue`, `GuideDeleteForm.vue`, `ModalBioForm.vue`, `ReviewForm.vue`, `TripForm.vue`)
     - `inquiries/` (`InquiryDetailModal.vue`, `InquiryDeleteModal.vue`)
     - `journey-departures/` (`FormAdd.vue`, `FormDelete.vue`)
     - `journeys/` (`JourneyAdd.vue`, `JourneyDelete.vue`, `DepartureForm.vue`, `DepartureEditForm.vue`, `DepartureDeleteModal.vue`, `ItineraryForm.vue`, `ItineraryHighlightsForm.vue`, `JourneyHighlightForm.vue`, `JourneyPriceForm.vue`, `JourneyPriceDelete.vue`, `SelectGalleryImage.vue`, `SelectGalleryExisting.vue`, `SelectGalleryUpload.vue`, `FormGalleryUpdate.vue`, `FormImageDelete.vue`, `IncludeExcludeForm.vue`, `DeleteIncludeItem.vue`, `DeleteImage.vue`)
     - `media/` (`MediaDetailModal.vue`, `MediaDeleteModal.vue`, `MediaUploadModal.vue`, `MediaAssetPickerModal.vue`, `MediaAttachmentEditModal.vue`, `MediaAttachmentDeleteModal.vue`)
     - `newsletter-subscriptions/` (`SubscriberForm.vue`, `SubscriberDelete.vue`)
     - `planner-submissions/` (`PlannerDetailModal.vue`, `PlannerDeleteModal.vue`)
     - `settings/` (`SettingForm.vue`, `SettingDelete.vue`)
     - `travel-months/` (`Form.vue`)
     - `traveler-stories/` (`TravelerStoryForm.vue`, `TravelerStoryDelete.vue`)
     - `website-pages/` (`PageForm.vue`, `PageDelete.vue`, `CategoryForm.vue`, `CategoryDelete.vue`)
     - `website-sections/` (`WebsiteSectionForm.vue`, `WebsiteSectionDelete.vue`, `BannerImageForm.vue`, `BannerImageForm1.vue`, `DeleteImage.vue`)

2. **Updated Import Statements**:
   - Updated all parent list pages, detail pages, tabs, and form sections to import directly via `@/modal-form/<domain>/...`.
   - Removed obsolete empty `pages/*/modal/` and `components/media/` directories.

3. **GlobalModal Compatibility**:
   - Confirmed all modals comply with the global programmatic modal system (`useGlobalModal()`), with zero standalone `<v-dialog>` markup outside of `GlobalModalHost.vue`.

## Verification Commands & Outputs
- `npm run build` completed cleanly in 21.37s with 0 errors (Exit Code 0).
- `php artisan test --filter=AdminWebsitePageCrudTest` passed all 5 test cases and 38 assertions (Exit Code 0).
- `grep -rnE "(modal/|components/media)" packages/admin/resources/admin/` returned 0 occurrences of deprecated relative import paths.

## Next Steps
- Continue frontend enhancements as requested by user.
