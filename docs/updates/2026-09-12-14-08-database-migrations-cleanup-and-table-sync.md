# Update: Database Migrations Consolidation & Table Name Synchronization

**Timestamp**: 2026-09-12 14:08:16 NPT (UTC+05:45)  
**Author**: Antigravity Assistant  
**Status**: Completed & Verified  

---

## 1. Summary of Changes

In accordance with the project guidelines for a fresh-database-first architecture:
1. **Removed all empty no-op and patch migrations**: All 11 historical patch files and empty stubs were permanently removed from `database/migrations/`.
2. **Integrated deferred columns into primary create migrations**: Columns previously added by alter migrations (`media_assets.hash`, `media_attachments.custom_attributes`, and `journey_prices.description`) were directly folded into the base table creation migrations.
3. **Synchronized migration file names to exact table names**: Every single migration file now adheres to standard Laravel naming (`YYYY_MM_DD_HHMMSS_create_<table_name>_table.php`) matching the exact table it creates, while preserving original timestamp prefixes to guarantee identical execution and foreign key dependency order.

---

## 2. Integrated Columns in Primary Create Migrations

- **`media_assets`**: Added `$table->string('hash', 64)->unique()->nullable();` right after `$table->id();` in `2025_07_17_182139_create_media_assets_table.php`.
- **`media_attachments`**: Added `$table->json('custom_attributes')->nullable();` right after `$table->text('caption')->nullable();` in `2025_07_17_182146_create_media_attachments_table.php`.
- **`journey_prices`**: Added `$table->text('description')->nullable();` right after `$table->string('pricing_basis')->nullable();` in `2025_07_29_061136_create_journey_prices_table.php`.

---

## 3. Deleted Obsolete Migrations (11 Files)

The following 11 migration files were removed via `git rm`:
1. `database/migrations/2025_07_29_064802_add_custom_field_in_gallery_usages_table.php` (folded into `create_media_attachments_table`)
2. `database/migrations/2025_08_05_121001_add_fields_in_package_prices_table.php` (folded into `create_journey_prices_table`)
3. `database/migrations/2025_08_10_094741_add_field_in_guide_reviews_table.php` (empty no-op stub)
4. `database/migrations/2025_08_10_104150_add_updated_at_field_in_guide_trips_table.php` (empty no-op stub)
5. `database/migrations/2025_08_18_044004_add_field_in_inquiries_table.php` (empty no-op stub)
6. `database/migrations/2025_08_26_113443_add_photo_field_in_guides_table.php` (empty no-op stub)
7. `database/migrations/2025_09_08_123029_add_highlight_field_in_featured_packages.php` (empty no-op stub)
8. `database/migrations/2026_01_31_112105_add_dimention_field_in_galleries_table.php` (folded into `create_media_assets_table`)
9. `database/migrations/2026_02_02_002323_add_caption_field_in_gallery_usages_table.php` (empty no-op stub)
10. `database/migrations/2026_02_04_081405_add_destination_id_in_travel_packages_table.php` (empty no-op stub)
11. `database/migrations/2026_02_24_004836_add_category_id_in_blogs_table.php` (empty no-op stub)

---

## 4. Renamed Migration Files (Synchronized to Table Names)

All remaining migration files were renamed via `git mv` so their filenames 100% reflect the created database tables:

| Old Migration Filename | New Synchronized Filename | Target Table Created |
|---|---|---|
| `2025_07_04_081908_user_role_table.php` | `2025_07_04_081908_create_role_user_table.php` | `role_user` |
| `2025_07_04_081947_permission_role_table.php` | `2025_07_04_081947_create_permission_role_table.php` | `permission_role` |
| `2025_07_04_082232_admin_role_table.php` | `2025_07_04_082232_create_admin_role_table.php` | `admin_role` |
| `2025_07_17_182139_create_galleries_table.php` | `2025_07_17_182139_create_media_assets_table.php` | `media_assets` |
| `2025_07_17_182146_create_gallery_usages_table.php` | `2025_07_17_182146_create_media_attachments_table.php` | `media_attachments` |
| `2025_07_18_165610_create_package_categories_table.php` | `2025_07_18_165610_create_destinations_table.php` | `destinations` |
| `2025_07_18_165611_create_travel_packages_table.php` | `2025_07_18_165611_create_journeys_table.php` | `journeys` |
| `2025_07_18_165651_create_package_itieraries_table.php` | `2025_07_18_165651_create_journey_itinerary_days_table.php` | `journey_itinerary_days` |
| `2025_07_18_165711_create_package_inclusions_table.php` | `2025_07_18_165711_create_journey_services_table.php` | `journey_services` |
| `2025_07_18_165731_create_package_checklists_table.php` | `2025_07_18_165731_create_experiences_table.php` | `experiences` |
| `2025_07_20_053736_create_blog_categories_table.php` | `2025_07_20_053736_create_article_categories_table.php` | `article_categories` |
| `2025_07_20_053744_create_blogs_table.php` | `2025_07_20_053744_create_articles_table.php` | `articles` |
| `2025_07_20_093212_create_package_categories_table.php` | `2025_07_20_093212_create_travel_months_table.php` | `travel_months` |
| `2025_07_20_191248_category_blog_table.php` | `2025_07_20_191248_create_journey_month_table.php` | `journey_month` |
| `2025_07_27_102749_create_lookups_table.php` | `2025_07_27_102749_create_experience_journey_table.php` | `experience_journey` |
| `2025_07_27_102750_create_itinerary_highlights_table.php` | `2025_07_27_102750_create_journey_itinerary_highlights_table.php` | `journey_itinerary_highlights` |
| `2025_07_28_070215_create_travel_package_highlights_table.php` | `2025_07_28_070215_create_journey_highlights_table.php` | `journey_highlights` |
| `2025_07_29_061136_create_package_prices_table.php` | `2025_07_29_061136_create_journey_prices_table.php` | `journey_prices` |
| `2025_07_30_055744_create_guide_trips_table.php` | `2025_07_30_055744_create_guide_journey_table.php` | `guide_journey` |
| `2025_07_31_035539_create_banners_table.php` | `2025_07_31_035539_create_website_sections_table.php` | `website_sections` |
| `2025_08_07_174726_create_pages_table.php` | `2025_08_07_174726_create_website_pages_table.php` | `website_pages` |
| `2025_08_10_082341_create_settings_table.php` | `2025_08_10_082341_create_website_settings_table.php` | `website_settings` |
| `2025_08_18_034109_create_featured_packages_table.php` | `2025_08_18_034109_create_traveler_stories_table.php` | `traveler_stories` |
| `2026_01_30_235300_create_destinations_table.php` | `2026_01_30_235300_create_website_page_sections_table.php` | `website_page_sections` |
| `2026_01_30_235423_create_tours_table.php` | `2026_01_30_235423_create_article_sections_table.php` | `article_sections` |
| `2026_01_30_235428_create_treks_table.php` | `2026_01_30_235428_create_article_journey_table.php` | `article_journey` |
| `2026_01_31_132628_create_gallery_variants_table.php` | `2026_01_31_132628_create_media_variants_table.php` | `media_variants` |
| `2026_04_05_001600_create_trek_departures_table.php` | `2026_04_05_001600_create_journey_departures_table.php` | `journey_departures` |
| `2026_04_05_120000_create_trek_bookings_table.php` | `2026_04_05_120000_create_planner_submissions_table.php` | `planner_submissions` |

Files that already matched their table names and were kept unchanged:
- `0001_01_01_000000_create_users_table.php` (`users`, `password_reset_tokens`, `sessions`)
- `0001_01_01_000001_create_cache_table.php` (`cache`, `cache_locks`)
- `0001_01_01_000002_create_jobs_table.php` (`jobs`, `job_batches`, `failed_jobs`)
- `2025_07_03_190703_create_personal_access_tokens_table.php` (`personal_access_tokens`)
- `2025_07_04_081229_create_admins_table.php` (`admins`)
- `2025_07_04_081236_create_roles_table.php` (`roles`)
- `2025_07_04_081243_create_permissions_table.php` (`permissions`)
- `2025_07_30_054913_create_guides_table.php` (`guides`)
- `2025_07_30_055610_create_guide_reviews_table.php` (`guide_reviews`)
- `2025_08_07_174939_create_inquiries_table.php` (`inquiries`)
- `2025_08_10_133116_create_faqs_table.php` (`faqs`)
- `2026_03_18_083952_create_countries_table.php` (`countries`)
- `2026_03_29_105325_create_newsletter_subscriptions_table.php` (`newsletter_subscriptions`)

Total clean migrations remaining: **42 files**.

---

## 5. Verification & Test Results

1. **Clean Fresh Migration & Seeding**:
   ```bash
   DB_CONNECTION=sqlite DB_DATABASE=:memory: php artisan migrate:fresh --seed --force
   ```
   - All 42 migrations executed successfully.
   - `CountriesTableSeeder` and `WebsiteDemoSeeder` seeded realistic database rows.
2. **Catalog Repository & Public Route Checks**:
   - `WebsiteCatalogRepository::getTreks()`: 8 journeys loaded.
   - `WebsiteCatalogRepository::getRegions()`: 5 destinations loaded.
   - `WebsiteCatalogRepository::getDepartures()`: 24 departures loaded.
   - `WebsiteCatalogRepository::getArticles()`: 6 articles loaded.
   - `WebsiteCatalogRepository::getGuides()`: 3 guides loaded.
   - `WebsiteCatalogRepository::getStories()`: 3 stories loaded.
   - All public routes (`/`, `/treks`, `/treks/everest-base-camp`, `/destinations`, `/destinations/everest`, `/departures`, `/travel-guide`, `/guides`, `/guides/website-guide-01`, `/faqs`) rendered HTTP 200 OK.
