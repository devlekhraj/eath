# Admin Panel: Enable Automatic Country Geolocation in AppPhoneInput

## Summary
Enabled automatic client IP country detection (`guessCountry: true`) in [`packages/admin/resources/admin/components/AppPhoneInput.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/components/AppPhoneInput.vue) using `StorageMemoIp2cCountryGuesser` to cache the detected country in `localStorage`.

## Detailed Changes

### 1. `packages/admin/resources/admin/components/AppPhoneInput.vue`
- Imported `StorageMemoIp2cCountryGuesser` from `'v-phone-input'`.
- Configured `:guess-country="guessCountry"` with `guessCountry` prop defaulting to `true`.
- Passed `:country-guesser="countryGuesser"` using `new StorageMemoIp2cCountryGuesser()`, which saves the detected country in `localStorage` for instant subsequent visits without repeated network requests.
- Retained `defaultCountry: 'NP'` as the reliable fallback when offline, on localhost, or if geolocation is blocked.

## Verification Commands & Outputs

### 1. Vite Build Check
```bash
npm run build
```
**Output:**
```text
✓ 908 modules transformed.
public/build/assets/GuideForm-MElUVOWm.js      375.39 kB │ gzip:  89.92 kB
public/build/assets/main-BJ_O_T9N.js           514.28 kB │ gzip: 156.06 kB
✓ built in 23.09s
Status: Exited with code 0 (0 errors)
```
