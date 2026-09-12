# Admin Website Pages & Global Sections Rebuild

**Date & Time**: 2026-09-12 20:18 NPT (UTC+05:45)  
**Author**: Antigravity Assistant  
**Status**: Completed  
**Phase**: Phase 06C (Editorial CRUD: Website Pages & Website Sections)

---

## 1. Summary

Rebuilt the Admin CRUD interfaces and backend controllers for **Website Pages** (`website_pages`, `website_page_sections`) and **Website Sections** (`website_sections`). 

- Created canonical RESTful API controllers:
  - `WebsitePageController`: Manages structured pages (`title`, `slug`, `type`, `summary`, `body`, `hero_image_id`, `is_active`, `is_published`, `meta_title`, `meta_description`) and embedded child page sections (`website_page_sections`). Maintains backward-compatibility aliases for legacy `/admin/pages` requests.
  - `WebsiteSectionController`: Manages reusable homepage/global content sections (`page_key`, `section_key`, `heading`, `eyebrow`, `body`, `content`, `media_asset_id`, `is_active`, `sort_order`). Supports both `/admin/website-sections` and legacy `/admin/banners` endpoints.
- Developed client-side API services:
  - `packages/admin/resources/admin/api/website-pages.api.ts`
  - `packages/admin/resources/admin/api/banners.api.ts` (with typed `WebsiteSection` interfaces)
- Refactored Vue views:
  - `WebPage.vue`: Clean data table listing website pages with status chips, type badges, search, and delete modals.
  - `WebPageDetail.vue`: Page editor with tabs for Overview/SEO, Narrative Content, and Child Sections (`website_page_sections`).
  - `PageForm.vue` & `PageDelete.vue`: Add/Edit/Delete dialogs adhering to universal zero border-radius (`rounded-0 !important`).
  - `BannerPage.vue` & `BannerForm.vue` & `BannerDelete.vue`: Rebuilt as the global Website Sections manager with filtering by `page_key`, live search, sort ordering, status toggles, and zero border-radius.
- Updated Router navigation titles to "Website Sections" and "Pages".

---

## 2. Detailed Changes

### Backend Controllers & Models
- `packages/admin/src/Models/WebsitePage.php`:
  - Added `heroImage()` relationship pointing to `Admin\Models\MediaAsset`.
- `packages/admin/src/Http/Controllers/WebsitePage/WebsitePageController.php`:
  - Full CRUD for `website_pages` table with eager-loaded `sections` and `heroImage`.
  - Added child section management endpoints: `storeSection` and `deleteSection` for `website_page_sections`.
  - Added backward-compatibility methods: `storeUpdate` and `content` mapping to `body`.
- `packages/admin/src/Http/Controllers/WebsiteSection/WebsiteSectionController.php`:
  - Full CRUD for `website_sections` table with unique constraint on `(page_key, section_key)`.
  - Added `toggleActive` endpoint for quick toggle in UI.
- `packages/admin/routes/api.php`:
  - Registered canonical routes `/admin/website-pages` and `/admin/website-sections`.
  - Preserved backward-compatibility aliases `/admin/pages` and `/admin/banners`.

### Frontend API & Views
- `packages/admin/resources/admin/api/website-pages.api.ts`:
  - Added typed methods: `getWebsitePagesApi`, `getWebsitePageByIdApi`, `createWebsitePageApi`, `updateWebsitePageApi`, `deleteWebsitePageApi`, `toggleWebsitePageActiveApi`, `storeWebsitePageSectionApi`, `deleteWebsitePageSectionApi`.
- `packages/admin/resources/admin/api/banners.api.ts`:
  - Exported `WebsiteSection` types and CRUD helper functions alongside legacy aliases.
- `packages/admin/resources/admin/pages/webpage/WebPage.vue`:
  - Rendered clean Vuetify data table without custom borders or shadows.
  - Applied zero border-radius (`rounded-0`) to all chips, buttons, and inputs.
- `packages/admin/resources/admin/pages/webpage/WebPageDetail.vue`:
  - Structured tabs:
    - **Overview & Metadata**: Title, slug, type selector, meta title, meta description, active & published switches.
    - **Content**: Summary and full page body narrative.
    - **Child Sections**: Interactive table and dialog to add/remove page sections.
- `packages/admin/resources/admin/pages/banners/BannerPage.vue`:
  - Refactored table headers to `SN`, `Page Key`, `Section Key`, `Heading`, `Eyebrow`, `Order`, `Status`, `Action`.
  - Added page key filtering dropdown and search bar.
  - Sticky right action buttons with zero border-radius.
- `packages/admin/resources/admin/pages/banners/modal/BannerForm.vue`:
  - Added fields for `page_key`, `section_key`, `heading`, `eyebrow`, `body`, `sort_order`, `is_active`.
- `packages/admin/resources/admin/pages/banners/modal/BannerDelete.vue`:
  - Added confirmation modal with zero border-radius and standard Vuetify action buttons.
- `packages/admin/resources/admin/router/index.ts`:
  - Updated route titles and subtitles for `adminBannerPage` and `adminBannerDetailPage`.

---

## 3. Verification Commands & Outputs

1. **PHP Syntax Validation**:
   ```bash
   php -l packages/admin/src/Http/Controllers/WebsitePage/WebsitePageController.php
   php -l packages/admin/src/Http/Controllers/WebsiteSection/WebsiteSectionController.php
   php -l packages/admin/src/Models/WebsitePage.php
   ```
   *Output*: All passed with no syntax errors.

2. **Frontend Production Build**:
   ```bash
   npm run build
   ```
   *Output*: Build succeeded cleanly in 18.66s without any errors.

---

## 4. Next Steps

- Proceed to **Phase 06D: FAQs** (`faqs` table, journey/destination/experience associations, category filters, zero border-radius).
- Proceed to **Phase 07: Media Manager & Inquiries / Planner Submissions**.
