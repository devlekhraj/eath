# Polymorphic FAQs Architecture Implementation

**Timestamp:** 2026-09-14 10:49 (Nepal Time / NPT / UTC+05:45)

## Summary
- Converted the `faqs` table from dedicated foreign key columns (`journey_id`, `destination_id`, `experience_id`) to a clean polymorphic relationship (`nullableMorphs('faqable')`).
- Implemented the reusable `HasFaqs` trait (`Admin\Models\Concerns\HasFaqs`), allowing any model (`Destination`, `Journey`, `Experience`, etc.) to declare polymorphic FAQs using `$model->faqs()`.
- Updated `Faq` model with `faqable()` morphTo relation and backward-compatible accessors for `$faq->journey`, `$faq->destination`, and `$faq->experience`.
- Upgraded `FaqController` to support querying and storing via `faqable_type` and `faqable_id`, while transparently accepting legacy parameters (`destination_id`, `journey_id`, etc.) and resolving aliases (`'destination'` to `\Admin\Models\Destination::class`).
- Preserved Global Website FAQs when both `faqable_type` and `faqable_id` are null.

## Detailed Changes

### Database Migration (Option A)
- **[`database/migrations/2025_08_10_133116_create_faqs_table.php`](file:///Volumes/TOSHIBA/Herd/eath/database/migrations/2025_08_10_133116_create_faqs_table.php)**:
  - Replaced individual foreign key columns with `$table->nullableMorphs('faqable')`.

### Models & Traits
- **[`packages/admin/src/Models/Concerns/HasFaqs.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/Concerns/HasFaqs.php)**:
  - Created reusable trait with `public function faqs(): MorphMany`.
- **[`packages/admin/src/Models/Faq.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/Faq.php)**:
  - Updated `$fillable` with `faqable_type` and `faqable_id`.
  - Added `faqable(): MorphTo` relation.
  - Added backward-compatible accessors (`getJourneyAttribute`, `getDestinationAttribute`, `getExperienceAttribute`) appended to JSON serialization.
- **[`packages/admin/src/Models/Destination.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/Destination.php)**:
  - Added `use HasFaqs;` trait.
- **[`packages/admin/src/Models/Journey.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/Journey.php)**:
  - Added `use HasFaqs;` trait.

### Backend Controllers & Services
- **[`packages/admin/src/Http/Controllers/Faq/FaqController.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Http/Controllers/Faq/FaqController.php)**:
  - Added `resolveFaqableType(?string $type)` helper.
  - In `index()`, filters by `faqable_type` / `faqable_id` with fallback alias mapping.
  - In `store()` and `update()`, normalizes `faqable_type` and `faqable_id` while continuing to accept legacy `destination_id`, `journey_id`, or `experience_id`.
- **[`packages/website/src/Http/Controllers/DestinationController.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/website/src/Http/Controllers/DestinationController.php)**:
  - Updated destination show endpoint to query FAQs by `faqable_type` (`Destination::class` or `'destination'`) and `faqable_id`.
- **[`packages/website/src/Services/WebsiteCatalogRepository.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/website/src/Services/WebsiteCatalogRepository.php)**:
  - Updated `getFaqs()` trek context matching to check `faqable_type = 'journey'` and `faqable_id`.

### Frontend
- **[`packages/admin/resources/admin/api/faqs.api.ts`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/api/faqs.api.ts)**:
  - Added `faqable_type`, `faqable_id`, and `faqable` to `FaqItem` interface.
- **[`packages/admin/resources/admin/pages/destinations/detail_tabs/TabFaqs.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/destinations/detail_tabs/TabFaqs.vue)**:
  - Sends `faqable_type: 'destination'` and `faqable_id: destination.id`.

### Tests
- **[`tests/Feature/AdminFaqPolymorphicTest.php`](file:///Volumes/TOSHIBA/Herd/eath/tests/Feature/AdminFaqPolymorphicTest.php)**:
  - Added feature tests covering:
    - Creating a polymorphic FAQ for destination.
    - Creating a polymorphic FAQ using legacy parameters.
    - Creating a global FAQ.
    - Filtering FAQs by polymorphic entity.

## Verification Commands & Outputs

```bash
php artisan migrate:fresh --seed
```
Output:
```text
  Dropping all tables .......................................... 110.01ms DONE
  Creating migration table ...................................... 16.65ms DONE
  Running migrations.
  ...
  2025_08_10_133116_create_faqs_table ............................ 3.44ms DONE
  ...
  Seeding database. DONE
```

```bash
php artisan test --filter="AdminFaqPolymorphicTest|AdminDestinationCrudTest"
```
Output:
```text
   PASS  Tests\Feature\AdminDestinationCrudTest
  ✓ can list destinations                                                1.84s  
  ✓ can create destination with full logistics and seo                   0.06s  
  ✓ can update destination and associate images                          0.08s  
  ✓ can show destination with eager loaded images                        0.02s  
  ✓ can delete destination                                               0.02s  
  ✓ destination update creates polymorphic media attachments             0.02s  
  ✓ can attach and detach gallery media to destination                   0.02s  
  ✓ cannot attach duplicate media to gallery                             0.02s  
  ✓ can update media attachment alt text and meta                        0.02s  
  ✓ can update destination cta and operational notice                    0.02s  

   PASS  Tests\Feature\AdminFaqPolymorphicTest
  ✓ can create polymorphic faq for destination                           0.05s  
  ✓ can create polymorphic faq using legacy parameters                   0.02s  
  ✓ can create global faq                                                0.02s  
  ✓ can filter faqs by polymorphic entity                                0.02s  

  Tests:    14 passed (77 assertions)
  Duration: 2.69s
```

```bash
npm run build
```
Output:
```text
✓ built in 15.49s
```
