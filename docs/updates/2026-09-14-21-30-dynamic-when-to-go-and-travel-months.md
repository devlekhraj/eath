# Dynamic When to Go Overview and Travel Months

## Summary
Made the `/when-to-go` overview calendar and all 12 `/when-to-go/{month}` pages fully dynamic, database-driven, and manageable via the Admin Panel. Migrated `content` JSON on `travel_months`, integrated polymorphic FAQs via `HasFaqs` and hero media via `HasMediaAttachments`, updated the Admin Travel Month modal form and API controller, seeded rich realistic data and polymorphic FAQs for all 12 months and 4 Himalayan seasons, and rendered them in public Blade templates with zero border-radius styling and zero-breakage fallbacks.

## Detailed Changes

### Database & Models
- `database/migrations/2026_09_14_211500_add_content_to_travel_months_table.php`:
  - Added nullable `content` JSON column to the `travel_months` table for structured month attributes (e.g. `overview`, `trail_vibe`, `pack_tip`, `reasons`, `limitations`).
- `packages/admin/src/Models/TravelMonth.php`:
  - Added polymorphic traits `use HasFaqs, HasMediaAttachments;`.
  - Added `'content'` to `$fillable` and `'content' => 'array'` to `$casts`.

### Admin API & Modal Form
- `packages/admin/src/Http/Controllers/TravelMonth/TravelMonthController.php`:
  - Updated `show()` to eager load polymorphic `faqs` (filtered by `is_active` and ordered by `sort_order`) and `heroAttachment.mediaAsset`.
  - Updated `update()` validation to allow `'content' => ['nullable', 'array']`.
- `packages/admin/resources/admin/modal-form/travel-months/Form.vue`:
  - Added form input fields for `Trail Vibe` (`content.trail_vibe`) and `Packing Tip` (`content.pack_tip`) ensuring admins can edit editorial attributes alongside `conditions_note`.

### Database Seeding
- `database/seeders/WebsiteDemoSeeder.php`:
  - `seedWhenToGoPage()`: Seeded `when-to-go` page in `website_pages` (standard type) with rich summary, notice banner, bottom CTA, hero image attachment, and 4 Himalayan seasons stored as cards grid in `website_page_sections`.
  - `seedMonths()`: Seeded all 12 months with rich `summary`, `conditions_note`, structured `content` (`overview`, `trail_vibe`, `pack_tip`, `reasons`, `limitations`), and polymorphic FAQs attached to `TravelMonth` in the `faqs` table.

### Public Website Layer
- `packages/website/src/Services/WebsiteCatalogRepository.php`:
  - Included `conditions_note` and `content` in `getMonths()` mapping.
- `packages/website/src/Http/Controllers/TravelMonthController.php`:
  - In `index()`: Loaded `WebsitePage` for `when-to-go`, extracted 4 seasons from database section items (with sensible fallback), and resolved month editorial text from `content` or fallback.
  - In `show()`: Queried `TravelMonth` with active `faqs` and `heroAttachment`, resolving reasons, limitations, and FAQs with zero breakage fallbacks.
- `packages/website/resources/views/website_preview/pages/months/index.blade.php`:
  - Rendered dynamic notice banner, seasons grid, and CTA banner from database `WebsitePage`.
  - Enforced Universal Zero Border-Radius (`border-radius: 0 !important;`) and brand aesthetics.
- `packages/website/resources/views/website_preview/pages/months/show.blade.php`:
  - Rendered dynamic reasons, practical limitations, and polymorphic FAQs.
  - Fixed syntax issue by removing trailing stray word.
  - Enforced Universal Zero Border-Radius (`border-radius: 0 !important;`).

### Automated Testing
- `tests/Feature/WhenToGoAndTravelMonthsTest.php`:
  - Verified public `/when-to-go` overview renders dynamic title, notice, seasons, and CTA.
  - Verified public `/when-to-go/october` renders reasons, limitations, and polymorphic FAQs.
  - Verified all 12 `/when-to-go/{month}` routes return HTTP 200 OK.
  - Verified Admin API can show month with FAQs, update `conditions_note` & `content`, and toggle active status.

## Verification Commands & Outputs

### 1. Feature Test Suite
```bash
php artisan test tests/Feature/WhenToGoAndTravelMonthsTest.php
```
Output:
```text
   PASS  Tests\Feature\WhenToGoAndTravelMonthsTest
  ✓ public when to go overview renders successfully with dynamic data    2.96s  
  ✓ public when to go month detail renders successfully with faqs and h… 1.92s  
  ✓ all twelve months return 200 ok                                      3.53s  
  ✓ admin can view and update travel month details                       1.87s  

  Tests:    4 passed (42 assertions)
  Duration: 10.73s
```

### 2. HTTP Route Check Across All 12 Months
```bash
php artisan tinker --execute="
\$index = app()->handle(Illuminate\Http\Request::create('/when-to-go'));
echo 'Index status: ' . \$index->getStatusCode() . PHP_EOL;

\$months = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
foreach (\$months as \$m) {
    \$resp = app()->handle(Illuminate\Http\Request::create('/when-to-go/' . \$m));
    echo \$m . ': ' . \$resp->getStatusCode() . PHP_EOL;
}
"
```
Output:
```text
Index status: 200
january: 200
february: 200
march: 200
april: 200
may: 200
june: 200
july: 200
august: 200
september: 200
october: 200
november: 200
december: 200
```

## Next Steps
- Verify month hero image uploads via Media Manager in Admin UI when new assets are added.
- Allow admin custom section additions to `/when-to-go` page via `/admin/website-pages`.
