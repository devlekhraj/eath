# Seed Realistic Polymorphic FAQs for All Entities

**Timestamp:** 2026-09-14 11:10 (Nepal Time / NPT / UTC+05:45)

## Summary
- Implemented realistic, authentic Himalayan expedition FAQs in `database/seeders/WebsiteDemoSeeder.php` covering every Destination, Journey, Experience, and Global Website scope.
- Added `HasFaqs` trait to `Admin\Models\Experience`, `Admin\Models\Article`, and `Admin\Models\Guide`, enabling all polymorphic entities to resolve `$model->faqs`.
- Ran `php artisan migrate:fresh --seed` successfully, populating 59 realistic travel FAQs across the database.

## Detailed Changes

### Seeder
- **[`database/seeders/WebsiteDemoSeeder.php`](file:///Volumes/TOSHIBA/Herd/eath/database/seeders/WebsiteDemoSeeder.php)**:
  - Re-implemented `seedFaqs()` with realistic travel data:
    - **Global Website (6 FAQs)**: Mandatory evacuation insurance, tourist visas on arrival, solo trekker & guide policies, eco-friendly water purification, Acute Mountain Sickness (AMS) protocols, and trail cash logistics.
    - **Destinations (17 FAQs)**:
      - `everest`: Sagarmatha & Khumbu permits, Lukla flight rerouting via Ramechhap, Namche/Dingboche acclimatization strategy, best weather windows.
      - `annapurna`: ACAP & TIMS regulations, road vs NATT footpaths, teahouse comfort & food, winter trekking feasibility.
      - `langtang`: 4WD overland access from Kathmandu, post-earthquake community rebuilding, Gosainkunda lake combinations.
      - `manaslu`: Restricted Area status and RAP permits, Larkya La high-pass difficulty.
      - `mustang`: $500 RAP permits, summer rain-shadow monsoon trekking, Lo Manthang monastery etiquette.
    - **Journeys (24 FAQs)**:
      - `everest-base-camp`: Gorak Shep vs base camp tenting, Kala Patthar sunrise climb, physical conditioning.
      - `annapurna-base-camp`: 360-degree Sanctuary amphitheater, Jhinu Danda natural hot springs, ecozones.
      - `langtang-valley`: Kyanjin Gompa side-hikes, introductory Himalayan suitability, national park wildlife.
      - `mardi-himal`: High ridge crest trail, High Camp (3,580m) & Base Camp (4,500m), teahouse availability.
      - `gokyo-lakes`: 6 turquoise glacial lakes, Cho La Pass connection to EBC, sub-zero sleeping gear.
      - `manaslu-circuit`: Uncommercialized wilderness character, Dharmasala high shelter, Tsum Valley detours.
      - `khopra-ridge`: Community-owned lodge model, sacred Khayer Lake (4,660m) excursion, Dhaulagiri vistas.
      - `upper-mustang`: Walled fortress of Lo Manthang, 2,000-year-old cliff sky caves, 4WD overland expeditions.
    - **Experiences (12 FAQs)**:
      - `mountain-scenery`, `cultural-trails`, `quiet-trails`, `short-treks`, `photography`, `iconic-routes`.

### Models
- **[`packages/admin/src/Models/Experience.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/Experience.php)**: Added `HasFaqs` trait.
- **[`packages/admin/src/Models/Article.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/Article.php)**: Added `HasFaqs` trait.
- **[`packages/admin/src/Models/Guide.php`](file:///Volumes/TOSHIBA/Herd/eath/packages/admin/src/Models/Guide.php)**: Added `HasFaqs` trait.

## Verification Commands & Outputs

```bash
php artisan migrate:fresh --seed
```
Output:
```text
Dropping all tables ... DONE
Running migrations ... DONE
Seeding database ...
Database\Seeders\AdminSeeder ... DONE
Database\Seeders\CountriesTableSeeder ... DONE
Database\Seeders\WebsiteDemoSeeder ... DONE
```

```bash
php artisan tinker --execute="echo json_encode(\Admin\Models\Faq::selectRaw('faqable_type, count(*) as count')->groupBy('faqable_type')->get()->toArray(), JSON_PRETTY_PRINT);"
```
Output:
```json
[
    {
        "faqable_type": null,
        "count": 6
    },
    {
        "faqable_type": "destination",
        "count": 17
    },
    {
        "faqable_type": "experience",
        "count": 12
    },
    {
        "faqable_type": "journey",
        "count": 24
    }
]
```

```bash
php artisan test tests/Feature/AdminDestinationCrudTest.php tests/Feature/AdminJourneyCrudTest.php tests/Feature/AdminFaqPolymorphicTest.php
```
Output:
```text
PASS Tests\Feature\AdminDestinationCrudTest (10 tests, 56 assertions)
PASS Tests\Feature\AdminJourneyCrudTest (4 tests, 46 assertions)
PASS Tests\Feature\AdminFaqPolymorphicTest (4 tests, 24 assertions)

Total: 18 passed (124 assertions)
```
