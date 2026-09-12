# Admin Panel: Fix v-phone-input v5 Country List & Display Configuration

## Summary
Resolved the issue in `packages/admin/resources/admin/pages/guides/modal/GuideForm.vue` where the country list/dropdown in `v-phone-input@5.1.4` was not being displayed. The root causes were:
1. `VAutocomplete` and `VSelect` from Vuetify were not globally registered on the Vue application; because `v-phone-input` dynamically resolves `countrySelectComponent.type` at runtime (`resolveDynamicComponent`), treeshaking Vuetify prevented Vue from finding the component.
2. The package CSS (`v-phone-input/dist/v-phone-input.css`) was not imported in `main.ts`, resulting in unstyled/collapsed input elements.
3. Configured custom `CountryIcon` component to display the **Flag and Country Code** (e.g. 🇳🇵 +977) in the selected country field, while rendering only the flag icon alongside country name and dial code inside the dropdown menu items.

## Detailed Changes

### 1. `packages/admin/resources/admin/main.ts`
- Imported `VAutocomplete` and `VSelect` from `'vuetify/components'` and registered them globally (`app.component('VAutocomplete', VAutocomplete)` and `app.component('VSelect', VSelect)`).
- Imported `'v-phone-input/dist/v-phone-input.css'`.
- Defined `CountryIcon` component for `createVPhoneInput`:
  - When `decorative: false` (selection display), renders SVG flag icon + country dial code (`+${country.dialCode}`).
  - When `decorative: true` (menu items), renders the SVG flag icon only so title (`name`) and append (`+dialCode`) handle text.
- Configured default country to `NP` (Nepal) with preferred countries `['NP', 'IN', 'US', 'GB', 'AU', 'CN']` and `enableSearchingCountry: true`.

### 2. `packages/admin/resources/admin/admin.scss`
- Added `.v-phone-input` style configuration with `--v-phone-input-country-width: 6.8rem !important;` to ensure flag + dial code fits comfortably without truncation.
- Configured `.v-phone-input__country__menu` typography and item sizing conforming to admin standards (`0.82rem` font size, muted dial code, 20px flag width).

## Verification Commands & Outputs

### 1. Vite Build Check
```bash
npm run build
```
**Output:**
```text
✓ 908 modules transformed.
✓ built in 24.26s
Status: Exited with code 0 (0 errors)
```

## Next Steps
- Open `GuideForm.vue` modal in the browser to verify the interactive search and country dropdown.
