# EATH Homepage Redesign — Antigravity Prompt Pack

This pack is written for the existing Laravel + Blade + Vite + SCSS website shown in the supplied project screenshot.

## How to use

1. Copy this entire folder into the Laravel project as `docs/homepage-redesign/`.
2. Commit or back up the current working homepage before implementation.
3. Open Antigravity at the Laravel project root.
4. Run the prompt files in the exact numerical order below.
5. Review the result after every step before moving to the next prompt.
6. Do not paste all implementation prompts into a single run.

## Execution order

1. `00-master-context.md` — permanent project constraints and success definition.
2. `01-audit-current-homepage.md` — inspect the project without changing code.
3. `02-design-system-foundation.md` — implement tokens, typography and shared foundations.
4. `03-global-layout.md` — improve the trust bar, header, navigation, footer and global CTAs.
5. `04-homepage-architecture.md` — lock the exact homepage section order and Blade mapping.
6. `05-homepage-section-specifications.md` — authoritative UI specification for all sections.
7. `06-implement-discovery-sections.md` — implement sections 03–10.
8. `07-implement-trust-conversion-sections.md` — implement sections 11–20.
9. `08-responsive-accessibility-performance.md` — cross-device and quality pass.
10. `09-final-qa-refinement.md` — final verification, build and handoff report.
11. `37-final-homepage-flow-alignment.prompt.md` — continue from the completed Prompt 36 state and verify the finalized homepage flow, interactions and visual consistency.

## Critical rule

The approved homepage order is fixed. Antigravity may adapt implementation details to the existing codebase, but it must not remove, merge, or reorder sections without explicit approval.

## Recommended interaction pattern

For each file, tell Antigravity:

> Read and execute `docs/homepage-redesign/NN-file-name.md`. Also treat `00-master-context.md`, `04-homepage-architecture.md`, and `05-homepage-section-specifications.md` as binding. Stop after completing this phase and report changed files, preserved dynamic behavior, checks run, and any blockers.

If the local folder is named differently, update the path in that sentence.
