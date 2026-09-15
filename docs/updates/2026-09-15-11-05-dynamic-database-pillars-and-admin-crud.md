# Dynamic Database-Backed Topic Pillars & Admin Panel CRUD

## Summary

Successfully transitioned the **Six Foundational Topic Pillars** and their right-side panel content (essential field principles, critical alpine hazards, preparation checklists, kickers, summaries, and lead narratives) from static arrays into the database (`article_categories` table) with complete management in the Admin Panel (`/admin/article-categories`).

Any updates made by administrators in the Admin Panel now immediately reflect in both the `/travel-guide` catalog grid and the right-side offcanvas panel drawer without code changes or redeployments.

## Detailed Changes

### 1. Database Schema
- **`database/migrations/2026_09_15_110000_add_pillar_fields_to_article_categories_table.php`**:
  - Added `kicker` (string, nullable)
  - Added `tagline` (string, nullable)
  - Added `summary` (text, nullable)
  - Added `lead` (text, nullable)
  - Added `icon` (string, nullable)
  - Added `rules` (json, nullable)
  - Added `hazards` (json, nullable)
  - Added `checklists` (json, nullable)

### 2. Eloquent Model Layer
- **`packages/admin/src/Models/ArticleCategory.php`**:
  - Added `HasMediaAttachments` and `HasFaqs` traits.
  - Added pillar attributes to `$fillable`: `'name', 'slug', 'description', 'sort_order', 'is_active', 'kicker', 'tagline', 'summary', 'lead', 'icon', 'rules', 'hazards', 'checklists'`.
  - Added array casts for `'rules' => 'array', 'hazards' => 'array', 'checklists' => 'array'`.

### 3. Database Seeder
- **`database/seeders/WebsiteDemoSeeder.php`**:
  - Extended `seedArticles()` to seed all 6 canonical categories (`seasons`, `packing`, `preparation`, `planning`, `culture`, `logistics`) with their complete expedition principles, hazards, checklists, and editorial descriptions.
  - Verified clean execution under `php artisan migrate:fresh --seed`.

### 4. Admin API & Form
- **`packages/admin/src/Http/Controllers/ArticleCategory/ArticleCategoryController.php`**:
  - Validated all new pillar fields in `saveCategory` and `update`.
- **`packages/admin/routes/api.php`**:
  - Supported `Route::match(['put', 'patch'], 'article-categories/{id}', ...)` for RESTful updates.
- **`packages/admin/resources/admin/modal-form/articles/CategoryForm.vue`**:
  - Built 4 structured tabs in the category modal dialog:
    1. **General**: Name, Slug, Sort Order, Active Status, Description (via Summernote).
    2. **Pillar Presentation**: Kicker, Tagline, Icon selector (`sun`, `backpack`, `shield`, `map`, `compass`, `plane`), Executive Summary, and Extended Alpine Lead.
    3. **Core Principles (Rules)**: Dynamic list of numbered rules (Rule Headline + Execution Guidance) with Add/Remove.
    4. **Hazards & Checklists**: Dynamic lists for Critical Alpine Pitfalls and Action Checklist Items with Add/Remove.
  - Preserved Admin styling standards (no `rounded-0` overrides, standard Vuetify components and colors).

### 5. Website Controllers & Views
- **`packages/website/src/Http/Controllers/ArticleController.php`**:
  - `index()`: Dynamically queries active `ArticleCategory` records to assemble `$allowedCategories` and `$topicPillars`.
  - `pillarPanel()`: Dynamically queries `ArticleCategory` by slug with eager-loaded `heroAttachment.mediaAsset` and transforms rules/hazards/checklists into panel data with graceful fallbacks.
- **`packages/website/resources/views/website_preview/pages/articles/partials/pillar_panel.blade.php`**:
  - Updated image rendering to support dynamic database-backed images (`$pillar['image_url']`) alongside registry keys.

### 6. Automated Testing
- **`tests/Feature/WebsiteTravelGuidePanelTest.php`**:
  - Added `test_admin_can_update_pillar_rules_and_website_reflects_changes`: Authenticates as admin, updates a category's principles and hazards via `/api/v1/admin/article-categories/{id}`, and asserts that the public `/travel-guide/pillar-panel/packing` endpoint immediately returns the updated database content.

## Verification Commands & Outputs

1. **Database Migration & Seeding**:
   ```bash
   php artisan migrate:fresh --seed
   # Output:
   # 2026_09_15_110000_add_pillar_fields_to_article_categories_table ... 19.25ms DONE
   # Database\Seeders\WebsiteDemoSeeder ... 234 ms DONE
   ```

2. **Frontend Asset Build**:
   ```bash
   npm run build
   # Output:
   # ✓ built in 24.10s (Vite production bundle successfully built)
   ```

3. **Automated Feature Tests**:
   ```bash
   php artisan test --filter=WebsiteTravelGuidePanelTest
   # Output:
   # PASS Tests\Feature\WebsiteTravelGuidePanelTest
   # ✓ travel guide index renders pillars with panel triggers and final cta
   # ✓ pillar panel renders rich static data for all pillars
   # ✓ guide quickview panel renders article details
   # ✓ admin can update pillar rules and website reflects changes
   # Tests: 4 passed (66 assertions)
   ```

4. **Admin Suite Verification**:
   ```bash
   php artisan test --filter="AdminFaqPolymorphicTest|AdminGuideCrudTest"
   # Output:
   # Tests: 12 passed (80 assertions)
   ```

## Next Steps
- Open `https://eath.test/admin/article-categories` to test editing categories, rules, and checklists directly in the Admin Panel.
- View `https://eath.test/travel-guide` to verify real-time updates in the right-side drawers.
