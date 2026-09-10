# Copy-Paste Commands for Antigravity

Run these one at a time. Replace `docs/homepage-redesign` only if you copied the folder elsewhere.

## Step 1 — Audit

```text
Read and execute docs/homepage-redesign/01-audit-current-homepage.md. First read docs/homepage-redesign/00-master-context.md. This phase is inspection-only: do not edit application code. Stop after the audit report.
```

## Step 2 — Design system

```text
Read and execute docs/homepage-redesign/02-design-system-foundation.md. Treat docs/homepage-redesign/00-master-context.md and the approved audit as binding. Implement only this phase, run relevant checks, report changed files, and stop.
```

## Step 3 — Global layout

```text
Read and execute docs/homepage-redesign/03-global-layout.md. Also read 00-master-context.md and 02-design-system-foundation.md. Preserve all real routes and dynamic navigation. Implement only shared layout/header/footer work, verify it, report, and stop.
```

## Step 4 — Lock architecture

```text
Read docs/homepage-redesign/04-homepage-architecture.md and compare it with the approved audit. Do not edit code yet. Report the exact final partial mapping, data source for each section, and any blocker that would prevent the locked order. Stop for approval.
```

## Step 5 — Confirm UI specification

```text
Read docs/homepage-redesign/05-homepage-section-specifications.md together with 00-master-context.md, 02-design-system-foundation.md, and 04-homepage-architecture.md. Do not implement yet. Identify only factual data or route gaps that need owner input; otherwise confirm readiness and stop.
```

## Step 6 — Build discovery and decision sections

```text
Read and execute docs/homepage-redesign/06-implement-discovery-sections.md. Treat 00, 02, 04, and 05 as binding. Implement sections 03–10 only in exact order, preserve dynamic Laravel behavior, run checks, report, and stop.
```

## Step 7 — Build trust and conversion sections

```text
Read and execute docs/homepage-redesign/07-implement-trust-conversion-sections.md. Treat 00, 02, 03, 04, and 05 as binding. Implement sections 11–20 only, preserve sections 01–10 and dynamic data, run checks, report, and stop.
```

## Step 8 — Quality pass

```text
Read and execute docs/homepage-redesign/08-responsive-accessibility-performance.md. Fix issues only within homepage and shared website-layout scope. Validate the specified viewports and quality checks, report measured results and unresolved blockers, and stop.
```

## Step 9 — Final QA

```text
Read and execute docs/homepage-redesign/09-final-qa-refinement.md. Verify every earlier requirement, fix safe in-scope failures, rerun checks, and return the complete handoff report. Do not add or reorder homepage sections.
```

