# Acceptance and regression matrix

## 1. Coverage ledger

Use route-and-cta-map's page IDs in the work log. Every route family requires a populated fixture, unknown/empty handling, working navigation, mobile and keyboard check. All instance detail routes must render, not just one example per template.

| Page IDs | Required instances | Critical check |
| --- | --- | --- |
| P01 | 1 | Exact 20-section order and functional discovery links |
| P02 | 1 with query states | Search/filter/sort/page URL semantics |
| P03 | 8 trek slugs | Consistent facts, complete itinerary, real demo actions |
| P04–P05 | Index +5 regions | Derived counts, region-context planner |
| P06–P07 | Index +6 experiences | No empty invented categories |
| P08–P09 | Overview +12 months | Empty winter honest, month context preserved |
| P10 | 0/1/2/3 selections | URL authority, differences, max 3 |
| P11 | 3 modes and all steps | Validation, back/resume, server state |
| P12–P14 | Review/contact/receipt | Edit, no PII leak, idempotent simulation |
| P15 | 24 departure rows | Inclusive dates, full/limited states, no reservation |
| P16–P17 | Index +6 articles | Search/category, substantive body/TOC |
| P18 | About | Proposed copy, no fake credentials |
| P19–P20 | Index +3 guides | Fictional labels and matching relations |
| P21–P22 | Index +3 stories | Fictional labels, no ratings schema |
| P23–P24 | 2 editorial pages | No medical/operational/impact claims invented |
| P25 | Contact | Validation + no message delivery |
| P26 | General FAQ | No unresolved trek variable; accessible search/disclosure |
| P27a–e | 5 policies | Distinct labeled draft content |
| P28 | Error routes/states | Correct HTTP responses and safe recovery |

## 2. Fixture and algorithm unit cases

| ID | Input/action | Expected |
| --- | --- | --- |
| D01 | Catalog load | 8/5/6/12 treks/regions/experiences/months |
| D02 | Each trek itinerary | day 1..duration_days, no gaps |
| D03 | Price validation | price_minor=price_usd*100, USD everywhere |
| D04 | FK validation | region/experience/guide/story/article links resolve |
| D05 | Departure generation | 24 unique IDs; end=start+duration-1 |
| D06 | Comparison | Known distinct IDs, max 3 in requested order |
| D07 | Regions | Annapurna3, Everest2, other regions1 each |
| D08 | Month match | January0, October8 sample treks |
| D09 | max days8 or maxUSD700 listing | Only t-mardi |
| R01 | days8/moderate/walking7 | Only t-mardi eligible |
| R02 | days5 | No candidates, custom route available |
| R03 | All preferences unsure | Curated order, no confident score label |
| R04 | month10/quiet/budget1500/standard/balanced | t-langtang then t-khopra ahead of other matches |
| R05 | Budget includes flights | Budget not scored; clarification displayed |
| R06 | Missing optional field | Unknown, not0; no false strong match |
| R07 | t-ebc selected then days8 | Conflict flagged, not silently accepted |

## 3. Interaction/security cases

| ID | Scenario | Expected |
| --- | --- | --- |
| F01 | Search filters→detail→back | Same filters/page, coherent data |
| F02 | Compare add fourth | No silent replacement; accessible choice |
| F03 | Clear URL/selection then reload | No stale repopulation |
| F04 | Browser storage blocked | No-JS/URL comparison remains usable |
| F05 | Compare detour during planner | Draft preserved and safe return |
| F06 | New context while draft exists | Explicit resume/change choice |
| F07 | Date/mode/party edit | Dependent departure revalidated, unrelated answers retained |
| F08 | Child count decreases | Excess child bands removed |
| F09 | Custom plan without trek | Review and simulation succeed, no fake price |
| F10 | Price/score/id tampering | Server recomputes/rejects, no authority from hidden fields |
| F11 | Duplicate submission/refresh | Same receipt, no resend or duplicate side effect |
| F12 | Missing/expired draft or receipt | Safe start/recovery, no false confirmation |
| F13 | Reset | Only demo session/storage cleared |
| S01 | Demo flag off/wrong environment | GET/POST gate enforced |
| S02 | Original routes | Unchanged behavior/no fixture takeover |
| S03 | Simulated contact/planner submit | No DB business write/mail/job/HTTP/payment |
| S04 | Contact/note storage audit | No PII in persistent browser storage/logs/URLs/receipt |
| S05 | Invalid CSRF/open redirect/XSS | Protected, allowlisted, escaped |
| S06 | Preview metadata | noindex scoped to preview, no fictional rich-result claims |

## 4. Visual/manual checks

Home, listing, detail, compare, planner at 320/375/640/768/1024/1280/1440px. Each other distinct page template at 375/768/1440px minimum plus320px smoke.200% zoom, long titles, null image/metric, reduced motion, keyboard-only navigation. Compare and mobile Plan actions never overlap or obscure content.

Focus outlines visible; semantic headings/forms/tables; error summary moves focus appropriately; native no-JS discovery, comparison and server planner forms work. Normal cards/inputs/sidebars have no shadow. Report overlay exceptions explicitly.

## 5. Evidence format

For each test: ID, environment, route/input, actual outcome, pass/fail/blocked, evidence path. Do not fill pass preemptively. Automated and manual coverage are separate. Record build output and test failures without credentials. A missing tool is a limitation, not a fabricated pass.
