# Update: Use Compare Item Model

**Timestamp**: 2026-09-13 03:43:13 NPT (UTC+05:45)  
**Author**: Codex  
**Status**: Completed & Verified  

---

## 1. Summary & Objective
- Replaced direct `DB::table('website_comparison_items')` write/delete/update usage with an Eloquent model.
- Improved latitude and longitude handling by validating coordinates on compare write endpoints and increasing browser geolocation wait time.

---

## 2. Detailed Technical Changes

### A. Files Created
- `packages/website/src/Models/WebsiteComparisonItem.php`: Eloquent model for `website_comparison_items` with fillable fields, casts, `journey` relationship, and `forVisitor` scope.
- `docs/updates/2026-09-13-03-43-use-compare-item-model.md`: Project update log for this change.

### B. Files Modified
- `packages/website/src/Services/WebsiteComparisonService.php`: Uses `WebsiteComparisonItem` for compare item persistence, deletes, replacement, trimming, and resequencing.
- `packages/website/src/Http/Controllers/ComparisonController.php`: Added optional latitude and longitude validation on compare write endpoints.
- `packages/website/resources/website/js/website-preview.js`: Increased geolocation timeout so users have time to approve browser location before the compare item is saved.
- `public/build/manifest.json`: Updated Vite manifest after rebuilding frontend assets.
- `public/build/assets/website-preview-Dt9osvez.js`: Rebuilt compiled website preview JavaScript bundle.

### C. Files Deleted / Renamed
- Vite replaced the previous hashed `website-preview` JavaScript asset during the production build.

### D. Database & Schema Changes
- No schema changes in this update.

---

## 3. Verification & Testing

```bash
php -l packages/website/src/Models/WebsiteComparisonItem.php
php -l packages/website/src/Services/WebsiteComparisonService.php
php -l packages/website/src/Http/Controllers/ComparisonController.php
```

- **Syntax Results**: Passed. No syntax errors detected.

```bash
DB_CONNECTION=sqlite DB_DATABASE=:memory: php artisan test tests/Feature/WebsiteCompareTreksTest.php
```

- **Test Results**: Passed. `5 passed (35 assertions)`.

```bash
DB_CONNECTION=sqlite DB_DATABASE=:memory: php artisan migrate:fresh --seed --force
```

- **Migration Result**: Passed. All migrations ran and seeders completed successfully.

```bash
npm run build
```

- **Build Results**: Passed. Vite completed production build successfully. Existing Browserslist and CSS nesting warnings were reported.

---

## 4. Next Steps & Handoff Notes
- Browser latitude and longitude still require the visitor to approve the browser geolocation prompt.
- Hard refresh the browser if the previous `website-preview` bundle is still cached.
