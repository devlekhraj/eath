# Remove Slug Columns and Unstack Table Columns Across All Tables

## Summary
Audited and updated all `<v-data-table>` and `<v-data-table-server>` components across the admin panel to strictly adhere to the project's "One Data Point Per Column" and slug removal policy:
1. **Zero Slug Columns**: Removed `slug` column headers and template slots from all data tables (`ExperiencePage.vue`, `DestinationPage.vue`, `ArticleCategoryPage.vue`, `WebsitePage.vue`). Slugs are internal identifiers/URLs and are not displayed as table columns.
2. **One Data Point Per Column**: Unstacked multi-line information in table columns:
   - In `ExperiencePage.vue`, removed `item.summary` stacked under `item.name`. The column now cleanly displays only the experience name.
   - In `MediaAssetPage.vue`, unstacked filename under title and renamed column header from `Title & Filename` to `Title`.
   - In gallery tables (`TabImages.vue`, `TabGallery.vue`, `JourneyGalleryForm.vue`, `WebsiteSectionDetailPage.vue`), simplified the `size` slot to a single clean data point (`formatDimensions(item)`), eliminating vertical stacking of aspect ratio beneath dimensions.

## Detailed Changes

### 1. `pages/experiences/ExperiencePage.vue`
- Removed `{ title: 'Slug', key: 'slug', sortable: false }` from `headers`.
- Removed `<template #item.slug="{ item }">`.
- In `<template #item.name="{ item }">`, removed the nested `item.summary` element, displaying strictly the experience name link.

### 2. `pages/destinations/DestinationPage.vue`
- Removed `{ title: 'Slug', key: 'slug', sortable: false }` from `headers`.
- Removed `<template #item.slug="{ item }">` and removed unused `publicBaseUrl` variable.

### 3. `pages/articles/ArticleCategoryPage.vue`
- Removed `{ title: 'URL Slug', key: 'slug', sortable: false }` from `headers`.
- Removed `<template #item.slug="{ item }">`.

### 4. `pages/website-pages/WebsitePage.vue`
- Removed `{ title: 'Slug', key: 'slug', sortable: false }` from `headers`.
- Removed `<template #item.slug="{ item }">`.

### 5. `pages/media-assets/MediaAssetPage.vue`
- Renamed table header `Title & Filename` to `Title`.
- Unstacked `item.filename` from under `item.title`, displaying a single clean title/filename entry.

### 6. Gallery Tables (`TabImages.vue`, `TabGallery.vue`, `JourneyGalleryForm.vue`, `WebsiteSectionDetailPage.vue`)
- Unstacked dimensions and aspect ratio in `<template #item.size>`, displaying only dimensions.

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
✓ built in 17.66s
```
Result: 0 errors across all Vue pages and compiled assets.

## Next Steps
- Maintain strict "One Data Point Per Column" and no-slug table standards on all future admin tables.
