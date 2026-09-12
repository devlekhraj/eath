# Admin Panel: Fix Phone Input Layout, Focus Expansion & Unified Borders

## Summary
Addressed UI issues shown in the country selection screenshot for `v-phone-input`:
1. **Prevented Country Field Ballooning on Focus**: Overrode the default `v-phone-input` behavior where `v-autocomplete.v-phone-input--focused` expanded to 70% width, which was squishing the phone number text input into a tiny box. Locked the country selector to `6.5rem` whether focused or unfocused.
2. **Unified Border Joining**: Removed the right border-radius from the country selector and left border-radius from the phone input, with `-1px` margin-inline overlap and `z-index: 2` on focus so the two inputs join into a single, cohesive control without awkward gaps or double borders.
3. **Dropdown Menu Width**: Ensured `.v-phone-input__country__menu` has `min-width: 300px` so that both the country name and dial code (e.g. `+44`) are clearly visible without being clipped.

## Detailed Changes

### 1. `packages/admin/resources/admin/admin.scss`
- Overrode `.v-phone-input`:
  - Enforced fixed `6.5rem` width on `.v-phone-input__country__input.v-input` across normal and focused states (`--v-phone-input-country-width: 6.5rem` and `--v-phone-input-country-autocomplete-width: 6.5rem`).
  - Added seamless outline joining: `.v-field` and `.v-field__outline__end` border radii on the country input set to `0` on the right side; `.v-field` and `.v-field__outline__start` on the phone input set to `0` on the left side with `margin-inline-start: -1px`.
  - Added `z-index: 2` to whichever input is focused so active outline borders layer correctly.
  - Formatted `.v-phone-input__country__menu` with `min-width: 300px !important` and `padding-inline: 12px` to display flags, country names, and dial codes cleanly.

## Verification Commands & Outputs

### 1. Vite Build Check
```bash
npm run build
```
**Output:**
```text
✓ 908 modules transformed.
✓ built in 21.87s
Status: Exited with code 0 (0 errors)
```

## Next Steps
- Refresh the browser and verify that clicking the country selector opens the dropdown with ample width while keeping the phone number input at full size without squishing.
