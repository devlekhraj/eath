# Remove Elevation From Itinerary Expansion Panels

**Date & Time (Nepal Time / NPT / UTC+05:45):** 2026-09-13 22:48  
**Scope:** Admin Panel UI (`packages/admin/resources/admin/`)  

---

## Summary

Removed all elevation and box shadows from itinerary items and expansion panel components in the admin panel. Configured global defaults in Vuetify theme settings and SCSS to strictly enforce zero elevation and zero box-shadow on all `VExpansionPanels` and `VExpansionPanel` components across the admin interface.

---

## Detailed Changes

1. **Itinerary Tab View (`packages/admin/resources/admin/pages/journeys/detail_tabs/TabItinerary.vue`)**:
   - Updated `<v-expansion-panels>` to include `flat` and `elevation="0"`.
   - Updated `<v-expansion-panel>` to include `elevation="0"` and class `elevation-0`.
   - Added scoped styling `:deep(.v-expansion-panels), :deep(.v-expansion-panel), :deep(.v-expansion-panel-title), :deep(.v-expansion-panel__shadow) { box-shadow: none !important; }` to eliminate all browser-rendered shadows.

2. **Itinerary Form View (`packages/admin/resources/admin/pages/journeys/form_section/JourneyItineraryForm.vue`)**:
   - Replaced legacy `elevation="1"` on `<v-expansion-panels>` with `flat elevation="0"`.
   - Explicitly added `elevation="0"` to each child `<v-expansion-panel>`.

3. **Global Vuetify Defaults (`packages/admin/resources/admin/plugins/vuetify.ts`)**:
   - Registered global defaults for `VExpansionPanels`: `{ flat: true, elevation: 0 }`.
   - Registered global defaults for `VExpansionPanel`: `{ elevation: 0 }`.

4. **Global Admin SCSS (`packages/admin/resources/admin/admin.scss`)**:
   - Added global rule:
     ```scss
     .v-expansion-panels,
     .v-expansion-panel,
     .v-expansion-panel__shadow {
         box-shadow: none !important;
     }
     ```

5. **Admin Style Documentation (`docs/admin-style.md`)**:
   - Documented `VExpansionPanels` and `VExpansionPanel` zero-elevation configuration in the global component defaults table.

---

## Verification Commands & Outputs

1. **Vite Frontend Build**:
   ```bash
   npm run build
   ```
   *Output:*
   - Built in 21.81s with exit code 0. No template, script, or styling errors.

2. **Backend Feature Tests**:
   ```bash
   php artisan test --filter=AdminJourneyCrudTest
   ```
   *Output:*
   ```text
   PASS  Tests\Feature\AdminJourneyCrudTest
   ✓ can show journey with media attachments
   ✓ can attach and update journey media attachment

   Tests:    2 passed (16 assertions)
   ```

   ```bash
   php artisan test --filter=AdminDestinationCrudTest
   ```
   *Output:*
   ```text
   PASS  Tests\Feature\AdminDestinationCrudTest
   ✓ 9 passed (46 assertions)
   ```

---

## Next Steps

- Maintain zero elevation on any future expansion panels or nested accordions created across the admin interface.
