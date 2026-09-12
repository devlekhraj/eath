# Comprehensive Clean-up of Unused Variables & Commented-out Code Across Admin Vue Files

**Date**: 2026-09-13 00:21 NPT (UTC+05:45)
**Type**: Code Cleanliness & Ponytail Compliance
**Scope**: All Admin Panel Vue Components

---

## Summary

In strict alignment with `AGENTS.md` and Ponytail principles ("Prefer deletion over unnecessary addition", "No dead code", "No unused variables or boilerplate"), executed an audit and complete clean-up of:
1. All declared but unused variables, `const` definitions, and unnecessary store/router/snackbar bindings.
2. All commented-out template blocks (`<!-- <v-...> -->`) and commented-out JavaScript code lines across all Vue components.

---

## Changes

1. **Unused Variables Removed (Zero Remaining Across Workspace)**:
   - `pages/journeys/JourneyPage.vue`: `publicBaseUrl`, `showSuccess`, `showError`
   - `pages/destinations/form_section/FormHighlights.vue`: `form`, `formRef`, `loading`, `rules`, `serverErrors`, `showSuccess`, `showError`
   - `pages/journey-departures/modal/FormAdd.vue`: `router` (`useRouter()`)
   - `pages/articles/ArticlePage.vue`: `showSuccess`, `showError`
   - `pages/guides/GuideDetailPage.vue`: `showSuccess`
   - `pages/guides/GuidePage.vue`: `formReady`, `lookupCodes`, `route`
   - `pages/guides/tabs/{TabBio, TabReviews, TabTrip}.vue`: `showSuccess`, `showError`
   - `pages/traveler-stories/TravelerStoryPage.vue`: `showSuccess`, `showError`
   - `pages/journeys/form_section/FormFixedDeparture.vue`: `showSuccess`, `showError`, `deleteTrekDeparture`
   - `pages/destinations/form_section/FormInclude.vue`: `resp`, `showSuccess`
   - `pages/destinations/form_section/FormPricing.vue`: `resp`, `showSuccess`
   - `pages/destinations/form_section/FormPackageItinery.vue`: `submitting`, `showSuccess`, `showError`
   - `pages/journeys/form_section/FormPackageItinery.vue`: `submitting`, `showSuccess`, `showError`
   - `pages/destinations/form_section/FormPackageBanner.vue`: `showError`
   - `pages/journeys/form_section/FormPackageBanner.vue`: `showError`
   - `pages/destinations/form_section/FormPackageGallery.vue`: `showError`
   - `pages/journeys/form_section/FormPackageGallery-backup.vue`: `showError`
   - `pages/destinations/modal/DeleteImage.vue`: `resp`
   - `pages/destinations/modal/IncludeExcludeForm.vue`: `resp`
   - `pages/destinations/modal/PackagePriceForm.vue`: `resp`
   - `pages/journeys/modal/DeleteImage.vue`: `resp`
   - `pages/journeys/modal/IncludeExcludeForm.vue`: `resp`
   - `pages/journeys/modal/PackagePriceForm.vue`: `resp`
   - `pages/destinations/modal/ItineraryForm.vue`: `travelPackageStore`
   - `pages/auth/LoginPage.vue`: `isFormValid`

2. **Commented-Out Code Cleaned Across 39 Files**:
   - Removed commented-out table header definitions (e.g. `// { title: 'Published' ... }`).
   - Removed commented-out template blocks (e.g. `<!-- <h2 class="font-medium">Highlights</h2> -->`, `<!-- <v-divider /> -->`, `<!-- <v-col ...> -->`).
   - Removed abandoned commented-out helper functions and watchers.

---

## Verification

- **Unused variable audit check**: `0` unused variables remaining across the entire Vue component tree.
- **Production build check**:
  ```bash
  cd packages/admin && npm run build
  # ✓ built in 15.75s (exit code 0, 0 errors)
  ```
