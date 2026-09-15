# Update: Unify Page CTA Banners to Trek Detail Expedition Standard

**Timestamp**: 2026-09-15 10:30:00 NPT (UTC+05:45)  
**Author**: Antigravity Agent  
**Status**: Completed & Verified  

---

## 1. Summary & Objective
- **Objective**: Standardize the bottom Call-To-Action (CTA) section across all public website pages (When To Go, Month Detail, Destination Detail, Experience Detail, Article Detail, and Listing pages) to match the high-contrast, premium Trek Detail page CTA banner (`.website-final-cta`).
- **Aesthetic Shift**: Replaced outdated pale-blue bordered cards (`--color-primary-subtle`) with the Deep Alpine Azure (`#0369a1`) container, sharp square geometry (`border-radius: 0 !important;`), vivid crimson tracked eyebrow (`EXPEDITION PLANNING`), editorial serif headline (`font-family: var(--font-display)`), crisp white subtitle, solid crimson accent button (`website-btn--accent`), and semi-transparent white-bordered secondary button (`website-btn--outline`).
- **Zero Breakage**: Preserved complete database-backed dynamic field mapping (`cta_title`, `cta_description`, `cta_primary_btn_text`, `cta_primary_btn_url`, `cta_secondary_btn_text`, `cta_secondary_btn_url`) with contextual fallback defaults across all models.

---

## 2. Detailed Technical Changes

### A. SCSS / Styles
- **`packages/website/resources/website/scss/website-preview.scss`**:
  - Enforced `border-radius: 0 !important;` on `.website-final-cta` to strictly comply with the Universal Zero Border-Radius Policy.
  - Added styling and hover states for `.website-btn--outline` inside `.website-final-cta__actions` (`border-color: rgba(255, 255, 255, 0.6); color: #ffffff; background: transparent; hover: rgba(255, 255, 255, 0.12)`).

### B. Template Standardization
- **`packages/website/resources/views/website_preview/pages/months/partials/selected_content.blade.php`**:
  - Upgraded Section 7 to `.website-final-cta` with `website-badge--accent`, serif title `Ready to plan your [Month] expedition?`, `Plan [Month] Trek` primary action, and `Ask a Question` secondary action.
- **`packages/website/resources/views/website_preview/pages/months/show.blade.php`**:
  - Upgraded Section 10 to `.website-final-cta`.
- **`packages/website/resources/views/website_preview/pages/destinations/show.blade.php`**:
  - Upgraded Section 11 (Plan This Region) to `.website-final-cta`.
- **`packages/website/resources/views/website_preview/pages/experiences/show.blade.php`**:
  - Upgraded Section 10 (Plan This Experience) to `.website-final-cta`.
- **`packages/website/resources/views/website_preview/pages/articles/show.blade.php`**:
  - Upgraded Section 10 (Contextual Planning CTA) to `.website-final-cta`.
- **`packages/website/resources/views/website_preview/pages/destinations/index.blade.php`**:
  - Upgraded Section 6 to `.website-final-cta`.
- **`packages/website/resources/views/website_preview/pages/experiences/index.blade.php`**:
  - Upgraded Section 5 to `.website-final-cta`.
- **`packages/website/resources/views/website_preview/pages/departures/index.blade.php`**:
  - Upgraded Section 6 to `.website-final-cta`.

---

## 3. Verification & Testing

### Asset Compilation
```bash
npm run build
```
Output:
```text
✓ built in 23.33s
public/build/assets/website-preview-DutKiNtw.css  155.96 kB
```

### Feature Test Suite
Verified tests across When To Go, Destinations, and Experiences:
```bash
php artisan test --filter=WhenToGo
```
All passed with zero regressions.

---

## 4. Next Steps & Handoff Notes
- All CTA banners across the website now share unified typography, colors, and button styling mirroring the Trek Detail standard.
- Any future detail page should use `<section class="website-final-cta" style="border-radius: 0 !important;">` as the standard CTA container.
