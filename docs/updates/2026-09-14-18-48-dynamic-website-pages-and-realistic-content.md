# Dynamic Website Pages & Realistic Content Implementation

**Date & Time:** 2026-09-14 18:48 NPT (UTC+05:45)  
**Scope:** Public Website Pages (`/safety`, `/about`, `/contact`, `/responsible-travel`, `/privacy`, `/terms`, `/booking-conditions`, `/cancellation`, `/cookies`), Database Seeding Layer, Admin Website Page CRUD, and Zero Breakage Policies.

---

## Summary

Transformed previously static or semi-static public website pages (`/safety`, `/about`, `/contact`, and legal/policy pages) into fully database-backed, dynamically managed entities backed by the `WebsitePage` model and `WebsitePageSection` modular architecture. All content was seeded with realistic, authentic Himalayan expedition and operational protocols adhering strictly to:
1. **Zero Breakage Policy**: Graceful contextual fallbacks across all Blade templates and controllers so empty database fields never break views or cause 404s.
2. **Universal Zero Border-Radius Policy**: `border-radius: 0 !important;` applied across all cards, buttons, badges, forms, inputs, and image containers.
3. **E.A.T.H. Travels Design System**: Himalayan Peak Azure (`#0284c7`), Crimson (`#ff0048`), Deep Alpine Navy (`#0c4a6e`), background-free/border-free eyebrow kickers, hairline borders (`1px solid #e2e8f0`), and zero ordinary drop-shadows.

---

## Detailed Changes

### 1. Database Seeder Layer (`database/seeders/WebsiteDemoSeeder.php`)
- **Seeder Idempotency**: Added `media_attachments` to `$tablesToTruncate` to cleanly clear polymorphic attachments without unique constraint conflicts.
- **Safety Page Seeding (`seedSafetyPage`)**:
  - Seeds page record: title, summary, operational notice banner, CTA banner, and hero media attachment.
  - Seeds 7 realistic modular sections:
    1. *Acclimatization Pacing Rules* (`cards_grid`) — Ascent ceilings, rest pulses, hydration.
    2. *Medical Readiness & Oxygen Systems* (`cards_grid`) — Pulse oximetry, Gamow bag, wilderness first aid.
    3. *Helicopter Evacuation & Rescue Protocol* (`cards_grid`) — Satellite communication, flight dispatch, insurance triage.
    4. *Guide Certification & Wilderness Qualifications* (`checklist`) — NMA / UIAGM lead guide certification, medical recertification.
    5. *Communication Networks & Satellite Redundancy* (`cards_grid`) — Garmin inReach, Iridium satellite phones, valley radios.
    6. *Pre-Expedition Health & Fitness Disclosure* (`disclosure`) — Cardiovascular preparation, pre-existing conditions, mandatory travel insurance.
    7. *Field Contingency & Weather Monitoring* (`cards_grid`) — Meteorological tracking, conservative turn-around times, avalanche assessment.
- **About Page Seeding (`seedAboutPage`)**:
  - Seeds page record: title, summary, notice banner, CTA banner, and hero media attachment.
  - Seeds 4 modular sections:
    1. *Rethinking High Mountain Exploration* (`standard`) — Himalayan philosophy and sustainable approach.
    2. *Core Guiding Principles* (`cards_grid`) — Ethical expedition style, unhurried pacing, local valley respect.
    3. *Field Team Leadership & Standards* (`checklist`) — Fair compensation, certified equipment, career progression.
    4. *Environmental Stewardship & Low-Impact Travel* (`standard`) — Leave No Trace, localized solar power, waste elimination.
- **Contact Page Seeding (`seedContactPage`)**:
  - Seeds page record: title, summary, notice banner, and hero media attachment.
- **Policy Pages Seeding (`seedPolicyPages`)**:
  - Seeds rich, realistic legal and operational content for:
    - `/privacy` (Privacy Policy) — 6 comprehensive data protection sections.
    - `/terms` (Terms & Conditions) — 6 expedition booking terms.
    - `/booking-conditions` (Booking Conditions) — 5 deposit, insurance, and medical terms.
    - `/cancellation` (Cancellation Policy) — 5 timeline and refund policy sections.
    - `/cookies` (Cookie Policy) — 4 analytical and session cookie disclosure sections.

### 2. Controller Layer (`packages/website/src/Http/Controllers/WebsitePageController.php`)
- **`safety()`**: Queries `WebsitePage::with(['sections', 'heroAttachment.mediaAsset'])->where('slug', 'safety')->first()`, passing `$page`, `$heroImage`, `$title`, and `$metaDescription` with graceful fallback to static defaults.
- **`about()`**: Queries `WebsitePage::with(['sections', 'heroAttachment.mediaAsset'])->where('slug', 'about')->first()`, passing `$page`, `$heroImage`, `$guides`, `$title`, and `$metaDescription` with fallbacks.
- **`contact()`**: Queries `WebsitePage::with('heroAttachment.mediaAsset')->where('slug', 'contact')->first()`, passing `$page`, `$heroImage`, `$title`, and `$metaDescription`.
- **`renderPolicy()`**: Queries `WebsitePage::with('sections')->where('slug', $slug)->first()`. If found, renders dynamically; if not found, falls back to `WebsiteCatalogRepository::getPolicy($slug)` or a built-in contextual fallback dictionary ensuring zero 404s.

### 3. Blade Presentation Layer
- **`packages/website/resources/views/website_preview/pages/safety.blade.php`**:
  - Rendered completely dynamically using `$page->sections`.
  - Implemented modular presenters for `cards_grid`, `checklist`, `disclosure`, and standard sections.
  - Dynamic hero with alt text and fallback image.
  - Dynamic operational notice banner and dynamic CTA banner.
  - Preserved related safety articles and zero border-radius styling throughout.
- **`packages/website/resources/views/website_preview/pages/about.blade.php`**:
  - Rendered dynamically from `$page->sections`.
  - Dynamic notice banner, dynamic CTA banner, and guide profiles card grid.
  - Strict zero border-radius and border-free kickers.
- **`packages/website/resources/views/website_preview/pages/contact.blade.php`**:
  - Dynamic hero and operational notice banner with full fallback support.
  - Clean hairline borders, zero border-radius on inputs, buttons, and alert boxes.
- **`packages/website/resources/views/website_preview/pages/policy.blade.php`**:
  - Dynamic notice banner, dynamic summary, dynamic section table of contents, and section body loop.

### 4. Test Suite (`tests/Feature/AdminWebsitePageCrudTest.php`)
- Updated CRUD tests to use unique slugs (`test-page-` . uniqid()) to prevent database unique collisions when seed data exists.
- Public page tests for `/responsible-travel`, `/safety`, `/about`, and `/privacy` verify dynamic database content renders correctly.

---

## Verification Commands & Outputs

### 1. HTTP 200 Verification for All 9 Website Routes
```bash
php -r '
require "vendor/autoload.php";
$app = require_once "bootstrap/app.php";
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$routes = [
    "/safety",
    "/about",
    "/contact",
    "/responsible-travel",
    "/privacy",
    "/terms",
    "/booking-conditions",
    "/cancellation",
    "/cookies",
];

foreach ($routes as $route) {
    $request = Illuminate\Http\Request::create($route, "GET");
    $response = $app->handle($request);
    echo $route . ": HTTP " . $response->getStatusCode() . " (" . strlen($response->getContent()) . " bytes)\n";
}
'
```
**Output:**
```text
/safety: HTTP 200 (124628 bytes)
/about: HTTP 200 (119658 bytes)
/contact: HTTP 200 (111317 bytes)
/responsible-travel: HTTP 200 (123797 bytes)
/privacy: HTTP 200 (95924 bytes)
/terms: HTTP 200 (95970 bytes)
/booking-conditions: HTTP 200 (94677 bytes)
/cancellation: HTTP 200 (94741 bytes)
/cookies: HTTP 200 (93414 bytes)
```

### 2. Feature Tests Execution
```bash
php artisan test tests/Feature/AdminWebsitePageCrudTest.php
```
**Output:**
```text
   PASS  Tests\Feature\AdminWebsitePageCrudTest
  ✓ can list and get website page details                                2.43s  
  ✓ can update page notice and cta fields                                1.70s  
  ✓ can manage modular sections with content items                       1.70s  
  ✓ can attach and detach media attachments                              1.70s  
  ✓ public responsible travel page renders with database data            1.71s  
  ✓ public safety page renders with database data                        1.72s  
  ✓ public about page renders with database data                         1.70s  
  ✓ public policy page renders with database data                        1.73s  

  Tests:    8 passed (55 assertions)
  Duration: 14.40s
```

```bash
php artisan test tests/Feature/AdminGuideCrudTest.php
```
**Output:**
```text
   PASS  Tests\Feature\AdminGuideCrudTest
  ✓ can list guides with filters                                         2.52s  
  ✓ can create guide with modern payload and avatar                      1.80s  
  ✓ can get guide details with relations                                 1.70s  
  ✓ can update guide with legacy payload                                 1.70s  
  ✓ can update guide bio                                                 1.70s  
  ✓ can create and update guide review                                   1.70s  
  ✓ can assign guide to journey                                          1.69s  
  ✓ can delete guide                                                     1.69s  

  Tests:    8 passed (58 assertions)
  Duration: 14.52s
```

---

## Next Steps
- Admin users can now navigate to `/admin/website-pages` and update notice banners, CTAs, hero media, and modular content sections for `/safety`, `/about`, `/contact`, `/responsible-travel`, and all policy pages without modifying source code.
