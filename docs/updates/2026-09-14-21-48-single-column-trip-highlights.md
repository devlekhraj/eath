# Journey Highlights: Single Column Layout

## Summary
Updated the Trip Highlights and Day Highlights cards across Journey Detail & Form components to render as a single full-width column per row (`cols="12"`) rather than 2 columns (`cols="12" md="6"`), providing ample horizontal space for full highlight titles and descriptions without truncated text.

## Detailed Changes

### Admin Journey Components
- `packages/admin/resources/admin/pages/journeys/detail_tabs/TabItinerary.vue`:
  - Changed `journeyHighlights` column layout from `cols="12" md="6"` to `cols="12"`.
  - Removed `text-truncate` from highlight title to allow full multi-word titles to be completely readable without ellipsis cutoff.
  - Changed day-specific itinerary highlights column layout from `cols="12" md="6"` to `cols="12"`.
- `packages/admin/resources/admin/pages/journeys/form_section/JourneyHighlightsForm.vue`:
  - Changed highlight column wrapper from `cols="12" md="6"` to `cols="12"`.
- `packages/admin/resources/admin/pages/journeys/form_section/JourneyItineraryForm.vue`:
  - Changed day highlights column wrapper from `cols="12" md="6"` to `cols="12"`.

## Verification Commands & Outputs

### 1. Admin Vite Build
```bash
cd packages/admin && npm run build
```
Output:
```text
✓ built in 14.78s (0 errors, clean build)
```

## Next Steps
- None required; layout is now clean, full-width, and single-column.
