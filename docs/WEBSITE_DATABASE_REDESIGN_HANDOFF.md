# Website Database Redesign Handoff

## Purpose

This document explains the fresh website database redesign already completed in this branch, so another agent can continue without re-auditing from zero.

The user requested a complete website-first redesign as if there was no existing database, with professional naming and no legacy public product table names such as `travel_packages` or `package_*`. Public website URLs should remain stable, especially `/treks` and `/treks/{slug}`, but the internal domain model is now based on `Journey`.

## Current Direction

- Public website package: `packages/website/*`
- Eloquent models location: `packages/admin/src/Models/*`
- Public URLs remain compatible:
  - `/treks`
  - `/treks/{slug}`
  - `/destinations`
  - `/departures`
  - `/travel-guide`
  - `/guides`
  - `/faqs`
- Runtime website catalog data should come from the database, not JSON fixtures.
- JSON files may still be used by the database seeder as import source until a richer manual seeder/admin workflow replaces them.

## Major Schema Redesign Completed

Original migrations were edited directly, per user instruction. The fresh schema now uses professional website-domain names.

### Core Tables

- `media_assets`
- `media_attachments`
- `media_variants`
- `destinations`
- `experiences`
- `travel_months`
- `journeys`
- `experience_journey`
- `journey_month`
- `journey_itinerary_days`
- `journey_itinerary_highlights`
- `journey_highlights`
- `journey_services`
- `journey_prices`
- `journey_departures`

### Editorial Tables

- `article_categories`
- `articles`
- `article_sections`
- `article_journey`
- `traveler_stories`
- `website_pages`
- `website_page_sections`
- `website_sections`
- `faqs`
- `website_settings`

### Lead / Planner Tables

- `inquiries`
- `planner_submissions`
- `newsletter_subscriptions`

## Legacy Names Replaced

The fresh schema intentionally avoids these old names:

- `travel_packages`
- `package_categories`
- `package_itieraries`
- `package_inclusions`
- `package_prices`
- `package_checklists`
- `travel_package_highlights`
- `trek_departures`
- `trek_bookings`
- `featured_packages`
- `blogs`
- `blog_categories`
- `galleries`
- `gallery_usages`
- `gallery_variants`
- `lookups`
- `settings`
- duplicate `treks` / `tours` tables

The migration set has been fully streamlined and finalized:
- All 8 empty no-op migration files and 3 obsolete "add column later" patch migrations have been removed.
- Missing columns (`media_assets.hash`, `media_attachments.custom_attributes`, `journey_prices.description`) are directly integrated into the primary create-table migrations.
- Every migration file now directly and meaningfully defines its table schema with clean filenames matching the domain tables (e.g. `create_journeys_table`, `create_destinations_table`, `create_media_assets_table`, etc.).
- There are exactly 42 clean migrations with zero no-ops and zero Schema::table alterations.

## Models Added

New models were added under `packages/admin/src/Models`:

- `MediaAsset`
- `Journey`
- `Experience`
- `TravelMonth`
- `JourneyItineraryDay`
- `JourneyHighlight`
- `JourneyService`
- `JourneyPrice`
- `JourneyDeparture`
- `ArticleCategory`
- `Article`
- `ArticleSection`
- `TravelerStory`
- `WebsitePage`
- `WebsitePageSection`
- `PlannerSubmission`

## Models Updated

These existing models were rewritten or tightened to match the new schema:

- `Destination`
- `Guide`
- `Faq`
- `GuideReview`
- `Inquiry`
- `NewsletterSubscription`

They now use explicit `$fillable`, clean casts, and new relationships where relevant.

## Seeder Added

Added:

- `database/seeders/WebsiteDemoSeeder.php`

Updated:

- `database/seeders/DatabaseSeeder.php`

`WebsiteDemoSeeder` imports the current website fixture JSON into the new database schema:

- `packages/website/src/Data/website-catalog.json`
- `packages/website/src/Data/website-content.json`

This is intentional for now: the website runtime no longer reads those JSON files, but the seeder uses them as source material to populate realistic demo DB rows.

Seeded counts verified:

- 8 journeys
- 5 destinations
- 6 experiences
- 12 travel months
- 24 journey departures
- 6 articles
- 3 guides

## Website Repository Updated

Replaced:

- `packages/website/src/Services/WebsiteCatalogRepository.php`

It is now database-backed and preserves the old public method names so current routes and Blade views continue working:

- `getTreks()`
- `findTrek()`
- `filterTreks()`
- `getRegions()`
- `findRegion()`
- `getExperiences()`
- `findExperience()`
- `getMonths()`
- `findMonth()`
- `getDepartures()`
- `findDeparture()`
- `getArticles()`
- `findArticle()`
- `getGuides()`
- `findGuide()`
- `getStories()`
- `findStory()`
- `getFaqs()`
- `getPolicy()`
- `compareTreks()`
- `getTrekWhitelist()`

Important compatibility detail:

- Existing views still use the terms `trek`, `region`, etc.
- Internally those are now `Journey`, `Destination`, etc.
- The repository maps database models into arrays shaped like the old view contract.

## Verification Already Done

Safe migration and seed tests were run against SQLite, not the user’s MySQL database.

Passed:

```bash
DB_CONNECTION=sqlite DB_DATABASE=:memory: php artisan migrate --force
DB_CONNECTION=sqlite DB_DATABASE=:memory: php artisan migrate --seed --force
DB_CONNECTION=sqlite DB_DATABASE=/private/tmp/eath_website_schema.sqlite php artisan migrate:fresh --seed --force
```

Repository smoke check passed against the temp SQLite DB:

```php
[
    count(Website\Services\WebsiteCatalogRepository::getTreks()),      // 8
    count(Website\Services\WebsiteCatalogRepository::getRegions()),    // 5
    count(Website\Services\WebsiteCatalogRepository::getDepartures()), // 24
    count(Website\Services\WebsiteCatalogRepository::getArticles()),   // 6
    count(Website\Services\WebsiteCatalogRepository::getGuides()),     // 3
]
```

Route render smoke test passed against the temp SQLite DB:

- `/` => 200
- `/treks` => 200
- `/treks/everest-base-camp` => 200
- `/destinations` => 200
- `/destinations/everest` => 200
- `/departures` => 200
- `/travel-guide` => 200
- `/guides` => 200
- `/guides/website-guide-01` => 200
- `/faqs` => 200

## Important Safety Note

Do not assume the real local MySQL database has been rebuilt. Destructive migration commands were not run against MySQL.

Before using MySQL with the new schema, intentionally run:

```bash
php artisan migrate:fresh --seed
```

Only do this when it is safe to drop local data.

## Known Remaining Work

### 1. Convert Controllers Fully To New Models

Some older controllers still import legacy models such as:

- `TravelPackage`
- `Blog`
- `FeaturedPackage`
- `TrekDeparture`
- `PackageCategory`

The preview/public route smoke test passes because `WebsiteCatalogRepository` now handles the active preview pages. However, old/live website controller methods still need refactoring if they are part of the desired final website.

Recommended target controllers:

- `HomeController`
- `JourneyController`
- `DestinationController`
- `ExperienceController`
- `TravelMonthController`
- `DepartureController`
- `ComparisonController`
- `PlannerController`
- `ArticleController`
- `GuideController`
- `TravelerStoryController`
- `FaqController`
- `WebsitePageController`
- `ContactController`
- `NewsletterController`

### 2. Clean Up Legacy Models

Legacy model files still exist and reference old tables:

- `TravelPackage`
- `PackageCategory`
- `PackagePrice`
- `PackageInclusion`
- `PackageItierary`
- `PackageChecklist`
- `TravelPackageHighlight`
- `FeaturedPackage`
- `Blog`
- `BlogCategory`
- `TrekDeparture`
- `TrekBooking`
- `GuideTrip`
- `Gallery`
- `GalleryUsage`
- `GalleryVariant`
- `Lookup`

Options:

1. Delete them after confirming no admin screens still use them.
2. Convert them to compatibility aliases around new models.
3. Refactor admin screens first, then remove them.

Do not delete blindly without checking admin routes/views.

### 3. Refactor Routes Out Of Closures

`packages/website/routes/route_website.php` is still closure-heavy and very large.

Recommended next step:

- Keep public URL names stable.
- Move route logic into proper controllers.
- Controllers should pass all data to views.
- Blade views should not call `WebsiteCatalogRepository` directly.

### 4. Update Planner Persistence

Planner and recommendation services still use old method names like `getTreks()` but now receive DB-backed journey arrays.

Next:

- Store final planner submissions in `planner_submissions`.
- Replace simulated/session-only contact flows where desired.
- Use DB IDs/slugs consistently for selected journey, departure, destination, experience, and month.

### 5. Replace Booking Controller

`TrekBookingController` still validates old names like:

- `package_id`
- `trek_departures`
- `TrekBooking`

It should be rewritten around:

- `journey_id`
- `departure_id`
- `planner_submissions` or a new booking/request table if true bookings are needed.

### 6. Improve Website Pages / Policies

`WebsiteDemoSeeder` currently seeds simple placeholder DB-backed pages for:

- about
- contact
- safety
- responsible travel
- privacy
- terms
- booking conditions
- cancellation
- cookies

Next:

- Move all rich policy/static content from old hardcoded arrays into `website_pages` and `website_page_sections`.
- Ensure `getPolicy()` always returns meaningful section content.

### 7. Improve Media Integration

The schema now has `media_assets`, but the seeder currently relies on `WebsiteAssetRegistry` fallbacks for display images.

Next:

- Seed real `media_assets`.
- Connect hero/card/gallery images to journeys, destinations, guides, articles, stories, and pages.
- Replace old `Gallery`, `GalleryUsage`, and variant usage in admin/UI.

### 8. Run Real MySQL Fresh Migration

Once approved:

```bash
php artisan migrate:fresh --seed
```

Then run route checks against MySQL.

## Current Git Note

At the time this handoff was written, `git status` showed unrelated deleted docs/zips under:

- `docs/eath-homepage-antigravity-prompts*`
- `docs/eath-website-demo-prompts.zip`

Those deletions were not part of this database redesign work and should not be reverted or committed without user confirmation.

## Suggested Next Prompt For Antigravity

Read `docs/WEBSITE_DATABASE_REDESIGN_HANDOFF.md`.

Continue from the completed fresh website schema. Do not redesign table names again unless a blocking issue is found. Keep public website URLs stable, especially `/treks`, but use the internal `Journey` domain. Next, refactor `packages/website/routes/route_website.php` into proper controllers, remove remaining direct Blade repository calls, convert old controllers/forms from package/trek-booking names to journey/departure/planner naming, and verify the site with `php artisan migrate:fresh --seed` in a safe local database.
