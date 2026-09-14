# Rename packages/admin/resources/admin/api to http and *.api.ts to *.http.ts

**Date & Time**: 2026-09-14 14:56 (NPT / UTC+05:45)  
**Scope**: `packages/admin/resources/admin/api` -> `packages/admin/resources/admin/http`, all admin consumers

## Summary
Renamed the Admin panel API services directory from `packages/admin/resources/admin/api` to `packages/admin/resources/admin/http`. Renamed all service files from `*.api.ts` to `*.http.ts`. Updated all 90 import statements across components, pages, tabs, and modals from `@/api/<name>.api` to `@/http/<name>.http`.

## Detailed Changes

1. **Renamed Files**:
   - `packages/admin/resources/admin/api/articles.api.ts` -> `packages/admin/resources/admin/http/articles.http.ts`
   - `packages/admin/resources/admin/api/auth.api.ts` -> `packages/admin/resources/admin/http/auth.http.ts`
   - `packages/admin/resources/admin/api/dashboard.api.ts` -> `packages/admin/resources/admin/http/dashboard.http.ts`
   - `packages/admin/resources/admin/api/destinations.api.ts` -> `packages/admin/resources/admin/http/destinations.http.ts`
   - `packages/admin/resources/admin/api/experiences.api.ts` -> `packages/admin/resources/admin/http/experiences.http.ts`
   - `packages/admin/resources/admin/api/faqs.api.ts` -> `packages/admin/resources/admin/http/faqs.http.ts`
   - `packages/admin/resources/admin/api/gallery.api.ts` -> `packages/admin/resources/admin/http/gallery.http.ts`
   - `packages/admin/resources/admin/api/guides.api.ts` -> `packages/admin/resources/admin/http/guides.http.ts`
   - `packages/admin/resources/admin/api/inquiries.api.ts` -> `packages/admin/resources/admin/http/inquiries.http.ts`
   - `packages/admin/resources/admin/api/journey-departures.api.ts` -> `packages/admin/resources/admin/http/journey-departures.http.ts`
   - `packages/admin/resources/admin/api/journeys.api.ts` -> `packages/admin/resources/admin/http/journeys.http.ts`
   - `packages/admin/resources/admin/api/media-assets.api.ts` -> `packages/admin/resources/admin/http/media-assets.http.ts`
   - `packages/admin/resources/admin/api/newsletter-subscriptions.api.ts` -> `packages/admin/resources/admin/http/newsletter-subscriptions.http.ts`
   - `packages/admin/resources/admin/api/planner-submissions.api.ts` -> `packages/admin/resources/admin/http/planner-submissions.http.ts`
   - `packages/admin/resources/admin/api/settings.api.ts` -> `packages/admin/resources/admin/http/settings.http.ts`
   - `packages/admin/resources/admin/api/travel-months.api.ts` -> `packages/admin/resources/admin/http/travel-months.http.ts`
   - `packages/admin/resources/admin/api/traveler-stories.api.ts` -> `packages/admin/resources/admin/http/traveler-stories.http.ts`
   - `packages/admin/resources/admin/api/website-pages.api.ts` -> `packages/admin/resources/admin/http/website-pages.http.ts`
   - `packages/admin/resources/admin/api/website-sections.api.ts` -> `packages/admin/resources/admin/http/website-sections.http.ts`
   - Removed old empty `packages/admin/resources/admin/api` directory.

2. **Consumer Imports Updated**:
   - Updated 90 files across `modal-form/`, `pages/`, `components/`, and `layout/` from `from '@/api/*.api'` to `from '@/http/*.http'`.

## Verification Commands & Outputs
- `npm run build` finished with exit code `0` in 21.47s (all bundles compiled cleanly).
- `php artisan test --filter=AdminWebsitePageCrudTest` passed all 5 tests (38 assertions) with exit code `0`.
- Verified 0 remaining imports of `@/api/` or `*.api` across `packages/admin/resources/admin/`.

## Next Steps
- Ready for next tasks or features.
