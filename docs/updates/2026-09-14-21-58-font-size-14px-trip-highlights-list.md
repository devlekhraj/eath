# Trip Highlights List 14px Font Size Standardization

## Summary
Enforced a clean `14px` (`font-size: 14px !important; font-weight: 400; line-height: 1.5; white-space: normal;`) font styling on Trip Highlights list item titles and subtitles across the Journey Detail Itinerary tab (`TabItinerary.vue`) and the form section (`JourneyHighlightsForm.vue`).

## Detailed Changes

### Admin Panel
- **`packages/admin/resources/admin/pages/journeys/detail_tabs/TabItinerary.vue`**:
  - Updated `<v-list-item-title>` with `style="font-size: 14px !important; font-weight: 400; line-height: 1.5; white-space: normal;"`.
  - Maintained `<v-list-item-subtitle>` with `style="font-size: 14px !important; white-space: normal; line-height: 1.4;"`.
- **`packages/admin/resources/admin/pages/journeys/form_section/JourneyHighlightsForm.vue`**:
  - Updated `<v-list-item-title>` with `style="font-size: 14px !important; font-weight: 400; line-height: 1.5; white-space: normal;"`.
  - Updated `<v-list-item-subtitle>` with `style="font-size: 14px !important; white-space: normal; line-height: 1.4;"`.

## Verification Commands & Outputs
- Executed `npm run build` in `/Volumes/TOSHIBA/Herd/eath`:
  ```bash
  ✓ built in 14.32s
  ```
  Zero errors, bundle generated cleanly.

## Next Steps
- Verify visual presentation in browser to ensure clean single-column display at 14px font size.
