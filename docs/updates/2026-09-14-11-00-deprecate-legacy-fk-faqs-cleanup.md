# Deprecate Legacy Foreign Keys and Clean Up FaqController

**Timestamp:** 2026-09-14 11:00 (Nepal Time / NPT / UTC+05:45)

## Summary
- Modernized `FaqForm.vue` on `/admin/faqs` to submit native polymorphic fields (`faqable_type` and `faqable_id`) instead of legacy columns (`journey_id`, `destination_id`, `experience_id`).
- Completely removed legacy foreign key validation rules, `array_key_exists()` checks, and `unset()` statements from `store()` and `update()` in `FaqController.php`.
- Updated polymorphic feature test suite `tests/Feature/AdminFaqPolymorphicTest.php` to verify updating polymorphic FAQs via `PATCH`.
- Successfully ran all tests and recompiled the frontend assets with `npm run build`.

## Detailed Changes

### Frontend
- **[`packages/admin/resources/admin/pages/faqs/modal/FaqForm.vue`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/resources/admin/pages/faqs/modal/FaqForm.vue)**:
  - In `onMounted()`, resolves `journey_id`, `destination_id`, and `experience_id` selectors from polymorphic properties (`item.faqable_type` and `item.faqable_id`).
  - In `handleSubmit()`, computes `faqable_type` ('destination', 'journey', 'experience') and `faqable_id` directly, sending them in the payload.

### Backend Controller
- **[`packages/admin/src/Http/Controllers/Faq/FaqController.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Http/Controllers/Faq/FaqController.php)**:
  - Stripped out all legacy FK validations (`journey_id`, `destination_id`, `experience_id`).
  - Removed manual `if (array_key_exists('destination_id', $validated))` cascade and `unset()` statements from `store()` and `update()`.
  - Directly creates and updates FAQs using `$validated` and Eloquent's registered morph map.

### Feature Tests
- **[`tests/Feature/AdminFaqPolymorphicTest.php`](file:///Volumes/TOSHIBA/Herd/eath/tests/Feature/AdminFaqPolymorphicTest.php)**:
  - Replaced legacy parameter test with `test_can_update_polymorphic_faq()`.

## Verification Commands & Outputs

```bash
php artisan test tests/Feature/AdminDestinationCrudTest.php tests/Feature/AdminJourneyCrudTest.php tests/Feature/AdminFaqPolymorphicTest.php
```

Output:
```text
   PASS  Tests\Feature\AdminDestinationCrudTest
  ✓ can list destinations                                                0.60s  
  ✓ can create destination with full logistics and seo                   0.02s  
  ✓ can update destination and associate images                          0.03s  
  ✓ can show destination with eager loaded images                        0.02s  
  ✓ can delete destination                                               0.02s  
  ✓ destination update creates polymorphic media attachments             0.02s  
  ✓ can attach and detach gallery media to destination                   0.02s  
  ✓ cannot attach duplicate media to gallery                             0.02s  
  ✓ can update media attachment alt text and meta                        0.02s  
  ✓ can update destination cta and operational notice                    0.02s  

   PASS  Tests\Feature\AdminJourneyCrudTest
  ✓ can show journey with media attachments                              0.03s  
  ✓ can attach and update journey media attachment                       0.03s  
  ✓ journey store update creates polymorphic media attachments           0.03s  
  ✓ can partially update journey media without name                      0.03s  

   PASS  Tests\Feature\AdminFaqPolymorphicTest
  ✓ can create polymorphic faq for destination                           0.02s  
  ✓ can update polymorphic faq                                           0.02s  
  ✓ can create global faq                                                0.02s  
  ✓ can filter faqs by polymorphic entity                                0.02s  

  Tests:    18 passed (124 assertions)
  Duration: 0.99s
```

```bash
npm run build
```
Output:
```text
✓ built in 12.04s
```
