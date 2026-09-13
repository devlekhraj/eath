# 2026-09-13-22-13 - Remove Small Size from TabMedia Action Buttons

## Summary
Removed `size="small"` from all action buttons in `packages/admin/resources/admin/pages/destinations/detail_tabs/TabMedia.vue`, allowing them to render at the standard default button size.

## Detailed Changes
- **`packages/admin/resources/admin/pages/destinations/detail_tabs/TabMedia.vue`**:
  - Removed `size="small"` from:
    - Hero banner action buttons: `Remove`, `Media Library`, `Upload Image / Replace Image`.
    - Card thumbnail action buttons: `Remove`, `Media Library`, `Upload Image / Replace Image`.
    - Destination gallery header action buttons: `Add from Library`, `Upload Photos`.

## Verification Commands & Outputs
- `npm run build`
  - Output: `built in 21.17s` (0 errors)

## Next Steps
- Continue reviewing admin panel forms and components.
