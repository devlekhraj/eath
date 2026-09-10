# State, validation and recommendation contract

## 1. State ownership

Catalog = server fixture repository. Comparison = normalized trek IDs in the comparison URL; browser localStorage key `eath.demo.v1.compare` improves cross-page selection. Planner = namespaced, server-side demo session draft with inactivity TTL 2 hours. Receipt = minimal non-PII demo session result with the same TTL. No payment, lead, booking or inventory write.

Use framework-supported CSRF/session mechanisms. Prefer an already approved isolated local file session; otherwise implement a demo-route-only file-backed session store without changing production drivers. Never invent insecure cookie crypto, disable CSRF, flush the user's whole application session or use a live database. If the actual session middleware cannot safely be isolated, report the blocker and obtain an appropriate local configuration before planner POSTs.

Session keys must start `eath_demo_v1.`. Expiry invalidates draft and receipt only. No localStorage of dates, contact, free text or complete profiles. No state IDs or user data in analytics; analytics are disabled.

## 2. Draft model

| Field | Type / values | Behavior |
| --- | --- | --- |
| schema_version | 1 | Reject unsupported stored state safely |
| draft_id | opaque generated ID | Session-scoped, not authorization by URL |
| mode | discover/selected/custom | Change explicitly, preserving compatible answers |
| source | route-map enum | Attribution inside demo only |
| timing_mode | dates/month/unsure | Controls active date fields |
| start_date | ISO date or null | Never contact data in query |
| month | 1..12 or null | Dates mode derives month from start_date |
| available_days | integer 3..30 or null | null = unsure |
| flexible_dates | boolean | Does not silently alter chosen departure |
| adults | integer 1..12 | Required |
| children | integer 0..6 | Optional accompanying travelers |
| child_age_bands | one allowed band per child | under_6 / 6_11 / 12_17; not birthdates |
| trekking_experience | new/some/experienced/unsure | Preference, never health clearance |
| max_difficulty | easy/moderate/challenging/null | Explicit ceiling only; do not infer it from age |
| walking_hours_max | integer 2..10 or null | Explicit comfort ceiling |
| interests | distinct known experience IDs | Max six; no arbitrary strings |
| accommodation | standard/upgraded/no_preference | No promises about real facilities |
| pace | relaxed/balanced/active/no_preference | Ranking signal |
| trip_style | private/group/no_preference | Request preference, no inventory promise |
| currency | USD | Single-currency demo; no exchange API |
| budget_max_usd | integer 100..10000 or null | Per-person ground package budget |
| budget_includes_flights | yes/no/unsure | Clarify package budget before scoring |
| addons | known add-on IDs | Preference only; unpriced |
| special_requests | max 1000 characters | Server draft only, escaped, cleared at submission/expiry |
| selected_trek_id | known ID or null | null allowed for custom request |
| selected_departure_id | known ID or null | Must belong to selected trek |
| completed_steps | server-derived set | Never trust hidden fields as completion proof |
| updated_at | server timestamp | TTL uses real clock, not demo calendar |

Do not persist contact inputs in the draft. Validate them only at simulated submission; on field errors return them only in the current response if needed, not persistent session old-input flash. Prefill `Demo Traveler` and `traveler@example.test`; omit phone by default. Rate limiting must use a safe local store and never an external call.

## 3. State transitions

Start/resume → timing → travelers → preferences → budget → recommendations → selection → review → sample contact → simulated submit → confirmation.

- A GET start route may present entry context or resume UI; actual draft creation/replacement is a CSRF-protected POST.
- Opening a new trek/departure while a draft exists asks to use the new context or keep the current draft. No silent reset.
- Recommendations are recomputed server-side from validated draft and fixtures; a selected trek is rechecked after each relevant edit.
- Editing dates, duration, travelers or trek clears a departure if it no longer belongs or fits. Tell the visitor why.
- Earlier-step edits invalidate downstream assumptions, not unrelated answers. Review shows conflicts and requires explicit changes or custom request.
- Compare/detail detours keep the draft. `from=planner` yields a safe route-helper return action.
- Exact date + sample departure mismatch cannot be both retained as confirmed choices.
- Missing/expired draft → redirect to start with explanation. Missing receipt → no fake confirmation.
- Confirmation refresh never re-submits. Use an idempotency token per draft for the demo handler; duplicate POST returns the existing non-PII receipt.
- Reset removes only demo keys and demo comparison storage, not general browser storage/cookies.

## 4. Comparison normalization

Keep only unique known IDs in requested order; enforce max 3 server-side too. Unknown IDs produce a notice and are removed, never a 500. URL values on the comparison page are authoritative; an absent or empty treks parameter means an empty comparison. Never auto-hydrate that page from localStorage. Header/tray links must carry the chosen IDs when navigating to comparison. When a selection is explicitly cleared, write `[]` to local storage; do not repopulate from stale data. Wrap storage access in try/catch; storage failure must not block GET comparison.

Use semantic GET forms as a no-JS path to add/remove/replace on compare. JS tray updates are an enhancement. Shareable URLs contain only trek IDs, never planner data. Browser storage events may synchronize tabs for comparison, not for planner PII.

## 5. Deterministic recommendation algorithm

Version `demo-rules-v1`; pure service/function with unit tests. No AI API, machine learning model or health judgement.

Eligibility hard filters (only if the user explicitly supplied a value):

1. Exclude a trek whose duration exceeds available_days.
2. Exclude a trek above max_difficulty using easy < moderate < challenging.
3. Exclude a trek whose walking_hours_max exceeds the user's chosen ceiling.
4. When a specific departure is chosen, require its fixture status to be open or limited, have sufficient **illustrative** seats for adults + children, and belong to the trek. Do not treat a seat count as real availability.

For general recommendations, children trigger a manual-review warning, not an invented safety cutoff. Month and budget are soft ranking signals; conflicts must be displayed.

Ranking across eligible candidates:

| Signal | Weight | Points |
| --- | ---: | --- |
| Interests | 30 | 30 × overlap count / number of chosen interests |
| Travel month | 25 | Full weight if month is in sample suitable_months, otherwise 0 |
| Ground budget | 25 | Full if base price <= entered ground budget, otherwise 0 |
| Accommodation | 10 | Full for matching preference, otherwise 0 |
| Pace | 10 | Full for matching preference, otherwise 0 |

An unanswered/no-preference signal contributes neither points nor available weight. If budget includes flights or is unclear, do not deduct a guessed airfare: exclude budget from scoring and ask for clarification. Region is an explicit discovery filter when supplied; a region that yields no candidates shows a no-match state, not unrelated hidden replacements.

Sort by raw points / available weight when available weight > 0, then `featured_rank`, then ID for deterministic ties. Zero available weight → curated fixture order labeled `Sample ideas to explore`, not a strong match.

UI labels: `Strong preference match` only when available weight >= 40, normalized match >= 0.75, and no month/budget/unknown-data conflict. Otherwise `Worth exploring` with honest trade-offs. Show no percentage or medical suitability score. Max 3 recommendations, each with actual reasons (duration fits, selected interest present) and conflicts. Prices alone do not verify total affordability because extras and flights are excluded.

Missing catalog attributes are unknown, not 0 or a match. Exclude from evaluated weight and downgrade confident labels. No eligible candidates → edit preferences, clear region, or continue as a custom request.

## 6. Reference test cases

- available_days=8, max_difficulty=moderate, walking_hours_max=7 → only t-mardi qualifies from the supplied catalog.
- available_days=5 → no supplied trek qualifies; show custom request path.
- month=10, interests=[quiet-trails], budget=1500, accommodation=standard, pace=balanced with no hard filters → t-langtang and t-khopra rank ahead of nonmatching interests; tie uses featured_rank.
- unspecified preferences → no match percentage, curated order.
- budget includes flights → exclude budget score and explain why.
- select t-ebc then change available_days to 8 → flag selection conflict, do not show it as a confirmed suitable choice.
- tampered price/score/departure in browser → ignore supplied calculated fields and recompute.
