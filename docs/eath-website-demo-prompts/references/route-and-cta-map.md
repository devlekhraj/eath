# Route and CTA contract

## 1. Routing policy

Use `/demo` as the isolated preview prefix and `demo.` as the route-name prefix. Actual filenames may follow the audited project; this logical contract must stay consistent. No route should silently fall back to a production controller or production route-model binding. Resolve all slugs through the fixture repository and return 404 for unknown content.

GET routes render Blade. POST routes use framework CSRF protection, validation and Post/Redirect/Get where applicable. Static nested routes must not be swallowed by slug routes. Normal navigation is GET; a GET must never submit/reset a draft or create a confirmation.

## 2. Page inventory

| ID | URL (under /demo) | Route name | Phase | Content/action |
| --- | --- | --- | --- | --- |
| P01 | / | demo.home | 05 | Exact 20-section homepage |
| P02 | /treks | demo.treks.index | 06 | GET search/filter/sort/pagination |
| P03 | /treks/{slug} | demo.treks.show | 07 | Fixture trek detail |
| P04 | /destinations | demo.destinations.index | 14 | Region listing |
| P05 | /destinations/{slug} | demo.destinations.show | 15 | Region detail |
| P06 | /experiences | demo.experiences.index | 16 | Interest listing |
| P07 | /experiences/{slug} | demo.experiences.show | 17 | Interest detail |
| P08 | /when-to-go | demo.months.index | 18 | Twelve-month overview |
| P09 | /when-to-go/{month} | demo.months.show | 19 | Canonical lowercase month slug |
| P10 | /compare-treks | demo.compare | 09 | SSR comparison via trek IDs in query |
| P11 | /plan-my-trek | demo.planner.start | 10–12 | Mode/start/resume + wizard steps |
| P12 | /plan-my-trek/review | demo.planner.review | 13 | Draft review, no PII in URL |
| P13 | /plan-my-trek/contact | demo.planner.contact | 13 | Sample contact form |
| P14 | /plan-my-trek/confirmation | demo.planner.confirmation | 13 | Session-scoped demo result |
| P15 | /departures | demo.departures.index | 20 | Generated sample departure rows |
| P16 | /travel-guide | demo.articles.index | 21 | Article search/category listing |
| P17 | /travel-guide/{slug} | demo.articles.show | 22 | Article and table of contents |
| P18 | /about | demo.about | 23 | Sample brand introduction |
| P19 | /guides | demo.guides.index | 24 | Fictional demo guides |
| P20 | /guides/{slug} | demo.guides.show | 25 | Fictional profile |
| P21 | /traveler-stories | demo.stories.index | 26 | Fictional stories; no aggregate rating |
| P22 | /traveler-stories/{slug} | demo.stories.show | 27 | Labeled sample narrative |
| P23 | /safety | demo.safety | 28 | Clearly labeled editorial sample |
| P24 | /responsible-travel | demo.responsible | 29 | Proposed practices, not verified claims |
| P25 | /contact | demo.contact | 30 | Simulated general contact |
| P26 | /faqs | demo.faqs | 31 | Searchable sample FAQ |
| P27a | /privacy | demo.policy.privacy | 32 | Draft policy layout |
| P27b | /terms | demo.policy.terms | 32 | Draft policy layout |
| P27c | /booking-conditions | demo.policy.booking | 32 | Draft policy layout |
| P27d | /cancellation | demo.policy.cancellation | 32 | Draft policy layout |
| P27e | /cookies | demo.policy.cookies | 32 | Draft policy layout |
| P28 | unknown preview paths | no named success route | 33 | Correct HTTP 404 |

Phases 08 and 10–12 implement cross-page infrastructure, not extra public pages. Quality phases do not add marketing pages.

## 3. Mutating demo actions

| Method / path | Route name | Required behavior |
| --- | --- | --- |
| POST /plan-my-trek/start | demo.planner.begin | Validated entry context; create/replace draft deliberately |
| POST /plan-my-trek/step | demo.planner.step | Validate current step and update scoped draft |
| POST /plan-my-trek/select | demo.planner.select | Validate fixture choice; re-evaluate recommendation |
| POST /plan-my-trek/submit | demo.planner.submit | Simulated submission; discard sample contact; create demo receipt |
| POST /plan-my-trek/reset | demo.planner.reset | Delete only this demo draft/receipt state |
| POST /contact | demo.contact.submit | Simulated contact; no external effects |
| POST /reset | demo.reset | Clear all namespaced demo state; never flush application session |

All paths inherit `/demo`. Every action checks the demo environment gate, not just the layout banner. GET forms for search, filters and compare are read-only.

## 4. Canonical query contracts

- Trek listing: `q`, `region`, `experience`, `month` (integer 1–12), `days_min`, `days_max`, `difficulty` (easy/moderate/challenging), `budget_max` (USD integer dollars), `sort` (recommended/duration_asc/duration_desc/price_asc/price_desc), `page`.
- No dynamic SQL: filter in the in-memory fixture collection. Ignore unknown keys; validate types and enum values; trim query to at most 120 characters. Invalid ranges get an inline GET-filter error and no exception.
- Comparison: `treks[]=t-ebc&treks[]=t-abc`; normalized distinct IDs, at most three. Explicit URL selection is authoritative even when empty. Local storage is only a navigation convenience, never a catalog source.
- Planner entry GET: `mode=discover|selected|custom`, optional `trek`, `departure`, `region`, `experience`, `month`, `source=home|listing|detail|compare|month|destination|experience|departure|article|story|contact`. Only allowlisted IDs/enums. No contact data or free text in URLs.
- Planner step GET: `step=timing|travelers|preferences|budget|recommendations`; server decides accessible steps from current draft. Invalid/jumped steps redirect safely to earliest incomplete step.
- Editorial lists: `q`, `category`, `page`. Story list optionally `trek`, `region`; departures `month`, `region`, `trek`.
- Never accept arbitrary `return_url`. Use an enum `from=planner|listing|detail` with an optional validated trek ID; build internal destinations with route helpers.

## 5. CTA wiring

| Label | Exact destination/effect |
| --- | --- |
| Explore Treks / Search Treks | demo.treks.index, carrying supported filters |
| View Trek | demo.treks.show with fixture slug |
| Add to Compare / Remove | Update distinct ID selection and tray; no nested card link |
| Compare Treks | demo.compare with selected IDs; 0/1 allowed as helpful selection states |
| Plan My Trek / Find My Trek | demo.planner.start in discover mode |
| Plan This Trek | planner selected mode with trek ID |
| Build My Trip | planner custom mode, no forced trek |
| Customize This Trek | planner custom mode with trek ID |
| Choose Sample Departure | planner selected mode with validated trek/departure IDs |
| Plan This Region / Experience / Month | planner discover mode with context only |
| Ask About This Trek | demo.contact with allowlisted trek context |
| WhatsApp / Call / Email demo control | Local dialog: unavailable in demo; offer demo.contact; no external URI |
| Social/review platform sample | Noninteractive labeled sample item; no fake outbound URL |
| Brand logo | demo.home while inside preview |
| Policy / safety / guide / article links | Corresponding demo route, not production link |

## 6. Incremental implementation

During early phases, an unbuilt destination may temporarily render an explicitly labeled development placeholder, tracked in the work log. Do not use `href="#"` for missing navigation, fake success handlers or production fallback links. Phase 35 cannot pass with placeholders left. All final route families must have substantive demo content and working actions.
