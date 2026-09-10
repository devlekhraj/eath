# Prompt 09 — Final QA, Refinement and Handoff

Read all prompt files and review the completed homepage against them. Do not introduce new sections or a new design direction.

## 1. Architecture verification

Confirm the rendered order is exactly:

Top Trust Bar → Main Header → Hero → Trek Search → Experiences → Featured Treks → Destinations → Find My Trek → Travel By Month → Compare Treks → Why EATH → Reviews → Safety → Custom Trip → How It Works → Guides → Responsible Travel → Travel Guide → Final CTA → Footer.

Confirm `index.blade.php` remains a clear composition file and dynamic behavior has not been replaced by static demo content.

## 2. Visual consistency

Verify:

- typography follows the approved scale;
- colors come from tokens;
- spacing follows the approved rhythm;
- content containers align across sections;
- buttons, metadata and card patterns are consistent;
- section backgrounds create rhythm without visual noise;
- photography crops remain intentional;
- no generic dashboard/SaaS appearance;
- not every section is a card grid;
- CTA hierarchy is obvious.

## 3. Functional scenarios

Test, when present:

- homepage route loads;
- logo and navigation routes;
- mobile menu open/close/Escape;
- search submission and query state;
- trek/destination/article/detail links;
- planner/custom-trip CTA;
- comparison/month controls;
- WhatsApp/contact links;
- review/guide links;
- empty dataset behavior;
- missing optional image/metadata behavior.

## 4. Regression checks

- no undefined Blade variables;
- no invalid route names;
- no missing includes;
- no console errors;
- no duplicate element IDs;
- no broken forms;
- no unintended admin-style changes;
- no accidental backend/API changes;
- no exposed placeholder or fabricated data;
- no commented-out obsolete homepage composition left without explanation.

## 5. Commands

Run the actual project’s appropriate checks discovered in Prompt 01, such as Vite production build, formatter/linter, Laravel tests and route/view checks. Do not invent successful results. If a command cannot run because of environment configuration, state that explicitly.

## 6. Final handoff report

Return a concise report containing:

1. implementation summary;
2. final section-to-partial mapping;
3. files created, modified and intentionally retired;
4. dynamic data and routes preserved;
5. responsive/accessibility/performance improvements;
6. commands run with results;
7. real content still needed from the owner;
8. remaining risks or recommended follow-up work.

If any acceptance criterion fails, fix it when safely within scope and rerun the relevant check before finalizing.

