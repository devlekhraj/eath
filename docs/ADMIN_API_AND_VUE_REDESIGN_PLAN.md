# Admin API And Vue Redesign Plan

## Purpose

This plan defines the serial implementation steps for updating the admin backend API and Vue 3/Vuetify 3 admin panel to match the new website database schema.

The project has moved from legacy package/blog/gallery naming to the fresh domain model:

- `journeys`
- `destinations`
- `experiences`
- `travel_months`
- `journey_departures`
- `articles`
- `article_categories`
- `traveler_stories`
- `media_assets`
- `website_pages`
- `planner_submissions`
- `inquiries`
- `faqs`
- `guides`

Admin URLs can be renamed because they are internal/admin-facing. Public website URLs such as `/treks` should remain stable.

## Current State Summary

### Backend

Current admin API routes live in:

```text
packages/admin/routes/api.php
```

They still reference old controllers and route names:

- `travel-packages`
- `package-categories`
- `package-itineraries`
- `package-prices`
- `package-inclusions`
- `trek_departures`
- `featured-packages`
- `blogs`
- `blog-categories`
- `banners`
- `galleries`
- `lookups`
- `bookings`

Current admin auth is JWT-based:

```php
auth:api_admin
Auth::guard('api_admin')
```

The new requirement is:

- Login using `admins` table.
- Use Laravel Sanctum bearer tokens.
- Protected admin API routes should use `auth:sanctum`.

### Frontend

Vue admin router lives in:

```text
packages/admin/resources/admin/router/index.ts
```

Auth pages live in:

```text
packages/admin/resources/admin/pages/auth/*
```

Current frontend already stores a token in localStorage and sends:

```ts
Authorization: Bearer ${token}
```

This is compatible with Sanctum personal access tokens, so the frontend login flow needs only limited changes.

---

# Phase 1: Sanctum Admin Login

## Goal

Make admin login work from `admins` table using Sanctum tokens, then redirect to dashboard.

## Backend Changes

### 1. Update Admin Model

File:

```text
packages/admin/src/Models/Admin.php
```

Required changes:

- Add:

```php
use Laravel\Sanctum\HasApiTokens;
```

- Use trait:

```php
use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
```

- Remove JWT-specific implementation:

```php
implements JWTSubject
```

- Remove JWT methods:

```php
getJWTIdentifier()
getJWTCustomClaims()
```

Keep:

- fillable fields
- password hidden
- password hashing cast
- admin name accessor

### 2. Rewrite AdminAuthController

File:

```text
packages/admin/src/Http/Controllers/Auth/AdminAuthController.php
```

Required behavior:

- Validate:

```php
username required
password required
```

- Find admin:

```php
Admin::where('username', $request->username)
    ->where('is_active', true)
    ->first()
```

Also check status if applicable:

```php
status === Admin::STATUS_ACTIVE
```

- Verify password:

```php
Hash::check($request->password, $admin->password)
```

- Create Sanctum token:

```php
$token = $admin->createToken('admin-panel')->plainTextToken;
```

- Return:

```json
{
  "access_token": "...",
  "token_type": "bearer",
  "admin": {}
}
```

- Profile:

```php
$request->user()
```

- Logout:

```php
$request->user()?->currentAccessToken()?->delete();
```

- Remove or stop using refresh route. Sanctum tokens do not need JWT refresh.

### 3. Update API Middleware

File:

```text
packages/admin/routes/api.php
```

Replace protected admin middleware:

```php
auth:api_admin
```

with:

```php
auth:sanctum
```

Keep public:

```php
POST api/v1/admin/login
```

Remove or ignore:

```php
POST api/v1/admin/refresh
```

### 4. Config Notes

File:

```text
config/auth.php
```

Sanctum protected routes should use:

```php
auth:sanctum
```

The old `api_admin` JWT guard can remain temporarily if other code still needs it, but new admin API routes should not depend on it.

## Frontend Changes

### 1. Login API Types

File:

```text
packages/admin/resources/admin/api/auth.api.ts
```

Update response type:

```ts
export interface LoginResponse {
    access_token: string
    token_type: string
    admin?: UserProfile
}
```

Keep:

```ts
loginApi()
logoutApi()
profileApi()
```

### 2. Login Page

File:

```text
packages/admin/resources/admin/pages/auth/LoginPage.vue
```

Likely minimal changes:

- Keep username/password fields.
- Keep:

```ts
localStorage.setItem('token', resp.access_token)
router.push({ name: 'adminDashboardPage' })
```

Update error handling if backend response changes.

### 3. Axios Config

File:

```text
packages/admin/resources/admin/http.config.ts
```

Current behavior can stay:

```ts
Authorization: Bearer ${token}
```

This works with Sanctum bearer tokens.

### 4. Router Guard

File:

```text
packages/admin/resources/admin/router/index.ts
```

Initial implementation can keep:

```ts
const isLoggedIn = !!localStorage.getItem('token')
```

Later enhancement:

- verify token by calling `profileApi()` on app boot.

## Phase 1 Verification

Run:

```bash
php -l packages/admin/src/Http/Controllers/Auth/AdminAuthController.php
php -l packages/admin/src/Models/Admin.php
```

Then after safe DB setup:

```bash
php artisan migrate:fresh --seed
```

Manual verification:

1. Open `/admin/login`.
2. Login with an existing admin.
3. Confirm token stored in localStorage.
4. Confirm redirect to `/admin/dashboard`.
5. Confirm `GET /api/v1/admin/profile` works with bearer token.
6. Confirm logout deletes token.

---

# Phase 2: Replace Admin API Routes With New Domain

## Goal

Replace legacy package/blog/gallery/bookings routes with clean routes matching the new schema.

## New Route Structure

Inside:

```php
Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    ...
});
```

Recommended resources:

```php
Route::apiResource('journeys', JourneyController::class);
Route::apiResource('destinations', DestinationController::class);
Route::apiResource('experiences', ExperienceController::class);
Route::apiResource('travel-months', TravelMonthController::class);
Route::apiResource('journey-departures', JourneyDepartureController::class);
Route::apiResource('articles', ArticleController::class);
Route::apiResource('article-categories', ArticleCategoryController::class);
Route::apiResource('traveler-stories', TravelerStoryController::class);
Route::apiResource('guides', GuideController::class);
Route::apiResource('faqs', FaqController::class);
Route::apiResource('website-pages', WebsitePageController::class);
Route::apiResource('media-assets', MediaAssetController::class);
Route::apiResource('inquiries', InquiryController::class)->only(['index', 'show', 'destroy']);
Route::apiResource('planner-submissions', PlannerSubmissionController::class)->only(['index', 'show', 'destroy']);
```

Nested journey content:

```php
Route::apiResource('journeys.itinerary-days', JourneyItineraryDayController::class);
Route::apiResource('journeys.highlights', JourneyHighlightController::class);
Route::apiResource('journeys.services', JourneyServiceController::class);
Route::apiResource('journeys.prices', JourneyPriceController::class);
Route::apiResource('journeys.departures', JourneyDepartureController::class);
```

## Legacy Routes To Remove

Remove or replace:

- `travel-packages`
- `package-categories`
- `package-itineraries`
- `package-inclusions`
- `package-prices`
- `treks/{id}/fixed-departures`
- `blogs`
- `blog-categories`
- `featured-packages`
- `banners`
- `galleries`
- `lookups`
- `bookings`

## Phase 2 Verification

Run:

```bash
php artisan route:list --path=api/v1/admin
```

Confirm old package/blog/gallery routes are gone and new domain routes appear.

---

# Phase 3: Create Or Rewrite Admin Controllers

## Goal

Create controllers that use the new models directly.

## Controllers To Add Or Rewrite

Suggested namespace:

```text
packages/admin/src/Http/Controllers
```

Controllers:

- `Journey/JourneyController.php`
- `Journey/JourneyItineraryDayController.php`
- `Journey/JourneyHighlightController.php`
- `Journey/JourneyServiceController.php`
- `Journey/JourneyPriceController.php`
- `Journey/JourneyDepartureController.php`
- `Destination/DestinationController.php`
- `Experience/ExperienceController.php`
- `TravelMonth/TravelMonthController.php`
- `Article/ArticleController.php`
- `Article/ArticleCategoryController.php`
- `TravelerStory/TravelerStoryController.php`
- `Media/MediaAssetController.php`
- `WebsitePage/WebsitePageController.php`
- `PlannerSubmission/PlannerSubmissionController.php`
- `Inquiry/InquiryController.php`
- `FAQ/FaqController.php`
- `Guide/GuideController.php`

## Controller Rules

- Use new models only.
- Use Laravel validation.
- Use explicit request fields matching `$fillable`.
- Return consistent JSON:

```json
{
  "data": {},
  "message": "..."
}
```

or paginated:

```json
{
  "data": [],
  "meta": {}
}
```

- Do not use legacy models:
  - `TravelPackage`
  - `PackagePrice`
  - `PackageInclusion`
  - `PackageItierary`
  - `TrekDeparture`
  - `Blog`
  - `Gallery`
  - `FeaturedPackage`

---

# Phase 4: Update Vue Router

## Goal

Make admin panel navigation match the new schema.

File:

```text
packages/admin/resources/admin/router/index.ts
```

## Replace Routes

Replace:

- `/admin/packages`
- `/admin/package-categories`
- `/admin/package-form`
- `/admin/featured-packages`
- `/admin/blogs`
- `/admin/blog-categories`
- `/admin/gallery`
- `/admin/bookings`
- `/admin/lookups`

With:

- `/admin/journeys`
- `/admin/journeys/:id`
- `/admin/destinations`
- `/admin/destinations/:id`
- `/admin/experiences`
- `/admin/travel-months`
- `/admin/departures`
- `/admin/articles`
- `/admin/articles/:id`
- `/admin/article-categories`
- `/admin/traveler-stories`
- `/admin/media`
- `/admin/website-pages`
- `/admin/website-pages/:id`
- `/admin/inquiries`
- `/admin/planner-submissions`
- `/admin/faqs`
- `/admin/guides`
- `/admin/guides/:id`
- `/admin/general-settings`

## Router Meta Naming

Use domain labels:

- `Journeys`
- `Journey Detail`
- `Articles`
- `Media`
- `Planner Submissions`
- `Traveler Stories`

Avoid:

- `Packages`
- `Blogs`
- `Gallery`
- `Bookings`

---

# Phase 5: Update Vue API Clients

## Goal

Rename frontend API modules to match backend route names.

## Replace Or Add Files

Current old files:

- `packages/admin/resources/admin/api/treks.api.ts`
- `packages/admin/resources/admin/api/blogs.api.ts`
- `packages/admin/resources/admin/api/bookings.api.ts`
- `packages/admin/resources/admin/api/banners.api.ts`

Recommended new files:

- `journeys.api.ts`
- `destinations.api.ts`
- `experiences.api.ts`
- `travel-months.api.ts`
- `departures.api.ts`
- `articles.api.ts`
- `article-categories.api.ts`
- `traveler-stories.api.ts`
- `media-assets.api.ts`
- `website-pages.api.ts`
- `planner-submissions.api.ts`
- `inquiries.api.ts`
- `faqs.api.ts`
- `guides.api.ts`

## API Path Examples

```ts
http.get('/admin/journeys')
http.post('/admin/journeys', payload)
http.get(`/admin/journeys/${id}`)
http.patch(`/admin/journeys/${id}`, payload)
http.delete(`/admin/journeys/${id}`)
```

---

# Phase 6: Update Or Rebuild Admin Pages

## Goal

Move admin UI away from package/blog/gallery wording and old field names.

## Recommended Page Folders

Create or migrate to:

```text
packages/admin/resources/admin/pages/journeys/*
packages/admin/resources/admin/pages/articles/*
packages/admin/resources/admin/pages/media/*
packages/admin/resources/admin/pages/experiences/*
packages/admin/resources/admin/pages/travel-months/*
packages/admin/resources/admin/pages/departures/*
packages/admin/resources/admin/pages/planner-submissions/*
packages/admin/resources/admin/pages/traveler-stories/*
packages/admin/resources/admin/pages/website-pages/*
```

## Design Rules

Follow project admin UI rules:

- Use Vuetify `v-row` / `v-col`.
- Avoid custom card borders/classes.
- Use standard Vuetify button colors.
- Avoid arbitrary Tailwind-style Vuetify colors.
- Tables should use standard global styles.
- Do not combine multiple unrelated data points in one table column.
- Keep action columns last.

---

# Phase 7: Dashboard Update

## Goal

Update dashboard metrics to use the new schema.

Dashboard should count:

- journeys
- destinations
- experiences
- upcoming departures
- articles
- guides
- inquiries
- planner submissions
- newsletter subscriptions

Old counts to remove:

- travel packages
- bookings
- blogs
- banners
- galleries
- featured packages

---

# Phase 8: Verification Checklist

Run backend checks:

```bash
php -l packages/admin/src/Http/Controllers/Auth/AdminAuthController.php
php artisan route:list --path=api/v1/admin
php artisan migrate:fresh --seed
```

Run frontend checks:

```bash
npm run build
```

Manual checks:

1. `/admin/login` loads.
2. Admin login succeeds using `admins` table.
3. Token saved in localStorage.
4. Redirect to `/admin/dashboard`.
5. Dashboard API loads.
6. Protected admin API rejects missing token.
7. Protected admin API accepts Sanctum bearer token.
8. Logout deletes current token and clears localStorage.
9. New admin router paths load.
10. Old package/blog/gallery routes are no longer shown in navigation.

---

# Phase 9: Update Log Requirement

After implementation, create a new update log file:

```text
docs/updates/YYYY-MM-DD-HH-MM-refactor-admin-api-and-sanctum-auth.md
```

Follow:

```text
docs/updates/README.md
```

The log must include:

- summary
- files created
- files modified
- files deleted/renamed
- database/API changes
- verification commands and results
- next steps

---

# Recommended Implementation Order

Do not try to rebuild every admin page first.

Recommended serial order:

1. Sanctum admin login.
2. Dashboard protected route verification.
3. Clean `api.php` route structure.
4. Add minimal CRUD controllers for new models.
5. Update Vue router labels/paths.
6. Update frontend API clients.
7. Convert one admin section at a time:
   - journeys
   - destinations
   - departures
   - articles
   - media
   - inquiries/planner submissions
8. Remove or archive old package/blog/gallery page folders after no references remain.
