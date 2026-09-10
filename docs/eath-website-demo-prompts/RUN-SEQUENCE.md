# Run sequence — identical for Codex and Antigravity

## 1. Working rules

- Open the Laravel repository, not just this extracted documentation folder.
- Start using START-CODEX.md or START-ANTIGRAVITY.md: phase 01 is inspection only.
- Review its report and isolation plan before requesting phase 02.
- Execute one phase at a time in numerical order. Do not paste every command at once.
- `00-master-rules.prompt.md` is a permanent reference, not an implementation phase.
- When a prompt says Master, 03, 04 or a shortened reference name, resolve it to the file with that numeric prefix or the matching file in `references/`. Read its complete contents, not only a search snippet.
- Do not repeat a completed phase unless asked to refine it. Preserve the work log and user changes across tools.
- Every implementation phase ends with checks, a work-log update and a stop.

## 2. Phase index

| Phase | File | Outcome |
| --- | --- | --- |
| 01 | [01-audit-and-route-map.prompt.md](01-audit-and-route-map.prompt.md) | Read-only project and route audit |
| 02 | [02-demo-data-and-isolation.prompt.md](02-demo-data-and-isolation.prompt.md) | Shared fixtures, preview isolation, safe session groundwork |
| 03 | [03-design-system.prompt.md](03-design-system.prompt.md) | Typography, colors, spacing, no-shadow primitives |
| 04 | [04-shared-layout-and-components.prompt.md](04-shared-layout-and-components.prompt.md) | Header, footer, navigation and shared UI |
| 05 | [05-homepage.prompt.md](05-homepage.prompt.md) | Locked20-section homepage |
| 06 | [06-trek-listing-search.prompt.md](06-trek-listing-search.prompt.md) | Working listing/search/filter/sort/pagination |
| 07 | [07-trek-detail.prompt.md](07-trek-detail.prompt.md) | All 8 trek detail pages |
| 08 | [08-comparison-state.prompt.md](08-comparison-state.prompt.md) | Shared selection, limits and comparison tray |
| 09 | [09-compare-treks-page.prompt.md](09-compare-treks-page.prompt.md) | Full side-by-side comparison |
| 10 | [10-planner-state-and-entry.prompt.md](10-planner-state-and-entry.prompt.md) | Planner entry modes and draft state |
| 11 | [11-planner-steps.prompt.md](11-planner-steps.prompt.md) | Timing, travelers, preferences and budget forms |
| 12 | [12-recommendation-engine.prompt.md](12-recommendation-engine.prompt.md) | Deterministic matching and recommendation screen |
| 13 | [13-plan-review-contact-confirmation.prompt.md](13-plan-review-contact-confirmation.prompt.md) | Review, sample contact and demo confirmation |
| 14 | [14-destinations-index.prompt.md](14-destinations-index.prompt.md) | Destination listing |
| 15 | [15-destination-detail.prompt.md](15-destination-detail.prompt.md) | Five destination details |
| 16 | [16-experiences-index.prompt.md](16-experiences-index.prompt.md) | Experience listing |
| 17 | [17-experience-detail.prompt.md](17-experience-detail.prompt.md) | Six experience details |
| 18 | [18-travel-months-index.prompt.md](18-travel-months-index.prompt.md) | Twelve-month overview |
| 19 | [19-travel-month-detail.prompt.md](19-travel-month-detail.prompt.md) | Twelve month details |
| 20 | [20-fixed-departures.prompt.md](20-fixed-departures.prompt.md) | Sample departure filters and planner handoff |
| 21 | [21-travel-guide-index.prompt.md](21-travel-guide-index.prompt.md) | Article search/listing |
| 22 | [22-travel-guide-article.prompt.md](22-travel-guide-article.prompt.md) | Six complete article templates |
| 23 | [23-about-company.prompt.md](23-about-company.prompt.md) | About |
| 24 | [24-guides-index.prompt.md](24-guides-index.prompt.md) | Fictional guide listing |
| 25 | [25-guide-profile.prompt.md](25-guide-profile.prompt.md) | Three fictional guide profiles |
| 26 | [26-traveler-stories-index.prompt.md](26-traveler-stories-index.prompt.md) | Fictional story listing |
| 27 | [27-traveler-story-detail.prompt.md](27-traveler-story-detail.prompt.md) | Three fictional story pages |
| 28 | [28-safety-support.prompt.md](28-safety-support.prompt.md) | Safety/support sample editorial page |
| 29 | [29-responsible-travel.prompt.md](29-responsible-travel.prompt.md) | Responsible-travel proposed copy |
| 30 | [30-contact.prompt.md](30-contact.prompt.md) | Working simulated general contact form |
| 31 | [31-faq.prompt.md](31-faq.prompt.md) | Searchable/disclosure FAQ |
| 32 | [32-policy-pages.prompt.md](32-policy-pages.prompt.md) | Five distinct policy draft pages |
| 33 | [33-errors-empty-recovery.prompt.md](33-errors-empty-recovery.prompt.md) | Error and recovery flows |
| 34 | [34-seo-performance-accessibility.prompt.md](34-seo-performance-accessibility.prompt.md) | Cross-site quality and isolation pass |
| 35 | [35-final-integration-qa.prompt.md](35-final-integration-qa.prompt.md) | Complete flow testing and handoff |

## 3. Ready-to-paste commands

All paths below assume `docs/eath-website-demo-prompts/`. If you choose another folder, change the prefix consistently; the documentation does not auto-install itself.

### 01 — Read-only project and route audit

```text
Read docs/eath-website-demo-prompts/README.md and docs/eath-website-demo-prompts/00-master-rules.prompt.md, then execute ONLY docs/eath-website-demo-prompts/01-audit-and-route-map.prompt.md. Read its required references. Inspection only: do not modify application files, install packages, migrate/seed, submit real forms or deploy. Return the audit and stop for my review.
```

### 02 — Shared fixtures, preview isolation, safe session groundwork

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved audit from phase 01, then execute ONLY docs/eath-website-demo-prompts/02-demo-data-and-isolation.prompt.md. Read all its required references. Create WORK-LOG.md from WORK-LOG.template.md if it does not exist, and record the approved audit. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 03 — Typography, colors, spacing, no-shadow primitives

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/03-design-system.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 04 — Header, footer, navigation and shared UI

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/04-shared-layout-and-components.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 05 — Locked20-section homepage

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/05-homepage.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 06 — Working listing/search/filter/sort/pagination

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/06-trek-listing-search.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 07 — All 8 trek detail pages

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/07-trek-detail.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 08 — Shared selection, limits and comparison tray

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/08-comparison-state.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 09 — Full side-by-side comparison

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/09-compare-treks-page.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 10 — Planner entry modes and draft state

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/10-planner-state-and-entry.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 11 — Timing, travelers, preferences and budget forms

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/11-planner-steps.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 12 — Deterministic matching and recommendation screen

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/12-recommendation-engine.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 13 — Review, sample contact and demo confirmation

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/13-plan-review-contact-confirmation.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 14 — Destination listing

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/14-destinations-index.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 15 — Five destination details

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/15-destination-detail.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 16 — Experience listing

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/16-experiences-index.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 17 — Six experience details

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/17-experience-detail.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 18 — Twelve-month overview

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/18-travel-months-index.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 19 — Twelve month details

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/19-travel-month-detail.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 20 — Sample departure filters and planner handoff

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/20-fixed-departures.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 21 — Article search/listing

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/21-travel-guide-index.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 22 — Six complete article templates

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/22-travel-guide-article.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 23 — About

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/23-about-company.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 24 — Fictional guide listing

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/24-guides-index.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 25 — Three fictional guide profiles

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/25-guide-profile.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 26 — Fictional story listing

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/26-traveler-stories-index.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 27 — Three fictional story pages

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/27-traveler-story-detail.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 28 — Safety/support sample editorial page

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/28-safety-support.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 29 — Responsible-travel proposed copy

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/29-responsible-travel.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 30 — Working simulated general contact form

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/30-contact.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 31 — Searchable/disclosure FAQ

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/31-faq.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 32 — Five distinct policy draft pages

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/32-policy-pages.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 33 — Error and recovery flows

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/33-errors-empty-recovery.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 34 — Cross-site quality and isolation pass

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/34-seo-performance-accessibility.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```

### 35 — Complete flow testing and handoff

```text
Read docs/eath-website-demo-prompts/00-master-rules.prompt.md and the approved docs/eath-website-demo-prompts/WORK-LOG.md, then execute ONLY docs/eath-website-demo-prompts/35-final-integration-qa.prompt.md. Read all its required references. Use fixture-only data, preserve demo isolation and no-shadow rules, implement and verify this phase, update the work log with actual results, and stop. Do not automatically start the next phase.
```
## 4. Resume or switch tools

```text
Read docs/eath-website-demo-prompts/README.md, 00-master-rules.prompt.md and WORK-LOG.md. Inspect the current git diff and relevant code. Identify the last verified phase, any partial work and the next pending phase. Do not redo completed phases or overwrite unrelated edits. Report the resume point and remaining checks; wait for me to name the phase to execute.
```

## 5. Refinement command

```text
Review the current phase against its prompt and shared contracts in docs/eath-website-demo-prompts/. Fix only the identified in-scope issues, preserve completed flows and the fixture dataset, rerun relevant checks and update WORK-LOG.md. Do not introduce a new visual direction, ordinary box-shadows, real integrations or a framework migration. Stop after the correction report.
```

## 6. Completion boundary

Phase 35 hands off a locally verified demo. It does not authorize production deployment, changing live routes, replacing fixtures with real data, activating messaging/payments or removing preview noindex.
