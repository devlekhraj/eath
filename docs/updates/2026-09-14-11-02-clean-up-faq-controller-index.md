# Clean Up FaqController index()

**Timestamp:** 2026-09-14 11:02 (Nepal Time / NPT / UTC+05:45)

## Summary
- Cleaned up `index()` method in `Admin\Http\Controllers\Faq\FaqController`.
- Completely removed legacy query filters for `journey_id`, `destination_id`, and `experience_id`.
- Streamlined polymorphic filtering to directly query `faqable_type` (normalized via `Relation::getMorphAlias()`) and `faqable_id`.
- Updated test in `AdminFaqPolymorphicTest` to verify querying with both morph alias and model class name.

## Detailed Changes

### Backend Controller
- **[`packages/admin/src/Http/Controllers/Faq/FaqController.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Http/Controllers/Faq/FaqController.php)**:
  - In `index()`:
    - Replaced dual-clause type lookup with single `Relation::getMorphAlias($request->input('faqable_type')) ?? $request->input('faqable_type')`.
    - Removed `if ($request->filled('journey_id'))`, `if ($request->filled('destination_id'))`, and `if ($request->filled('experience_id'))`.

### Tests
- **[`tests/Feature/AdminFaqPolymorphicTest.php`](file:///Volumes/TOSHIBA/Herd/eath/tests/Feature/AdminFaqPolymorphicTest.php)**:
  - Verified `GET /api/v1/admin/faqs?faqable_type=destination&faqable_id=...` and `GET /api/v1/admin/faqs?faqable_type=Admin\Models\Destination&faqable_id=...`.

## Verification Commands & Outputs

```bash
php artisan test tests/Feature/AdminDestinationCrudTest.php tests/Feature/AdminJourneyCrudTest.php tests/Feature/AdminFaqPolymorphicTest.php
```

Output:
```text
   PASS  Tests\Feature\AdminDestinationCrudTest
  ✓ can list destinations                                                0.65s  
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
  ✓ can partially update journey media without name                      0.02s  

   PASS  Tests\Feature\AdminFaqPolymorphicTest
  ✓ can create polymorphic faq for destination                           0.02s  
  ✓ can update polymorphic faq                                           0.02s  
  ✓ can create global faq                                                0.02s  
  ✓ can filter faqs by polymorphic entity                                0.02s  

  Tests:    18 passed (124 assertions)
  Duration: 1.04s
```
