# Admin FAQs Rebuild

**Date & Time**: 2026-09-12 20:20 NPT (UTC+05:45)  
**Author**: Antigravity Assistant  
**Status**: Completed  
**Phase**: Phase 06D (Editorial CRUD: Frequently Asked Questions)

---

## 1. Summary

Rebuilt the Admin CRUD interfaces and backend controller for **Frequently Asked Questions** (`faqs` table).

- Rebuilt `FaqController`:
  - Added full search across `question`, `answer`, and `category`.
  - Added eager-loaded domain relationships: `journey:id,name,slug`, `destination:id,name,slug`, and `experience:id,name,slug`.
  - Added filtering by `category`, `journey_id`, `destination_id`, `experience_id`, and `is_active`.
  - Created `categories()` endpoint providing unique existing categories merged with standard defaults.
  - Added `toggleActive()` endpoint for one-click status toggling directly from data tables.
  - Maintained backward-compatibility aliases `storeUpdate` and `delete`.
- Created typed client API:
  - `packages/admin/resources/admin/api/faqs.api.ts`: Typed interface `FaqItem` and CRUD methods (`getFaqsApi`, `getFaqByIdApi`, `createFaqApi`, `updateFaqApi`, `deleteFaqApi`, `toggleFaqActiveApi`, `getFaqCategoriesApi`).
- Rebuilt Vue components adhering strictly to `AGENTS.md`:
  - `FaqPage.vue`: Modern data table with columns: `SN`, `Question`, `Category` chip, `Association / Scope` chip (Global, Journey, Destination, Experience), `Order`, `Status` (Active/Draft toggle chip), and centered sticky-right `Actions`.
  - Added live text search, category filtering dropdown, and scope filtering dropdown.
  - `FaqForm.vue`: Add/Edit modal with question, answer, category combobox (custom or suggested), optional Journey/Destination/Experience association selectors, sort order, and active switch.
  - `FaqDelete.vue`: Confirmation dialog displaying the target question.
  - Universal zero border-radius (`rounded-0 !important`), zero drop shadows (`elevation-0`, hairline borders), and standard Vuetify palette.
- Updated `router/index.ts` with descriptive page title and subtitle.

---

## 2. Detailed Changes

### Backend
- `packages/admin/src/Http/Controllers/FAQ/FaqController.php`:
  - Completely replaced legacy code. Fixed previous bug where `toggleActive` was referencing non-existent `Page::findOrFail`.
  - Eager loads `['journey:id,name,slug', 'destination:id,name,slug', 'experience:id,name,slug']`.
  - Auto-increments `sort_order` if omitted upon creation.
- `packages/admin/routes/api.php`:
  - Registered `/admin/faqs`, `/admin/faqs/categories`, `/admin/faqs/{id}`, `/admin/faqs/{id}/toggle-active`, and legacy aliases.

### Frontend
- `packages/admin/resources/admin/api/faqs.api.ts`:
  - New typed API module.
- `packages/admin/resources/admin/pages/faq/FaqPage.vue`:
  - Replaced unstyled list with responsive `<v-data-table>`.
  - Filtering by search query, category, and scope.
  - Direct status toggling via chip clicks.
- `packages/admin/resources/admin/pages/faq/modal/FaqForm.vue`:
  - Input validation, category autocomplete/combobox, contextual journey/destination/experience selects.
- `packages/admin/resources/admin/pages/faq/modal/FaqDelete.vue`:
  - Styled confirmation modal with zero border-radius.
- `packages/admin/resources/admin/router/index.ts`:
  - Route meta title set to "Frequently Asked Questions", subtitle "Manage questions, answers, categories, and journey associations".

---

## 3. Verification Commands & Outputs

1. **PHP Syntax Validation**:
   ```bash
   php -l packages/admin/src/Http/Controllers/FAQ/FaqController.php
   php -l packages/admin/routes/api.php
   ```
   *Output*: No syntax errors detected.

2. **Authenticated API Smoke Test**:
   - `POST /api/v1/admin/faqs`: Status 201 Created.
   - `GET /api/v1/admin/faqs/categories`: Status 200 OK.
   - `PATCH /api/v1/admin/faqs/{id}/toggle-active`: Status 200 OK.
   - `GET /api/v1/admin/faqs?category=Weather%20&%20Seasons`: Status 200 OK.
   - `DELETE /api/v1/admin/faqs/{id}/delete`: Status 200 OK.

3. **Frontend Production Build**:
   ```bash
   npm run build
   ```
   *Output*: Clean build in 18.39s (`FaqPage-Bs5BYCQf.js` 15.02 kB).

---

## 4. Next Steps

- Complete Phase 06 (Editorial CRUD) is now finished across all 4 slices (06A Articles, 06B Traveler Stories, 06C Website Pages & Sections, 06D FAQs).
- Proceed to **Phase 07: Media Manager** (`media_assets`, `media_variants`, `media_attachments`).
