# Journey Detail Page Cleanup and Media Management Standard Alignment

**Timestamp:** 2026-09-13 22:43 (Nepal Time / NPT / UTC+05:45)

## Summary
- Replaced the outdated mock page `JourneyDetailPage.vue` with the clean, production-grade layout modeled directly after `DestinationDetailPage.vue`.
- Cleaned and organized journey management into 6 dedicated, cohesive detail tabs under `packages/admin/resources/admin/pages/journeys/detail_tabs/`:
  1. `TabOverview.vue` &mdash; Overview, Route Specs, Logistics, Statuses, Rich Description (`SummarnoteEditor`), and Operational Notes.
  2. `TabItinerary.vue` &mdash; Day-by-Day Route Itinerary and Trip Highlights with expandable days and modal actions.
  3. `TabPricing.vue` &mdash; Custom Pricing Tiers and Inclusions/Exclusions service management.
  4. `TabDepartures.vue` &mdash; Scheduled Fixed Departures with booking records and capacity management.
  5. `TabMedia.vue` &mdash; Universal Media Management Standard implementation (Hero banner, Card thumbnail, and responsive Gallery photo grid with direct upload, media library picker, alt text editing, and removal confirmation modals).
  6. `TabSeo.vue` &mdash; Meta title, meta description, and live Google search snippet preview.
- Integrated `HasMediaAttachments` on the `Journey` model, added polymorphic media endpoints (`POST /journeys/{id}/media-attachments`, `PATCH /journeys/{id}/media-attachments/{attachmentId}`, `DELETE /journeys/{id}/media-attachments/{attachmentId}`), and mapped structured media objects in `JourneyController::serializeJourney`.
- Connected `adminJourneyDetailPage` (`journeys/:id`) and `adminJourneyForm` (`journey-form`) in Vue Router to seamlessly load the new `JourneyDetailPage.vue`.

## Detailed Changes

### Backend API & Models
- **[`packages/admin/src/Models/Journey.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/Journey.php)**:
  - Added `use HasMediaAttachments;` trait enabling polymorphic relationships `heroAttachment`, `cardAttachment`, and `galleryAttachments`.
- **[`packages/admin/src/Http/Controllers/Journey/JourneyController.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Http/Controllers/Journey/JourneyController.php)**:
  - Updated `show` method to eager-load `heroAttachment.mediaAsset`, `cardAttachment.mediaAsset`, and `galleryAttachments.mediaAsset`.
  - Updated `storeUpdate` to atomically sync or detach hero and card media attachments upon update.
  - Implemented `attachMedia`, `updateMediaAttachment` (validating `alt_text`, `title`, `caption`), and `detachMedia` endpoints.
  - Enhanced `serializeJourney` to return structured `hero_image`, `card_image`, and `gallery` arrays with attachment IDs and metadata.
- **[`packages/admin/routes/api.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/routes/api.php)**:
  - Added `POST journeys/{id}/media-attachments`, `PATCH journeys/{id}/media-attachments/{attachmentId}`, and `DELETE journeys/{id}/media-attachments/{attachmentId}` routes.
- **[`tests/Feature/AdminJourneyCrudTest.php`](file:///Volumes/TOSHIBA/Herd/eath/tests/Feature/AdminJourneyCrudTest.php)**:
  - Added automated test cases asserting journey show with media attachments and attach/update/detach lifecycle.

### Frontend API Client
- **[`packages/admin/resources/admin/api/journeys.api.ts`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/api/journeys.api.ts)**:
  - Added `updateJourneyApi`, `attachJourneyMediaApi`, `updateJourneyMediaApi`, and `detachJourneyMediaApi` helpers.

### Frontend Pages & Tabs
- **[`packages/admin/resources/admin/pages/journeys/JourneyDetailPage.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/journeys/JourneyDetailPage.vue)**:
  - Standard back button to `adminJourneyPage`.
  - Circular progress loading state.
  - Standard `<DetailHeader>` displaying journey title, preview link, cover thumbnail, and metadata chips (Active/Draft, Featured, Destination, Duration, Price).
  - Main `<v-card>` with primary tabs: `tab_overview`, `tab_itinerary`, `tab_pricing`, `tab_departures`, `tab_media`, and `tab_seo`.
  - Responsive content container with `<KeepAlive>`.
- **[`packages/admin/resources/admin/pages/journeys/detail_tabs/`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/journeys/detail_tabs/)**:
  - `TabOverview.vue`: Full journey overview, classification, route metrics, switches, rich text description, and notes.
  - `TabItinerary.vue`: Route itinerary days with highlights.
  - `TabPricing.vue`: Custom price tiers and quick-add inclusions/exclusions.
  - `TabDepartures.vue`: Departure dates, capacity, bookings, and actions.
  - `TabMedia.vue`: Hero, card, and gallery management matching project media standards.
  - `TabSeo.vue`: SEO metadata and Google SERP preview.
- **[`packages/admin/resources/admin/router/index.ts`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/router/index.ts)**:
  - Configured `adminJourneyDetailPage` and `adminJourneyForm` to import `JourneyDetailPage.vue`.

## Verification Commands & Outputs

```bash
php artisan test --filter=AdminJourneyCrudTest
```
Output:
```text
PASS  Tests\Feature\AdminJourneyCrudTest
✓ can show journey with media attachments                              3.32s  
✓ can attach and update journey media attachment                       0.08s  

Tests:    2 passed (16 assertions)
Duration: 3.87s
```

```bash
php artisan test --filter=AdminDestinationCrudTest
```
Output:
```text
PASS  Tests\Feature\AdminDestinationCrudTest
✓ can list destinations                                                0.75s  
✓ can create destination with full logistics and seo                   0.03s  
✓ can update destination and associate images                          0.02s  
✓ can show destination with eager loaded images                        0.02s  
✓ can delete destination                                               0.02s  
✓ destination update creates polymorphic media attachments             0.02s  
✓ can attach and detach gallery media to destination                   0.02s  
✓ cannot attach duplicate media to gallery                             0.02s  
✓ can update media attachment alt text and meta                        0.02s  

Tests:    9 passed (46 assertions)
Duration: 0.93s
```

```bash
npm run build
```
Output:
```text
vite v6.3.5 building for production...
transforming...
✓ 897 modules transformed.
rendering chunks...
✓ built in 22.75s
```

## Next Steps
- Admin users can manage all journey tabs (overview, itinerary, pricing, departures, media, SEO) in a unified, consistent experience aligned with destinations.
