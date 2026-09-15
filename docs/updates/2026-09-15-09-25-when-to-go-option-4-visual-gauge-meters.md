# When to Go Option 4: Visual Seasonal Gauge Matrix

## Summary
Implemented **Option 4 (Visual Seasonal Gauge Matrix)** for the 12-month calendar matrix on `/when-to-go`. Each month card now features a 3px seasonal top border, an expedition month number (`01`–`12`), a seasonal window badge, and a dual 5-segment architectural meter displaying **Sky Clarity** and **Trail Footprint / Crowd Activity** at a single glance.

## Detailed Changes

### Blade Partials & Visual Meters
- **`packages/website/resources/views/website_preview/pages/months/partials/grid.blade.php`**:
  - Implemented dual 5-segment flat progress meters:
    - **Clarity Meter**: 5-segment rating bar indicating atmospheric transparency and mountain visibility (e.g. 5/5 `Crystal` for October, 5/5 `Prime` for April, 4/5 `Deep Blue` for December, 2/5 `Arid` for July).
    - **Footprint Meter**: 5-segment rating bar indicating trail social density (e.g. 5/5 `Peak` for October, 4/5 `Active` for April, 1/5 `Quiet` for January, 1/5 `Serene` for July).
  - 3px top border color-coded by season (`#e11d48` Autumn, `#0284c7` Spring, `#0c4a6e` Winter, `#64748b` Summer).
  - Architectural monospace month index (`01`–`12`).
  - Route inventory counter and interactive action link.
  - Zero border-radius (`border-radius: 0 !important;`) and zero drop-shadow (`box-shadow: none !important;`).

## Verification Commands & Outputs
- `php artisan test --filter=WhenToGo`:
  ```bash
  PASS  Tests\Feature\WhenToGoAndTravelMonthsTest
  ✓ public when to go overview renders successfully with dynamic data    2.81s  
  ✓ public when to go month detail renders successfully with faqs and h… 1.92s  
  ✓ all twelve months return 200 ok                                      3.46s  
  ✓ admin can view and update travel month details                       1.86s  
  ✓ public when to go ajax request returns json partials without full r… 1.79s  

  Tests: 5 passed (58 assertions)
  Duration: 12.34s
  ```
- `npm run build`:
  ```bash
  ✓ built in 11.18s
  ```

## Next Steps
- Inspect Option 4 in browser at `https://eath.test/when-to-go`.
- Compare Option 1 (Editorial Alpine), Option 2 (Operational Data Text), and Option 4 (Visual Gauge Meters).
