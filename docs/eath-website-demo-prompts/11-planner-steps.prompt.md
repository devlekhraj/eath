# 11 — Complete planner preference steps

## Read first

Master, 03, 04, 10, route/CTA, catalog and state/scoring references. Implement steps1–4 with working Back/Continue validation;12 provides recommendations.

## Shared form rules

One current question group at a time with visible labels, short help and inline errors. Use native controls/radios/checkboxes enhanced with CSS; no hidden labels or clickable div pseudo-inputs. Errors appear in an error summary linked to fields; focus summary after invalid submit. Preserve entered values. Required vs optional stated. No animations required to reveal content. Step headings receive focus after successful navigation. All controls min 44px practical targets.

## Step 1 — Timing

Fields: timing_mode (Exact date / Preferred month / Not sure), start_date conditional, month conditional, available_days or unsure, flexibility.

- Use fixed displayed demo calendar date2030-09-01. Exact date must not precede that sample date, not machine today's date. Accept ISO date-only; don't timezone-shift it with UTC Date parsing.
- available_days integer3..30 or explicit null/unsure.
- Month buttons/selector cover all 12; no month preselected as though user chose it unless entry context exists and is shown.
- Switching timing_mode removes inactive conflicting fields; summarize what remains.
- Incoming departure populates start date and duration; changing them explicitly clears departure selection with notice unless exactly compatible.

## Step 2 — Travelers and experience

Fields: adults1..12, children0..6, child age bands when children>0, trekking experience, explicit optional max difficulty, optional walking-hours ceiling2..10.

- Child fields count must match children count; decrement removes excess values.
- Explain age bands are only for demo planning questions. Do not infer fitness from age, gender, nationality or a supposed medical profile.
- Experience is not automatically converted into a safe altitude/difficulty. Difficulty ceiling is the traveler's explicit preference.
- If a departure no longer has enough illustrative seats for adults+children, require different departure or custom dates; no pretend reservation.

## Step 3 — Interests, comfort and style

Fields: all 6 experience categories as multi-checkboxes, accommodation standard/upgraded/no_preference, pace relaxed/balanced/active/no_preference, private/group/no_preference.

- Support multiple interests and no preference. IDs from shared catalog only.
- Selected cards indicate checkbox state using more than color; entire label target toggles correctly.
- Explain preferences influence sample ranking, not guarantees about actual facilities or group operation.
- Incoming experience context preselects only that interest, visibly editable.

## Step 4 — Budget and requested changes

Fields: optional budget_max_usd100..10000 per person, static currencyUSD, budget includes international flights yes/no/unsure, known add-ons, special requests max 1000 chars.

- No exchange rates or other currency conversion. Display USD explicitly near the amount.
- If flights included/unsure, explain ground-package affordability cannot be ranked from the total; allow Continue without inventing airfare.
- Add-ons are requests only, unpriced. Do not display `$0` as though free.
- Warn not to enter private contact, health or identity data in notes. Escape notes everywhere; no raw HTML.
- At step completion show `View sample suggestions` for discover/selected; custom may also offer `Continue as custom request` without choosing a trek, after all required fields are valid.

## Responsive summary

Desktop small side summary of dates/party/preferences, no sticky behavior if too tall. Mobile an accessible optional disclosure before the next action. Do not duplicate forms in sidebar. Summary edits use server-owned routes and preserve other answers.

## Tests

Valid completion; each required field missing; invalid enum/range/date; negative/fractional traveler counts; excess interests;1001-char note; injected HTML safely escaped; Back/refresh; changing month to dates clears stale month; children zero clears child bands; selected departure invalidated on mismatch; no contact collected early; keyboard labels/errors correct; no-JS server form path works.
