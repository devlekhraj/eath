# 12 — Explainable demo matching and recommendation screen

## Read first

Master, 10, 11, catalog and entire state/scoring contract. Do not invent new weights, AI calls, health scores or suitability percentages.

## Implement service

Pure deterministic `DemoRecommendationService` consumes validated draft and fixture catalog. Apply explicit duration, difficulty and walking-hours hard limits plus region context; validate selected departures separately. Apply weights and missing-value policy exactly from reference. Tie-break by featured_rank thenID. Unit-test the reference cases before building UI.

Return a view model per candidate: trek ID, eligibility, internal score, evaluated signals, human-readable match reasons, trade-offs, unknowns and conservative display label. Never trust a score supplied by the browser. Avoid showing numeric percentages. An unspecified preference is not a100% match.

## Screen order

1. Planner heading/progress and preference summary.
2. Explanation: `Sample suggestions based on your preferences — not a safety assessment or quote`.
3. Up to3 suggestion cards with image/name, important facts and indicative USD price.
4. Why it may fit (2–3 actual matched signals).
5. Trade-offs/unknowns such as month mismatch or budget not evaluated.
6. Choose This Trek / View Trek / Add to Compare.
7. Edit Preferences and Continue with Custom Request.

Use the shared TrekCard visual language with an additional explanation region, not a new flashy AI card. No fake chatbot typing animation or intelligence badge.

## Selected/custom modes

For selected mode, keep the chosen trek visible with valid matches/conflicts. If it violates an explicit hard limit, do not silently approve it: offer edit preferences, choose an eligible alternative, or record it as a custom request requiring review. The custom summary must state that conflict, not call it recommended.

Custom mode may use a sample trek as a starting point or remain without one. Selection is a validated POST. Changing trek clears incompatible departure; previous preference fields persist. Selected guide is never guaranteed.

## Compare detour

Add suggestions to shared comparison selection; Open Compare has `from=planner`. Return preserves draft. Plan This Trek from comparison sends a safe selected context for explicit confirmation if draft exists. It must not start a fresh empty wizard unexpectedly.

## Empty/unknown behavior

No candidates: explain filters that prevented matches, link to edit and custom request. No scoring signals: show curated sample ideas without strong-match labels. Missing attribute: unknown rather than0. Children in group: planning-review note, no arbitrary child-safety exclusion. Flight-inclusive budget: exclude it from scoring and explain.

## Tests

Run every reference scoring case; ties stable; different preference edits change results correctly; missing data downgrades label; region no-match recoverable; injected trek/score rejected; selected conflict handled; comparison return preserves state. Confirm no network/model API or live pricing calls. Stop after verified UI/service.
