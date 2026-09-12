# 2026-09-12 19:23 NPT - Admin Navigation Vocabulary Baseline

## Summary
- Updated the Vue admin shell to use the new website database vocabulary.
- Added new route names for the rebuilt admin modules while keeping legacy route aliases available during the phased CRUD rebuild.
- Updated the dashboard labels and links so the admin UI now speaks in terms of journeys, departures, planner submissions, articles, destinations, experiences, media, and website settings.

## Files Changed
- `packages/admin/resources/admin/router/index.ts`
  - Added new admin route names:
    - `adminJourneyPage`
    - `adminJourneyDetailPage`
    - `adminJourneyForm`
    - `adminDeparturePage`
    - `adminExperiencePage`
    - `adminArticlePage`
    - `adminArticleCategoryPage`
    - `adminPlannerSubmissionPage`
  - Kept old route names as compatibility aliases:
    - `adminPackagePage`
    - `adminPackageDetailPage`
    - `adminPackageForm`
    - `adminPackageCategoryPage`
    - `adminFeaturedPackagePage`
    - `adminBlogPage`
    - `adminBlogCategorypage`
    - `adminBookingPage`
  - Existing legacy components are still reused behind these routes until each CRUD module is rebuilt.

- `packages/admin/resources/admin/layout/DefaultLayout.vue`
  - Replaced old drawer items:
    - `Treks / Tours` -> `Journeys`
    - `Fixed Departure` -> `Departures`
    - `Guide Profile` -> `Guides`
    - `Regions` -> `Destinations`
    - `Blogs` -> `Articles`
    - `Blog Categories` -> `Article Categories`
    - `Bookings` -> `Planner Submissions`
    - `Settings` -> `Website`
  - Added a top-level `Experiences` item.
  - Removed `Customers` from primary navigation for now because the new website-first schema uses planner submissions, inquiries, and newsletter subscriptions instead of a customer CRM table.

- `packages/admin/resources/admin/pages/dashboard/DashboardPage.vue`
  - Updated dashboard copy and links from package/blog/booking wording to new website wording.
  - Dashboard now links to new route names where available.
  - Existing response keys such as `total_bookings` and `recent_bookings` are still consumed temporarily because the dashboard API provides compatibility aliases.

- `packages/admin/resources/admin/api/dashboard.api.ts`
  - Added optional TypeScript fields for the new dashboard schema response:
    - journey metrics
    - experience metrics
    - article metrics
    - planner submission metrics
    - newsletter subscriber metrics
    - `journey_name`, `journey_id`, `price_minor`, and `journeys_count`

## Verification
- Production frontend build passed:
  - `npm run build`
- Build completed with one existing toolchain warning about Browserslist/CSS nesting target support.

## Next Phase
Phase 03 should start replacing the legacy CRUD modules behind the new route names. Recommended order:
1. Journeys CRUD, including itinerary days, prices, services, highlights, months, experiences, guide assignment, media attachments, and departures.
2. Destinations CRUD.
3. Experiences and travel months CRUD.
4. Planner submissions CRUD.
5. Inquiries and newsletter subscribers CRUD.
6. Articles, article categories, article sections, and article-to-journey links.
7. Website pages, page sections, website sections, media assets, and website settings.
