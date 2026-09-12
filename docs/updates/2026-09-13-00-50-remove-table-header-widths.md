# Remove Hardcoded Table Header Widths Across Admin Tables

## Summary
Removed all hardcoded `width: '...'` definitions from table header arrays and inline `style="width: ..."` from `<th>` and `<td>` elements across all admin pages and tables.
Global admin styling in `admin.scss` enforces:
```scss
td, .v-data-table__td, tbody td {
    font-size: 0.82rem !important;
    font-weight: 400 !important;
    white-space: nowrap;
}
```
Because `white-space: nowrap` is applied globally to all table cells and actions columns are pinned via sticky positioning, tables naturally size their columns to content width. Hardcoded widths across columns introduced artificial constraints, horizontal truncation, and layout inconsistencies.

## Detailed Changes

### 1. Stripped `width` from Header Definitions across 16 Page Files
Removed all instances of `width: '...'` (e.g. `width: '50px'`, `width: '80px'`, `width: '130px'`, `width: '200px'`, etc.) from `headers = [...]` and `tableHeaders = [...]`:
- `pages/articles/ArticleCategoryPage.vue`
- `pages/articles/ArticlePage.vue`
- `pages/destinations/DestinationPage.vue`
- `pages/experiences/ExperiencePage.vue`
- `pages/faqs/FaqPage.vue`
- `pages/guides/GuidePage.vue`
- `pages/inquiries/InquiryPage.vue`
- `pages/journey-departures/JourneyDeparturePage.vue`
- `pages/journeys/JourneyPage.vue`
- `pages/media-assets/MediaAssetPage.vue`
- `pages/newsletter-subscriptions/NewsletterSubscriptionPage.vue`
- `pages/planner-submissions/PlannerSubmissionPage.vue`
- `pages/travel-months/TravelMonthPage.vue`
- `pages/traveler-stories/TravelerStoryPage.vue`
- `pages/website-pages/WebsitePage.vue`
- `pages/website-sections/WebsiteSectionPage.vue`

### 2. Stripped Inline Width Styling from `<th>` Elements in Standard `<v-table>` Views
- `pages/website-pages/WebsitePageDetail.vue`: Removed `style="width: 80px;"` from Order header and `style="width: 120px;"` from Actions header; removed unnecessary `class="border"` on `<v-table>`.
- `pages/dashboard/DashboardPage.vue`: Removed `style="width: 50px;"` and `style="width: 100px;"` from SN and Status table headers across Upcoming Departures, Recent Planner Submissions, and Recent Inquiries tables.

### 3. Cleaned Redundant `style="min-width: ..."` on `<td>`
- `pages/journeys/form_section/JourneyFixedDepartureForm.vue`: Cleaned inline minimum widths on departure table data cells.

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
✓ built in 17.51s
```
Result: 0 errors.

## Next Steps
- Maintain zero hardcoded table header widths in all future tables, allowing `admin.scss` global typography and whitespace rules to naturally govern table layout.
