# Table Column Styling & Action Buttons Standardization

**Date**: 2026-09-13 00:04 NPT (UTC+05:45)
**Type**: UI/UX Standardization & Global CSS Optimization
**Scope**: All Admin `v-data-table` & `v-data-table-server` components

---

## Summary

1. **Global CSS for Table Cells (`white-space: nowrap`)**:
   - Added `white-space: nowrap;` to `.v-data-table td, .v-data-table-server td, tbody td` inside [admin.scss](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/admin.scss).
   - Eliminated redundant `style="min-width: max-content;"` inline styles across all `.vue` table template cells.

2. **Action Buttons Standardization**:
   - Migrated all action buttons in table `#item.actions` templates from icon-only buttons (`size="x-small" icon variant="tonal"`) to labeled text buttons:
     - `size="small"`
     - `variant="outlined"`
     - Start icon (`<v-icon start size="14">...`) + action label (`View`, `Edit`, `Delete`, `Copy`, `Bookings`)
   - Adjusted column widths for sticky actions columns across pages (e.g. `160px` to `230px`) to cleanly fit labeled buttons.

---

## Files Updated

- [admin.scss](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/admin.scss)
- [PlannerSubmissionPage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/planner-submissions/PlannerSubmissionPage.vue)
- [GeneralSettingPage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/settings/GeneralSettingPage.vue)
- [TravelerStoryPage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/traveler-stories/TravelerStoryPage.vue)
- [InquiryPage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/inquiries/InquiryPage.vue)
- [DestinationPage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/destinations/DestinationPage.vue)
- [TabGallery.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/destinations/detail_tabs/TabGallery.vue)
- [MediaAssetPage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/media-assets/MediaAssetPage.vue)
- [ArticleCategoryPage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/articles/ArticleCategoryPage.vue)
- [ArticlePage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/articles/ArticlePage.vue)
- [TabImages.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/articles/detail_tabs/TabImages.vue)
- [WebsiteSectionDetailPage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/website-sections/WebsiteSectionDetailPage.vue)
- [WebsiteSectionPage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/website-sections/WebsiteSectionPage.vue)
- [NewsletterSubscriptionPage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/newsletter-subscriptions/NewsletterSubscriptionPage.vue)
- [FaqPage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/faqs/FaqPage.vue)
- [JourneyDeparturePage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/journey-departures/JourneyDeparturePage.vue)
- [ExperiencePage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/experiences/ExperiencePage.vue)
- [WebsitePage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/website-pages/WebsitePage.vue)
- [TravelMonthPage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/travel-months/TravelMonthPage.vue)
- [GuidePage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/guides/GuidePage.vue)
- [JourneyPage.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/journeys/JourneyPage.vue)
- [FormFixedDeparture.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/journeys/form_section/FormFixedDeparture.vue)
- [FormPackageGallery.vue](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/journeys/form_section/FormPackageGallery.vue)

---

## Verification

```bash
cd packages/admin && npm run build
# ✓ built in 8.44s (exit code 0, 0 errors)
```
