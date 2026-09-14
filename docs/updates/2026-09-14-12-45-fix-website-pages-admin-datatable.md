# Fix Website Pages Admin List Data Table Rendering & Route Name

**Timestamp:** 2026-09-14 12:45 NPT (UTC+05:45)

## Summary

Resolved an issue on the Admin Website Pages list view (`/admin/website-pages`) where the `<v-data-table>` rendered empty due to response data format mismatch and route name resolution.

---

## Root Cause

1. **Array Unpacking:**
   In `WebsitePage.vue`, `fetchData` previously assigned `data_list.value = resp.data || []`. Since the backend API returns `{ success: true, data: [...] }`, `resp.data` was an Object rather than an Array. The `filteredItems` computed property attempted to execute `.filter()` on an Object, causing a runtime JavaScript TypeError and preventing the data table rows from rendering.

2. **Route Name Resolution:**
   The router link and edit button in `WebsitePage.vue` referenced `adminWebPageDetail`, whereas `router/index.ts` had registered the route as `adminWebsitePageDetail`.

---

## Detailed Changes

1. **`WebsitePage.vue`:**
   - Switched to using `getWebsitePagesApi()`.
   - Added safe array extraction logic:
     ```javascript
     const list = Array.isArray(rawData?.data) ? rawData.data : (Array.isArray(rawData) ? rawData : []);
     data_list.value = list;
     ```
   - Added array guard in `filteredItems` computed property (`if (!Array.isArray(data_list.value)) return []`).
   - Updated router links and edit buttons to target `adminWebsitePageDetail`.

2. **`router/index.ts`:**
   - Added route alias for `adminWebPageDetail` redirecting to `website-pages/:id` to ensure backward-compatibility.

3. **Asset Build:**
   - Executed `npm run build` to compile the updated Vue components into production bundles (`public/build/assets/WebsitePage-DE15YaWK.js`).

---

## Verification

- Ran feature test suite:
  ```bash
  php artisan test --filter=AdminWebsitePageCrudTest
  ```
  Result: 5 tests passed (38 assertions).
- Built frontend assets:
  ```bash
  npm run build
  ```
  Result: Compiled in 23s with exit code 0.
