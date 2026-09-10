# Canonical demo catalog

## 1. Use exactly one source

The following JSON is the canonical seed. Implement it as project-local fixture data using existing PHP/JSON conventions. Do not query Eloquent, seed the database, contact a travel service or invent a second dataset in JavaScript.

All numeric metrics, durations, itinerary shapes, suitability months, comfort labels and prices here are **illustrative UI test inputs, not verified travel facts**. Real place names are product labels only. Keep a local disclosure next to itinerary, price and conditions. No recommendation is a safety assessment.

Money source of truth is `price_minor` (integer cents). `price_usd` is a human-readable redundant assertion for fixture validation, not a second calculation source. No currency conversion. Display USD consistently.

## 2. Seed data

```json
{
  "schema_version": 1,
  "is_demo": true,
  "currency": "USD",
  "demo_calendar_date": "2030-09-01",
  "regions": [
    {
      "id": "everest",
      "slug": "everest",
      "name": "Everest",
      "intro": "Sample region introduction: compare longer mountain-view journeys and explore the pace that suits your plans."
    },
    {
      "id": "annapurna",
      "slug": "annapurna",
      "name": "Annapurna",
      "intro": "Sample region introduction: explore a range of shorter and longer scenic trekking ideas."
    },
    {
      "id": "langtang",
      "slug": "langtang",
      "name": "Langtang",
      "intro": "Sample region introduction: discover a valley-focused journey with a culture and landscape theme."
    },
    {
      "id": "manaslu",
      "slug": "manaslu",
      "name": "Manaslu",
      "intro": "Sample region introduction: explore an extended circuit idea and its planning trade-offs."
    },
    {
      "id": "mustang",
      "slug": "mustang",
      "name": "Mustang",
      "intro": "Sample region introduction: consider a culture-led landscape journey and extra planning questions."
    }
  ],
  "experiences": [
    {
      "id": "mountain-scenery",
      "slug": "mountain-scenery",
      "name": "Mountain Scenery",
      "intro": "Browse sample journeys where the landscape is the central experience."
    },
    {
      "id": "cultural-trails",
      "slug": "cultural-trails",
      "name": "Cultural Trails",
      "intro": "Explore sample itineraries with village visits and cultural context."
    },
    {
      "id": "quiet-trails",
      "slug": "quiet-trails",
      "name": "Quieter Trail Ideas",
      "intro": "Compare sample routes tagged for quieter-trail interests; this is not a crowd forecast."
    },
    {
      "id": "short-treks",
      "slug": "short-treks",
      "name": "Short Trek Ideas",
      "intro": "Find sample trips tagged for a shorter overall visit."
    },
    {
      "id": "photography",
      "slug": "photography",
      "name": "Photography Journeys",
      "intro": "Consider sample itineraries with an emphasis on viewpoints and time to observe."
    },
    {
      "id": "iconic-routes",
      "slug": "iconic-routes",
      "name": "Iconic Route Ideas",
      "intro": "Start with familiar trek names, then compare actual sample preferences and duration."
    }
  ],
  "months": [
    {
      "id": 1,
      "slug": "january",
      "name": "January",
      "season_demo": "winter",
      "intro": "Illustrative month profile. Seasonal descriptions and route conditions require verification before real travel planning."
    },
    {
      "id": 2,
      "slug": "february",
      "name": "February",
      "season_demo": "winter",
      "intro": "Illustrative month profile. Seasonal descriptions and route conditions require verification before real travel planning."
    },
    {
      "id": 3,
      "slug": "march",
      "name": "March",
      "season_demo": "spring",
      "intro": "Illustrative month profile. Seasonal descriptions and route conditions require verification before real travel planning."
    },
    {
      "id": 4,
      "slug": "april",
      "name": "April",
      "season_demo": "spring",
      "intro": "Illustrative month profile. Seasonal descriptions and route conditions require verification before real travel planning."
    },
    {
      "id": 5,
      "slug": "may",
      "name": "May",
      "season_demo": "spring",
      "intro": "Illustrative month profile. Seasonal descriptions and route conditions require verification before real travel planning."
    },
    {
      "id": 6,
      "slug": "june",
      "name": "June",
      "season_demo": "summer",
      "intro": "Illustrative month profile. Seasonal descriptions and route conditions require verification before real travel planning."
    },
    {
      "id": 7,
      "slug": "july",
      "name": "July",
      "season_demo": "summer",
      "intro": "Illustrative month profile. Seasonal descriptions and route conditions require verification before real travel planning."
    },
    {
      "id": 8,
      "slug": "august",
      "name": "August",
      "season_demo": "summer",
      "intro": "Illustrative month profile. Seasonal descriptions and route conditions require verification before real travel planning."
    },
    {
      "id": 9,
      "slug": "september",
      "name": "September",
      "season_demo": "autumn",
      "intro": "Illustrative month profile. Seasonal descriptions and route conditions require verification before real travel planning."
    },
    {
      "id": 10,
      "slug": "october",
      "name": "October",
      "season_demo": "autumn",
      "intro": "Illustrative month profile. Seasonal descriptions and route conditions require verification before real travel planning."
    },
    {
      "id": 11,
      "slug": "november",
      "name": "November",
      "season_demo": "autumn",
      "intro": "Illustrative month profile. Seasonal descriptions and route conditions require verification before real travel planning."
    },
    {
      "id": 12,
      "slug": "december",
      "name": "December",
      "season_demo": "winter",
      "intro": "Illustrative month profile. Seasonal descriptions and route conditions require verification before real travel planning."
    }
  ],
  "treks": [
    {
      "id": "t-ebc",
      "slug": "everest-base-camp",
      "name": "Everest Base Camp",
      "region_id": "everest",
      "duration_days": 15,
      "difficulty": "challenging",
      "max_altitude_m": 5545,
      "walking_hours_max": 8,
      "suitable_months": [
        3,
        4,
        5,
        9,
        10,
        11
      ],
      "price_usd": 1790,
      "experience_ids": [
        "iconic-routes",
        "mountain-scenery",
        "cultural-trails"
      ],
      "accommodation": "standard",
      "pace": "active",
      "featured_rank": 1,
      "summary": "A sample longer Himalayan journey combining big mountain views and village stays.",
      "highlights": [
        "Big mountain viewpoints",
        "Village-to-village walking",
        "Time for a slower pace between trail days"
      ],
      "price_minor": 179000,
      "currency": "USD",
      "pricing_basis": "per_person_ground_package",
      "is_demo": true,
      "image_key": "trek-t-ebc",
      "guide_id": "guide-demo-01",
      "route_map_key": null,
      "faq_ids": [
        "faq-duration",
        "faq-price",
        "faq-customize"
      ],
      "gallery_keys": [
        "gallery-t-ebc-01",
        "gallery-t-ebc-02",
        "gallery-t-ebc-03",
        "gallery-t-ebc-04"
      ]
    },
    {
      "id": "t-abc",
      "slug": "annapurna-base-camp",
      "name": "Annapurna Base Camp",
      "region_id": "annapurna",
      "duration_days": 15,
      "difficulty": "moderate",
      "max_altitude_m": 4130,
      "walking_hours_max": 7,
      "suitable_months": [
        3,
        4,
        5,
        9,
        10,
        11
      ],
      "price_usd": 1290,
      "experience_ids": [
        "iconic-routes",
        "mountain-scenery",
        "cultural-trails"
      ],
      "accommodation": "standard",
      "pace": "balanced",
      "featured_rank": 2,
      "summary": "A sample trek pairing changing landscapes with a mountain amphitheater theme.",
      "highlights": [
        "Forest and open landscapes",
        "Mountain-focused trail days",
        "Village hospitality theme"
      ],
      "price_minor": 129000,
      "currency": "USD",
      "pricing_basis": "per_person_ground_package",
      "is_demo": true,
      "image_key": "trek-t-abc",
      "guide_id": "guide-demo-02",
      "route_map_key": null,
      "faq_ids": [
        "faq-duration",
        "faq-price",
        "faq-customize"
      ],
      "gallery_keys": [
        "gallery-t-abc-01",
        "gallery-t-abc-02",
        "gallery-t-abc-03",
        "gallery-t-abc-04"
      ]
    },
    {
      "id": "t-langtang",
      "slug": "langtang-valley",
      "name": "Langtang Valley",
      "region_id": "langtang",
      "duration_days": 10,
      "difficulty": "moderate",
      "max_altitude_m": 4984,
      "walking_hours_max": 7,
      "suitable_months": [
        3,
        4,
        5,
        9,
        10,
        11
      ],
      "price_usd": 990,
      "experience_ids": [
        "quiet-trails",
        "mountain-scenery",
        "cultural-trails"
      ],
      "accommodation": "standard",
      "pace": "balanced",
      "featured_rank": 3,
      "summary": "A sample valley itinerary with space for mountain scenery and local stories.",
      "highlights": [
        "Valley scenery",
        "Culture-led village stops",
        "A flexible exploration day"
      ],
      "price_minor": 99000,
      "currency": "USD",
      "pricing_basis": "per_person_ground_package",
      "is_demo": true,
      "image_key": "trek-t-langtang",
      "guide_id": "guide-demo-03",
      "route_map_key": null,
      "faq_ids": [
        "faq-duration",
        "faq-price",
        "faq-customize"
      ],
      "gallery_keys": [
        "gallery-t-langtang-01",
        "gallery-t-langtang-02",
        "gallery-t-langtang-03",
        "gallery-t-langtang-04"
      ]
    },
    {
      "id": "t-mardi",
      "slug": "mardi-himal",
      "name": "Mardi Himal",
      "region_id": "annapurna",
      "duration_days": 7,
      "difficulty": "moderate",
      "max_altitude_m": 4500,
      "walking_hours_max": 7,
      "suitable_months": [
        3,
        4,
        5,
        9,
        10,
        11
      ],
      "price_usd": 690,
      "experience_ids": [
        "short-treks",
        "mountain-scenery",
        "quiet-trails"
      ],
      "accommodation": "standard",
      "pace": "relaxed",
      "featured_rank": 4,
      "summary": "A compact sample mountain escape for testing shorter-trip discovery.",
      "highlights": [
        "Shorter overall itinerary",
        "Ridge-view theme",
        "Forest-to-mountain scenery"
      ],
      "price_minor": 69000,
      "currency": "USD",
      "pricing_basis": "per_person_ground_package",
      "is_demo": true,
      "image_key": "trek-t-mardi",
      "guide_id": "guide-demo-01",
      "route_map_key": null,
      "faq_ids": [
        "faq-duration",
        "faq-price",
        "faq-customize"
      ],
      "gallery_keys": [
        "gallery-t-mardi-01",
        "gallery-t-mardi-02",
        "gallery-t-mardi-03",
        "gallery-t-mardi-04"
      ]
    },
    {
      "id": "t-gokyo",
      "slug": "gokyo-lakes",
      "name": "Gokyo Lakes",
      "region_id": "everest",
      "duration_days": 14,
      "difficulty": "challenging",
      "max_altitude_m": 5357,
      "walking_hours_max": 8,
      "suitable_months": [
        3,
        4,
        5,
        9,
        10,
        11
      ],
      "price_usd": 1690,
      "experience_ids": [
        "mountain-scenery",
        "quiet-trails",
        "photography"
      ],
      "accommodation": "standard",
      "pace": "active",
      "featured_rank": 5,
      "summary": "A sample high-country journey organized around lakes, viewpoints and photography.",
      "highlights": [
        "Lake-view theme",
        "Photo-led exploration",
        "Longer mountain walking days"
      ],
      "price_minor": 169000,
      "currency": "USD",
      "pricing_basis": "per_person_ground_package",
      "is_demo": true,
      "image_key": "trek-t-gokyo",
      "guide_id": "guide-demo-02",
      "route_map_key": null,
      "faq_ids": [
        "faq-duration",
        "faq-price",
        "faq-customize"
      ],
      "gallery_keys": [
        "gallery-t-gokyo-01",
        "gallery-t-gokyo-02",
        "gallery-t-gokyo-03",
        "gallery-t-gokyo-04"
      ]
    },
    {
      "id": "t-manaslu",
      "slug": "manaslu-circuit",
      "name": "Manaslu Circuit",
      "region_id": "manaslu",
      "duration_days": 16,
      "difficulty": "challenging",
      "max_altitude_m": 5106,
      "walking_hours_max": 9,
      "suitable_months": [
        3,
        4,
        5,
        9,
        10,
        11
      ],
      "price_usd": 1890,
      "experience_ids": [
        "quiet-trails",
        "cultural-trails",
        "mountain-scenery"
      ],
      "accommodation": "standard",
      "pace": "active",
      "featured_rank": 6,
      "summary": "A sample extended circuit for comparing longer, more demanding journeys.",
      "highlights": [
        "Extended circuit theme",
        "Changing mountain landscapes",
        "Community-focused stops"
      ],
      "price_minor": 189000,
      "currency": "USD",
      "pricing_basis": "per_person_ground_package",
      "is_demo": true,
      "image_key": "trek-t-manaslu",
      "guide_id": "guide-demo-03",
      "route_map_key": null,
      "faq_ids": [
        "faq-duration",
        "faq-price",
        "faq-customize"
      ],
      "gallery_keys": [
        "gallery-t-manaslu-01",
        "gallery-t-manaslu-02",
        "gallery-t-manaslu-03",
        "gallery-t-manaslu-04"
      ]
    },
    {
      "id": "t-khopra",
      "slug": "khopra-ridge",
      "name": "Khopra Ridge",
      "region_id": "annapurna",
      "duration_days": 13,
      "difficulty": "moderate",
      "max_altitude_m": 4660,
      "walking_hours_max": 7,
      "suitable_months": [
        3,
        4,
        5,
        9,
        10,
        11
      ],
      "price_usd": 1390,
      "experience_ids": [
        "quiet-trails",
        "photography",
        "mountain-scenery"
      ],
      "accommodation": "standard",
      "pace": "balanced",
      "featured_rank": 7,
      "summary": "A sample ridge journey focused on slower exploration and broad views.",
      "highlights": [
        "Panoramic ridge theme",
        "Photography time",
        "Flexible village stays"
      ],
      "price_minor": 139000,
      "currency": "USD",
      "pricing_basis": "per_person_ground_package",
      "is_demo": true,
      "image_key": "trek-t-khopra",
      "guide_id": "guide-demo-01",
      "route_map_key": null,
      "faq_ids": [
        "faq-duration",
        "faq-price",
        "faq-customize"
      ],
      "gallery_keys": [
        "gallery-t-khopra-01",
        "gallery-t-khopra-02",
        "gallery-t-khopra-03",
        "gallery-t-khopra-04"
      ]
    },
    {
      "id": "t-mustang",
      "slug": "upper-mustang",
      "name": "Upper Mustang",
      "region_id": "mustang",
      "duration_days": 14,
      "difficulty": "moderate",
      "max_altitude_m": 4200,
      "walking_hours_max": 6,
      "suitable_months": [
        4,
        5,
        6,
        7,
        8,
        9,
        10
      ],
      "price_usd": 2290,
      "experience_ids": [
        "cultural-trails",
        "photography",
        "quiet-trails"
      ],
      "accommodation": "upgraded",
      "pace": "balanced",
      "featured_rank": 8,
      "summary": "A sample cultural landscape itinerary for testing different months and comfort preferences.",
      "highlights": [
        "Culture-focused exploration",
        "Distinctive landscape theme",
        "Unhurried village visits"
      ],
      "price_minor": 229000,
      "currency": "USD",
      "pricing_basis": "per_person_ground_package",
      "is_demo": true,
      "image_key": "trek-t-mustang",
      "guide_id": "guide-demo-02",
      "route_map_key": null,
      "faq_ids": [
        "faq-duration",
        "faq-price",
        "faq-customize"
      ],
      "gallery_keys": [
        "gallery-t-mustang-01",
        "gallery-t-mustang-02",
        "gallery-t-mustang-03",
        "gallery-t-mustang-04"
      ]
    }
  ],
  "addons": [
    {
      "id": "extra-hotel-nights",
      "label": "Extra hotel nights",
      "price_minor": null
    },
    {
      "id": "private-transfer",
      "label": "Private transfer request",
      "price_minor": null
    },
    {
      "id": "cultural-day",
      "label": "Cultural day request",
      "price_minor": null
    },
    {
      "id": "extra-trail-day",
      "label": "Extra trail day request",
      "price_minor": null
    }
  ],
  "departure_templates": [
    {
      "suffix": "a",
      "start_offset_days": 30,
      "status": "open",
      "sample_seats": 8,
      "price_adjustment_minor": 0
    },
    {
      "suffix": "b",
      "start_offset_days": 55,
      "status": "limited",
      "sample_seats": 2,
      "price_adjustment_minor": 10000
    },
    {
      "suffix": "c",
      "start_offset_days": 90,
      "status": "full",
      "sample_seats": 0,
      "price_adjustment_minor": 0
    }
  ]
}
```

## 3. Hydrate a complete detail record for every trek

Build deterministic enrichment in a fixture builder/service, not in Blade. The builder must return a complete detail record for **all eight** treks, not just the first one.

1. Overview: use the trek summary and a second original paragraph explaining its demo experience theme and decision trade-offs. Include `Illustrative itinerary — not an operating route plan`.
2. Highlights: use supplied highlights, not badges claiming awards.
3. Itinerary: create exactly duration_days numbered entries. Day 1 = `Arrival and sample planning session`; final day = `Departure and onward plans`; penultimate day = `Return and unhurried wrap-up`. Internal days cycle through `Forest and village walking`, `Scenic trail exploration`, `Time for views and photographs`, `A slower exploration day`, `Continuing the sample trail`, with distinct day-specific copy tied to that trek's theme. These are intentionally non-navigational samples. No invented daily elevations or actual safety/acclimatization instructions.
4. Each day exposes day, title, description, location_label (`Sample location`), walking_hours (null or <= trek ceiling), altitude_m (null), accommodation_label and meal_note. Distinguish missing from zero.
5. Inclusions: sample ground itinerary planning, sample guide-support line, sample accommodation line. Exclusions: international flights, insurance, personal expenses and unpriced customization; all visibly illustrative and not contractual.
6. Accommodation/meals: describe the fixture accommodation category as a demo preference; do not claim real lodge/hotel availability.
7. Difficulty/logistics/safety: explanatory demo copy plus `Operational details must be verified before launch`. Do not manufacture permit fees, emergency numbers or medical recommendations.
8. Route map: route_map_key is null on purpose. Render `Route map not supplied in this demo` with a helpful caption; never create a misleading geographic route.
9. FAQs: hydrate duration from data, pricing disclaimer and custom-request instructions using the shared FAQ records.
10. Related treks: same region first, then nearest duration, then ID; exclude current trek, max 3.
11. Gallery: resolve registry keys through audited assets or labeled local fallbacks. No broken URLs.
12. Metadata: unique demo title and description derived from name/summary; no fictional review/offer schema.

These content-generation rules are part of the fixture contract. Persist the resulting authored content in the demo repository or build deterministically once; do not generate marketing text differently on each request.

## 4. Departures

For each trek, instantiate all three departure templates:

- id = trek.id + '-' + suffix, for example `t-ebc-a`.
- start_date = demo_calendar_date + start_offset_days in ISO date-only format.
- end_date = start_date + duration_days - 1 (inclusive itinerary dates).
- price_minor = base price_minor + price_adjustment_minor.
- open/limited with sufficient illustrative seats can be selected; full cannot.
- selected departure price replaces the base in that plan's sample subtotal. Requested extras stay unpriced.
- no inventory is decremented at any point.

Use an injected demo clock fixed to 1 September 2030; display `Sample calendar: September 2030` on date-sensitive demo screens. Server session expiry still uses the real clock. Tests must not depend on today's date. Production migration later removes/replaces this fixture clock only after authorization.

## 5. Derivations and validation

- Destination/experience counts derive from trek relationships.
- Month matches derive from suitable_months; winter months intentionally allow empty results.
- Every region and experience has at least one trek in the seed.
- Stable IDs/slugs unique; all foreign IDs resolve; every trek has duration_days itinerary entries; no current trek in related items.
- Price minor = price_usd * 100; all prices in USD; no extra charges invented.
- The six initial familiar treks are included; two more broaden filtering/comparison coverage.
- All active UI features must work when one optional value is null or a dataset is empty.

