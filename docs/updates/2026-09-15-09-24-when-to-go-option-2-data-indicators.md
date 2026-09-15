# When to Go Option 2: Data & Practical Condition Indicators

## Summary
Implemented **Option 2 (Data & Practical Condition Indicators)** for the 12-month calendar selector grid on `/when-to-go`. Each month tile now highlights technical field criteria: a 4px left operational status border, Sky Clarity meter, Trail Crowd footprint rating, Target Trail suitability range, and route inventory count.

## Detailed Changes

### Blade Partials & Data Structure
- **`packages/website/resources/views/website_preview/pages/months/partials/grid.blade.php`**:
  - Replaced the aesthetic icon layout with an operational condition specification panel:
    - **4px Left Status Border**: Color-coded to season & peak suitability (`#e11d48` Autumn, `#0284c7` Spring, `#0c4a6e` Winter, `#64748b` Summer).
    - **Month Code Tag**: `M-01` through `M-12` monospace kicker badge.
    - **Sky Clarity Meter**: Specific atmospheric metric for every month (e.g. `Crystal 360° Clarity`, `Prime Panoramic`, `Dry Plateau Skies`, `Crisp Silhouettes`).
    - **Trail Crowd Indicator**: Crowd and social vibe level (e.g. `Peak Vitality`, `Active & Social`, `Quiet Sanctuaries`, `Low Footprint`).
    - **Target Trail Suitability**: Elevation corridor guidance (e.g. `Gold Standard All Routes`, `Classic High Passes`, `Mustang & Dolpo`, `Lower Foothills`).
  - Preserved zero border-radius (`border-radius: 0 !important;`) and zero drop-shadow (`box-shadow: none !important;`).
  - Seamlessly supported by existing AJAX month-swapper.

## Verification Commands & Outputs
- `php artisan test --filter=WhenToGo`:
  ```bash
  PASS  Tests\Feature\WhenToGoAndTravelMonthsTest
  ✓ public when to go overview renders successfully with dynamic data    2.77s  
  ✓ public when to go month detail renders successfully with faqs and h… 1.94s  
  ✓ all twelve months return 200 ok                                      3.49s  
  ✓ admin can view and update travel month details                       1.83s  
  ✓ public when to go ajax request returns json partials without full r… 1.79s  

  Tests: 5 passed (58 assertions)
  Duration: 12.35s
  ```
- `npm run build`:
  ```bash
  ✓ built in 13.75s
  ```

## Next Steps
- Inspect Option 2 in browser at `https://eath.test/when-to-go`.
- Compare with Option 1 or test Option 3 (Scenic photography thumbnails).
