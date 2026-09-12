# Update: Store Compare Request Timezone

**Timestamp**: 2026-09-13 03:50:35 NPT (UTC+05:45)  
**Author**: Codex  
**Status**: Completed & Verified  

---

## 1. Summary & Objective
- Added request timing and timezone fields to database-backed comparison items.
- Updated IP storage to use raw `REMOTE_ADDR` as requested.
- Removed a stray debug dump from compare metadata collection.

---

## 2. Detailed Technical Changes

### A. Files Created
- `docs/updates/2026-09-13-03-50-store-compare-request-timezone.md`: Project update log for this change.

### B. Files Modified
- `database/migrations/2026_09_13_030600_create_website_comparison_items_table.php`: Added nullable `request_time`, `request_timezone`, and `server_timezone` columns.
- `packages/website/src/Models/WebsiteComparisonItem.php`: Added fillable fields and `request_time` datetime cast.
- `packages/website/src/Services/WebsiteComparisonService.php`: Stores raw `REMOTE_ADDR`, server request time, browser timezone, and server timezone with compare rows.
- `packages/website/src/Http/Controllers/ComparisonController.php`: Validates optional `request_timezone` on compare write endpoints.
- `packages/website/resources/website/js/website-preview.js`: Sends browser timezone from `Intl.DateTimeFormat().resolvedOptions().timeZone`.
- `tests/Feature/WebsiteCompareTreksTest.php`: Verifies request time, browser timezone, server timezone, and `REMOTE_ADDR` persistence.
- `public/build/manifest.json`: Updated Vite manifest after rebuilding frontend assets.
- `public/build/assets/website-preview-8fdgH4XW.js`: Rebuilt compiled website preview JavaScript bundle.

### C. Files Deleted / Renamed
- Vite replaced the previous hashed `website-preview` JavaScript asset during the production build.

### D. Database & Schema Changes
- Added to `website_comparison_items`:
  - `request_time`
  - `request_timezone`
  - `server_timezone`

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
- Run `php artisan migrate` in the active environment before checking these columns there.
- `request_timezone` is browser-reported and depends on the visitor device settings.
