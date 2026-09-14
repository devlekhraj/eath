# 2026-09-14-18-05 Unified Polymorphic Media Architecture

## Summary
Completed the system-wide refactoring of media and image handling across all database tables, models, controllers, and frontend views. Direct foreign key columns (`hero_image_id`, `card_image_id`, `profile_image_id`, `route_map_image_id`) have been removed from all migration definitions and database schemas. All media is now exclusively handled through the polymorphic `media_attachments` table via the `HasMediaAttachments` concern trait. Responses group attachments by collection via `$model->getGroupedMedia()` (where `gallery` is an array of items, while single collections like `hero`, `card`, `avatar`, `banner`, `route_map`, `default` return a formatted object or `null`). Controllers seamlessly accept nested `media: { hero: id, card: id, ... }` while retaining backward compatibility for legacy requests and tests.

## Detailed Changes

### 1. Database Migrations & Schemas
- Removed direct image foreign keys (`hero_image_id`, `card_image_id`, `profile_image_id`) from:
  - `database/migrations/2025_07_18_165609_create_guides_table.php`
  - `database/migrations/2025_07_18_165610_create_destinations_table.php`
  - `database/migrations/2025_07_18_165611_create_journeys_table.php`
  - `database/migrations/2025_07_18_165731_create_experiences_table.php`
  - `database/migrations/2025_07_20_053744_create_articles_table.php`
  - `database/migrations/2025_08_07_174726_create_website_pages_table.php`
  - `database/migrations/2025_08_18_034109_create_traveler_stories_table.php`
- Updated `database/seeders/WebsiteDemoSeeder.php` to remove obsolete direct `hero_image_id` insertions and added `Schema::hasTable` checks before truncations.

### 2. Models & Trait (`HasMediaAttachments`)
- Refactored `packages/admin/src/Models/Concerns/HasMediaAttachments.php`:
  - Implemented `getGroupedMedia()`: iterates over `MediaAttachment::COLLECTIONS`, returning `gallery` as a list of formatted attachment arrays and all other collections (`hero`, `card`, `banner`, `avatar`, `route_map`, `default`) as a single formatted item or `null`.
  - Implemented `syncMediaFromRequest(array $mediaData)`: handles associative array mapping `[collection => asset_id]`, attaching or detaching cleanly.
  - Standardized `formatAttachment(MediaAttachment $attachment)`: returns consistent object `{ id, attachment_id, url, filename, title, alt_text, caption, sort_order }`.
- Cleaned `$fillable` arrays across `Destination`, `Journey`, `Experience`, `WebsitePage`, `Article`, `TravelerStory`, and `Guide`.

### 3. Admin & Website Controllers
- **`WebsitePageController.php` (Admin & Website)**:
  - Replaced undefined `heroImage` relationship eager loads with `mediaAttachments.mediaAsset`.
  - Added `syncMediaFromRequest()` with legacy `hero_image_id` fallback in `store()`, `update()`, and `attachMedia()`.
  - Formatted JSON response to include `media` grouped dictionary, plus backward-compatible `hero_image` object and `banner_url`.
- **`DestinationController.php` & `DestinationResource.php`**:
  - Added `hero_image_id` and `card_image_id` backward compatibility to `saveDestination()` and `updateDestination()`.
  - Updated `DestinationResource` to include `media`, `hero_image`, `card_image`, and `gallery` formatted arrays.
- **`JourneyController.php`**:
  - Updated `serializeJourney` and `saveJourney` to utilize `getGroupedMedia()` for `hero_image`, `card_image`, `route_map_image`, and `gallery`.
  - Handled both nested `media` map and legacy image IDs.
- **`ExperienceController.php`**:
  - Standardized `saveExperience` and `serializeExperience` to leverage `syncMediaFromRequest` and `getGroupedMedia()`.
- **`ArticleController.php`, `TravelerStoryController.php`, `GuideController.php`**:
  - Eager load `mediaAttachments.mediaAsset` and return grouped media structures.

### 4. Admin Vue Pages & HTTP Services
- Updated `TabMedia.vue` across `destinations`, `journeys`, `experiences`, and `website-pages` to interact with `media.{hero, card, route_map}` without relying on direct image ID columns.
- Updated detail headers in `DestinationDetailPage.vue`, `JourneyDetailPage.vue`, `ExperienceDetailPage.vue`, and `WebsitePageDetail.vue` to resolve `media.hero.url`.
- Updated TypeScript interfaces in `articles.http.ts`, `traveler-stories.http.ts`, and `website-pages.http.ts` to include `media` dictionaries.

## Verification Commands & Outputs

### 1. Database Fresh Migration & Seed
```bash
php artisan migrate:fresh --seed
```
Output:
```
Seeding database.
Database\Seeders\AdminSeeder ....................................... DONE
Database\Seeders\CountriesTableSeeder .............................. DONE
Database\Seeders\WebsiteDemoSeeder ................................. DONE
```

### 2. Website Page CRUD & Public Render Tests
```bash
php artisan test --filter=AdminWebsitePageCrudTest
```
Output:
```
PASS  Tests\Feature\AdminWebsitePageCrudTest
✓ can list and get website page details                                2.97s  
✓ can update page notice and cta fields                                1.99s  
✓ can manage modular sections with content items                       1.88s  
✓ can attach and detach media attachments                              1.73s  
✓ public responsible travel page renders with database data            1.77s  

Tests: 5 passed (38 assertions)
Duration: 10.35s
```

### 3. Journey CRUD & Media Attachment Tests
```bash
php artisan test --filter=AdminJourneyCrudTest
```
Output:
```
PASS  Tests\Feature\AdminJourneyCrudTest
✓ can show journey with media attachments                              2.36s  
✓ can attach and update journey media attachment                       1.74s  
✓ journey store update creates polymorphic media attachments           1.73s  
✓ can partially update journey media without name                      1.72s  
✓ can update journey detail notes and safety items                     1.74s  
✓ public website renders journey detail with zero breakage and fallba… 1.82s  

Tests: 6 passed (73 assertions)
Duration: 11.13s
```

### 4. Destination CRUD & Logistics Tests
```bash
php artisan test --filter=AdminDestinationCrudTest
```
Output:
```
PASS  Tests\Feature\AdminDestinationCrudTest
✓ can list destinations                                                2.31s  
✓ can create destination with full logistics and seo                   1.70s  
✓ can update destination and associate images                          1.71s  
✓ can show destination with eager loaded images                        1.70s  
✓ can delete destination                                               1.70s  
✓ destination update creates polymorphic media attachments             1.72s  
✓ can attach and detach gallery media to destination                   1.71s  
✓ cannot attach duplicate media to gallery                             1.71s  
✓ can update media attachment alt text and meta                        1.73s  
✓ can update destination cta and operational notice                    1.70s  
✓ can sync destination logistics items                                 1.73s  

Tests: 11 passed (61 assertions)
Duration: 19.44s
```

### 5. Experience CRUD & Public Website Tests
```bash
php artisan test --filter=AdminExperienceCrudTest
```
Output:
```
PASS  Tests\Feature\AdminExperienceCrudTest
✓ can list experiences                                                 2.33s  
✓ can create experience with highlights prep and cta                   1.71s  
✓ can get single experience detail                                     1.71s  
✓ can update experience and sync highlights                            1.72s  
✓ can attach and detach media attachments to experience                1.72s  
✓ can toggle experience active status                                  1.71s  
✓ public website experience detail renders with database values        1.75s  
✓ public website experience detail falls back gracefully when fields…  1.74s  

Tests: 8 passed (47 assertions)
Duration: 14.41s
```

### 6. Polymorphic FAQs Tests
```bash
php artisan test --filter=AdminFaqPolymorphicTest
```
Output:
```
PASS  Tests\Feature\AdminFaqPolymorphicTest
✓ can create polymorphic faq for destination                           1.75s  
✓ can update polymorphic faq                                           1.78s  
✓ can create global faq                                                1.74s  
✓ can filter faqs by polymorphic entity                                1.72s  

Tests: 4 passed
```

### 7. Public Trek Comparison & Destination Detail Tests
```bash
php artisan test --filter=WebsiteCompareTreksTest
php artisan test --filter=WebsiteDestinationDetailTest
```
Output:
```
PASS  Tests\Feature\WebsiteCompareTreksTest
✓ compare page renders database stored items for visitor
✓ compare items can be removed and cleared from database
✓ compare add appends up to three items for same visitor
✓ compare add appends with normal session identity
✓ compare items store request metadata

PASS  Tests\Feature\WebsiteDestinationDetailTest
✓ can view public destination page with dynamic logistics and faqs
```

### 8. Frontend Production Build
```bash
npm run build
```
Output:
```
vite v6.3.5 building for production...
✓ built in 18.46s
```

## Next Steps
- Continue frontend UI polish as needed for any additional admin tabs or public website detail pages.
