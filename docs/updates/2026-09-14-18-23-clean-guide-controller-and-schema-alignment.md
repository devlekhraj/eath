# Update: Clean GuideController, Remove Ghost Models, and Align with Database Schema

**Timestamp**: 2026-09-14 18:23:00 NPT (UTC+05:45)  
**Author**: Antigravity  
**Status**: Completed & Verified  

---

## 1. Summary & Objective
- Thoroughly audited and cleaned `packages/admin/src/Http/Controllers/Guide/GuideController.php`.
- Clarified the database tables represented by Guide administration:
  1. `guides`: Primary entity table holding guide profiles, contact info, bio, languages, qualifications, and SEO fields.
  2. `guide_reviews`: Reviews submitted for a guide (`reviewer_name`, `reviewer_country`, `rating`, `title`, `body`, `reviewed_on`).
  3. `guide_journey`: Pivot table establishing relationships between guides and journeys (`guide_id`, `journey_id`, `role`, `sort_order`).
  4. `media_attachments`: Polymorphic media attachments connecting media assets as `avatar` (`attachable_type = 'guides'`).
- Eliminated dead, non-existent model imports (`Blog`, `Gallery`, `GalleryUsage`, `GuideTrip`, `File`) that caused fatal crashes when calling methods like `uploadImage` or `guideTrip`.
- Removed unrouted dead methods (`uploadImage` and `getImage`).
- Preserved 100% backward compatibility for Vue admin frontend components (`GuideForm.vue`, `TabBio.vue`, `TabReviews.vue`, `TabTrip.vue`) by providing transparent input fallbacks (`phone_no` -> `phone`, `bio` -> `biography`, `language_spoken` -> `languages`, `experience_years` -> `years_experience`, `status` -> `is_active`) and model/resource accessors.
- Replaced dead `/admin/travel-packages` endpoint call in `guides.http.ts` with `/admin/journeys`.

---

## 2. Detailed Technical Changes

### A. Files Created
- `tests/Feature/AdminGuideCrudTest.php`: Feature test covering guide listing with filters, creation with modern payload and avatar attachment, detailed retrieval with relationships, legacy payload update support, bio patch, review creation and update, journey assignment via `guide_journey`, and soft deletion.

### B. Files Modified
- `packages/admin/src/Http/Controllers/Guide/GuideController.php`:
  - Removed orphaned imports (`Admin\Models\Blog`, `Admin\Models\Gallery`, `Admin\Models\GalleryUsage`, `Admin\Models\GuideTrip`, `Illuminate\Support\Facades\File`).
  - Streamlined `index()`: added search filtering across `name`, `email`, and `phone`, active status filter, eager loading `mediaAttachments.mediaAsset`, and counting `journeys` and `reviews`.
  - Streamlined `show()`: eager loads `mediaAttachments.mediaAsset`, `reviews`, `journeys`, returning through `GuideResource`.
  - Rewrote `storeUpdate()`: accepts clean canonical schema columns with graceful fallbacks for legacy Vue fields, validates and synchronizes avatar media via `$guide->syncMediaFromRequest()`.
  - Rewrote `updateBio()`: saves bio into the canonical `biography` column and returns `GuideResource`.
  - Rewrote `guideReview()`: creates/updates `GuideReview` against `guide_reviews` table using valid columns (`reviewer_name`, `reviewer_country`, `rating`, `title`, `body`, `reviewed_on`, `is_published`, `is_featured`).
  - Rewrote `guideTrip()`: maps journey assignments onto the existing `guide_journey` pivot table via `$guide->journeys()->syncWithoutDetaching([$journeyId => ['role' => ...]])`.
  - Rewrote `deleteGuide()`: cleanly deletes the guide via Eloquent `SoftDeletes`.
- `packages/admin/src/Models/GuideReview.php`:
  - Added accessors for `comment` (mapping to `body`) and `reviewer` (mapping `name` and `country`) and added to `$appends` for seamless frontend consumption.
- `app/Http/Resources/GuideResource.php`:
  - Added `avatar` (URL string), `avatar_image` (object), `reviews`, `trips` (mapped from `$this->journeys`), and `journeys` relations.
- `packages/admin/resources/admin/http/guides.http.ts`:
  - Updated `getTravelPackagesListApi()` to call `/admin/journeys` instead of non-existent `/admin/travel-packages`.

---

## 3. Verification & Testing

### Automated Tests
```bash
php artisan test --filter=AdminGuideCrudTest
```
**Output**:
```text
   PASS  Tests\Feature\AdminGuideCrudTest
  ✓ can list guides with filters                                         2.32s  
  ✓ can create guide with modern payload and avatar                      1.73s  
  ✓ can get guide details with relations                                 1.76s  
  ✓ can update guide with legacy payload                                 1.70s  
  ✓ can update guide bio                                                 1.70s  
  ✓ can create and update guide review                                   1.71s  
  ✓ can assign guide to journey                                          1.71s  
  ✓ can delete guide                                                     1.69s  

  Tests:    8 passed (58 assertions)
  Duration: 14.35s
```

### Destination CRUD Verification (Regression Check)
```bash
php artisan test --filter=AdminDestinationCrudTest
```
**Output**:
```text
   PASS  Tests\Feature\AdminDestinationCrudTest
  ✓ can list destinations                                                2.32s  
  ✓ can create destination with full logistics and seo                   1.71s  
  ✓ can update destination and associate images                          1.71s  
  ✓ can show destination with eager loaded images                        1.70s  
  ✓ can delete destination                                               1.70s  
  ✓ destination update creates polymorphic media attachments             1.75s  
  ✓ can attach and detach gallery media to destination                   1.70s  
  ✓ cannot attach duplicate media to gallery                             1.71s  
  ✓ can update media attachment alt text and meta                        1.80s  
  ✓ can update destination cta and operational notice                    1.70s  
  ✓ can sync destination logistics items                                 1.71s  

  Tests:    11 passed (61 assertions)
  Duration: 19.53s
```

### Frontend Asset Compilation
```bash
npm run build
```
**Output**:
```text
✓ built in 13.09s (all assets compiled without errors)
```

---

## 4. Next Steps & Handoff Notes
- All endpoints representing Guides, Guide Reviews, and Guide Journeys are clean, verified, and strictly aligned with database tables.
- Zero orphaned models or ghost classes remain.
