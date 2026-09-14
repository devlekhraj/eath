# Native Laravel Morph Map Implementation in Admin Package

**Timestamp:** 2026-09-14 10:57 (Nepal Time / NPT / UTC+05:45)

## Summary
- Registered native Laravel `Relation::morphMap` inside the `packages/admin` Service Provider (`Admin\AdminServiceProvider::boot()`), mapping clean entity aliases (`destination`, `journey`, `experience`, `article`, `guide`) to their Eloquent classes in `Admin\Models`.
- Removed manual `resolveFaqableType()` `match` expression from `Admin\Http\Controllers\Faq\FaqController`.
- Utilized native Laravel `Relation::getMorphAlias()` and `Relation::getMorphedModel()` for transparent alias and class normalization in `FaqController`.
- Updated test assertions across `AdminFaqPolymorphicTest`, `AdminDestinationCrudTest`, and `AdminJourneyCrudTest` to use `$model->getMorphClass()` for polymorphic table assertions.

## Detailed Changes

### Admin Service Provider
- **[`packages/admin/src/AdminServiceProvider.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/AdminServiceProvider.php)**:
  - Registered Eloquent morph map in `boot()`:
    ```php
    Relation::morphMap([
        'destination' => \Admin\Models\Destination::class,
        'journey'     => \Admin\Models\Journey::class,
        'experience'  => \Admin\Models\Experience::class,
        'article'     => \Admin\Models\Article::class,
        'guide'       => \Admin\Models\Guide::class,
    ]);
    ```

### Faq Controller
- **[`packages/admin/src/Http/Controllers/Faq/FaqController.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Http/Controllers/Faq/FaqController.php)**:
  - Removed private `resolveFaqableType(?string $type)` method.
  - In `index()`, resolved morph aliases using `Relation::getMorphAlias($raw) ?? $raw` with dual alias/class query support.
  - In `store()` and `update()`, mapped `destination_id`, `journey_id`, and `experience_id` directly to morph aliases (`destination`, `journey`, `experience`).
  - Automatically normalized incoming `faqable_type` values via `Relation::getMorphAlias()`.

### Feature Tests
- **[`tests/Feature/AdminFaqPolymorphicTest.php`](file:///Volumes/TOSHIBA/Herd/eath/tests/Feature/AdminFaqPolymorphicTest.php)**:
  - Updated database assertions to check `$destination->getMorphClass()` (`'destination'`).
- **[`tests/Feature/AdminDestinationCrudTest.php`](file:///Volumes/TOSHIBA/Herd/eath/tests/Feature/AdminDestinationCrudTest.php)**:
  - Updated `media_attachments` assertions from `Destination::class` to `$destination->getMorphClass()`.
- **[`tests/Feature/AdminJourneyCrudTest.php`](file:///Volumes/TOSHIBA/Herd/eath/tests/Feature/AdminJourneyCrudTest.php)**:
  - Updated `media_attachments` assertions from `Journey::class` to `$journey->getMorphClass()`.

## Verification Commands & Outputs

```bash
php artisan test tests/Feature/AdminDestinationCrudTest.php tests/Feature/AdminJourneyCrudTest.php tests/Feature/AdminFaqPolymorphicTest.php
```

Output:
```text
   PASS  Tests\Feature\AdminDestinationCrudTest
  ✓ can list destinations                                                0.61s  
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
  ✓ can create polymorphic faq using legacy parameters                   0.02s  
  ✓ can create global faq                                                0.02s  
  ✓ can filter faqs by polymorphic entity                                0.02s  

  Tests:    18 passed (123 assertions)
  Duration: 1.00s
```

## Next Steps
- When introducing new models to the Admin panel that use polymorphic relations (e.g. `TravelerStory`, `WebsitePage`), add their alias to the `Relation::morphMap` inside `AdminServiceProvider`.
