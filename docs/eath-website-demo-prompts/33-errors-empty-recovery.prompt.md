# 33 — Error, empty, invalid and recovery states

## Read first

Master, route/CTA, state/scoring and acceptance-matrix references. Implements P28 and cross-page failures.

## Required states

1. Unknown demo page/trek/region/experience/month/article/guide/story → true404 status, branded local recovery UI.
2. Preview disabled → denial/404, no sensitive environment details.
3. Trek/article/story search no results → active filters + clear/search/planner options.
4. No sample departures → change month or custom dates.
5. Compare0/1 selections → useful add choices, no empty table pretending complete.
6. Compare unknown/stale IDs → remove invalid IDs with notice.
7. Missing/expired planner draft → start/resume explanation, no blank review.
8. Invalid step/field → validation summary + preserved safe values.
9. No recommendation match → explicit trade-offs, edit/custom path.
10. Full/insufficient sample departure → new date/custom option, never reserve.
11. Missing receipt/direct confirmation access → planner start, no fake success.
12. Missing image/map/optional metric → honest local fallback, not broken URL or 0.
13. Browser storage unavailable → URL comparison and server-session planner continue.
14. Expired CSRF/repeated submission → safe recovery/idempotency, no hidden resend.
15. Unexpected500 in isolated demo → generic message and safe route; never expose stack/secrets.

## Design

Use a short heading, plain explanation, one primary recovery action and optional secondary link. Preserve shell where safe. No alarming giant red warning panels for routine no-results states. Avoid indefinite loading skeletons. Busy state must resolve or offer retry without repeating a side effect.

## HTTP/state semantics

Unknown content really404, not a200 Coming Soon page. GET filter validation can use inline errors and documented status; POST errors use standard Laravel validation. No global catch-all that hides existing application errors or routes. Only demo-scoped error handling and sanitized logging; don't log submitted PII. Do not turn every exception into a false successful response.

## Acceptance

Exercise every state with automated fixtures/requests and relevant browser checks. Reset clears only preview keys and storage. Test malicious query strings and escaped user notes. Verify response codes and redirects, keyboard recovery, mobile layout and no accidental production link. Update log with resolved/unresolved cases; phase 35 cannot pass with untested critical submission/state failures.
