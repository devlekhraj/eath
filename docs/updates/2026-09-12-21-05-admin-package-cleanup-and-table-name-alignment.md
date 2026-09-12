# Update: Admin Package Complete Cleanup & Database Table Name Alignment

**Timestamp**: 2026-09-12 21:05:00 NPT (UTC+05:45)  
**Author**: Antigravity  
**Status**: Completed & Verified  

---

## 1. Summary

Completely renewed and sanitized all folders, files, controllers, routes, API clients, and Vue components across `packages/admin/*` to strictly match the canonical database table names. All obsolete legacy folders (`TravelPackage/`, `Banner/`, `Blog/`, `BlogCategory/`, `Booking/`, `Customers/`, `FeaturedPackage/`, `Gallery/`, `Lookup/`, `Page/`, `FAQ/`, `lookups/`, `finance/`) and outdated API files have been eliminated.

---

## 2. Detailed Changes

### 2.1 Backend Controllers (`packages/admin/src/Http/Controllers/`)
- Renamed and organized all controllers into database table-named directories:
  - `Journey/`: `JourneyController`, `JourneyItineraryDayController`, `JourneyPriceController`, `JourneyServiceController`, `JourneyDepartureController`, `JourneyHighlightController` (tables: `journeys`, `journey_highlights`, `journey_prices`, `journey_itinerary_days`, `journey_itinerary_day_highlights`, `journey_services`, `journey_departures`).
  - `Article/`: `ArticleController` (table: `articles`).
  - `ArticleCategory/`: `ArticleCategoryController` (table: `article_categories`).
  - `WebsiteSection/`: `WebsiteSectionController` (table: `website_sections`).
  - `WebsitePage/`: `WebsitePageController` (tables: `website_pages`, `website_page_sections`).
  - `Media/`: `MediaAssetController` (tables: `media_assets`, `media_attachments`, `media_variants`). Added `getImage()` handler serving `/image/{filename}`.
  - `Inquiry/`: `InquiryController` (table: `inquiries`).
  - `PlannerSubmission/`: `PlannerSubmissionController` (table: `planner_submissions`).
  - `Newsletter/`: `NewsletterSubscriptionController` (table: `newsletter_subscriptions`).
  - `Faq/`: `FaqController` (table: `faqs`).
  - `Destination/`: `DestinationController` (table: `destinations`).
  - `Experience/`: `ExperienceController` (table: `experiences`).
  - `TravelMonth/`: `TravelMonthController` (table: `travel_months`).
  - `Guide/`: `GuideController` (table: `guides`).
  - `Settings/`: `SettingController` (table: `website_settings`).
  - `Dashboard/`: `DashboardController` (aggregated dashboard statistics).
  - `Auth/`: `AdminAuthController` (table: `admins`).
- Purged all legacy controller folders (`TravelPackage/`, `Banner/`, `Blog/`, `BlogCategory/`, `Booking/`, `Customers/`, `FeaturedPackage/`, `Gallery/`, `Lookup/`, `Page/`, `FAQ/`).

### 2.2 Backend Routes (`packages/admin/routes/api.php`)
- Rebuilt the entire admin API route definitions into a single, clean file with 144 canonical RESTful endpoints grouped by database table.
- Removed legacy path duplicates and ensured all routes authenticate via `auth:sanctum`.
- Updated `routes/web.php` for `/image/{filename}` to point directly to `Admin\Http\Controllers\Media\MediaAssetController::class`.

### 2.3 Frontend API Clients (`packages/admin/resources/admin/api/`)
- Created canonical API client files:
  - `journeys.api.ts` (table: `journeys`)
  - `articles.api.ts` (tables: `articles`, `article_categories`)
  - `website-sections.api.ts` (table: `website_sections`)
- Cleaned and removed obsolete files:
  - Removed `treks.api.ts`
  - Removed `blogs.api.ts`
  - Removed `banners.api.ts`
  - Removed `bookings.api.ts`
- Retained and verified table-named clients: `inquiries.api.ts`, `planner-submissions.api.ts`, `newsletter-subscriptions.api.ts`, `website-pages.api.ts`, `media-assets.api.ts`, `faqs.api.ts`, `dashboard.api.ts`, `auth.api.ts`.

### 2.4 Frontend Pages & Component Alignment (`packages/admin/resources/admin/pages/`)
- Renamed all page directories and components to match database tables:
  - `packages/` -> `journeys/` (`JourneyPage.vue`, `JourneyDetailPage.vue`, `JourneyForm.vue`, `form_section/`)
  - `featured-packages/` -> `journey-departures/` (`JourneyDeparturePage.vue`)
  - `blogs/` -> `articles/` (`ArticlePage.vue`, `ArticleDetailPage.vue`, `ArticleCategoryPage.vue`, `ArticleForm.vue`, `modal/ArticleAdd.vue`, `modal/ArticleDelete.vue`)
  - `banners/` -> `website-sections/` (`WebsiteSectionPage.vue`, `WebsiteSectionDetailPage.vue`, `modal/WebsiteSectionForm.vue`, `modal/WebsiteSectionDelete.vue`)
  - `webpage/` -> `website-pages/` (`WebsitePage.vue`, `WebsitePageDetail.vue`)
  - `gallery/` -> `media-assets/` (`MediaAssetPage.vue`)
  - `customers/` -> `inquiries/` (`InquiryPage.vue`, `modal/InquiryDetailModal.vue`, `modal/InquiryDeleteModal.vue`)
  - `bookings/` -> `planner-submissions/` (`PlannerSubmissionPage.vue`, `modal/PlannerDetailModal.vue`, `modal/PlannerDeleteModal.vue`)
  - `newsletter/` -> `newsletter-subscriptions/` (`NewsletterSubscriptionPage.vue`)
  - `faq/` -> `faqs/` (`FaqPage.vue`)
  - `traveler_stories/` -> `traveler-stories/` (`TravelerStoryPage.vue`)
- Completely deleted obsolete/dummy directories:
  - Removed `lookups/`
  - Removed `finance/`
  - Removed scratch files (`PackageForm-1.vue`, `PackageForm-working.vue`, `FormDescription1.vue`)

### 2.5 Router & Navigation Layout
- Rewrote `packages/admin/resources/admin/router/index.ts` to import exclusively from the new table-matched directories and provide clean canonical route paths (`/admin/journeys`, `/admin/departures`, `/admin/articles`, `/admin/website-sections`, `/admin/website-pages`, `/admin/media-assets`, `/admin/inquiries`, `/admin/planner-submissions`, `/admin/newsletter-subscriptions`, etc.).
- Updated `packages/admin/resources/admin/layout/DefaultLayout.vue` menu list to reference updated route names and removed obsolete lookups.
- Updated route references across `DashboardPage.vue`, `InquiryPage.vue`, `PlannerSubmissionPage.vue`, and modal components.

---

## 3. Verification Commands & Outputs

### 3.1 PHP Syntax Check
```bash
find packages/admin -name "*.php" -exec php -l {} + | grep -v "No syntax errors detected" || echo "All PHP files clean"
# Output: All PHP files clean
```

### 3.2 Artisan Admin Route Resolution
```bash
php artisan route:list --path=admin
# Output: Showing [144] routes (all 144 routes resolved cleanly, code 0)
```

### 3.3 Authenticated API Smoke Test
```bash
php artisan tinker --execute="..."
# Results:
# /api/v1/admin/profile: 200 OK
# /api/v1/admin/dashboard: 200 OK
# /api/v1/admin/journeys: 200 OK
# /api/v1/admin/articles: 200 OK
# /api/v1/admin/article-categories: 200 OK
# /api/v1/admin/website-sections: 200 OK
# /api/v1/admin/website-pages: 200 OK
# /api/v1/admin/inquiries: 200 OK
# /api/v1/admin/planner-submissions: 200 OK
# /api/v1/admin/newsletter-subscriptions: 200 OK
# /api/v1/admin/faqs: 200 OK
# /api/v1/admin/media-assets: 200 OK
# /api/v1/admin/destinations: 200 OK
# /api/v1/admin/experiences: 200 OK
# /api/v1/admin/travel-months: 200 OK
# /api/v1/admin/guides: 200 OK
```

### 3.4 Vite Frontend Production Build
```bash
npm run build
# Output:
# ✓ built in 18.24s (0 errors, code 0)
```

---

## 4. Next Steps
- Continue with any custom frontend UI polish or extra features requested by user.
- Ensure all ongoing migrations and seeders continue to align with the canonical table architecture.
