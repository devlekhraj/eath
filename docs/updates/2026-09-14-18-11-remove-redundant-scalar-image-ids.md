# 2026-09-14-18-11 Remove Redundant Scalar Image IDs

## Summary
Eliminated all redundant scalar image ID fields (`hero_image_id`, `card_image_id`, `route_map_image_id`) from API responses and resources (`DestinationResource`, `JourneyController`, `ExperienceController`, and `WebsitePageController`). Consumers now access cohesive respective image objects (`hero_image`, `card_image`, `route_map_image`, `gallery`, and `media`) directly for IDs and image metadata (`hero_image.id`, `hero_image.url`, `hero_image.attachment_id`, etc.), avoiding schema pollution and duplicate data points.

## Detailed Changes

### 1. Resources & Controllers Response Shaping
- **`app/Http/Resources/DestinationResource.php`**:
  - Removed `'hero_image_id'` and `'card_image_id'` from the resource response.
  - Kept `'hero_image'`, `'card_image'`, `'gallery'`, and `'media'`.
- **`packages/admin/src/Http/Controllers/Journey/JourneyController.php`**:
  - Removed `'hero_image_id'`, `'card_image_id'`, and `'route_map_image_id'` from `serializeJourney()`.
  - Retained respective objects `hero_image`, `card_image`, `route_map_image`, `gallery`, and `media`.
- **`packages/admin/src/Http/Controllers/Experience/ExperienceController.php`**:
  - Removed `'hero_image_id'` and `'card_image_id'` from `serializeExperience()`.
  - Retained `hero_image`, `card_image`, and `media`.
- **`packages/admin/src/Http/Controllers/WebsitePage/WebsitePageController.php`**:
  - Removed `'hero_image_id'` from `formatPageListItem()` and `formatPageDetail()`.
  - Retained `hero_image`, `media`, and `banner_url`.

### 2. Admin Vue Cleanup
- **`packages/admin/resources/admin/pages/destinations/detail_tabs/TabMedia.vue`**:
  - Removed unused `const fieldKey` variable in `promptRemoveImage()`.
- **`packages/admin/resources/admin/pages/journeys/detail_tabs/TabMedia.vue`**:
  - Removed unused `const fieldKey` variable in `promptRemoveImage()`.

### 3. Tests
- **`tests/Feature/AdminDestinationCrudTest.php`**:
  - Updated assertions to check `data.hero_image.id` and `data.card_image.id` instead of the removed scalar IDs.
- **`tests/Feature/AdminJourneyCrudTest.php`**:
  - Updated assertions to check `data.hero_image.id`, `data.card_image.id`, and `data.route_map_image.id` instead of the removed scalar IDs.

## Verification Commands & Outputs

### 1. Destination CRUD Tests
```bash
php artisan test --filter=AdminDestinationCrudTest
```
Output:
```
PASS  Tests\Feature\AdminDestinationCrudTest
✓ can list destinations                                                2.90s  
✓ can create destination with full logistics and seo                   1.76s  
✓ can update destination and associate images                          1.72s  
✓ can show destination with eager loaded images                        1.71s  
✓ can delete destination                                               1.73s  
✓ destination update creates polymorphic media attachments             1.71s  
✓ can attach and detach gallery media to destination                   1.77s  
✓ cannot attach duplicate media to gallery                             1.70s  
✓ can update media attachment alt text and meta                        1.72s  
✓ can update destination cta and operational notice                    1.73s  
✓ can sync destination logistics items                                 1.70s  

Tests: 11 passed (61 assertions)
Duration: 20.58s
```

### 2. Journey CRUD Tests
```bash
php artisan test --filter=AdminJourneyCrudTest
```
Output:
```
PASS  Tests\Feature\AdminJourneyCrudTest
✓ can show journey with media attachments                              2.34s  
✓ can attach and update journey media attachment                       1.72s  
✓ journey store update creates polymorphic media attachments           1.73s  
✓ can partially update journey media without name                      1.71s  
✓ can update journey detail notes and safety items                     1.72s  
✓ public website renders journey detail with zero breakage and fallba… 1.96s  

Tests: 6 passed (73 assertions)
Duration: 11.21s
```

### 3. Website Page CRUD Tests
```bash
php artisan test --filter=AdminWebsitePageCrudTest
```
Output:
```
PASS  Tests\Feature\AdminWebsitePageCrudTest
✓ can list and get website page details                                2.33s  
✓ can update page notice and cta fields                                1.71s  
✓ can manage modular sections with content items                       1.75s  
✓ can attach and detach media attachments                              1.71s  
✓ public responsible travel page renders with database data            1.76s  

Tests: 5 passed (38 assertions)
Duration: 9.28s
```

### 4. Experience CRUD Tests
```bash
php artisan test --filter=AdminExperienceCrudTest
```
Output:
```
PASS  Tests\Feature\AdminExperienceCrudTest
✓ can list experiences                                                 2.33s  
✓ can create experience with highlights prep and cta                   1.71s  
✓ can get single experience detail                                     1.71s  
✓ can update experience and sync highlights                            1.71s  
✓ can attach and detach media attachments to experience                1.72s  
✓ can toggle experience active status                                  1.71s  
✓ public website experience detail renders with database values        2.05s  
✓ public website experience detail falls back gracefully when fields…  1.71s  

Tests: 8 passed (47 assertions)
Duration: 14.66s
```

### 5. Frontend Production Build
```bash
npm run build
```
Output:
```
vite v6.3.5 building for production...
✓ built in 14.52s
```

## Next Steps
- Continue verifying all front-end tabs and views to ensure smooth operations.
