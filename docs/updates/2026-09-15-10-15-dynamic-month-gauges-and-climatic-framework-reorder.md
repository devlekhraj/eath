# Dynamic Travel Month Clarity & Footprint Meters and Climatic Framework Section Reordering

## Summary
1. Re-ordered the section hierarchy on `/when-to-go` by placing the **Climatic Framework: Four Himalayan Seasons** section directly above the 12-month selector grid.
2. Made **Sky Clarity** and **Trail Footprint / Crowds** ratings completely dynamic: persisted in the database (`travel_months.content`), editable via the Admin Panel Travel Month modal form, and dynamically rendered in the website month selector grid with zero-breakage fallbacks.

## Detailed Changes

### Website Template Hierarchy
- **`packages/website/resources/views/website_preview/pages/months/index.blade.php`**:
  - Moved Section 3: Climatic Framework (`Four Himalayan Seasons` overview cards) directly above the 12-Month Selector grid (`#when-to-go-grid-container`).
  - Flow now moves logically from the broad seasonal framework down into the specific calendar month-by-month selector and itinerary detail panels.

### Dynamic Database Ratings & Blade Partial
- **`database/seeders/WebsiteDemoSeeder.php`**:
  - Updated `$contentPayload` across all 12 months to store `clarity_score` (1–5), `clarity_label`, `footprint_score` (1–5), `footprint_label`, and `badge`.
- **Active Database Records**:
  - Populated all 12 `travel_months` table records with realistic Himalayan ratings and labels.
- **`packages/website/resources/views/website_preview/pages/months/partials/grid.blade.php`**:
  - Dynamically reads `$m['content']['clarity_score']`, `$m['content']['clarity_label']`, `$m['content']['footprint_score']`, `$m['content']['footprint_label']`, and `$m['content']['badge']`.
  - Dynamically computes season accent color from `$m['season']` (`#e11d48` Autumn, `#0284c7` Spring, `#0c4a6e` Winter, `#64748b` Summer).
  - Maintained contextual fallback defaults following the Zero Breakage Policy.

### Admin Panel Management
- **`packages/admin/resources/admin/modal-form/travel-months/Form.vue`**:
  - Added form input controls for managing ratings:
    - **Sky Clarity Score**: Select dropdown (1 to 5)
    - **Sky Clarity Label**: Text field (e.g. `Crystal 360° Clarity`)
    - **Trail Footprint / Crowd**: Select dropdown (1 to 5)
    - **Trail Footprint Label**: Text field (e.g. `Peak Vitality`)
    - **Seasonal Badge / Kicker**: Text field (e.g. `Peak Trekking Season`)
  - Integrated into reactive form state and `onMounted` hook with proper `mb-2` wrappers.

## Verification Commands & Outputs
- `php artisan test --filter=WhenToGo`:
  ```bash
  PASS  Tests\Feature\WhenToGoAndTravelMonthsTest
  ✓ public when to go overview renders successfully with dynamic data    2.97s  
  ✓ public when to go month detail renders successfully with faqs and h… 2.00s  
  ✓ all twelve months return 200 ok                                      3.51s  
  ✓ admin can view and update travel month details                       1.98s  
  ✓ public when to go ajax request returns json partials without full r… 1.78s  

  Tests: 5 passed (58 assertions)
  Duration: 12.74s
  ```
- `npm run build`:
  ```bash
  ✓ built in 13.82s
  ```

## Next Steps
- Verify the reordered hierarchy and dynamic meters in browser at `https://eath.test/when-to-go`.
- Test editing month clarity or footprint scores in the Admin panel under `/admin/travel-months`.
