# Centralize Utils, Remove Font-Weight From Table Cells, and Wrap All Form Inputs in mb-2

## Summary
Completed three major standards enforcements across the Admin Panel:
1. **Centralized Reusable Helpers in Universal `utils.ts`**:
   - Added `formatHuman`, `formatYmd`, and `getStatusColor` to the single source of truth [`packages/admin/resources/admin/utils/utils.ts`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/utils/utils.ts).
   - Removed local redundant `utils.ts` from `pages/journeys/modal/utils.ts`.
   - Replaced all local/inconsistent status color functions (`getStatusColor`, `statusColor`, `getDepartureStatusColor`, `getLeadStatusColor`) across `JourneyFixedDepartureForm.vue`, `PlannerSubmissionPage.vue`, `GuidePage.vue`, `GuideDetailPage.vue`, `InquiryPage.vue`, `JourneyDeparturePage.vue`, and `DashboardPage.vue` with universal theme-compliant mapping from `utils.ts`.
2. **Zero Bold / Font-Weight in Table Columns**:
   - Strictly enforced the Table Cell Typography rule across all tables (`<v-table>`, `<v-data-table>`, `<v-data-table-server>`).
   - Removed all `font-weight-medium` and `font-weight-bold` utility classes from table cell links, chips, and sub-table headers in `DestinationPage.vue`, `ExperiencePage.vue`, `TravelMonthPage.vue`, `JourneyFixedDepartureForm.vue`, and `JourneyIncludeForm.vue`. Regular table cells maintain default font weight while preserving color classes.
3. **Wrap Every Form Input in `<div class="mb-2">` inside `<v-form>`**:
   - Audited all files containing `<v-form>`.
   - Wrapped all input components (`<v-text-field>`, `<v-textarea>`, `<v-select>`, `<v-file-input>`, `<v-switch>`) inside `<div class="mb-2">` across `LoginPage.vue`, `TabSeo.vue`, `TabOverview.vue`, `ArticleForm.vue`, `WebsitePageDetail.vue`, `JourneyIncludeForm.vue`, and `JourneyPricingForm.vue`.

## Detailed Changes

### 1. `packages/admin/resources/admin/utils/utils.ts`
- Added universal `getStatusColor` mapping status keys (`open`, `active`, `published`, `replied`, `limited`, `filling_fast`, `reviewing`, `guaranteed`, `full`, `cancelled`, `new`, `closed`, `inactive`, `completed`) to standard Vuetify colors (`success`, `warning`, `info`, `error`, `secondary`, `primary`).
- Added `formatHuman` and `formatYmd` helpers.

### 2. Status Color Refactoring & Elimination of Redundant Files
- Deleted redundant `pages/journeys/modal/utils.ts`.
- `pages/journeys/modal/DepartureForm.vue`: updated import to `@/utils/utils`.
- `pages/journeys/modal/DepartureEditForm.vue`: updated import to `@/utils/utils`.
- `pages/journeys/form_section/JourneyFixedDepartureForm.vue`: imported `formatHuman` and `getStatusColor` from `@/utils/utils`; deleted local `getStatusColor`.
- `pages/planner-submissions/PlannerSubmissionPage.vue`: imported `getStatusColor` from `@/utils/utils`; deleted local `getStatusColor`.
- `pages/guides/GuidePage.vue`: imported `getStatusColor` from `@/utils/utils`; deleted local `getStatusColor` with arbitrary color strings.
- `pages/guides/GuideDetailPage.vue`: imported `getStatusColor` from `@/utils/utils`; deleted local `statusColor`.
- `pages/inquiries/InquiryPage.vue`: imported `getStatusColor` from `@/utils/utils`; deleted local `getStatusColor`.
- `pages/journey-departures/JourneyDeparturePage.vue`: imported `getStatusColor` from `@/utils/utils`; deleted local `statusColor`.
- `pages/dashboard/DashboardPage.vue`: imported `getStatusColor` from `@/utils/utils`; deleted local `getDepartureStatusColor` and `getLeadStatusColor`.

### 3. Font-Weight Removal in Table Cells
- `pages/destinations/DestinationPage.vue`: removed `font-weight-medium` from name link and `is_active` chip.
- `pages/experiences/ExperiencePage.vue`: removed `font-weight-medium` from `is_featured` and `is_active` chips.
- `pages/travel-months/TravelMonthPage.vue`: removed `font-weight-medium` from name link, `season` chip, and `is_active` chip.
- `pages/journeys/form_section/JourneyFixedDepartureForm.vue`: removed `font-weight-medium` from status chip and `font-weight-bold` from nested traveler table `<th>` tags.
- `pages/journeys/form_section/JourneyIncludeForm.vue`: removed `font-weight-medium` from item title divs.

### 4. Input Field Wrapping inside `<v-form>`
- `pages/auth/LoginPage.vue`: wrapped username and password text fields in `<div class="mb-2">`.
- `pages/destinations/detail_tabs/TabSeo.vue`: wrapped all SEO fields in `<div class="mb-2">`.
- `pages/destinations/detail_tabs/TabOverview.vue`: wrapped all overview text fields, switches, and textareas in `<div class="mb-2">`.
- `pages/articles/ArticleForm.vue`: encapsulated full layout inside `<v-form>` and wrapped all inputs in `<div class="mb-2">`.
- `pages/website-pages/WebsitePageDetail.vue`: wrapped all overview inputs in `<div class="mb-2">`.
- `pages/journeys/form_section/JourneyIncludeForm.vue`: wrapped title input and excluded switch in `<div class="mb-2">`.
- `pages/journeys/form_section/JourneyPricingForm.vue`: wrapped price name and price inputs in `<div class="mb-2">`.

## Verification Commands & Outputs
Ran full Vite build:
```bash
cd /Volumes/TOSHIBA/Herd/eath/packages/admin && npm run build
```
Output:
```text
vite v6.3.5 building for production...
transforming...
✓ 844 modules transformed.
✓ built in 11.13s
```
Result: 0 errors across all components.

## Next Steps
- Continue adhering to the universal `utils.ts` single source of truth for all formatting and color resolving across any new admin pages.
