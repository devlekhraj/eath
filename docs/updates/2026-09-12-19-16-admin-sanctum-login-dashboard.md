# 2026-09-12 19:16 NPT - Admin Sanctum Login and Dashboard Baseline

## Summary
- Replaced the admin JWT login flow with Laravel Sanctum personal access tokens.
- Seeded a default active admin account for local development and smoke testing.
- Updated the admin dashboard API to read from the new website-first database schema while keeping old dashboard response keys where the current Vue screen still expects them.
- Left the legacy admin CRUD route surface in place for the next rebuild phases; only the authentication guard and dashboard baseline were updated in this phase.

## Files Changed
- `packages/admin/src/Models/Admin.php`
  - Added `HasApiTokens`.
  - Removed `JWTSubject` implementation and JWT-only methods.
  - Added standard admin status constants.

- `packages/admin/src/Http/Controllers/Auth/AdminAuthController.php`
  - Login now checks the `admins` table directly by `username`.
  - Password verification uses Laravel hashing.
  - Inactive, pending, suspended, or soft-deleted admins cannot login.
  - Successful login returns a Sanctum bearer token and the admin payload.
  - Profile and logout now use the authenticated Sanctum request user.

- `packages/admin/routes/api.php`
  - Removed old user API auth routes from the admin route file.
  - Removed the old JWT admin refresh endpoint.
  - Protected admin routes now use `auth:sanctum`.

- `packages/admin/src/Http/Controllers/Dashboard/DashboardController.php`
  - Rebuilt dashboard metrics around the new schema:
    - `journeys`
    - `destinations`
    - `experiences`
    - `journey_departures`
    - `articles`
    - `guides`
    - `inquiries`
    - `planner_submissions`
    - `newsletter_subscriptions`
  - Added compatibility aliases for the current dashboard UI:
    - `total_bookings`
    - `total_packages`
    - `active_packages`
    - `total_blogs`
    - `total_customers`
    - `recent_bookings`
    - `monthly_trend.bookings`

- `database/seeders/AdminSeeder.php`
  - Added a default local admin:
    - Username: `admin`
    - Password: `password`
    - Email: `admin@example.test`

- `database/seeders/DatabaseSeeder.php`
  - Calls `AdminSeeder`.
  - Calls `WebsiteDemoSeeder` so local rebuilds still populate website demo content from the database.

- `packages/admin/resources/admin/api/auth.api.ts`
  - Login response type now accepts the returned `admin` payload.

## Verification
- PHP syntax checks passed for the changed PHP files.
- Fresh SQLite migration and seed passed:
  - `DB_CONNECTION=sqlite DB_DATABASE=/private/tmp/eath_admin_auth.sqlite php artisan migrate:fresh --seed --force`
- Admin API smoke test passed:
  - `POST /api/v1/admin/login` -> `200`, token returned
  - `GET /api/v1/admin/profile` -> `200`
  - `GET /api/v1/admin/dashboard` -> `200`
  - `POST /api/v1/admin/logout` -> `200`

## Next Phase
Phase 02 should update the Vue admin shell and navigation so the admin panel reflects the new database vocabulary:
- Journeys
- Destinations
- Experiences
- Departures
- Guides
- Articles
- Pages
- Media
- Planner submissions
- Inquiries
- Newsletter subscribers
- Website settings

After that, Phase 03 can rebuild CRUD modules one resource at a time against the new schema and remove the remaining legacy route/controller names.
