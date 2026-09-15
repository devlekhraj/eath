# When to Go Non-Refresh AJAX Month Switching

## Summary
Implemented smooth AJAX-based month switching on `/when-to-go` with `history.pushState` URL synchronization and progressive enhancement fallback. Users can click any calendar month tile without page refreshes, scroll resets, or white screens, while preserving direct URL bookmarking, browser back/forward navigation, and SEO crawlers.

## Detailed Changes

### Website Controller & Partials
- **`packages/website/src/Http/Controllers/TravelMonthController.php`**:
  - Added AJAX and JSON request handling in `index(Request $request)`.
  - Returns rendered `grid_html` and `content_html` partials along with month metadata and dynamic page title for seamless client updates.
  - Retains standard full-page Blade view response for direct links, standard navigation, and crawlers.

- **`packages/website/resources/views/website_preview/pages/months/partials/grid.blade.php`**:
  - Extracted Seasonality Matrix 12-month interactive grid into a reusable partial with data attributes (`data-month-slug`, `data-month-id`) and reset link (`.when-to-go-reset-link`).
  - Maintains zero border-radius (`border-radius: 0 !important;`) and zero drop-shadow (`box-shadow: none !important;`) policies.

- **`packages/website/resources/views/website_preview/pages/months/partials/selected_content.blade.php`**:
  - Extracted the dynamic month content sections into a reusable partial:
    - Section 5: Selected Month Overview Panel (`#selected-month-panel`)
    - Section 6: Relevant Sample Trek Results
    - Section 7: Dynamic CTA Banner Carrying Selected Month

- **`packages/website/resources/views/website_preview/pages/months/index.blade.php`**:
  - Replaced inline grid and selected content with container elements `#when-to-go-grid-container` and `#selected-month-content`.
  - Added modern vanilla JS progressive enhancement in `@push('scripts')`:
    - Intercepts clicks on `.website-month-tile`, `.when-to-go-reset-link`, and `.when-to-go-month-link`.
    - Optimistically highlights the active month tile in the grid.
    - Fades content container gently while fetching JSON via `fetch()`.
    - Updates DOM with rendered partials and title.
    - Synchronizes browser address bar with `window.history.pushState`.
    - Listens to `popstate` to handle browser Back and Forward button history navigation.
    - Reconciles trek card compare toggles via `window.websiteCompare.reconcile()`.
    - Automatically falls back to native page navigation if network errors occur.

### Automated Tests
- **`tests/Feature/WhenToGoAndTravelMonthsTest.php`**:
  - Added `test_public_when_to_go_ajax_request_returns_json_partials_without_full_refresh()` verifying JSON structure, `grid_html`, `content_html`, selected classes, and reset link.

## Verification Commands & Outputs
- `php artisan test --filter=WhenToGo`:
  ```bash
  PASS  Tests\Feature\WhenToGoAndTravelMonthsTest
  ✓ public when to go overview renders successfully with dynamic data    2.88s  
  ✓ public when to go month detail renders successfully with faqs and h… 1.96s  
  ✓ all twelve months return 200 ok                                      3.54s  
  ✓ admin can view and update travel month details                       1.84s  
  ✓ public when to go ajax request returns json partials without full r… 1.82s  

  Tests: 5 passed (58 assertions)
  Duration: 12.56s
  ```

## Next Steps
- Verify visual transition in browser at `https://eath.test/when-to-go`.
