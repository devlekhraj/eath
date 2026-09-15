# Journey Highlights: Normal v-list with Default Spacing & Inline Action

## Summary
Replaced the boxed cards in Trip Highlights with standard `<v-list>` and `<v-list-item>` components using normal (non-bold) typography, standard Vuetify item spacing, and inline edit actions aligned in the `#append` slot.

## Detailed Changes

### Admin Journey Components
- `packages/admin/resources/admin/pages/journeys/detail_tabs/TabItinerary.vue`:
  - Replaced the boxed grid cards with a clean `<v-list>` containing `<v-list-item>`.
  - Used normal font weight (`text-body-1 text-primary`) for the title, removing bold styling.
  - Placed the Edit button inline in the `#append` slot of `<v-list-item>`.
  - Added subtle `<v-divider>` between list items.
- `packages/admin/resources/admin/pages/journeys/form_section/JourneyHighlightsForm.vue`:
  - Aligned with `<v-list>` and `<v-list-item>` pattern with non-bold titles and inline edit button.

## Verification Commands & Outputs

### 1. Admin Vite Build
```bash
cd packages/admin && npm run build
```
Output:
```text
✓ built in 14.76s (0 errors, clean build)
```

## Next Steps
- None required; highlights list renders with standard Vuetify list styling.
