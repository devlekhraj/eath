# Update: Fix Compare Click Normalization

**Timestamp**: 2026-09-13 03:05:58 NPT (UTC+05:45)  
**Author**: Codex  
**Status**: Completed & Verified  

---

## 1. Summary & Objective
- Investigated why clicking `Add to Compare` refreshed the page and did not visibly add a trek.
- Tightened the client-side comparison API so clicked trek IDs are normalized before checking, adding, removing, or replacing items.

---

## 2. Detailed Technical Changes

### A. Files Created
- `docs/updates/2026-09-13-03-05-fix-compare-click-normalization.md`: Added this update log.

### B. Files Modified
- `packages/website/resources/website/js/website-preview.js`: Normalized legacy/current trek IDs at the `WebsiteCompare.has()`, `add()`, `remove()`, and `replace()` API boundary.
- `public/build/manifest.json`: Updated by the production Vite build.
- `public/build/assets/website-preview-D4mC8MUI.js`: Added by the production Vite build.
- `public/build/assets/website-preview-DwtyPM8F.js`: Removed by the production Vite build hash rotation.

### C. Files Deleted / Renamed
- No source files were deleted or renamed.

### D. Database & Schema Changes
- No database or schema changes.

---

## 3. Verification & Testing

```bash
DB_CONNECTION=sqlite DB_DATABASE=:memory: php artisan test tests/Feature/WebsiteCompareTreksTest.php
```

- **Test Results**: Passed. `1 passed (4 assertions)`.

```bash
npm run build
```

- **Test Results**: Passed. Vite completed successfully with the existing CSS nesting target warning from the build pipeline.

---

## 4. Next Steps & Handoff Notes
- The compare click handler now accepts both old `t-*` IDs and current slug IDs at every public compare method.
- If the browser still refreshes after deployment, confirm the latest built `website-preview` asset is being served and clear any stale browser/CDN cache.
