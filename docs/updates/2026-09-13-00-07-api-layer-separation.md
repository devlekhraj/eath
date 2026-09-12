# API Layer Separation — Remove Direct http.* Calls from Vue Files

**Date**: 2026-09-13 00:07 NPT (UTC+05:45)
**Type**: Refactor (Architecture)
**Scope**: All admin modules

---

## Summary

Introduced proper API layer separation across the admin panel. All `http.get/post/patch/delete`
calls that were embedded directly in Vue components are now routed through typed API functions
in `api/*.ts` files. Vue files only import and call named functions — they never touch the
HTTP client directly.

---

## New API Files Created

| File | Module | Functions |
|---|---|---|
| `api/destinations.api.ts` | Destinations, Package Categories, Package Prices, Inclusions, Highlights, Itinerary | 17 exports |
| `api/guides.api.ts` | Guides, Guide Bio/Reviews/Trips | 8 exports |
| `api/experiences.api.ts` | Experiences | 4 exports |
| `api/travel-months.api.ts` | Travel Months | 3 exports |
| `api/journey-departures.api.ts` | Journey Departures, Featured Packages | 6 exports |
| `api/settings.api.ts` | Settings | 3 exports |
| `api/gallery.api.ts` | Shared image upload/delete/update across all modules | 7 exports |

---

## Vue Files Migrated (41 files)

### Journeys (15 files)
- JourneyPage.vue — `getJourneys`, `toggleJourneyActive`, `toggleJourneyPublish`
- JourneyForm.vue — `getJourney`
- form_section/FormDescription.vue — `saveJourney`
- form_section/FormPricing.vue — `saveJourneyPrice`, `deleteJourneyPrice`
- modal/PackageAdd.vue — `saveJourney`
- modal/PackageDelete.vue — `deleteJourney`
- modal/PackageHighlightForm.vue — `saveJourneyHighlight`, `deleteJourneyHighlight`
- modal/PackagePriceDelete.vue — `deleteJourneyPrice`
- modal/PackagePriceForm.vue — `saveJourneyPrice`, `deleteJourneyPrice`
- modal/ItineraryForm.vue — `saveJourneyItineraryDay`, `deleteJourneyItineraryDay`
- modal/ItineraryHighlightsForm.vue — `saveJourneyItineraryHighlight`, `deleteJourneyItineraryHighlight`
- modal/DeleteIncludeItem.vue — `deleteJourneyService`
- modal/IncludeExcludeForm.vue — `saveJourneyService`, `deleteJourneyService`
- modal/CategoryForm.vue — `getPackageCategoriesApi`, `savePackageCategoryApi`
- modal/CategoryDelete.vue — `deletePackageCategoryApi`

### Guides (7 files)
- GuidePage.vue — `getGuidesApi`
- GuideDetailPage.vue — `getGuideByIdApi`, `uploadGalleryImageApi`
- modal/GuideForm.vue — `createGuideApi`
- modal/GuideDeleteForm.vue — `deleteGuideApi`
- tabs/modal/ModalBioForm.vue — `updateGuideBioApi`
- tabs/modal/ReviewForm.vue — `saveGuideReviewApi`
- tabs/modal/TripForm.vue — `saveGuideTripApi`, `getTravelPackagesListApi`

### Experiences (3 files)
- ExperiencePage.vue — `getExperiencesApi`, `toggleExperienceActiveApi`
- modal/Form.vue — `createExperienceApi`
- modal/FormDelete.vue — `deleteExperienceApi`

### Travel Months (2 files)
- TravelMonthPage.vue — `getTravelMonthsApi`, `toggleTravelMonthActiveApi`
- modal/Form.vue — `updateTravelMonthApi`

### Journey Departures (2 files)
- JourneyDeparturePage.vue — `getDeparturesApi`, `toggleDepartureActiveApi`, `deleteJourneyDepartureApi`
- modal/FormDelete.vue — `deleteFeaturedPackageApi`

### Settings (3 files)
- GeneralSettingPage.vue — `getSettingsApi`
- modal/SettingForm.vue — `saveSettingApi`, `uploadGalleryImageApi`
- modal/SettingDelete.vue — `deleteSettingApi`

### Articles (5 files)
- ArticlePage.vue — `getArticlesApi`, `toggleArticleActiveApi`, `toggleArticlePublishApi`
- modal/ArticleAdd.vue — `createArticleApi`
- modal/ArticleDelete.vue — `deleteArticleApi`
- modal/CategoryDelete.vue — `deleteArticleCategoryApi`
- modal/CategoryForm.vue — `createArticleCategoryApi`

### Shared Gallery Components (3 files)
- components/gallery/FormGalleryUpdate.vue — `updateMediaUsageApi`
- components/gallery/FormImageDelete.vue — `deleteMediaUsageApi`
- components/gallery/SelectGalleryImage.vue — `getGalleryImagesApi`

---

## Verification

```bash
cd packages/admin && npm run build
# ✓ built in 13.86s (exit code 0, no errors) — faster than before (18s)
```

