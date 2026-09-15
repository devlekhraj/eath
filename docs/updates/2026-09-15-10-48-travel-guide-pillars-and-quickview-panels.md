# Travel Guide Topic Pillars & Quickview Right-Side Offcanvas Panels

## Summary

Implemented the right-side panel drawers for the Travel Guide (`/travel-guide`):
1. **Six Foundational Topic Pillars**: Clicking any pillar card opens an offcanvas right-side panel (540px) with rich static expedition data (essential field principles, critical alpine hazards, preparation checklist, and associated field guides).
2. **Guide Quick Peek**: Added a "Quick Peek" panel trigger to all guide cards and the featured dispatch card, allowing visitors to inspect executive summaries, section outlines, reading times, and applicable trek routes in the right drawer without losing their place on the catalog. Full detail pages (`/travel-guide/{slug}`) remain fully preserved for deep reading and SEO.
3. **Bottom CTA Banner Upgrade**: Upgraded the Travel Guide index bottom CTA section to the universal `.website-final-cta` expedition banner standard.

## Detailed Changes

### 1. Routes & Controllers
- **`packages/website/routes/route_website.php`**:
  - Registered `GET /travel-guide/pillar-panel/{key}` (`website.articles.pillar.panel`)
  - Registered `GET /travel-guide/{slug}/quickview` (`website.articles.quickview.panel`)
- **`packages/website/src/Http/Controllers/ArticleController.php`**:
  - `pillarPanel(Request $request, string $key)`: Returns `website_preview.pages.articles.partials.pillar_panel` with rich pillar static data (or 404).
  - `quickviewPanel(Request $request, string $slug)`: Returns `website_preview.pages.articles.partials.quickview_panel` with enriched reading times, sections outline, and applicable trek routes.
  - `getPillarsStaticData(?string $key = null): ?array`: Detailed specifications for all 6 pillars (`seasons`, `packing`, `preparation`, `planning`, `culture`, `logistics`) including rules, hazards, and checklists.

### 2. Offcanvas Partials
- **`packages/website/resources/views/website_preview/pages/articles/partials/pillar_panel.blade.php`**:
  - Offcanvas header with dynamic kicker, title, tagline, and close button.
  - Alpine hero banner image, executive summary, 5 essential field principles, critical pitfalls alert box, action checklist, related guides, and exploration links. Strict zero border-radius (`border-radius: 0 !important;`).
- **`packages/website/resources/views/website_preview/pages/articles/partials/quickview_panel.blade.php`**:
  - Offcanvas header with reading time, author, and category.
  - Full-width hero thumbnail, executive summary block, section table of contents breakdown, applicable treks badges, and direct links to full guide.

### 3. Catalog View & Global JavaScript
- **`packages/website/resources/views/website_preview/pages/articles/index.blade.php`**:
  - Section 6: Attached `data-open-panel`, `data-panel-title`, and `data-panel-size="540px"` to the six pillar cards.
  - Section 5 & 4: Added "Quick Peek" triggers alongside "Read Guide" / "Read Full Field Guide".
  - Section 8: Upgraded `.website-guide-cta` to `.website-final-cta`.
- **`packages/website/resources/website/js/website-preview.js`**:
  - Updated `window.openRightPanel` to dynamically populate `.website-join__step` kicker when provided by loaded header templates.

### 4. Automated Tests
- **`tests/Feature/WebsiteTravelGuidePanelTest.php`**:
  - `test_travel_guide_index_renders_pillars_with_panel_triggers_and_final_cta`
  - `test_pillar_panel_renders_rich_static_data_for_all_pillars`
  - `test_guide_quickview_panel_renders_article_details`

## Verification Commands & Outputs

1. **Front-end Bundle Build**:
   ```bash
   npm run build
   # Output: ✓ built in 22.55s (Vite production bundle successfully built)
   ```

2. **Travel Guide Feature Tests**:
   ```bash
   php artisan test --filter=WebsiteTravelGuidePanelTest
   # Output:
   # PASS Tests\Feature\WebsiteTravelGuidePanelTest
   # ✓ travel guide index renders pillars with panel triggers and final cta
   # ✓ pillar panel renders rich static data for all pillars
   # ✓ guide quickview panel renders article details
   # Tests: 3 passed (58 assertions)
   ```

3. **Full Suite Regression Check**:
   ```bash
   php artisan test
   # Output:
   # Tests: 69 passed (507 assertions)
   # Duration: 132.49s
   ```

## Next Steps
- Verify visual aesthetics on `https://eath.test/travel-guide`.
- Proceed with Step 2: Transition pillar and guide data to dynamic database tables (`article_categories` and `articles`) with Admin CRUD support.
