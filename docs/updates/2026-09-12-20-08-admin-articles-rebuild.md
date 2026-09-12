# Update: Rebuild Admin Editorial Articles & Categories (Phase 06A)

**Timestamp**: 2026-09-12 20:08:44 NPT (UTC+05:45)  
**Author**: Antigravity Assistant  
**Status**: Completed & Verified  

---

## 1. Summary & Objective
Rebuilt the entire editorial Articles and Article Categories CRUD for the Admin panel under **Phase 06A** of `docs/ADMIN_REBUILD_SEQUENCE.md`. Replaced obsolete `blogs` / `blog_categories` logic with full support for the modern `articles`, `article_categories`, `article_sections`, and `article_journey` database tables, while preserving 100% backward compatibility for legacy Vue endpoints (`/admin/blogs`, `/admin/blog-categories`). All components strictly comply with `AGENTS.md` (universal zero border-radius `rounded-0 !important`, zero ordinary drop-shadows `elevation-0`, hairline borders, and sharp architectural square indicators).

---

## 2. Detailed Technical Changes

### A. Files Created
1. [`packages/admin/src/Http/Controllers/Article/ArticleController.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Http/Controllers/Article/ArticleController.php)
   - Full RESTful and operational API for Articles: `index`, `show`, `store`, `update`, `delete`, `toggleActive`, `togglePublish`, `storeSection`, `deleteSection`, and `syncJourneys`.
   - Normalizes and supports field aliases (`content` $\leftrightarrow$ `body`, `sub_title` $\leftrightarrow$ `summary`, `author` $\leftrightarrow$ `author_name`, `category_id` $\leftrightarrow$ `article_category_id`).
   - Automatically handles `published_at` timestamping upon publish toggles.
2. [`packages/admin/src/Http/Controllers/ArticleCategory/ArticleCategoryController.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Http/Controllers/ArticleCategory/ArticleCategoryController.php)
   - Full CRUD for Article Categories with search, sort ordering, article count aggregates, and active status toggling.
3. [`packages/admin/resources/admin/pages/blogs/detail_tabs/TabSections.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/blogs/detail_tabs/TabSections.vue)
   - Dedicated Vue 3 tab for managing structured article sections (`heading`, `body`, `sort_order`).
4. [`packages/admin/resources/admin/pages/blogs/detail_tabs/TabJourneys.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/blogs/detail_tabs/TabJourneys.vue)
   - Dedicated Vue 3 tab for managing associated Journeys / Treks linked to the article via `article_journey`.

### B. Files Modified
1. [`packages/admin/src/Models/Article.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/Article.php)
   - Added `heroImage()` relation to `MediaAsset`.
   - Explicitly configured `article_journey` pivot table on `journeys()` relation with timestamps and `sort_order`.
2. [`packages/admin/routes/api.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/routes/api.php)
   - Registered canonical `/api/v1/admin/articles` and `/api/v1/admin/article-categories` route families.
   - Maintained backward compatibility aliases mapping `/api/v1/admin/blogs` and `/api/v1/admin/blog-categories` to `ArticleController` and `ArticleCategoryController`.
3. [`packages/admin/resources/admin/api/blogs.api.ts`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/api/blogs.api.ts)
   - Added TypeScript interfaces for `Article`, `ArticleCategory`, `ArticleSection`.
   - Exported typed functions for articles, sections, and journeys while retaining legacy function exports.
4. [`packages/admin/resources/admin/pages/blogs/BlogPage.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/blogs/BlogPage.vue)
   - Refactored with zero border-radius (`rounded-0 !important`), sharp architectural square indicators, dedicated columns for Author and Status, and wired to `/admin/articles`.
5. [`packages/admin/resources/admin/pages/blogs/BlogDetailPage.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/blogs/BlogDetailPage.vue)
   - Integrated `TabSections` and `TabJourneys` alongside `TabOverview`, `TabContent`, and `TabSeo`.
   - Applied zero border-radius across cards, tabs, and action buttons.
6. [`packages/admin/resources/admin/pages/blogs/detail_tabs/TabOverview.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/blogs/detail_tabs/TabOverview.vue)
   - Added `summary`, `is_published`, and `is_featured` fields with zero border-radius inputs.
7. [`packages/admin/resources/admin/pages/blogs/detail_tabs/TabContent.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/blogs/detail_tabs/TabContent.vue)
   - Applied zero border-radius on buttons and clean layout.
8. [`packages/admin/resources/admin/pages/blogs/detail_tabs/TabSeo.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/blogs/detail_tabs/TabSeo.vue)
   - Updated inputs to outlined style with zero border-radius.
9. [`packages/admin/resources/admin/pages/blogs/modal/BlogAdd.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/blogs/modal/BlogAdd.vue)
   - Updated modal dialog with zero border-radius and direct post to `/admin/articles`.
10. [`packages/admin/resources/admin/pages/blogs/modal/BlogDelete.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/blogs/modal/BlogDelete.vue)
    - Updated modal dialog with zero border-radius and direct delete call to `/admin/articles/{id}/delete`.
11. [`packages/admin/resources/admin/pages/blogs/BlogCategoryPage.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/blogs/BlogCategoryPage.vue)
    - Refactored category data table to clean single-purpose columns (`name`, `slug`, `articles_count`, `sort_order`, `is_active`, `actions`).
12. [`packages/admin/resources/admin/pages/blogs/modal/CategoryForm.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/blogs/modal/CategoryForm.vue)
    - Aligned fields with `article_categories` table (`name`, `slug`, `sort_order`, `is_active`, `description`), auto-slug generation, zero border-radius.
13. [`packages/admin/resources/admin/pages/blogs/modal/CategoryDelete.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/blogs/modal/CategoryDelete.vue)
    - Updated modal dialog with zero border-radius and direct delete call to `/admin/article-categories/{id}/delete`.

---

## 3. Verification & Testing

### A. PHP Syntax Check
```bash
php -l packages/admin/src/Http/Controllers/Article/ArticleController.php
php -l packages/admin/src/Http/Controllers/ArticleCategory/ArticleCategoryController.php
php -l packages/admin/src/Models/Article.php
php -l packages/admin/routes/api.php
```
**Result**: All 4 files passed with zero syntax errors.

### B. Fresh Database Migration & Seeding
```bash
DB_CONNECTION=sqlite DB_DATABASE=/private/tmp/eath_articles.sqlite php artisan migrate:fresh --seed --force
```
**Result**: Completed successfully; 42 migrations executed and seeded (`AdminSeeder`, `CountriesTableSeeder`, `WebsiteDemoSeeder`).

### C. Authenticated Sanctum API Smoke Test
Simulated Sanctum bearer token authenticated requests across all endpoints:
- `POST /api/v1/admin/article-categories` $\rightarrow$ `201 Created`
- `GET /api/v1/admin/blog-categories` (backward compatibility) $\rightarrow$ `200 OK` (count: 7)
- `POST /api/v1/admin/articles` $\rightarrow$ `201 Created` (with 2 sections and 1 journey)
- `GET /api/v1/admin/blogs` (backward compatibility) $\rightarrow$ `200 OK` (count: 7)
- `GET /api/v1/admin/blogs/{id}` (backward compatibility with `content` alias) $\rightarrow$ `200 OK`
- `PATCH /api/v1/admin/blogs/{id}/update` (with `sub_title` and `content` aliases) $\rightarrow$ `200 OK`
- `PATCH /api/v1/admin/articles/{id}/toggle-active` $\rightarrow$ `200 OK` (`is_active: false`)
- `POST /api/v1/admin/articles/{id}/sections` $\rightarrow$ `201 Created`
- `POST /api/v1/admin/articles/{id}/journeys` $\rightarrow$ `200 OK` (count: 1)

### D. Production Bundle Build
```bash
npm run build
```
**Result**: `✓ built in 17.81s`. All assets, chunks, and CSS compiled without error.

---

## 4. Next Steps & Handoff Notes
- Proceed to **Phase 06B: Traveler Stories CRUD** (`traveler_stories` table, stories list, detail page, testimonials, author metadata).
- After Phase 06B, proceed to **Phase 06C: Website Pages & Content Sections** (`website_pages`, `website_sections`, `website_page_sections`).
