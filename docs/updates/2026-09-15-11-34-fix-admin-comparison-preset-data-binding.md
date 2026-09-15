# Fix Comparison Presets Admin Data Binding & Journey Dropdown

## Summary

Resolved an issue where the Comparison Presets admin table appeared empty and the "Journeys to Compare" dropdown showed "No data available". 

The axios interceptor in `http.config.ts` automatically unwraps `response.data`. In `ComparisonPresetPage.vue`, referencing `resp?.data?.data` evaluated to `undefined` on array payloads, which prevented the 3 default presets and the 8 website journeys from binding to the table and modal form.

## Detailed Changes

### 1. Admin Page Data Binding
- **`packages/admin/resources/admin/pages/comparison_presets/ComparisonPresetPage.vue`**:
  - Updated `fetchData()`:
    ```js
    presets.value = Array.isArray(resp?.data) ? resp.data : (resp?.data?.data || resp || [])
    availableJourneys.value = Array.isArray(resp?.journeys) ? resp.journeys : (resp?.data?.journeys || [])
    ```
  - Both the 3 default presets and the 8 active website journeys now bind cleanly on page mount.

### 2. Form Autocomplete Fallback
- **`packages/admin/resources/admin/modal-form/comparison_presets/ComparisonPresetForm.vue`**:
  - Added internal fallback fetching (`fetchJourneysIfMissing()`) on `onMounted`.
  - Guarantees that the "Journeys to Compare (Select 1 to 3 trails)" autocomplete always has the full catalog of 8 Himalayan journeys even when opened directly.

### 3. HTTP Client Endpoints
- **`packages/admin/resources/admin/http/comparison-presets.http.ts`**:
  - Standardized leading slash across all endpoints (`/admin/comparison-presets`).

## Verification Commands & Outputs

1. **Direct API Verification via Tinker**:
   ```bash
   php artisan tinker --execute="$request = \Illuminate\Http\Request::create('/api/v1/admin/comparison-presets', 'GET'); echo json_encode(app(\Admin\Http\Controllers\ComparisonPreset\ComparisonPresetController::class)->index($request)->getData());"
   # Output:
   # data: [3 presets]
   # journeys: [8 journeys (Everest Base Camp, Annapurna Base Camp, Langtang Valley, Mardi Himal, Gokyo Lakes, Manaslu Circuit, Khopra Ridge, Upper Mustang)]
   ```

2. **Frontend Asset Rebuild**:
   ```bash
   npm run build
   # Output:
   # ✓ built in 30.24s
   ```

3. **Automated Feature Tests**:
   ```bash
   php artisan test --filter="WebsiteComparePresetsTest"
   # Output:
   # PASS Tests\Feature\WebsiteComparePresetsTest
   # Tests: 4 passed (30 assertions)
   ```

## Next Steps
- Refresh `https://eath.test/admin/comparison-presets` in your browser.
- The 3 default presets will now appear in the table with trail chips, and clicking "+ Add Comparison Preset" will display all 8 website journeys in the dropdown.
