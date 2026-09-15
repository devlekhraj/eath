# When to Go Option 1: Editorial Alpine Calendar Matrix

## Summary
Implemented **Option 1 (Editorial Alpine Calendar)** for the 12-month calendar selector grid on `/when-to-go`. Each month item now displays a distinctive seasonal top-border accent, an inline seasonal SVG glyph, a seasonal trail kicker, a faint architectural month number watermark, and zero border-radius styling with a crisp selection outline.

## Detailed Changes

### Blade Partials & Styling
- **`packages/website/resources/views/website_preview/pages/months/partials/grid.blade.php`**:
  - Implemented seasonal metadata mapping strictly adhering to the EATH Travels brand palette:
    - **Autumn (Sep, Oct, Nov)**: Top border `#e11d48` (Expedition Crimson), Mountain Peak SVG glyph, and trail kickers (`Post-Monsoon Clarity`, `Peak Trekking Season`, `Sharp Panoramas`).
    - **Spring (Mar, Apr, May)**: Top border `#0284c7` (Himalayan Azure), Bloom/Sun SVG glyph, and kickers (`Wildflower Bloom`, `Prime Spring Window`, `Climbing Window`).
    - **Winter (Dec, Jan, Feb)**: Top border `#0c4a6e` (Deep Alpine Navy), Frost/Snowflake SVG glyph, and kickers (`Crisp Sunshine`, `Tranquil Winter`, `Late Winter Sun`).
    - **Summer / Monsoon (Jun, Jul, Aug)**: Top border `#64748b` (Slate Charcoal), Rain-shadow cloud SVG glyph, and kickers (`Rain-Shadow Treks`, `Trans-Himalayan Dry`, `High Yak Pastures`).
  - Added architectural month numeral watermark (`01` through `12`) positioned subtly in the bottom-right with 5% opacity.
  - Formatted route count with hairline top divider and interactive arrow.
  - Enforced zero border-radius (`border-radius: 0 !important;`) and zero drop-shadow (`box-shadow: none !important;`).

- **`packages/website/resources/website/scss/website-preview.scss`**:
  - Set `border-radius: 0 !important;` globally on `.website-month-tile`.
  - Configured `&--selected` state with `outline: 2px solid var(--color-primary); outline-offset: -1px;` to preserve the 3px seasonal top border without layout shifting.

## Verification Commands & Outputs
- `php artisan test --filter=WhenToGo`:
  ```bash
  PASS  Tests\Feature\WhenToGoAndTravelMonthsTest
  ✓ public when to go overview renders successfully with dynamic data    2.76s  
  ✓ public when to go month detail renders successfully with faqs and h… 1.93s  
  ✓ all twelve months return 200 ok                                      3.46s  
  ✓ admin can view and update travel month details                       1.73s  
  ✓ public when to go ajax request returns json partials without full r… 1.73s  

  Tests: 5 passed (58 assertions)
  Duration: 12.29s
  ```
- `npm run build`:
  ```bash
  ✓ built in 19.84s
  ```

## Next Steps
- Review Option 1 in browser at `https://eath.test/when-to-go`.
- If preferred, proceed to inspect Option 2 or combine selected elements.
