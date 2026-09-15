# Complete AJAX-Driven Himalayan Trek Planner (`/plan-my-trek`)

**Date & Time**: 2026-09-15 11:50 NPT (UTC+05:45)  
**Scope**: Public Website Interactive Planner (`/plan-my-trek`, `/plan-my-trek/wizard`, `/plan-my-trek/review`, `/plan-my-trek/contact`, `/plan-my-trek/confirmation`)

---

## Summary
Completely transformed the multi-step Himalayan Trek Planner into a seamless single-page application (SPA) experience using AJAX:
- Eliminated full-page reloads across all 8 planner stages (Mode Start, Step 1 Timing, Step 2 Party & Travelers, Step 3 Preferences, Step 4 Budget, Step 5 Route Matches & Selection, Step 6 Review, Step 7 Contact Details, and Step 8 Confirmation Receipt).
- Preserved browser history with `window.history.pushState` and `popstate`, ensuring the browser address bar accurately reflects steps (e.g., `/plan-my-trek/wizard?step=travelers`) and native browser Back/Forward buttons navigate steps without page reloads.
- Retained full progressive enhancement: direct URL visits and hard refreshes render complete SSR Blade views with standard layout.

---

## Detailed Changes

### 1. Backend Controller (`packages/website/src/Http/Controllers/PlannerController.php`)
- Added `isAjaxRequest(Request $request)` detection helper checking `$request->ajax()`, `X-Planner-Ajax === '1'`, and `$request->wantsJson()`.
- Updated GET endpoints (`index`, `wizard`, `review`, `contact`, `confirmation`) to return structured JSON (`success: true`, `step`, `url`, `title`, `html`) when invoked via AJAX.
- Updated POST endpoints (`start`, `reset`, `step`, `select`, `submit`):
  - On validation failures in step progression: returns 422 JSON with detailed field errors without triggering redirect loops.
  - On contact submission validation failures: returns 422 JSON with error messages.
  - On success: returns JSON containing `redirect` URL, step indicators, and reference tokens for instant client-side transitions.

### 2. Blade Templates (`packages/website/resources/views/website_preview/pages/planner/`)
- Unified all 5 planner views under `<div id="planner-app" data-planner-root class="website-container" ...>`:
  - `start.blade.php`
  - `step.blade.php`
  - `review.blade.php`
  - `contact.blade.php`
  - `confirmation.blade.php`
- Shifted breadcrumb rendering inside `#planner-app` and set `$hideTopBreadcrumbs = true`, allowing breadcrumbs to transition dynamically with step swaps.
- Exposed `window.updateTimingMode` and `window.updateChildrenUI` globally in `step.blade.php` to ensure dynamic controls function reliably across AJAX swaps.
- Cleaned up conditional inline styles in `step.blade.php` and `contact.blade.php` by placing Blade `@if` outside the `style="..."` attribute string, resolving CSS grammar parsing warnings in IDEs (`{ expected css(css-lcurlyexpected)`).
- Eliminated all residual `border-radius: var(--radius-md);` declarations across all planner views in strict compliance with the Universal Zero Border-Radius Policy (`border-radius: 0 !important;`).
- Resolved JavaScript syntax warning in `master.blade.php` by encapsulating the comparison endpoints payload in a dedicated `<script id="website-compare-endpoints" type="application/json">` tag.

### 3. Frontend AJAX Module (`packages/website/resources/website/js/modules/website-planner-ajax.js`)
- Created modular driver `initWebsitePlannerAjax()`:
  - Intercepts form submissions targeting `/plan-my-trek*` within `#planner-app`.
  - Captures submitter button names and values (e.g. `selected_trek_id`, `action=custom_request`).
  - Intercepts all internal navigation links within `#planner-app` (stepper nav, sidebar edits, back buttons, resume links).
  - Handles `popstate` events to navigate browser history seamlessly via AJAX.
  - Manages loading state and button busy states.
  - Handles 422 validation errors by dynamically inserting the `#planner-error-summary` alert and highlighting invalid fields without page reloads.
  - Re-initializes step controls (timing radios, child age bands, focus management) and smoothly scrolls to top of `#planner-app`.
- Integrated and bootstrapped in `packages/website/resources/website/js/website-preview.js`.

---

## Verification Commands & Outputs

```bash
# 1. Feature test verification for AJAX planner
php artisan test --filter=WebsitePlannerAjaxTest
# Output:
# PASS  Tests\Feature\WebsitePlannerAjaxTest
# ✓ planner start page renders cleanly via ajax
# ✓ planner start action returns json with next step
# ✓ planner wizard timing step validates and advances via ajax
# ✓ planner wizard validation failure returns 422 json with errors
# ✓ planner wizard full flow to review and contact submission via ajax
# ✓ planner reset clears draft via ajax
# Tests: 6 passed (32 assertions), Duration: 18.89s

# 2. Regression verification on presets and comparisons
php artisan test --filter=WebsiteComparePresetsTest
# Output:
# PASS  Tests\Feature\WebsiteComparePresetsTest
# Tests: 4 passed (30 assertions), Duration: 12.35s

# 3. Production asset compilation
npm run build
# Output:
# ✓ built in 22.47s
```

---

## Next Steps
- Validate real user interactions in browser across all planner steps on `https://eath.test/plan-my-trek`.
