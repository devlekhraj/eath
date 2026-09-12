# Admin Rebuild Sequence

## Purpose

This document is the execution sequence for rebuilding the admin panel around the new website database schema. Work must be done in phases, with each phase verified before moving to the next.

Primary goals:

- Admins can log in through Sanctum using the `admins` table.
- Admin panel navigation matches the new database/domain model.
- Every website-visible database entity can be managed from admin.
- Changes in admin are reflected on the public website.
- Legacy package/blog/gallery/booking naming is removed from the admin surface.

## Ground Rules

- Do not rebuild everything at once.
- Complete and verify one phase before starting the next.
- Keep public website URLs stable, especially `/treks`.
- Admin URLs may be renamed to clean domain names.
- Use the new internal domain:
  - `Journey`
  - `Destination`
  - `Experience`
  - `TravelMonth`
  - `JourneyDeparture`
  - `Article`
  - `TravelerStory`
  - `WebsitePage`
  - `MediaAsset`
- After each implementation phase, create a new update log in:

```text
docs/updates/YYYY-MM-DD-HH-MM-short-description.md
```

Follow:

```text
docs/updates/README.md
```

---

# Phase 01: Admin Login Authentication

## Objective

Make `/admin/login` work using the `admins` table and Sanctum bearer tokens.

## Backend Scope

Files:

```text
packages/admin/src/Models/Admin.php
packages/admin/src/Http/Controllers/Auth/AdminAuthController.php
packages/admin/routes/api.php
config/auth.php
```

Tasks:

1. Add Sanctum token support to `Admin`.
2. Remove JWT dependency from admin login flow.
3. Login with `username` and `password`.
4. Validate admin is active.
5. Return:

```json
{
  "access_token": "...",
  "token_type": "bearer",
  "admin": {}
}
```

6. Protect admin routes with:

```php
auth:sanctum
```

7. Implement profile using:

```php
$request->user()
```

8. Implement logout by deleting current Sanctum token.

## Frontend Scope

Files:

```text
packages/admin/resources/admin/pages/auth/LoginPage.vue
packages/admin/resources/admin/api/auth.api.ts
packages/admin/resources/admin/http.config.ts
packages/admin/resources/admin/router/index.ts
packages/admin/resources/admin/layout/DefaultLayout.vue
```

Tasks:

1. Keep username/password login.
2. Store returned token in localStorage.
3. Keep `Authorization: Bearer <token>`.
4. Redirect successful login to `/admin/dashboard`.
5. Ensure dashboard route requires token.
6. Ensure logout clears token.

## Verification

Commands:

```bash
php -l packages/admin/src/Models/Admin.php
php -l packages/admin/src/Http/Controllers/Auth/AdminAuthController.php
php artisan route:list --path=api/v1/admin
```

Manual:

1. Open `/admin/login`.
2. Submit valid admin credentials.
3. Confirm token saved.
4. Confirm redirect to `/admin/dashboard`.
5. Confirm dashboard API works.
6. Confirm logout removes token.

Exit criteria:

- Login works.
- Dashboard is reachable only after login.
- Protected API rejects missing token.

---

# Phase 02: Admin Panel Structure

## Objective

Rename and reorganize admin panel sections around the new schema before adding full CRUD.

## Files

```text
packages/admin/resources/admin/router/index.ts
packages/admin/resources/admin/layout/DefaultLayout.vue
packages/admin/resources/admin/api/*
```

## Target Admin Routes

```text
/admin/dashboard
/admin/journeys
/admin/journeys/:id
/admin/destinations
/admin/destinations/:id
/admin/experiences
/admin/travel-months
/admin/departures
/admin/articles
/admin/articles/:id
/admin/article-categories
/admin/traveler-stories
/admin/media
/admin/website-pages
/admin/website-pages/:id
/admin/faqs
/admin/guides
/admin/guides/:id
/admin/inquiries
/admin/planner-submissions
/admin/newsletter-subscriptions
/admin/settings
```

## Remove From Admin Navigation

Remove or hide old sections:

- Packages
- Package Categories
- Package Lookup
- Blogs
- Blog Categories
- Featured Packages
- Gallery
- Bookings
- Banners
- Lookups

## API Client Naming

Use new frontend API files:

```text
journeys.api.ts
destinations.api.ts
experiences.api.ts
travel-months.api.ts
departures.api.ts
articles.api.ts
article-categories.api.ts
traveler-stories.api.ts
media-assets.api.ts
website-pages.api.ts
faqs.api.ts
guides.api.ts
inquiries.api.ts
planner-submissions.api.ts
newsletter-subscriptions.api.ts
settings.api.ts
```

Exit criteria:

- Admin navigation shows new sections.
- Old package/blog/gallery labels are gone from visible navigation.
- Empty placeholder pages may exist, but routes must load.

---

# Phase 03: Foundation CRUD

## Objective

Build CRUD for entities that other website data depends on.

Do these in order:

1. Destinations
2. Experiences
3. Travel Months
4. Guides

## 03A: Destinations

Table/model:

```text
destinations
Admin\Models\Destination
```

Admin must manage:

- name
- slug
- summary
- description
- hero image
- card image
- region label
- gateway
- trailheads
- permits
- pacing note
- sort order
- featured flag
- active flag
- meta title
- meta description

Website impact:

- destinations index
- destination detail
- trek listing filters
- homepage destination sections

## 03B: Experiences

Table/model:

```text
experiences
Admin\Models\Experience
```

Admin must manage:

- name
- slug
- summary
- description
- hero image
- card image
- sort order
- featured flag
- active flag
- SEO fields

Website impact:

- experiences index/detail
- journey filters
- planner interests

## 03C: Travel Months

Table/model:

```text
travel_months
Admin\Models\TravelMonth
```

Admin must manage:

- month number
- name
- slug
- season
- summary
- description
- conditions note
- sort order
- active flag

Website impact:

- when-to-go pages
- journey seasonal suitability
- planner timing

## 03D: Guides

Table/model:

```text
guides
Admin\Models\Guide
```

Admin must manage:

- name
- slug
- role
- email
- phone
- biography
- languages
- qualifications
- years experience
- profile image
- featured flag
- active flag
- sort order
- SEO fields

Website impact:

- guides index
- guide profile
- journey guide association

Exit criteria:

- CRUD works for all four.
- Public website can read active records.
- Slugs are unique.

---

# Phase 04: Journey CRUD

## Objective

Build main journey management.

Table/model:

```text
journeys
Admin\Models\Journey
```

Admin must manage:

- destination
- guide
- name
- slug
- subtitle
- summary
- description
- overview secondary
- duration days
- duration nights
- difficulty
- max altitude
- walking hours min/max
- accommodation style
- pace
- price minor / currency / pricing basis
- featured rank
- featured flag
- active flag
- published flag
- published at
- hero image
- card image
- route map image
- accommodation note
- logistics note
- safety note
- route map note
- sort order
- SEO fields

Relationships to manage:

- experiences
- travel months
- guides if many-guide association is used

Website impact:

- homepage featured journeys
- `/treks`
- `/treks/{slug}`
- compare
- planner recommendations
- departures

Exit criteria:

- Create journey.
- Edit journey.
- Toggle active/published.
- Assign destination.
- Assign guide.
- Assign experiences.
- Assign months.
- Website listing/detail reflects changes.

---

# Phase 05: Journey Child CRUD

## Objective

Manage all journey detail data.

## 05A: Itinerary Days

Table/model:

```text
journey_itinerary_days
Admin\Models\JourneyItineraryDay
```

Fields:

- day number
- title
- route
- description
- location label
- altitude
- altitude label
- walking hours
- walking hours label
- accommodation label
- meal note
- acclimatization flag
- sort order

## 05B: Journey Highlights

Table/model:

```text
journey_highlights
Admin\Models\JourneyHighlight
```

Fields:

- title
- description
- icon
- sort order
- active flag

## 05C: Journey Services

Table/model:

```text
journey_services
Admin\Models\JourneyService
```

Fields:

- type: inclusion/exclusion
- title
- description
- sort order
- active flag

## 05D: Journey Prices

Table/model:

```text
journey_prices
Admin\Models\JourneyPrice
```

Fields:

- name
- price minor
- currency
- pricing basis
- description
- min travelers
- max travelers
- starts on
- ends on
- primary flag
- active flag
- sort order

## 05E: Journey Departures

Table/model:

```text
journey_departures
Admin\Models\JourneyDeparture
```

Fields:

- journey
- code
- start date
- end date
- status
- total seats
- available seats
- price minor
- currency
- booking deadline
- notes
- sort order
- active flag

Website impact:

- trek detail departures
- departures index
- planner selected departure

Exit criteria:

- All child records can be created/edited/deleted.
- Reordering works where applicable.
- Website detail pages update correctly.

---

# Phase 06: Editorial CRUD

## Objective

Manage all website editorial content.

## 06A: Articles

Tables/models:

```text
articles
article_categories
article_sections
article_journey
```

Admin must manage:

- categories
- article title
- slug
- summary
- body
- author name
- hero image
- publish state
- featured state
- sections
- related journeys
- SEO fields

Website impact:

- `/travel-guide`
- article detail pages
- related article blocks

## 06B: Traveler Stories

Table/model:

```text
traveler_stories
Admin\Models\TravelerStory
```

Admin must manage:

- journey
- destination
- title
- slug
- summary
- body
- traveler name
- traveler country
- traveled on
- hero image
- featured/active/published flags
- SEO fields

Website impact:

- traveler stories index/detail
- homepage story sections

## 06C: Website Pages

Tables/models:

```text
website_pages
website_page_sections
website_sections
```

Admin must manage:

- about
- contact
- safety
- responsible travel
- privacy
- terms
- booking conditions
- cancellation
- cookies
- homepage sections
- reusable page sections

Website impact:

- static pages
- policy pages
- homepage content

## 06D: FAQs

Table/model:

```text
faqs
Admin\Models\Faq
```

Admin must manage:

- question
- answer
- category
- journey
- destination
- experience
- sort order
- active flag

Website impact:

- FAQ page
- journey-specific FAQ blocks

Exit criteria:

- Editorial content can be managed without code changes.
- Published/active toggles control public visibility.

---

# Phase 07: Media Manager

## Objective

Manage media used by all website entities.

Tables/models:

```text
media_assets
media_attachments
media_variants
```

Admin must manage:

- upload media
- list/search media
- edit title
- edit alt text
- edit caption
- view dimensions/file info
- delete media safely
- attach media to:
  - journeys
  - destinations
  - experiences
  - guides
  - articles
  - stories
  - website pages

Website impact:

- hero images
- cards
- galleries
- SEO images

Exit criteria:

- Admin can upload/select media.
- Public website uses selected media.
- Missing media falls back gracefully.

---

# Phase 08: Leads And Operations

## Objective

Manage incoming user data.

## 08A: Inquiries

Table/model:

```text
inquiries
Admin\Models\Inquiry
```

Admin should:

- list
- filter by status/type
- view detail
- update status
- delete

## 08B: Planner Submissions

Table/model:

```text
planner_submissions
Admin\Models\PlannerSubmission
```

Admin should:

- list
- filter by status
- view selected journey/departure
- view preferences
- view recommendation snapshot
- update status
- delete

## 08C: Newsletter Subscriptions

Table/model:

```text
newsletter_subscriptions
Admin\Models\NewsletterSubscription
```

Admin should:

- list
- search email/name
- subscribe/unsubscribe
- delete

Exit criteria:

- Operational data is visible and manageable.
- No old booking table required unless real paid booking is later designed.

---

# Phase 09: Dashboard

## Objective

Update dashboard metrics to reflect new schema.

Dashboard should show:

- total journeys
- published journeys
- active destinations
- active experiences
- upcoming departures
- articles
- guides
- open inquiries
- planner submissions
- newsletter subscribers

Remove old metrics:

- packages
- blogs
- galleries
- banners
- bookings
- featured packages

Exit criteria:

- Dashboard loads after login.
- Metrics are based on new models.

---

# Phase 10: Legacy Cleanup

## Objective

Remove or archive old code once replacements are working.

Legacy backend candidates:

- `TravelPackageController`
- `PackageCategoryController`
- `PackageItinareryController`
- `PackageInclusionController`
- `PackagePriceController`
- `TrekDepartureController`
- `TrekImageController`
- `BlogController`
- `BlogCategoryController`
- `BannerController`
- `GalleryController`
- `LookupController`
- `FeaturedPackageController`
- `BookingController`

Legacy frontend candidates:

- `pages/packages/*`
- `pages/blogs/*`
- `pages/featured-packages/*`
- `pages/gallery/*`
- `pages/bookings/*`
- old `treks.api.ts`
- old `blogs.api.ts`
- old `bookings.api.ts`
- old `banners.api.ts`

Exit criteria:

- No visible admin navigation points to old sections.
- No active API routes point to old controllers.
- No active frontend imports point to old API modules/pages.

---

# Overall Recommended Order

1. Phase 01: Admin login authentication.
2. Phase 02: Admin panel structure.
3. Phase 03: Foundation CRUD.
4. Phase 04: Journey CRUD.
5. Phase 05: Journey child CRUD.
6. Phase 06: Editorial CRUD.
7. Phase 07: Media manager.
8. Phase 08: Leads and operations.
9. Phase 09: Dashboard.
10. Phase 10: Legacy cleanup.

This order prevents circular dependency problems and gives a working checkpoint after every major step.
