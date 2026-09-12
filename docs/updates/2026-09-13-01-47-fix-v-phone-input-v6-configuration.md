# Admin Panel: Fix v-phone-input v6 Configuration

## Summary
Fixed `v-phone-input@6.0.1` integration by importing required package styles (`v-phone-input/styles`), correcting deprecated v5 options to their v6 counterparts (`countryDisplayComponent`), and configuring a custom display component to render the **Flag and Country Code** (e.g. 🇳🇵 +977) in the selected country box.

## Detailed Changes

### 1. `packages/admin/resources/admin/main.ts`
- Imported `v-phone-input/styles` so all flex layouts, field joining borders, and icon containers are properly styled.
- Replaced outdated v5 properties (`countryIconMode`, `countryIconComponent`, `enableSearchingCountry`) with the proper v6 `countryDisplayComponent` option.
- Configured a `CountryFlagAndCode` component for `countryDisplayComponent`:
  - When `decorative: false` (in the selection field), it renders the SVG flag icon and the dial code (`+${country.dialCode}`).
  - When `decorative: true` (inside dropdown list items), it renders only the flag icon so the menu item displays the flag, full country name, and dial code.

### 2. `packages/admin/resources/admin/admin.scss`
- Added `--v-phone-input-country-width: 6.8rem !important` and tailored field inner padding to comfortably fit the flag icon and dial code without clipping.

## Verification Commands & Outputs

### 1. Vite Production Build Check
```bash
cd packages/admin && npm run build
```
**Output:**
```text
✓ built in 22.87s
Status: 0 errors
```

## Next Steps
- Continue using `<v-phone-input>` with standard input props (`density="comfortable" variant="outlined" color="primary"`), which automatically inherits the flag + dial code display globally.
