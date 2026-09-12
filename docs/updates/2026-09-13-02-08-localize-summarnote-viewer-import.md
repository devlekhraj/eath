# Admin Panel: Localize SummarnoteViewer Import

## Summary
Replaced global registration of `SummarnoteViewer` in `main.ts` with explicit local imports in the 2 components where it is used.

## Detailed Changes

### 1. `packages/admin/resources/admin/main.ts`
- Removed global import and `app.component('SummarnoteViewer', SummarnoteViewer)` registration.
- Kept `main.ts` lean and focused on core plugins.

### 2. Local Imports in Consumer Components
- Added `import SummarnoteViewer from '@/components/SummarnoteViewer.vue'` in:
  - [`packages/admin/resources/admin/pages/journeys/form_section/JourneyItineraryForm.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/journeys/form_section/JourneyItineraryForm.vue)
  - [`packages/admin/resources/admin/pages/guides/tabs/TabBio.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/guides/tabs/TabBio.vue)

## Verification Commands & Outputs

### 1. Vite Build Check
```bash
npm run build
```
**Output:**
```text
✓ 907 modules transformed.
✓ built in 21.58s
Status: Exited with code 0 (0 errors)
```
- Notice that `SummarnoteViewer` is now code-split into its own chunk (`SummarnoteViewer-s7MjYgx5.js`), reducing the initial `main.js` bundle.
