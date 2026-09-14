# Experience Detail Dynamic CRUD & Database-Backed Sections

## Summary
Transformed the Experience Detail page (`/experiences/{slug}`) from a static layout relying on hardcoded PHP arrays (`$contentMap`) into a fully dynamic, database-backed experience with a dedicated Admin Panel detail view (`/admin/experiences/:id`). Added database migrations, models under `Admin\Models`, polymorphic media attachments (`HasMediaAttachments`), polymorphic FAQs (`HasFaqs`), custom highlights & prep questions tables, custom bottom CTA banner configuration, and zero-breakage contextual fallback rendering on the public website adhering to the Universal Zero Border-Radius policy.

## Detailed Changes

### 1. Database Migrations
- **`2026_09_14_122000_add_detail_content_fields_to_experiences_table.php`**:
  - Added `emphasis` (text)
  - Added `cues` (text)
  - Added `cta_title`, `cta_description`, `cta_primary_btn_text`, `cta_primary_btn_url`, `cta_secondary_btn_text`, `cta_secondary_btn_url` (varchar/text)
- **`2026_09_14_122500_create_experience_highlights_table.php`**:
  - Relational table for experience highlights (`id`, `experience_id`, `title`, `description`, `sort_order`, `is_active`, timestamps)
- **`2026_09_14_123000_create_experience_prep_questions_table.php`**:
  - Relational table for suitability and preparation questions (`id`, `experience_id`, `title`, `body`, `sort_order`, `is_active`, timestamps)

### 2. Eloquent Models (`Admin\Models`)
- Created `packages/admin/src/Models/ExperienceHighlight.php` with `Admin\Models` namespace.
- Created `packages/admin/src/Models/ExperiencePrepQuestion.php` with `Admin\Models` namespace.
- Updated `packages/admin/src/Models/Experience.php`:
  - Added `HasMediaAttachments` trait.
  - Added relationships: `highlights()`, `prepQuestions()`.
  - Added new fillable attributes (`emphasis`, `cues`, `cta_*`).

### 3. Admin API & Controller
- Updated `packages/admin/src/Http/Controllers/Experience/ExperienceController.php`:
  - Added eager loading of `heroAttachment.mediaAsset`, `cardAttachment.mediaAsset`, `galleryAttachments.mediaAsset`, `highlights`, `prepQuestions`, `journeys.destination`.
  - Added `attachMedia`, `updateMediaAttachment`, and `detachMedia` endpoints.
  - Added syncing for `highlights` and `prep_questions` repeaters in `saveExperience`.
  - Added `data` payload to `toggleActive` response.
- Registered endpoints in `packages/admin/routes/api.php`:
  - `POST /api/v1/admin/experiences/{id}/media-attachments`
  - `PATCH /api/v1/admin/experiences/{id}/media-attachments/{attachmentId}`
  - `DELETE /api/v1/admin/experiences/{id}/media-attachments/{attachmentId}`

### 4. Admin Vue Detail Management (`/admin/experiences/:id`)
- Added route `adminExperienceDetailPage` (`experiences/:id`) in `packages/admin/resources/admin/router/index.ts`.
- Updated `ExperiencePage.vue` to link experience names and added a "View" button navigating to `adminExperienceDetailPage`.
- Added API methods in `packages/admin/resources/admin/api/experiences.api.ts`:
  - `getExperienceByIdApi`
  - `updateExperienceApi`
  - `attachExperienceMediaApi`
  - `detachExperienceMediaApi`
  - `updateExperienceMediaApi`
- Created `packages/admin/resources/admin/pages/experiences/ExperienceDetailPage.vue`.
- Created tab components under `packages/admin/resources/admin/pages/experiences/detail_tabs/`:
  - `TabOverview.vue`: Name, Slug, Emphasis, Cues, Sort Order, Active/Featured toggles, Summary, Description (SummarnoteEditor), and Bottom CTA Banner customization.
  - `TabHighlights.vue`: Re-orderable cards for Curated Highlights and Suitability & Prep Questions.
  - `TabMedia.vue`: Hero Banner, Card Thumbnail, and Gallery Photos with direct upload, media library picker (`MediaAssetPickerModal`), caption/alt editing, and deletion confirmation.
  - `TabJourneys.vue`: Matched journeys table linked to the experience.
  - `TabFaqs.vue`: Polymorphic FAQs (`faqable_type = 'experience'`, `faqable_id = experience.id`).
  - `TabSeo.vue`: Meta Title, Meta Description, and live Google SERP snippet preview.

### 5. Website Service, Controller & Views
- Updated `WebsiteCatalogRepository::getExperiences()`:
  - Eager-loaded media attachments, active highlights, and active prep questions.
  - Mapped dynamic hero/card images, gallery items, highlights, prep questions, and CTA parameters.
- Updated `Website\Http\Controllers\ExperienceController.php`:
  - Replaced hardcoded `$contentMap` array with dynamic database queries and polymorphic FAQ fetching (`Faq::where('faqable_type', 'experience')`).
  - Enforced Zero Breakage Policy with contextual fallbacks for any missing field.
- Updated `packages/website/resources/views/website_preview/pages/experiences/show.blade.php`:
  - Rendered dynamic hero image, emphasis, cues, highlights, gallery showcase, prep questions, polymorphic FAQs, and custom CTA banner.
  - Strictly removed rounded borders (`border-radius: 0 !important;`) per Universal Zero Border-Radius Policy.
  - Converted eyebrow kickers to background-free, border-free typography per Rule 4.

### 6. Realistic Seed Data
- Updated `database/seeders/WebsiteDemoSeeder.php` to seed rich, authentic data for the 6 core experiences:
  - `mountain-scenery`
  - `cultural-trails`
  - `quiet-trails`
  - `short-treks`
  - `photography`
  - `iconic-routes`
  - Seeded corresponding `experience_highlights`, `experience_prep_questions`, and polymorphic `faqs`.

## Verification Commands & Outputs

1. **Database Migrations:**
   ```bash
   php artisan migrate
   ```
   *Output:*
   - `2026_09_14_122000_add_detail_content_fields_to_experiences_table DONE`
   - `2026_09_14_122500_create_experience_highlights_table DONE`
   - `2026_09_14_123000_create_experience_prep_questions_table DONE`

2. **Automated Feature Test Suite:**
   ```bash
   php artisan test --filter=AdminExperienceCrudTest
   ```
   *Output:*
   ```text
   PASS  Tests\Feature\AdminExperienceCrudTest
   ✓ can list experiences
   ✓ can create experience with highlights prep and cta
   ✓ can get single experience detail
   ✓ can update experience and sync highlights
   ✓ can attach and detach media attachments to experience
   ✓ can toggle experience active status
   ✓ public website experience detail renders with database values
   ✓ public website experience detail falls back gracefully when fields are empty

   Tests:    8 passed (47 assertions)
   Duration: 1.01s
   ```

3. **Frontend Production Build:**
   ```bash
   npm run build
   ```
   *Output:*
   - Vite compiled 907 modules in 20.82s without TypeScript or template errors, outputting `ExperienceDetailPage-B1ZE6mWg.js`.

4. **Database Seeder:**
   ```bash
   php artisan db:seed --class=WebsiteDemoSeeder
   ```
   *Output:*
   - `INFO Seeding database. DONE`

## Next Steps
- Verify in browser at `https://eath.test/admin/experiences` and `https://eath.test/experiences/mountain-scenery`.
