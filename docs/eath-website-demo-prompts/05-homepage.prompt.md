# 05 — Complete homepage, exact 20-section order

## Read first

Master, 03, 04 and route/CTA, catalog, content and asset references. Use only the fixture repository. This phase implements P01.

## 1. Composition rule

Keep a clean Blade composition view and numbered partials. Reuse audited homepage includes safely without changing live output; use demo-specific includes or explicit fixture props as needed. Candidate existing names include landing-hero, landing-featured-treks, landing-destinations, landing-why-choose-us, landing-custom-trek, landing-how-we-work and landing-responsible-tourism. Audit names first.

The old standalone tag-lines, departures and gallery may supply useful presentation patterns, but they must not become extra sections or move the approved order. Keep their live files intact. Preview departures belong as a compact option in Featured Treks; preview stories/gallery serve the appropriate sections.

## 2. Exact section specification

| No. / section | Layout and contents | Working action |
| --- | --- | --- |
| 01 Top Trust Bar | Compact persistent demo disclosure, no fabricated trust badges | Demo information/reset when available |
| 02 Main Header | Shared shell from04; counts and navigation consistent | All preview routes |
| 03 Hero | Full-bleed landscape, contained text max 680px, eyebrow, one H1, one supporting sentence; no search box over image | Primary Find My Trek; secondary Explore Treks |
| 04 Trek Discovery/Search | Separate full-width functional band below hero. Persistent labels: region, available duration range, month; optional additional filters link | GET demo.treks.index with canonical keys |
| 05 Experience Discovery | All 6 populated categories, 3 columns desktop/2 tablet/1–2 mobile, distinct imagery and title | Experience detail |
| 06 Featured Treks | First 3 by featured_rank, complete TrekCard. Small link to sample departures, not a separate homepage section | Detail, Compare, View all |
| 07 Destination Explorer | Five region tiles; editorial varied spans desktop, uniform readable mobile. Name/introduction/derived count | Destination detail |
| 08 Find My Trek | Warm editorial split: image + concise guided-planning proposition; show four preference cues, not a fake interactive form | Discover-mode planner |
| 09 Travel by Month | Twelve accessible month links/buttons, selected fixture month summary, link to all-month overview | Month detail or filtered listing |
| 10 Compare Treks | Intro and a compact teaser with t-ebc/t-abc/t-langtang sample facts; selection actions, not a fake static tool | Full compare with these IDs or current selection |
| 11 Why EATH | Three minimal editorial columns about proposed planning approach: understand preferences, inspect trade-offs, review together | About demo page |
| 12 Reviews/Traveler Stories | Three photo-led fictional story cards with nearby sample labels; no star aggregate or platform claim | Story detail/listing |
| 13 Safety/Support | Image/text split; headings Preparation, On-trail support, Questions to verify. Explicit sample-operating-copy note | Safety page |
| 14 Custom Trip | Large image + short copy about dates, pace, interests, budget and comfort; visually distinct from08 | Custom-mode planner |
| 15 How It Works | Four numbered steps: Discover, Plan Together, Review Request, Prepare for Next Steps. Explain demo stops at simulation | Start planner |
| 16 Meet Your Guides | Three fictional profiles, silhouette placeholders if needed, no real credentials | Guide detail/listing |
| 17 Responsible Travel | Three editorial themes: communities, environment, team welfare. Proposed practice labels | Responsible-travel page |
| 18 Nepal Travel Guide |3 featured sample articles: seasons, packing, preparation. ArticleCards + view all | Article detail/listing |
| 19 Final CTA | Forest background, editorial headline, one planning action and quieter demo contact alternative | Planner / demo.contact |
| 20 Footer | Shared footer, legal/contact/reset links | Real preview destinations |

Section15 preserves the approved four-step process slot but must not imply a booking was made. It may explain the future real journey Discover→Plan→Book→Arrive as future context, with a clear demo boundary; default use the accurate simulation-oriented labels above.

## 3. Typography and spacing

Hero uses display token; section titles H2 token; card names h3 with card-title visual size. One H1 only. Desktop hero min-height about 640px, mobile content-driven roughly520px minimum; allow longer content to grow. Use a modest gradient overlay only to ensure text readability, no shadow/glow. CTAs stack at narrow widths.

Alternate base background, warm editorial sections and white product surfaces. Use the standard96/80/56 section rhythm without turning every block into a rounded outer card. No arbitrary left alignment offsets. Photography and whitespace carry depth.

## 4. Interaction specifics

- Search uses allowed query parameters and has a no-JS GET fallback. Do not submit a duration label as an invented numeric value; map a selection to days_min/days_max explicitly.
- Experience/region/month CTAs pass IDs/slug context correctly. January no-match is an intentional fixture state.
- Add to Compare actions use the shared contract; in early build they may be progressively wired in08, but mark that dependency, not complete behavior.
- Fixed-departure details are sample data only; no scarcity timers or real sales copy.
- No autoplay carousels, counters or hidden-on-scroll section content.

## Acceptance

Test exact rendered section sequence; complete sample content in all 20 slots; all product values from repository; primary search form working after 06; image aspect ratios reserved; correct heading structure; home at 320/768/1440px. Log pending links to later phases; final integration must clear them. No production side effects or additional homepage sections.
