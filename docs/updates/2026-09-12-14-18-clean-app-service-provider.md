# Update: Clean AppServiceProvider & Remove Obsolete Website View Composer

**Timestamp**: 2026-09-12 14:18:00 NPT (UTC+05:45)  
**Author**: Antigravity Assistant  
**Status**: Completed & Verified  

---

## 1. Summary & Objective

1. **Purged Obsolete View Composer Bloat**: Removed ~130 lines of legacy `View::composer('website.*', ...)` from `app/Providers/AppServiceProvider.php`.
2. **Fixed Architectural Boundary**: Root Laravel service providers should not contain package-specific domain queries. If the website package requires view composers or view-shared data, it belongs cleanly within `packages/website/src/WebsiteServiceProvider.php`.
3. **Resolved Redundancy**: The legacy composer was attempting to inject `$travelPackages`, `$travelPackagesByDestination`, `$safetyBlogs`, `$menus`, `$settings`, and `$destinations` for old prototype views (`website.*`). All active public routes render under `website_preview.*` and receive structured domain data directly via `WebsiteCatalogRepository`.

---

## 2. Detailed Technical Changes

### A. Files Modified
- `app/Providers/AppServiceProvider.php`:
  - Removed all database models imports (`Article`, `Country`, `Destination`, `Journey`, `WebsiteSetting`).
  - Removed `View::composer('website.*', ...)` database and cache queries.
  - Retained production HTTPS and URL scheme forcing in `boot()`.
  - Left a lightweight, standard Laravel `AppServiceProvider`.

---

## 3. Verification & Testing

1. **Migration & Seed Test**:
   - Ran `php artisan migrate:fresh --seed` against SQLite.
   - All 42 migrations and seeders executed with 0 errors.

2. **Public Route Render Check**:
   - Rendered active public website endpoints:
     - `/` => 200 OK
     - `/treks` => 200 OK
     - `/treks/everest-base-camp` => 200 OK
     - `/destinations` => 200 OK
     - `/destinations/everest` => 200 OK
     - `/departures` => 200 OK
     - `/travel-guide` => 200 OK
     - `/guides` => 200 OK
     - `/faqs` => 200 OK

---

## 4. Next Steps & Handoff Notes

- If global header/footer navigation or settings ever need a shared view composer, attach it within `packages/website/src/WebsiteServiceProvider.php` to maintain strict modularity.
