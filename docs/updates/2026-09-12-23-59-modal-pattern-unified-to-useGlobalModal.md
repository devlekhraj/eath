# Modal Pattern Unified — useGlobalModal() Composable

**Date**: 2026-09-12 23:59 NPT (UTC+05:45)
**Type**: Refactor
**Scope**: All admin `.vue` files using the old `<modal-template ref="globalModal">` pattern

---

## Summary

Migrated all 35 Vue files from the legacy `ModalTemplate` component-ref pattern to the
modern `useGlobalModal()` composable + `GlobalModalHost` singleton pattern.

---

## Before vs After

### Old Pattern (removed from 35 files)
```vue
<!-- template: had to include its own modal host -->
<modal-template ref="globalModal" @saved="fetchJourneys" @close="fetchJourneys" />

<!-- script: local ref + imperative call via ref() -->
const globalModal = ref(null)

function addJourney() {
    globalModal.value.open({
        title: 'Add New Journey',
        component: JourneyAdd,
        size: 'md',
        props: { item },
    })
}
```

### New Pattern (useGlobalModal composable)
```vue
<!-- template: nothing needed — GlobalModalHost lives once in App.vue -->

<!-- script: composable import + callback-based open() -->
import { useGlobalModal } from '@/composables/globalModal'
const { open: openModal } = useGlobalModal()

function addJourney() {
    openModal({
        title: 'Add New Journey',
        component: JourneyAdd,
        size: 'md',
        props: { item },
        onSaved: fetchJourneys,
        onClose: fetchJourneys,
    })
}
```

---

## Files Migrated (35)

- pages/settings/GeneralSettingPage.vue
- pages/inquiries/InquiryPage.vue
- pages/destinations/DestinationPage.vue
- pages/destinations/form_section/FormHighlights.vue
- pages/destinations/form_section/FormInclude.vue
- pages/destinations/form_section/FormPackageBanner.vue
- pages/destinations/form_section/FormPackageGallery.vue
- pages/destinations/form_section/FormPackageGallery1.vue
- pages/destinations/form_section/FormPackageItinery.vue
- pages/destinations/form_section/FormPricing.vue
- pages/destinations/form_section/FormRight.vue
- pages/media-assets/MediaAssetPage.vue
- pages/articles/ArticlePage.vue
- pages/website-sections/WebsiteSectionPage.vue
- pages/faqs/FaqPage.vue
- pages/experiences/ExperiencePage.vue
- pages/website-pages/WebsitePage.vue
- pages/travel-months/TravelMonthPage.vue
- pages/guides/GuideDetailPage.vue
- pages/guides/GuidePage.vue
- pages/guides/tabs/TabBio.vue
- pages/guides/tabs/TabReviews.vue
- pages/guides/tabs/TabTrip.vue
- pages/planner-submissions/PlannerSubmissionPage.vue
- pages/journeys/JourneyPage.vue
- pages/journeys/form_section/FormFixedDeparture.vue
- pages/journeys/form_section/FormHighlights.vue
- pages/journeys/form_section/FormInclude.vue
- pages/journeys/form_section/FormPackageBanner.vue
- pages/journeys/form_section/FormPackageGallery-backup.vue
- pages/journeys/form_section/FormPackageGallery.vue
- pages/journeys/form_section/FormPackageGallery1.vue
- pages/journeys/form_section/FormPackageItinery.vue
- pages/journeys/form_section/FormPricing.vue
- pages/journeys/form_section/FormRight.vue

---

## What Each Migration Did Per File

1. Removed `<modal-template ref="globalModal" ...>` from template
2. Removed `const globalModal = ref(null)` from script
3. Added `import { useGlobalModal } from '@/composables/globalModal'`
4. Added `const { open: openModal } = useGlobalModal()`
5. Replaced all `globalModal.value.open({...})` calls with `openModal({..., onSaved: fn, onClose: fn})`
   — callbacks moved inline from template event attributes

---

## Verification

```bash
cd packages/admin && npm run build
# ✓ built in 18.23s (exit code 0, no errors)
```

Post-migration scan: `✓ All clear — no old modal pattern remaining in any .vue file!`
Total files now using useGlobalModal: 41

