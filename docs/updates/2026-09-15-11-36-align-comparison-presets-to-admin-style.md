# Align Comparison Presets Admin Table with Admin Style Guidelines

## Summary

Audited and refactored the Comparison Presets admin table (`packages/admin/resources/admin/pages/comparison_presets/ComparisonPresetPage.vue`) and form modal (`ComparisonPresetForm.vue`) against `docs/admin-style.md`.

Eliminated anti-patterns including stacked table cells, redundant component attributes (`size="small"`, `variant="tonal"`, `rounded`), non-standard button variants, and aligned card header typography and column separation to the project's strict admin standards.

## Detailed Changes

### 1. Table Architecture (`ComparisonPresetPage.vue`)
- **One Data Point Per Column (Section 4.2)**:
  - Separated `name` and `description` which were previously stacked inside a single cell.
  - Added dedicated `Summary / Description` column with `text-caption text-slate-600` styling.
  - Maintained dedicated `Slug` column, `Trails Included` column with journey chips, `Sort Order` column, and centered `Status` column.
- **Table Cell Typography (Section 4.3 & 4.4)**:
  - Preset title strictly uses `class="text-primary text-decoration-underline"` without custom font-weight overrides (`font-weight-medium` / `bold`).
- **Global Vuetify Defaults & Attribute Deduplication (Section 2 & 8)**:
  - Removed redundant `rounded variant="tonal"` on card header avatar `<v-avatar size="24" color="primary">`.
  - Added standard card header text styling: `class="text-uppercase font-weight-medium text-slate-800" style="font-size: 0.82rem; letter-spacing: 0.03em;"`.
  - Changed Add button to `variant="flat"` per rule: *"Never use elevated; always use `variant="flat"` instead of elevated for `<v-btn>`"*.
  - Cleaned `<v-chip>` tags: removed redundant `size="small"` and `variant="tonal"`, letting global defaults in `vuetify.ts` govern sizing and curvature.
  - Maintained sticky right action column with standard sizing (no `size="small"` on `<v-btn>`).
  - Added `#no-data` slot with `<v-alert type="info">` for clean empty state handling.

### 2. Form Modal Alignment (`ComparisonPresetForm.vue`)
- Removed redundant `color="primary" hide-details` from `<v-switch v-model="form.is_active" label="Active on Website" />`.
- Enforced `variant="flat"` on the primary submit button (`<v-btn color="primary" variant="flat">Save Preset</v-btn>`).

## Verification Commands & Outputs

1. **Frontend Production Build**:
   ```bash
   npm run build
   # Output:
   # public/build/assets/ComparisonPresetPage-DwzAD9Jd.js  11.03 kB │ gzip: 3.90 kB
   # ✓ built in 22.55s
   ```

2. **Automated Feature Tests**:
   ```bash
   php artisan test --filter="WebsiteComparePresetsTest"
   # Output:
   # PASS Tests\Feature\WebsiteComparePresetsTest
   # Tests: 4 passed (30 assertions)
   ```

## Next Steps
- Refresh `https://eath.test/admin/comparison-presets` to view the refined, compliant admin table layout.
