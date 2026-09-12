# Update: Eloquent Models Cleanup & Singular/Plural Table Synchronization

**Timestamp**: 2026-09-12 14:15:30 NPT (UTC+05:45)  
**Author**: Antigravity Assistant  
**Status**: Completed & Verified  

---

## 1. Summary & Objective

In accordance with standard Laravel Eloquent conventions and the completed website-first database schema:
1. **Established 1-to-1 Singular/Plural Model Mapping**: Confirmed and enforced the convention where migration tables are **plural** in `snake_case` (e.g. `journeys`, `media_assets`, `website_settings`) and Eloquent models are **singular** in `PascalCase` (e.g. `Journey`, `MediaAsset`, `WebsiteSetting`).
2. **Added Missing Domain Models**: Created the 5 domain models needed to complete the modern schema:
   - `WebsiteSection` (for `website_sections`)
   - `WebsiteSetting` (for `website_settings`)
   - `MediaAttachment` (for `media_attachments`)
   - `MediaVariant` (for `media_variants`)
   - `JourneyItineraryHighlight` (for `journey_itinerary_highlights`)
3. **Purged 24 Obsolete Legacy Models**: Completely removed legacy models that referenced non-existent tables (e.g., `TravelPackage`, `Blog`, `Gallery`, `Banner`, `TrekBooking`, `Page`, etc.).
4. **Refactored Service Provider**: Updated `AppServiceProvider.php` to query modern models (`Journey`, `Article`, `WebsiteSetting`, `Destination`) instead of obsolete legacy models.

---

## 2. Detailed Technical Changes

### A. Files Created (5 New Domain Models)
- `packages/admin/src/Models/WebsiteSection.php`: Eloquent model for `website_sections`.
- `packages/admin/src/Models/WebsiteSetting.php`: Eloquent model for `website_settings`.
- `packages/admin/src/Models/MediaAttachment.php`: Eloquent model for `media_attachments` with polymorphic relationship.
- `packages/admin/src/Models/MediaVariant.php`: Eloquent model for `media_variants`.
- `packages/admin/src/Models/JourneyItineraryHighlight.php`: Eloquent model for `journey_itinerary_highlights`.

### B. Files Modified
- `app/Providers/AppServiceProvider.php`:
  - Replaced legacy imports (`Blog`, `TravelPackage`, `Setting`) with `Article`, `Journey`, `WebsiteSetting`.
  - Updated View Composer cache queries to target `website_settings`, `journeys`, and `articles`.

### C. Files Deleted (24 Obsolete Models)
The following 24 legacy model files were removed via `git rm`:
1. `packages/admin/src/Models/Banner.php`
2. `packages/admin/src/Models/Blog.php`
3. `packages/admin/src/Models/BlogCategory.php`
4. `packages/admin/src/Models/FeaturedPackage.php`
5. `packages/admin/src/Models/Gallery.php`
6. `packages/admin/src/Models/GalleryUsage.php`
7. `packages/admin/src/Models/GalleryVariant.php`
8. `packages/admin/src/Models/GuideTrip.php`
9. `packages/admin/src/Models/ItineraryHighlight.php`
10. `packages/admin/src/Models/Lookup.php`
11. `packages/admin/src/Models/PackageCategory.php`
12. `packages/admin/src/Models/PackageChecklist.php`
13. `packages/admin/src/Models/PackageInclusion.php`
14. `packages/admin/src/Models/PackageItierary.php`
15. `packages/admin/src/Models/PackageLookup.php`
16. `packages/admin/src/Models/PackagePrice.php`
17. `packages/admin/src/Models/Page.php`
18. `packages/admin/src/Models/Setting.php`
19. `packages/admin/src/Models/Tour.php`
20. `packages/admin/src/Models/TravelPackage.php`
21. `packages/admin/src/Models/TravelPackageHighlight.php`
22. `packages/admin/src/Models/Trek.php`
23. `packages/admin/src/Models/TrekBooking.php`
24. `packages/admin/src/Models/TrekDeparture.php`

### D. Complete Clean Models Set (32 Models)

All 32 models now cleanly resolve to their corresponding plural database table:

| Eloquent Model (`PascalCase`) | Table Name (`snake_case`) | Status |
|---|---|---|
| `Admin` | `admins` | Verified `[OK]` |
| `Article` | `articles` | Verified `[OK]` |
| `ArticleCategory` | `article_categories` | Verified `[OK]` |
| `ArticleSection` | `article_sections` | Verified `[OK]` |
| `Country` | `countries` | Verified `[OK]` |
| `Destination` | `destinations` | Verified `[OK]` |
| `Experience` | `experiences` | Verified `[OK]` |
| `Faq` | `faqs` | Verified `[OK]` |
| `Guide` | `guides` | Verified `[OK]` |
| `GuideReview` | `guide_reviews` | Verified `[OK]` |
| `Inquiry` | `inquiries` | Verified `[OK]` |
| `Journey` | `journeys` | Verified `[OK]` |
| `JourneyDeparture` | `journey_departures` | Verified `[OK]` |
| `JourneyHighlight` | `journey_highlights` | Verified `[OK]` |
| `JourneyItineraryDay` | `journey_itinerary_days` | Verified `[OK]` |
| `JourneyItineraryHighlight` | `journey_itinerary_highlights` | Verified `[OK]` |
| `JourneyPrice` | `journey_prices` | Verified `[OK]` |
| `JourneyService` | `journey_services` | Verified `[OK]` |
| `MediaAsset` | `media_assets` | Verified `[OK]` |
| `MediaAttachment` | `media_attachments` | Verified `[OK]` |
| `MediaVariant` | `media_variants` | Verified `[OK]` |
| `NewsletterSubscription` | `newsletter_subscriptions` | Verified `[OK]` |
| `Permission` | `permissions` | Verified `[OK]` |
| `PlannerSubmission` | `planner_submissions` | Verified `[OK]` |
| `Role` | `roles` | Verified `[OK]` |
| `TravelMonth` | `travel_months` | Verified `[OK]` |
| `TravelerStory` | `traveler_stories` | Verified `[OK]` |
| `User` | `users` | Verified `[OK]` |
| `WebsitePage` | `website_pages` | Verified `[OK]` |
| `WebsitePageSection` | `website_page_sections` | Verified `[OK]` |
| `WebsiteSection` | `website_sections` | Verified `[OK]` |
| `WebsiteSetting` | `website_settings` | Verified `[OK]` |

---

## 3. Verification & Testing

1. **Model Table Resolution Test**:
   - Programmatically instantiated all 32 model classes and asserted `$model->getTable() === Str::snake(Str::pluralStudly(class_basename($model)))`.
   - Result: All 32 models passed `[OK]`.

2. **Clean Fresh Migration & Seeding**:
   ```bash
   DB_CONNECTION=sqlite DB_DATABASE=:memory: php artisan migrate:fresh --seed --force
   ```
   - Result: All 42 migrations executed successfully. Database seeded with 0 errors.

3. **Public Route Render Check**:
   - Tested public website endpoints (`/`, `/treks`, `/treks/everest-base-camp`, `/destinations`, `/destinations/everest`, `/departures`, `/travel-guide`, `/guides`, `/faqs`).
   - Result: All routes returned HTTP status 200 OK.

---

## 4. Next Steps & Handoff Notes

- **Deconstruct `route_website.php`**: Move the 2,200+ lines of route closures into dedicated controllers (`JourneyController`, `DestinationController`, `PlannerController`, `WebsitePageController`).
- **Admin Controllers Refactoring**: As the admin interface is updated, align older admin controllers with the new domain models (`Journey`, `Article`, `WebsitePage`, etc.).
