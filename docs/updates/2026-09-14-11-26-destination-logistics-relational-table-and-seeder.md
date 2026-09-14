# Destination Logistics Relational Table & Realistic Seeder Implementation

**Timestamp:** 2026-09-14 11:26 (Nepal Time / NPT / UTC+05:45)

## Summary
Migrated Trailhead Logistics & Practical Facts from static single columns on `destinations` to a fully relational 1-to-many model `destination_logistics` (`DestinationLogistics`). This allows any destination to have an arbitrary number of practical facts (Aviation Hubs, Baggage Limits, Permits, Acclimatization Pacing, Road Transit, Emergency Heli Evacuation, Cultural Monastic Etiquette, etc.). Implemented dynamic CRUD in Admin's `TabLogistics.vue` with drag/reorder controls, updated `DestinationResource`, enhanced public `show.blade.php` with zero-breakage fallbacks, and seeded comprehensive, destination-tailored realistic logistics for Everest, Annapurna, Langtang, Manaslu, and Mustang.

## Detailed Changes

1. **Database Migration (`database/migrations/2026_09_14_112500_create_destination_logistics_table.php`)**:
   - Created `destination_logistics` table with foreign key `destination_id` referencing `destinations.id` (cascade on delete).
   - Columns: `label` (string), `value` (text), `icon` (string nullable), `sort_order` (integer default 0), `is_active` (boolean default true), and timestamps.

2. **Eloquent Model (`packages/admin/src/Models/DestinationLogistics.php`)**:
   - Created `DestinationLogistics` under `packages/admin/src/Models/` adhering to the Laravel Model Location Rule in `AGENTS.md`.
   - Casts `is_active` as boolean and `sort_order` as integer. Belongs to `Destination`.

3. **Destination Model & Relationship (`packages/admin/src/Models/Destination.php`)**:
   - Added `logistics()` `hasMany` relationship ordered by `sort_order` ascending.

4. **API Resource & Controllers**:
   - `app/Http/Resources/DestinationResource.php`: Included `'logistics' => DestinationLogisticsResource::collection($this->whenLoaded('logistics'))` and collection map fallback.
   - `packages/admin/src/Http/Controllers/Destination/DestinationController.php`: Eager-loaded `logistics` on `show()`. Added transaction-wrapped synchronization of `logistics` array during destination store/update.
   - `packages/website/src/Http/Controllers/DestinationController.php`: Loaded `DestinationLogistics` items and passed `$logisticsItems` to the frontend view.
   - `packages/website/resources/views/website_preview/pages/destinations/show.blade.php`: Dynamically renders `$logisticsItems` in the Trailhead Logistics section, preserving backwards compatibility and fallback defaults if empty.

5. **Admin UI (`packages/admin/resources/admin/pages/destinations/detail_tabs/TabLogistics.vue`)**:
   - Built a dynamic repeater for adding, editing, reordering (Move Up / Down), and deleting practical facts.
   - Included management for Operational Advisory Notice and Bottom CTA Trip Planner banner.

6. **Realistic Seeder (`database/seeders/WebsiteDemoSeeder.php`)**:
   - Truncates `destination_logistics` on seed.
   - Added `seedDestinationLogistics()` with authentic facts for all 5 destinations:
     - **Everest**: Lukla & Ramechhap flight scheduling, 15kg STOL baggage limits, Sagarmatha & Khumbu permits, Namche & Dingboche acclimatization milestones, Helicopter rescue & satellite communications standby.
     - **Annapurna**: Pokhara transit gateway, ACAP & TIMS guide regulations, NATT wilderness footpaths vs jeep roads, Thorong La (5,416m) high pass crossing protocol.
     - **Langtang**: Overland 4WD Pasang Lhamu Highway (no flights required), Langtang National Park & Dhunche checkpoints, Rebuilt earthquake-resilient lodges with solar amenities, Steep valley ascent & Kyanjin Ri / Tserko Ri acclimatization pacing.
     - **Manaslu**: Special Restricted Area Permit (RAP) regulations & mandatory guide, Rugged 4WD overland transit to Machha Khola, Larkya La (5,106m) alpine col expedition preparation, Upper Nubri Tibetan Buddhist monastic etiquette.
     - **Mustang**: $500 Special Lo Manthang RAP rules, Jomsom STOL flight vs Kali Gandaki 4WD canyon overland, Monsoon rain-shadow weather advantage, Arid plateau afternoon winds & UV protection, Walled royal capital & 2,500-year-old Chhoser sky caves.

7. **Feature Tests**:
   - Added `test_can_sync_destination_logistics_items()` to `tests/Feature/AdminDestinationCrudTest.php`.
   - Created `tests/Feature/WebsiteDestinationDetailTest.php` testing public destination detail view rendering dynamic logistics, operational notice, CTA, and FAQs.

## Verification Commands & Outputs

```bash
# 1. Database Migration & Fresh Seeding
php artisan migrate:fresh --seed
# Output:
# INFO Running migrations.
# 2026_09_14_112500_create_destination_logistics_table ... 6.52ms DONE
# Database\Seeders\WebsiteDemoSeeder ... 200ms DONE

# 2. Tinker verification of seeded logistics counts and titles
php artisan tinker --execute="use Admin\Models\Destination; foreach(Destination::with('logistics')->get() as \$d) { echo \$d->name . ' (' . \$d->slug . ') logistics count: ' . \$d->logistics->count() . PHP_EOL; foreach(\$d->logistics as \$l) { echo '   - ' . \$l->label . PHP_EOL; } }"
# Output:
# Everest (everest) logistics count: 5
#    - Aviation Gateway & Flight Scheduling
#    - Baggage Allowance & Weight Restrictions
#    - Conservation & Municipality Permits
#    - Acclimatization Milestones & Pacing
#    - Emergency Evacuation & Satellite Communications
# Annapurna (annapurna) logistics count: 4
#    - Transit Gateway & Road Approaches
#    - ACAP & TIMS Permit Regulations
#    - Natural Footpaths vs Road Bypasses
#    - Thorong La Pass (5,416m) Crossing Protocol
# Langtang (langtang) logistics count: 4
#    - Overland 4WD Access from Kathmandu
#    - Langtang National Park Checkpoints
#    - Rebuilt Resilient Teahouses & Solar Power
#    - Rapid Elevation Gain & Viewpoint Pacing
# Manaslu (manaslu) logistics count: 4
#    - Special Restricted Area Permit (RAP) Rules
#    - 4WD Trailhead Overland Route
#    - Larkya La Pass (5,106m) Alpine Crossing
#    - Tibetan Monastic Culture & Village Etiquette
# Mustang (mustang) logistics count: 5
#    - Special Lo Manthang Restricted Area Permit
#    - Jomsom Mountain Flight & 4WD Canyon Overland
#    - Monsoon Rain-Shadow Weather Advantage
#    - Arid Plateau Winds & UV Protection
#    - Walled Medieval Capital & 2,500-Year-Old Sky Caves

# 3. Admin & Public Feature Tests
php artisan test tests/Feature/AdminDestinationCrudTest.php tests/Feature/AdminFaqPolymorphicTest.php tests/Feature/WebsiteDestinationDetailTest.php
# Output:
# PASS Tests\Feature\AdminDestinationCrudTest (11 passed)
# PASS Tests\Feature\AdminFaqPolymorphicTest (4 passed)
# PASS Tests\Feature\WebsiteDestinationDetailTest (1 passed)
# Tests: 16 passed (90 assertions)

# 4. Vite Frontend Asset Build
npm run build
# Output:
# ✓ built in 20.83s
```

## Next Steps
- Destination detail pages are now 100% dynamic across all sections (Hero, Gallery, Overview, Logistics, Relational Treks & Seasons, FAQs, CTA, and SEO).
- Proceed with similar dynamic relational standards for Journey Detail, Experience Detail, Guide Detail, or Article Detail as needed.
