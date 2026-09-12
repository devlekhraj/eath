# Admin Leads and Operations Rebuild

**Date & Time**: 2026-09-12 20:30 NPT (UTC+05:45)  
**Author**: Antigravity Assistant  
**Status**: Completed  
**Phase**: Phase 08 (Leads and Operations: Inquiries, Planner Submissions, Newsletter Subscriptions)

---

## 1. Summary

Rebuilt the Admin Leads and Operations management layer covering **Inquiries** (`inquiries`), **Planner Submissions** (`planner_submissions`), and **Newsletter Subscriptions** (`newsletter_subscriptions`).

- **08A: Inquiries**:
  - Replaced legacy code in `InquiryController`:
    - Full text search across reference code, traveler name, email, phone, country, subject, and message.
    - Status filtering (`new`, `reviewing`, `replied`, `closed`) and type filtering (`general`, `journey`, `departure`, `custom`).
    - Added dedicated `updateStatus` and `destroy` endpoints.
    - Loaded relationships `journey:id,name,slug` and `departure:id,code,start_date,end_date`.
  - Created client API `inquiries.api.ts`.
  - Rebuilt `InquiryPage.vue` with responsive table, single-datapoint cells, status chips, and inspector dialog (`InquiryDetailModal.vue`).
- **08B: Planner Submissions**:
  - Created canonical `PlannerSubmissionController`:
    - Full eager loading of domain relations (`journey`, `departure`, `destination`, `experience`, `travelMonth`).
    - Filter by status, search by contact details or reference code.
    - Endpoints for status management and deletion.
  - Created client API `planner-submissions.api.ts`.
  - Rebuilt `BookingPage.vue` into a Planner Submissions view with traveler party chips, journey links, status badges, and comprehensive inspector modal (`PlannerDetailModal.vue`) displaying traveler parameters and preferences.
- **08C: Newsletter Subscriptions**:
  - Created `NewsletterSubscriptionController`:
    - Listing, search by email/name, filtering by active subscription status.
    - Endpoints for adding subscribers, toggling subscription status (`is_subscribed`, `subscribed_at`, `unsubscribed_at`), and deletion.
  - Created client API `newsletter-subscriptions.api.ts`.
  - Created `NewsletterPage.vue` with quick-add dialog, one-click subscription status toggles, and search filter.
  - Added route `adminNewsletterSubscriptionPage` to router and sidebar navigation in `DefaultLayout.vue`.
- Adhered strictly to `AGENTS.md`: universal zero border-radius (`rounded-0 !important`), zero drop shadows (`elevation-0`, hairline borders), and standard Vuetify palette.

---

## 2. Detailed Changes

### Backend
- `packages/admin/src/Models/Inquiry.php`:
  - Added `departure()` relation pointing to `JourneyDeparture`.
- `packages/admin/src/Http/Controllers/Inquiry/InquiryController.php`:
  - Rebuilt with full search, status filtering, and relations.
- `packages/admin/src/Http/Controllers/PlannerSubmission/PlannerSubmissionController.php`:
  - New REST controller managing trip planner submissions, party metrics, and status transitions.
- `packages/admin/src/Http/Controllers/Newsletter/NewsletterSubscriptionController.php`:
  - New REST controller managing newsletter subscriber records and subscription toggling.
- `packages/admin/routes/api.php`:
  - Registered canonical routes `/admin/inquiries`, `/admin/planner-submissions`, `/admin/newsletter-subscriptions`, along with backward-compatibility aliases for legacy `/admin/bookings`.

### Frontend
- `packages/admin/resources/admin/api/inquiries.api.ts`
- `packages/admin/resources/admin/api/planner-submissions.api.ts`
- `packages/admin/resources/admin/api/newsletter-subscriptions.api.ts`
- `packages/admin/resources/admin/pages/customers/InquiryPage.vue` & `modal/InquiryDetailModal.vue` & `modal/InquiryDeleteModal.vue`
- `packages/admin/resources/admin/pages/bookings/BookingPage.vue` & `modal/PlannerDetailModal.vue` & `modal/PlannerDeleteModal.vue`
- `packages/admin/resources/admin/pages/newsletter/NewsletterPage.vue`
- `packages/admin/resources/admin/layout/DefaultLayout.vue`: Added "Newsletter Subscribers" to sidebar navigation.
- `packages/admin/resources/admin/router/index.ts`: Added `/admin/newsletter-subscriptions` route.

---

## 3. Verification Commands & Outputs

1. **PHP Syntax Verification**:
   ```bash
   php -l packages/admin/src/Http/Controllers/Inquiry/InquiryController.php
   php -l packages/admin/src/Http/Controllers/PlannerSubmission/PlannerSubmissionController.php
   php -l packages/admin/src/Http/Controllers/Newsletter/NewsletterSubscriptionController.php
   php -l packages/admin/routes/api.php
   ```
   *Output*: All files passed without syntax errors.

2. **Authenticated API Smoke Test**:
   - `POST /api/v1/admin/inquiries`: Status 201 Created.
   - `PATCH /api/v1/admin/inquiries/{id}/status`: Status 200 OK.
   - `DELETE /api/v1/admin/inquiries/{id}`: Status 200 OK.
   - `GET /api/v1/admin/planner-submissions`: Status 200 OK.
   - `PATCH /api/v1/admin/planner-submissions/{id}/status`: Status 200 OK.
   - `DELETE /api/v1/admin/planner-submissions/{id}`: Status 200 OK.
   - `POST /api/v1/admin/newsletter-subscriptions`: Status 201 Created.
   - `PATCH /api/v1/admin/newsletter-subscriptions/{id}/toggle-subscription`: Status 200 OK.
   - `DELETE /api/v1/admin/newsletter-subscriptions/{id}`: Status 200 OK.

3. **Frontend Production Build**:
   ```bash
   npm run build
   ```
   *Output*: Build succeeded cleanly in 19.41s (`NewsletterPage` 8.29 kB, `InquiryPage` 12.55 kB, `BookingPage` 13.90 kB).

---

## 4. Next Steps

- Proceed to **Phase 09: Dashboard** (update metrics, KPI cards, and recent activity feeds to match the new schema).
