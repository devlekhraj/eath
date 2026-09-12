# Wrap All Form Input Fields Across Detail Tabs and Form Sections in mb-2

## Summary
Completed comprehensive wrapping of all form inputs across detail tabs, form sections, and standalone form components in `<div class="mb-2">`.
As specified by the user:
- Every input field across all form components, detail tabs, and modal forms must be wrapped inside `<div class="mb-2">`.
- The only exception is `<v-card>` containers that contain a `<v-data-table>` / `<v-data-table-server>` (such as table search bars and filter dropdowns in table toolbars/`#top`), which remain unwrapped to preserve horizontal toolbar alignment.

Additionally:
- Cleaned up `TabJourneys.vue`: wrapped autocomplete in `<div class="mb-2">`, removed internal `slug` column and hardcoded `width` styles on table headers.
- Removed duplicated/orphaned gallery form folders (`pages/destinations/detail_tabs/gallery_form` and `pages/website-sections/gallery_form`), routing all gallery operations through `@components/gallery/`.

## Detailed Changes

### 1. `pages/journeys/form_section/JourneyOverviewForm.vue`
- Wrapped every form input and switch inside `<div class="mb-2">` across all columns:
  - `name`, `slug`, `subtitle`, `summary`
  - `destination_id`, `guide_id`
  - `experience_ids`, `travel_month_ids`
  - `duration_days`, `duration_nights`, `price`, `pricing_basis`
  - `max_altitude_m`, `walking_hours_min`, `walking_hours_max`, `featured_rank`
  - `difficulty`, `accommodation_style`, `pace`
  - `is_active`, `is_featured`, `is_published`

### 2. Form Sections & Tab Forms
- `pages/journeys/form_section/JourneyBannerForm.vue`: wrapped `v-file-input` in `<div class="mb-2">`.
- `pages/articles/detail_tabs/TabSeo.vue`: wrapped `meta_title` and `meta_description` in `<div class="mb-2">`.
- `pages/articles/detail_tabs/TabOverview.vue`: wrapped `title`, `slug`, `summary`, `category_id`, `author`, `is_active`, `is_published`, `is_featured` in `<div class="mb-2">`.
- `pages/articles/detail_tabs/TabSections.vue`: wrapped `heading`, `sort_order`, and `SummarnoteEditor` in `<div class="mb-2">`; removed bottom dialog divider.
- `pages/articles/detail_tabs/TabJourneys.vue`: wrapped `selectedJourneyIds` autocomplete in `<div class="mb-2">`; removed `slug` column and header widths from associated trips table.
- `pages/website-pages/WebsitePageDetail.vue`: wrapped section dialog `heading`, `sort_order`, and `SummarnoteEditor` in `<div class="mb-2">`; removed font-weight from label and bottom divider.
- `pages/newsletter-subscriptions/NewsletterSubscriptionPage.vue`: wrapped quick-add `email` and `name` inputs in `<div class="mb-2">`; removed bottom dialog divider.
- `components/InputFile.vue`: wrapped `v-file-input` in `<div class="mb-2">`.

### 3. Gallery Forms Standardization & Duplicate Cleanup
- Standardized `mb-3` to `mb-2` across `components/gallery/SelectGalleryUpload.vue`, `components/gallery/SelectGalleryExisting.vue`, `components/gallery/FormGalleryUpdate.vue`, `pages/journeys/modal/SelectGalleryUpload.vue`, and `pages/journeys/modal/SelectGalleryExisting.vue`.
- Deleted duplicate/orphaned directories:
  - `pages/destinations/detail_tabs/gallery_form/`
  - `pages/website-sections/gallery_form/`
- Updated `WebsiteSectionDetailPage.vue` to import directly from `@components/gallery/`.

## Verification Commands & Outputs
Ran full Vite build:
```bash
cd /Volumes/TOSHIBA/Herd/eath/packages/admin && npm run build
```

## Next Steps
- Continue applying `<div class="mb-2">` to all form inputs across new administrative form views.
