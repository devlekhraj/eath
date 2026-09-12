# Standardize Modal Card Structure and Wrap Form Fields

## Summary
Standardized modal components across the Admin Panel to strictly adhere to the reference standard defined in `packages/admin/resources/admin/pages/journeys/modal/PackageAdd.vue`:
1. **Title**: `<v-card-title class="d-flex align-center justify-space-between py-0">` with clean `<span>` title text and compact close button `<v-btn icon variant="text" size="small" aria-label="Close dialog" @click="...">`.
2. **Top Divider**: Only one divider in the modal, placed directly below `<v-card-title>` (`<v-divider />`).
3. **Form Fields Margin**: Wrapped all modal form inputs (`<v-text-field>`, `<v-textarea>`, `<v-select>`, `<v-autocomplete>`, `<v-combobox>`, `<v-file-input>`, `<v-switch>`, `<v-checkbox>`) in `<div class="mb-2">`.
4. **Footer Divider**: Removed all dividers directly preceding or following `<v-card-actions>` (strictly zero dividers for footer actions).
5. **Footer Actions**: Standardized `<v-card-actions class="justify-end">` with text-variant Cancel button and primary/error action buttons.

## Detailed Changes
Applied standardization across 49 modal components:
- `components/ModalGallery.vue`: Wrapped form fields in `<div class="mb-2">`.
- `pages/articles/modal/ArticleAdd.vue`: Standardized title classes to `py-0`, removed footer `<v-divider />`, wrapped inputs in `<div class="mb-2">`, actions to `justify-end`.
- `pages/articles/modal/ArticleDelete.vue`: Standardized title to `py-0`, removed footer `<v-divider />`, actions to `justify-end`.
- `pages/articles/modal/CategoryDelete.vue`: Standardized title, removed footer divider, actions to `justify-end`.
- `pages/articles/modal/CategoryForm.vue`: Standardized title, removed footer divider, wrapped fields in `<div class="mb-2">`, actions to `justify-end`.
- `pages/destinations/modal/*`: Standardized `Form.vue`, `IncludeExcludeForm.vue`, `ItineraryForm.vue`, `ItineraryHighlightsForm.vue`, `ItineraryLookupForm.vue`, `PackageAdd.vue`, `PackageHighlightForm.vue`, `PackagePriceForm.vue`.
- `pages/experiences/modal/*`: Standardized `Form.vue`, `FormDelete.vue`.
- `pages/faqs/modal/*`: Standardized `FaqForm.vue`, `FaqDelete.vue`.
- `pages/guides/modal/*` & `pages/guides/tabs/modal/*`: Standardized `GuideForm.vue`, `ReviewForm.vue`, `TripForm.vue`.
- `pages/inquiries/modal/*`: Standardized `InquiryDeleteModal.vue`, `InquiryDetailModal.vue`.
- `pages/journey-departures/modal/FormAdd.vue`: Wrapped fields in `<div class="mb-2">`, standardized actions.
- `pages/journeys/form_section/modal/*`: Standardized `ConfirmDeleteModal.vue`, `EditFixedDepartureForm.vue`, `FixedDepartureForm.vue`.
- `pages/journeys/modal/*`: Standardized `CategoryForm.vue`, `IncludeExcludeForm.vue`, `ItineraryForm.vue`, `ItineraryHighlightsForm.vue`, `ItineraryLookupForm.vue`, `PackageAdd.vue`, `PackageHighlightForm.vue`, `PackagePriceForm.vue`.
- `pages/media-assets/modal/*`: Standardized `MediaDeleteModal.vue`, `MediaDetailModal.vue`, `MediaUploadModal.vue`.
- `pages/planner-submissions/modal/*`: Standardized `PlannerDeleteModal.vue`, `PlannerDetailModal.vue`.
- `pages/settings/modal/SettingForm.vue`: Wrapped form fields in `<div class="mb-2">`.
- `pages/travel-months/modal/Form.vue`: Standardized title to `py-0`, removed footer divider, wrapped fields, actions to `justify-end`.
- `pages/traveler-stories/modal/*`: Standardized `TravelerStoryDelete.vue`, `TravelerStoryForm.vue`.
- `pages/website-pages/modal/*`: Standardized `CategoryForm.vue`, `PageDelete.vue`, `PageForm.vue`.
- `pages/website-sections/modal/*`: Standardized `BannerImageForm.vue`, `BannerImageForm1.vue`, `WebsiteSectionDelete.vue`, `WebsiteSectionForm.vue`.

## Verification Commands & Outputs
Ran production Vite build:
```bash
cd /Volumes/TOSHIBA/Herd/eath/packages/admin && npm run build
```
Output:
```text
vite v6.3.5 building for production...
transforming...
✓ built in 18.33s
```
Result: 0 build or template compiler errors across all admin pages and modal components.

## Next Steps
- Continue frontend refinement per user design guidelines.
