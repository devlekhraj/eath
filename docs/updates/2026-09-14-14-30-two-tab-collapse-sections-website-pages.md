# Update: Two-Tab Layout with Expandable Accordion Sections for Website Pages Detail

**Timestamp**: 2026-09-14 14:30:00 NPT (UTC+05:45)  
**Author**: Antigravity  
**Status**: Completed & Verified  

---

## 1. Summary & Objective
- Redesigned `/admin/website-pages/:id` (`WebsitePageDetail.vue`) from separate horizontal tabs into a clean, streamlined **2-tab architecture**:
  1. **Tab 1: "Page Content & Sections"**:
     - **General Info & Title**: Title, slug, hero subtitle, active status toggle.
     - **Hero Banner Image**: Managed via polymorphic `HasMediaAttachments` with media library picker, upload, preview, and alt-text editing.
     - **Notice / Operational Advisory**: Optional dismissible banner title and markdown/rich-text body.
     - **Introduction & Main Body**: Optional lead text / main body content.
     - **Dynamic Modular Sections (`<v-expansion-panels>`)**: All page sections rendered as collapsible/expandable cards with single-section saving, inline reordering ($\uparrow / \downarrow$), "Expand All / Collapse All" quick controls, layout picker (`cards_grid`, `checklist`, `qa_grid`, `disclosure`, `standard`), and an inline Structured Items Repeater (title, kicker, badge, description, icon).
     - **Bottom Call-To-Action (CTA)**: Dynamic CTA banner heading, description, button labels, and URLs.
  2. **Tab 2: "SEO & Search Optimization"**:
     - Meta title and description inputs with recommended character counters (60 and 160 chars).
     - Live Google SERP search snippet preview showing URL, title, and meta description as they will appear in real Google Search results.
- Preserved zero border-radius policy on the public website (`/responsible-travel`) and default Vuetify styling without arbitrary classes in the admin panel.

---

## 2. Detailed Technical Changes

### A. Files Modified
- [`packages/admin/resources/admin/pages/website-pages/WebsitePageDetail.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/website-pages/WebsitePageDetail.vue):
  - Refactored `v-tabs` to 2 tabs: `Tab 1: Page Content & Sections` and `Tab 2: SEO & Search Optimization`.
  - Replaced flat section cards with `<v-expansion-panels>` collapsible accordion blocks.
  - Implemented `expandAll` and `collapseAll` controls with reactive `expandedPanels` state.
  - Added per-section inline saving (`saveSection(section)`) and reordering buttons.
  - Added live Google Search preview widget in the SEO tab.
- [`packages/admin/resources/admin/pages/website-pages/WebsitePage.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/website-pages/WebsitePage.vue):
  - Handled Axios API response unwrapping defensively (`rawData?.data`) so datatables render rows properly.
  - Synchronized route navigation to `adminWebsitePageDetail`.
- [`packages/admin/resources/admin/router/index.ts`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/router/index.ts):
  - Added route alias `adminWebPageDetail` mapping to `WebsitePageDetail.vue` to prevent broken navigation from legacy links.

---

## 3. Verification & Testing

### A. Feature & Unit Tests
```bash
php artisan test --filter=AdminWebsitePageCrudTest
```
**Output**:
```text
   PASS  Tests\Feature\AdminWebsitePageCrudTest
  ✓ can list and get website page details                                0.96s  
  ✓ can update page notice and cta fields                                0.02s  
  ✓ can manage modular sections with content items                       0.02s  
  ✓ can attach and detach media attachments                              0.02s  
  ✓ public responsible travel page renders with database data            0.03s  

  Tests:    5 passed (38 assertions)
  Duration: 1.59s
```

### B. Vite Production Build
```bash
npm run build
```
**Output**:
```text
vite v6.3.5 building for production...
✓ built in 16.67s
public/build/assets/WebsitePageDetail-BG5cwJSP.js   32.78 kB │ gzip: 9.09 kB
```

---

## 4. Next Steps & Handoff Notes
- Admin detail view for Responsible Travel (`https://eath.test/admin/website-pages/9`) is accessible and functional with 2 tabs and collapsible expansion panels for all 7 sections.
- All changes are in place, tested, and ready for user inspection.
