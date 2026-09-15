# Dynamic Database-Backed Comparison Presets & Quick Compare Engine

## Summary

Successfully transitioned the **Quick Comparison Presets** on the comparison page (`/compare-treks`) from static Blade HTML buttons into dynamic, database-backed entities managed via the Admin Panel (`/admin/comparison-presets`). 

Preset selections now work in real-time: clicking any preset instantly loads the selected journeys into the visitor's comparison session and displays the side-by-side comparison table (both through seamless AJAX updates and direct URL navigation with `?preset=slug`).

## Detailed Changes

### 1. Database Schema
- **`database/migrations/2026_09_15_113000_create_comparison_presets_table.php`**:
  - `id` (bigint auto-increment)
  - `name` (string)
  - `slug` (string, unique)
  - `description` (text, nullable)
  - `trek_ids` (json - array of journey slugs, e.g. `["everest-base-camp", "annapurna-base-camp", "langtang-valley"]`)
  - `sort_order` (integer, default 0)
  - `is_active` (boolean, default true)
  - `timestamps`

### 2. Eloquent Model Layer
- **`packages/admin/src/Models/ComparisonPreset.php`**:
  - Located under `packages/admin/src/Models/` with namespace `Admin\Models`.
  - Configured `$fillable = ['name', 'slug', 'description', 'trek_ids', 'sort_order', 'is_active']`.
  - Added casts: `'trek_ids' => 'array'`, `'is_active' => 'boolean'`, `'sort_order' => 'integer'`.
  - Added helper method `journeys()` resolving active `Journey` models for the preset.

### 3. Database Seeder
- **`database/seeders/WebsiteDemoSeeder.php`**:
  - Added `comparison_presets` to `$tablesToTruncate`.
  - Added `seedComparisonPresets()` seeding the 3 canonical combinations with real active database journeys:
    1. **Classic Trio: EBC vs ABC vs Langtang** (`classic-trio`)
    2. **Annapurna Ridges: Mardi Himal vs Khopra** (`annapurna-ridges`)
    3. **Everest Routes: Base Camp vs Gokyo Lakes** (`everest-routes`)

### 4. Admin Panel CRUD
- **`packages/admin/src/Http/Controllers/ComparisonPreset/ComparisonPresetController.php`**:
  - Built RESTful `index`, `show`, `store`, `update`, and `destroy` endpoints.
  - Returned `availableJourneys` alongside preset records for dynamic dropdown options.
  - Validated that `trek_ids` contains between 1 and 3 journeys.
- **`packages/admin/routes/api.php`**:
  - Registered `Route::apiResource('comparison-presets', ComparisonPresetController::class)`.
- **`packages/admin/resources/admin/http/comparison-presets.http.ts`**:
  - Created client API wrappers `getComparisonPresetsApi`, `getComparisonPresetApi`, `saveComparisonPresetApi`, and `deleteComparisonPresetApi`.
- **`packages/admin/resources/admin/modal-form/comparison_presets/ComparisonPresetForm.vue`**:
  - Created modal form loaded via `useGlobalModal()` with title, slug auto-generation, description, multi-select autocomplete for journeys (with chips, max 3), sort order, and active switch.
- **`packages/admin/resources/admin/modal-form/comparison_presets/ComparisonPresetDelete.vue`**:
  - Created confirmation dialog loaded via `useGlobalModal()`.
- **`packages/admin/resources/admin/pages/comparison_presets/ComparisonPresetPage.vue`**:
  - Built table view with preset title, description preview, slug code, journey chips mapped to real journey names, sort order, active chip, and edit/delete actions.
- **`packages/admin/resources/admin/layout/DefaultLayout.vue`**:
  - Added **"Compare Presets"** navigation item with icon `mdi-scale-balance` under Journeys.
- **`packages/admin/resources/admin/router/index.ts`**:
  - Added route `/admin/comparison-presets` mapped to `adminComparisonPresetPage`.

### 5. Website Controller & Comparison Engine
- **`packages/website/src/Http/Controllers/ComparisonController.php`**:
  - Updated `index()`:
    - Handled `$request->query('clear')`: clears visitor's comparison.
    - Handled `$request->query('preset')`: dynamically looks up active `ComparisonPreset` and sets visitor's comparison items.
    - Handled `$request->query('treks')`: dynamically accepts query parameter array or comma-separated list.
    - Queried active presets from `ComparisonPreset::where('is_active', true)->orderBy('sort_order')->get()` and passed to view.
  - Updated `set()` endpoint: accepted both `treks` array and `preset` slug.
- **`packages/website/resources/views/website_preview/pages/compare.blade.php`**:
  - Replaced hardcoded preset buttons with `@foreach($presets as $preset)` loop.
  - Attached `data-trek-ids` (JSON) and `data-preset` attributes.
  - Added quick preset switcher toolbar above the comparison table so users can switch presets without clearing.
  - Enforced Universal Zero Border-Radius (`border-radius: 0 !important;`) on cards, images, toolbars, and containers.
  - Upgraded bottom decision guidance section to the Trek Detail expedition standard `.website-final-cta`.
- **`packages/website/resources/website/js/website-preview.js`**:
  - Added `WebsiteCompare.setPreset(presetSlug)`.
  - Enhanced `a.website-compare-set-link` click interception to read `data-trek-ids`, `data-preset`, and bracketed query parameter formats (`treks[0]`, `treks[]`), updating comparison state and reloading content via AJAX smoothly.

### 6. Automated Tests
- **`tests/Feature/WebsiteComparePresetsTest.php`**:
  - `test_comparison_presets_are_seeded_and_rendered_on_compare_page`: Verified zero-state renders all 3 presets from database.
  - `test_visiting_compare_page_with_preset_sets_visitor_treks_and_renders_table`: Verified direct URL navigation with `?preset=classic-trio` saves items and renders full comparison table.
  - `test_preset_can_be_set_via_api_json_endpoint`: Verified `/compare-treks/items/set` sets preset via AJAX.
  - `test_admin_can_crud_comparison_presets_and_website_reflects_changes`: Verified full Admin CRUD API and immediate reflection on the public website.

## Verification Commands & Outputs

1. **Database Migration & Seeding**:
   ```bash
   php artisan migrate:fresh --seed
   # Output:
   # 2026_09_15_113000_create_comparison_presets_table .............. 3.41ms DONE
   # Database\Seeders\WebsiteDemoSeeder ............................. 289 ms DONE
   ```

2. **Frontend Asset Build**:
   ```bash
   npm run build
   # Output:
   # public/build/assets/ComparisonPresetPage-BhgJTwvK.js  10.40 kB │ gzip: 3.73 kB
   # ✓ built in 35.54s
   ```

3. **Comparison Presets Automated Tests**:
   ```bash
   php artisan test --filter=WebsiteComparePresetsTest
   # Output:
   # PASS Tests\Feature\WebsiteComparePresetsTest
   # ✓ comparison presets are seeded and rendered on compare page
   # ✓ visiting compare page with preset sets visitor treks and renders table
   # ✓ preset can be set via api json endpoint
   # ✓ admin can crud comparison presets and website reflects changes
   # Tests: 4 passed (30 assertions)
   ```

4. **Regression Tests**:
   ```bash
   php artisan test --filter="WebsiteCompareTreksTest|WebsiteTravelGuidePanelTest"
   # Output:
   # Tests: 9 passed (101 assertions)

   php artisan test --filter="AdminFaqPolymorphicTest|AdminGuideCrudTest"
   # Output:
   # Tests: 12 passed (80 assertions)
   ```

5. **Direct Curl Verification**:
   ```bash
   curl -sk "https://eath.test/compare-treks?preset=classic-trio" | grep -E "Journey Specifications|Everest Base Camp"
   # Output:
   # Journey Specifications table rendered with Everest Base Camp, Annapurna Base Camp, and Langtang Valley
   ```

## Next Steps
- Visit `https://eath.test/admin/comparison-presets` to add or edit comparison presets in the Admin Panel.
- Visit `https://eath.test/compare-treks` to test clicking presets and verifying the dynamic comparison table.
