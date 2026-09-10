# 35 — Full-site integration, QA and handoff

## Read first

Master, approved work log, all reference contracts and each phase's acceptance section. Use `references/acceptance-matrix.md` as the traceable checklist.

## 1. Coverage audit

Verify every P01–P28 route family, including all 5 policies, every fixture detail slug and every planner state. Home order exactly20 sections; no extra standalone departures/gallery block. No live database fallback, unfinished Coming Soon destination, href="#" navigation, fake button, unresolved route, undefined Blade variable or missing view. Labeled missing image/map/verified-credential states are permitted; blank functional pages are not.

## 2. End-to-end journeys

1. Home search→filtered treks→detail→selected planner→review→sample contact→confirmation.
2. Listing→add2/3 treks→compare→replace/remove→choose→planner.
3. Find My Trek→preferences→recommendations→compare detour→return→selection→review→demo confirmation.
4. Custom Trip with no base trek→preferences→custom request→review→confirmation.
5. Sample departure→prefilled plan→change party/date→resolve conflict→review.
6. Article→destination/experience/month→trek→plan.
7. No results/no match→edit or custom request→successful demo completion.
8. Contact page→validation→simulated success with no outbound message.
9. Refresh/back/direct deep link/expired draft/duplicate submit/reset→predictable recovery.

For each, confirm consistent IDs, prices, route context and state. No silent reset or false booking language.

## 3. Safe checks

Use only the project's installed, audited tools and isolated test environment. Typical possibilities are a lockfile-matched Vite build, configured JS lint/format/typecheck, PHP syntax checks, PHPUnit/Pest tests restricted to demo, route/view compilation checks where bootstrap is safe, and installed browser automation. These are examples, not permission to run destructive migrations, RefreshDatabase on the live DB, cache flushes or live form submissions. Inspect any existing test setup before execution.

Test preview-off gate and original routes for regression. Record pre-existing test failures separately; never attribute them to this work without evidence. Confirm all form action URLs are preview-only, and use fakes/spies for outbound paths. Verify no real media/analytics SDK requests in preview network activity.

## 4. Visual refinement

Check cross-page container alignment, typography, whitespace rhythm, button styles, media ratios, restrained borders, correct sample labels and no ordinary box-shadows. Fix inconsistent card variants and excessive UI density. Respect reduced motion and focus outline. Validate comparison/planner at 320px, long labels and 200% zoom, not just homepage screenshot.

## 5. Handoff report

Write the final report to the task work log and return a concise summary with:

1. Implemented page/route inventory and preview entry URL.
2. Exact fixture/content/service/view/style/JS files changed.
3. Comparison and planner flows verified.
4. Test commands/results and browser artifacts actually produced.
5. Known limitations and labeled sample assets/content remaining.
6. Demo isolation proof and reset method.
7. Future production integration checklist: real repository adapter, validated content/assets, genuine policies/reviews, secure lead handling, real pricing/departures, privacy/consent decisions, and explicit deployment approval. None is implemented automatically now.

A green build alone is not proof of complete website flow. If a critical path is blocked, mark it blocked and explain; do not say everything is done. Do not deploy, commit, change real homepage routing, collect payments or remove noindex as part of this final phase.
