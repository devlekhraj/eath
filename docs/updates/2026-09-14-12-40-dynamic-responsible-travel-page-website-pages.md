# Dynamic Responsible Travel Page & Website Pages Admin CRUD Integration

**Timestamp:** 2026-09-14 12:40 NPT (UTC+05:45)

## Summary

Made `https://eath.test/responsible-travel` completely dynamic and manageable from inside the Admin Panel's existing **Website Pages** module (`/admin/website-pages/:id`, specifically for the record with `slug = 'responsible-travel'`).

The public page now dynamically queries `website_pages` and its related `website_page_sections` modular blocks, hero media attachment, notice banner, and bottom Call-To-Action (CTA) banner. The view enforces strict adherence to the Universal Zero Border-Radius Policy and border-free section kickers, while providing robust fallbacks so empty database fields never break frontend presentation.

---

## Detailed Changes

### 1. Database Migrations
- Created `database/migrations/2026_09_14_124000_add_detail_fields_to_website_pages_table.php` adding the following nullable fields to `website_pages`:
  - `notice_title`, `notice_body`
  - `cta_title`, `cta_description`
  - `cta_primary_btn_text`, `cta_primary_btn_url`
  - `cta_secondary_btn_text`, `cta_secondary_btn_url`

### 2. Eloquent Model & Polymorphic Morph Map
- `packages/admin/src/Models/WebsitePage.php`:
  - Added `Admin\Models\Concerns\HasMediaAttachments` trait.
  - Added `notice_title`, `notice_body`, and `cta_*` fields to `$fillable`.
- `packages/admin/src/AdminServiceProvider.php`:
  - Registered `'website_page' => \Admin\Models\WebsitePage::class` in `Relation::morphMap()`.

### 3. Admin Website Page Controller & Routes
- `packages/admin/src/Http/Controllers/WebsitePage/WebsitePageController.php`:
  - Updated `show`, `store`, and `update` to validate and handle notice and CTA fields.
  - Implemented `attachMedia`, `updateMediaAttachment`, and `detachMedia` endpoints for polymorphic `hero` media management.
  - Enhanced `formatPageDetail` to format `hero_image` and media details compatibly for frontend and admin consumers.
- `packages/admin/routes/api.php`:
  - Added routes:
    - `POST website-pages/{id}/media-attachments`
    - `PATCH website-pages/{id}/media-attachments/{attachmentId}`
    - `DELETE website-pages/{id}/media-attachments/{attachmentId}`

### 4. Admin Vue Management (`WebsitePageDetail.vue`)
- `packages/admin/resources/admin/pages/website-pages/WebsitePageDetail.vue`:
  - **Hero Banner Management**: Added panoramic preview, upload file input, library selection modal (`MediaAssetPickerModal`), edit alt text dialog, and remove image action.
  - **Notice / Operational Advisory Banner**: Added editable text fields for `notice_title` and `notice_body`.
  - **Bottom CTA Banner**: Added editable fields for heading, description, primary & secondary button labels and destination URLs.
  - **Modular Sections Tab**: Added layout picker (`standard`, `checklist`, `cards_grid`, `qa_grid`, `disclosure`) and interactive Structured Items repeater for `content.items` (Title/Question, Tag/Badge, Description/Answer, with add/delete/reorder controls).

### 5. Website Controller & View (`responsible.blade.php`)
- `packages/website/src/Http/Controllers/WebsitePageController.php`:
  - `responsible()` now queries `WebsitePage` with active sections and media attachments by slug `responsible-travel`.
- `packages/website/resources/views/website_preview/pages/responsible.blade.php`:
  - Replaced hardcoded blocks with dynamic loops over `$page->sections`.
  - Implemented layout presenters for `checklist`, `cards_grid`, `qa_grid`, `disclosure`, and `standard`.
  - Enforced Universal Zero Border-Radius Policy (`border-radius: 0 !important;`) on cards, images, and buttons.
  - Replaced boxed badges on eyebrows with border-free and background-free primary kickers.
  - Enforced Zero Breakage Policy with contextual fallbacks for all sections, notices, and CTAs.

### 6. Realistic Database Seeder
- `database/seeders/WebsiteDemoSeeder.php`:
  - Enhanced `seedWebsitePages()` to seed rich data for `responsible-travel` along with its 7 modular sections:
    1. Supporting Himalayan Valley Communities (`checklist`)
    2. Porter Welfare & Field Crew Standards (`cards_grid`)
    3. Environmental Care & Trail Waste Reduction (`checklist`)
    4. Cultural Traditions & Sacred Etiquette (`cards_grid`)
    5. Alpine Wildlife & Fragile Flora Considerations (`checklist`)
    6. Questions Conscious Travelers Should Ask an Operator (`qa_grid`)
    7. Auditing & Verified Partnership Disclosure (`disclosure`)

---

## Verification Commands & Outputs

1. **Database Migration:**
   ```bash
   php artisan migrate
   # Output: Migrated 2026_09_14_124000_add_detail_fields_to_website_pages_table
   ```

2. **Database Seeding:**
   ```bash
   php artisan db:seed --class=WebsiteDemoSeeder
   # Output: INFO Seeding database. (exited with code 0)
   ```

3. **Feature Test Suite:**
   ```bash
   php artisan test --filter=AdminWebsitePageCrudTest
   # Output:
   # PASS Tests\Feature\AdminWebsitePageCrudTest
   # ✓ can list and get website page details
   # ✓ can update page notice and cta fields
   # ✓ can manage modular sections with content items
   # ✓ can attach and detach media attachments
   # ✓ public responsible travel page renders with database data
   # Tests: 5 passed (38 assertions)
   ```

4. **Frontend Asset Build:**
   ```bash
   npm run build
   # Output:
   # ✓ built in 18.11s (exited with code 0)
   # public/build/assets/WebsitePageDetail-CmtykIDv.js 27.95 kB
   ```

5. **Public Route Verification:**
   ```bash
   curl -s -k -L https://eath.test/responsible-travel | grep -E "(Supporting Himalayan Valley Communities|Strict Weight Ceilings|Proposed Practices Notice|Ready to Plan a Mindful Himalayan Trek)"
   # Output:
   # Proposed Practices Notice — Not Verified Factual Achievements
   # Supporting Himalayan Valley Communities
   # Strict Weight Ceilings
   # Ready to Plan a Mindful Himalayan Trek?
   ```

6. **Zero Border-Radius Verification:**
   ```bash
   curl -s -k -L https://eath.test/responsible-travel | grep -iE "border-radius" | grep -v "border-radius: 0"
   # Output: 0 matches (exit code 1)
   ```

---

## Next Steps
- Admin users can navigate to `/admin/website-pages`, edit the `responsible-travel` record, change the hero banner, notice text, CTA buttons, and adjust or add new modular policy sections.
