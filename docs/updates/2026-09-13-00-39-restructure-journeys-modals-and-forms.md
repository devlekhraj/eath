# Restructure Journeys Modals and Form Sections

## Summary
Restructured the `pages/journeys` module to completely align with the database table naming (`journeys`), removed all legacy "package" naming, eliminated multi-level nested folders (`form_section/modal/` and `form_section/gallery_form/`), consolidated all modal dialogs into `pages/journeys/modal/`, and renamed form section components to use the standard `Journey*Form.vue` prefix.

## Detailed Changes

### 1. Unified Modals in `pages/journeys/modal/`
- Renamed legacy package modals:
  - `modal/PackageAdd.vue` ➔ `modal/JourneyAdd.vue`
  - `modal/PackageDelete.vue` ➔ `modal/JourneyDelete.vue`
  - `modal/PackageHighlightForm.vue` ➔ `modal/JourneyHighlightForm.vue`
  - `modal/PackagePriceDelete.vue` ➔ `modal/JourneyPriceDelete.vue`
  - `modal/PackagePriceForm.vue` ➔ `modal/JourneyPriceForm.vue`
- Flattened and moved departure modals from `form_section/modal/`:
  - `FixedDepartureForm.vue` ➔ `modal/DepartureForm.vue`
  - `EditFixedDepartureForm.vue` ➔ `modal/DepartureEditForm.vue`
  - `ConfirmDeleteModal.vue` ➔ `modal/DepartureDeleteModal.vue`
  - `utils.ts` ➔ `modal/utils.ts`
- Flattened and moved gallery modals from `form_section/gallery_form/`:
  - `SelectGalleryImage.vue` ➔ `modal/SelectGalleryImage.vue`
  - `SelectGalleryExisting.vue` ➔ `modal/SelectGalleryExisting.vue`
  - `SelectGalleryUpload.vue` ➔ `modal/SelectGalleryUpload.vue`
  - `FormGalleryUpdate.vue` ➔ `modal/FormGalleryUpdate.vue`
  - `FormImageDelete.vue` ➔ `modal/FormImageDelete.vue`

### 2. Standardized Form Sections in `pages/journeys/form_section/`
Renamed components to consistently reflect the Journey domain:
- `FormOverview.vue` ➔ `JourneyOverviewForm.vue`
- `FormDescription.vue` ➔ `JourneyDescriptionForm.vue`
- `FormPackageItinery.vue` ➔ `JourneyItineraryForm.vue`
- `FormInclude.vue` ➔ `JourneyIncludeForm.vue`
- `FormHighlights.vue` ➔ `JourneyHighlightsForm.vue`
- `FormPackageGallery.vue` ➔ `JourneyGalleryForm.vue`
- `FormPackageBanner.vue` ➔ `JourneyBannerForm.vue`
- `FormPricing.vue` ➔ `JourneyPricingForm.vue`
- `FormFixedDeparture.vue` ➔ `JourneyFixedDepartureForm.vue`
- Removed obsolete files and backups: `FormRight.vue`, `FormPackageGallery-backup.vue`, `FormPackageGallery1.vue`.

### 3. Cleaned Legacy Leftovers in `pages/destinations/`
- Removed orphaned `pages/destinations/form_section/` directory.
- Removed legacy package modals from `pages/destinations/modal/` (`PackageAdd.vue`, `PackageDelete.vue`, `PackageHighlightForm.vue`, `PackagePriceDelete.vue`, `PackagePriceForm.vue`, `ItineraryForm.vue`, etc.).
- Removed dead legacy store `stores/travel_package.js`.

### 4. Updated Consumer Imports
- Updated `JourneyPage.vue` to import `JourneyAdd.vue` and `JourneyDelete.vue`.
- Updated `JourneyForm.vue` to import all standardized `Journey*Form.vue` components.
- Updated `JourneyFixedDepartureForm.vue` to import from `../modal/`.
- Updated `JourneyGalleryForm.vue` to import from `../modal/`.
- Updated `JourneyHighlightsForm.vue` and `JourneyPricingForm.vue` to import renamed modal components.

## Verification Commands & Outputs
Ran full Vite build:
```bash
cd /Volumes/TOSHIBA/Herd/eath/packages/admin && npm run build
```
Output:
```text
vite v6.3.5 building for production...
transforming...
✓ 583 modules transformed.
✓ built in 12.04s
```
Result: 0 compiler or resolution errors.

## Next Steps
- Continue frontend enhancements maintaining strict adherence to current database table conventions.
