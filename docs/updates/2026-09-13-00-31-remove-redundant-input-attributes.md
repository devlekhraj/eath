# Remove Redundant and Overriding Input Attributes Across All Vue Files

## Summary
Scanned all `.vue` files in the Admin Panel (`packages/admin/resources/admin`) and eliminated redundant/overriding component attributes (`variant="outlined"`, `density="compact"`, `density="comfortable"`, `color="primary"`, `hide-details="auto"`) on form inputs (`<v-text-field>`, `<v-select>`, `<v-autocomplete>`, `<v-combobox>`, `<v-textarea>`, `<v-file-input>`, `<v-date-input>`, `<v-checkbox>`, `<v-switch>`, `<v-radio>`). All input components now cleanly and uniformly inherit global configuration directly from `packages/admin/resources/admin/plugins/vuetify.ts`.

## Detailed Changes
Cleaned 35 Vue files across pages, tabs, and modals:
- `pages/articles/ArticleCategoryPage.vue`, `pages/articles/ArticlePage.vue`
- `pages/articles/detail_tabs/TabJourneys.vue`, `pages/articles/detail_tabs/TabOverview.vue`, `pages/articles/detail_tabs/TabSections.vue`, `pages/articles/detail_tabs/TabSeo.vue`
- `pages/articles/modal/ArticleAdd.vue`, `pages/articles/modal/CategoryForm.vue`
- `pages/destinations/DestinationPage.vue`, `pages/destinations/modal/Form.vue`, `pages/destinations/modal/PackagePriceForm.vue`
- `pages/experiences/ExperiencePage.vue`, `pages/experiences/modal/Form.vue`
- `pages/faqs/FaqPage.vue`, `pages/faqs/modal/FaqForm.vue`
- `pages/inquiries/InquiryPage.vue`, `pages/inquiries/modal/InquiryDetailModal.vue`
- `pages/journey-departures/JourneyDeparturePage.vue`
- `pages/journeys/form_section/FormOverview.vue`
- `pages/journeys/modal/PackagePriceForm.vue`
- `pages/media-assets/MediaAssetPage.vue`, `pages/media-assets/modal/MediaDeleteModal.vue`, `pages/media-assets/modal/MediaDetailModal.vue`, `pages/media-assets/modal/MediaUploadModal.vue`
- `pages/newsletter-subscriptions/NewsletterSubscriptionPage.vue`
- `pages/planner-submissions/PlannerSubmissionPage.vue`, `pages/planner-submissions/modal/PlannerDetailModal.vue`
- `pages/travel-months/modal/Form.vue`
- `pages/traveler-stories/TravelerStoryPage.vue`, `pages/traveler-stories/modal/TravelerStoryForm.vue`
- `pages/website-pages/WebsitePage.vue`, `pages/website-pages/WebsitePageDetail.vue`, `pages/website-pages/modal/PageForm.vue`
- `pages/website-sections/WebsiteSectionPage.vue`, `pages/website-sections/modal/WebsiteSectionForm.vue`

## Verification Commands & Outputs
Ran full Vite build:
```bash
cd /Volumes/TOSHIBA/Herd/eath/packages/admin && npm run build
```
Output:
```text
vite v6.3.5 building for production...
transforming...
✓ built in 16.04s
```
Result: 0 errors across all Vue templates and compiled assets.

## Next Steps
- Maintain consistency with `vuetify.ts` defaults for any newly created or edited components.
