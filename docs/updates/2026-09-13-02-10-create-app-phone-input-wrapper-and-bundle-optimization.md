# Admin Panel: Create AppPhoneInput Wrapper & Optimize Main Bundle

## Summary
Created a reusable, centralized wrapper component [`AppPhoneInput.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/components/AppPhoneInput.vue) and removed `v-phone-input` from `main.ts`.

This reduced the initial `main.js` bundle size from **885 kB to 514 kB** (~370 kB reduction) by lazy-loading `v-phone-input`, `awesome-phonenumber`, and `flag-icons` only when a form containing a phone input is actually opened.

## Detailed Changes

### 1. Created [`packages/admin/resources/admin/components/AppPhoneInput.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/components/AppPhoneInput.vue)
- Encapsulated `VPhoneInput` with presets:
  - `defaultCountry: 'NP'`
  - `preferCountries: ['NP', 'IN', 'US', 'GB', 'AU', 'CN']`
  - `enableSearchingCountry: true`
  - `density: 'comfortable'`, `variant: 'outlined'`, `color: 'primary'`
  - Integrated `CountryIcon` component displaying Flag + Dial Code (`🇳🇵 +977`) in the closed selection field and Flag only in dropdown list items.
- Full `v-model` binding and event forwarding.

### 2. Updated [`packages/admin/resources/admin/pages/guides/modal/GuideForm.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/guides/modal/GuideForm.vue)
- Imported and used `<AppPhoneInput v-model="form.phone_no" label="Phone" :rules="[rules.required]" :error-messages="serverErrors.phone_no" required />`.

### 3. Cleaned up [`packages/admin/resources/admin/main.ts`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/main.ts)
- Removed `flag-icons` and `v-phone-input` imports and plugin registration.
- Reduced `main.ts` to a lean 30-line core bootstrapping file.

## Verification Commands & Outputs

### 1. Vite Build Check
```bash
npm run build
```
**Output:**
```text
✓ 908 modules transformed.
public/build/assets/GuideForm-C9-tP546.js      374.75 kB │ gzip:  89.73 kB
public/build/assets/main-B2GEp1Ic.js           514.28 kB │ gzip: 156.06 kB
✓ built in 21.65s
Status: Exited with code 0 (0 errors)
```
- **Result**: `main.js` dropped from **885 kB to 514 kB** (a 42% decrease in initial JS payload).
