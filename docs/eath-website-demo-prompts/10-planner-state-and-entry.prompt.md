# 10 — Planner entry modes, draft state and routing

## Read first

Master, route/CTA, catalog and entire state/scoring contract. Implements infrastructure for P11; question UI follows11.

## Goal

One planner supports discover, selected-trek and custom entry. Do not build three disconnected forms. Use shared fixture services and validated session draft, no real lead/booking writes.

## Entry behavior

1. GET start renders H1, demo disclosure, mode explanation and source context. It never silently creates/resets a draft.
2. Discover: optional region/experience/month, no mandatory trek. Selected: validate trek ID; unknown ID returns a helpful start warning, not a production lookup. Custom: optional base trek; continue without one is valid.
3. Departure: validate ID belongs to incoming trek, sample status open/limited, seats not yet reserved. Prefill exact dates, duration and month. A full departure offers custom dates instead.
4. Existing draft: show Resume, Use New Context and Reset actions. New context replacement uses explicit POST; preserve compatible answers only after the visitor chooses it.
5. Start POST validates context and creates the server draft using approved scoped session mechanism. No arbitrary return URLs.

## Infrastructure

- Implement draft validation/service separate from Blade and recommendation calculation.
- Server derives completed_steps and next accessible step; do not trust hidden `completed=true` or client score.
- Store only allowed fields with schema version and TTL. Purge only demo keys on reset/expiry.
- GET step deep links enforce earliest incomplete step. Back links preserve valid values; refresh shows current draft.
- Use request/session CSRF protections and local safe storage as agreed in02. No disabling CSRF to make demo easier.
- Return-from-compare/detail uses route-map allowlist and unchanged draft. Catalog IDs in URLs are fine; contact/free text is not.
- Add isolated draft/session tests. No RefreshDatabase against the existing application database.

## UI shell

Title, mode label, ordered progress list, current step heading, main form, Back/Continue and concise summary. Progress uses aria-current on the active step; future steps are text or unavailable links with explanation. At small widths show current step and accessible overall progress without forcing eight tiny tabs. No shadowed outer box; use editorial heading and border-separated form groups.

## State acceptance

Fresh discover, selected, custom and departure entries; resume existing draft; mismatched trek/departure; unknown source/return target; expired draft; skipped step; schema-version mismatch; no production session flush; no persistence of contact inputs. Verify preview-only POST targets and safe gate. Report and stop; do not mark remaining wizard UI complete yet.

