# Update: Complete Conversion of All Inline `<v-dialog>` to Centralized `useGlobalModal()`

**Timestamp**: 2026-09-14 14:45:00 NPT (UTC+05:45)  
**Author**: Antigravity  
**Status**: Completed & Verified  

---

## 1. Summary & Objective
- Standardized modal and dialog rendering across the entire Admin Panel (`packages/admin/resources/admin/`).
- Eliminated all 16 inline `<v-dialog>` tags in page templates, converting every dialog to the centralized `useGlobalModal()` composable hosted by `<GlobalModalHost.vue>`.
- Preserved strict adherence to modal standards (`.agents/rules/modal.md`) with `<v-card>`, `<v-card-title>`, `<v-divider />`, `<v-card-text>` (with `<div class="mb-2">`), and `<v-card-actions class="justify-end">`.

---

## 2. Detailed Technical Changes

### A. New Reusable Modal Components Created
- [`packages/admin/resources/admin/components/media/MediaAttachmentEditModal.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/components/media/MediaAttachmentEditModal.vue):
  - Standardized edit dialog for polymorphic media attachments.
  - Supports `alt_text`, `title` (optional), `caption` (optional), and `sort_order` (optional).
  - Handles API submission and emits `@saved` and `@close`.
- [`packages/admin/resources/admin/components/media/MediaAttachmentDeleteModal.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/components/media/MediaAttachmentDeleteModal.vue):
  - Standardized confirmation dialog for unlinking/deleting media attachments.
  - Displays preview image, contextual label, and error-colored confirmation button.
- [`packages/admin/resources/admin/pages/articles/modal/ArticleSectionModal.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/articles/modal/ArticleSectionModal.vue):
  - Form dialog for creating/editing article sections with `heading`, `sort_order`, and `SummarnoteEditor`.
- [`packages/admin/resources/admin/pages/newsletter-subscriptions/modal/SubscriberForm.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/newsletter-subscriptions/modal/SubscriberForm.vue):
  - Form modal for adding subscribers with validation and error feedback.
- [`packages/admin/resources/admin/pages/newsletter-subscriptions/modal/SubscriberDelete.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/newsletter-subscriptions/modal/SubscriberDelete.vue):
  - Confirmation modal for removing newsletter subscribers.

### B. Modified Files & Dialog Eliminations
1. [`WebsitePageDetail.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/website-pages/WebsitePageDetail.vue):
   - Removed inline `<v-dialog v-model="altDialog.open">`.
   - Replaced with `globalModal.open({ component: MediaAttachmentEditModal })`.
2. [`destinations/detail_tabs/TabMedia.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/destinations/detail_tabs/TabMedia.vue):
   - Removed inline `<v-dialog v-model="editDialog.open">` and `<v-dialog v-model="deleteDialog.open">`.
   - Wired to `MediaAttachmentEditModal` and `MediaAttachmentDeleteModal`.
3. [`journeys/detail_tabs/TabMedia.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/journeys/detail_tabs/TabMedia.vue):
   - Removed inline `<v-dialog v-model="editDialog.open">` and `<v-dialog v-model="deleteDialog.open">`.
   - Wired to `MediaAttachmentEditModal` and `MediaAttachmentDeleteModal`.
4. [`experiences/detail_tabs/TabMedia.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/experiences/detail_tabs/TabMedia.vue):
   - Removed inline `<v-dialog v-model="editDialog.open">` and `<v-dialog v-model="deleteDialog.open">`.
   - Wired to `MediaAttachmentEditModal` and `MediaAttachmentDeleteModal`.
5. [`destinations/detail_tabs/TabFaqs.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/destinations/detail_tabs/TabFaqs.vue):
   - Removed inline `<v-dialog v-model="formDialog">` and `<v-dialog v-model="deleteDialog">`.
   - Wired to `FaqForm` and `FaqDelete` with `lockEntity: true`.
6. [`journeys/detail_tabs/TabFaqs.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/journeys/detail_tabs/TabFaqs.vue):
   - Removed inline `<v-dialog v-model="dialog">` and `<v-dialog v-model="deleteDialog">`.
   - Wired to `FaqForm` and `FaqDelete` with `lockEntity: true`.
7. [`experiences/detail_tabs/TabFaqs.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/experiences/detail_tabs/TabFaqs.vue):
   - Removed inline `<v-dialog v-model="formDialog">` and `<v-dialog v-model="deleteDialog">`.
   - Wired to `FaqForm` and `FaqDelete` with `lockEntity: true`.
8. [`articles/detail_tabs/TabSections.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/articles/detail_tabs/TabSections.vue):
   - Removed inline `<v-dialog v-model="dialog">`.
   - Wired to `ArticleSectionModal`.
9. [`journey-departures/JourneyDeparturePage.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/journey-departures/JourneyDeparturePage.vue):
   - Removed inline `<v-dialog v-model="deleteDialogOpen">`.
   - Standardized `FormDelete.vue` and wired to `useGlobalModal`.
10. [`newsletter-subscriptions/NewsletterSubscriptionPage.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/newsletter-subscriptions/NewsletterSubscriptionPage.vue):
    - Removed inline `<v-dialog v-model="openAddDialog">` and `<v-dialog v-model="openDeleteDialog">`.
    - Wired to `SubscriberForm.vue` and `SubscriberDelete.vue`.
11. [`faqs/modal/FaqForm.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/faqs/modal/FaqForm.vue):
    - Added `lockEntity` prop to hide global association selectors when invoked from entity-scoped tabs.

---

## 3. Verification & Testing

### A. Grep Verification
```bash
git grep '<v-dialog' packages/admin/resources/admin/
```
**Output**:
```text
packages/admin/resources/admin/components/GlobalModalHost.vue:    <v-dialog v-model="state.show" :width="state.dialogWidth" persistent scrollable>
```
*Exact confirmation that zero inline `<v-dialog>` tags exist outside `<GlobalModalHost.vue>`.*

### B. Vite Production Build
```bash
npm run build
```
**Output**:
```text
vite v6.3.5 building for production...
✓ built in 23.94s
```
*Clean compilation with all modular chunks produced without warnings or errors.*

---

## 4. Next Steps & Handoff Notes
- All modal interactions across the admin panel now execute through `useGlobalModal()`.
- Future modals should simply create a component adhering to `.agents/rules/modal.md` and trigger it via `useGlobalModal().open()`.
