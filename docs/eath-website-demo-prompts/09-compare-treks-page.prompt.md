# 09 — Full Compare Treks page

## Read first

Master, 03, 04, 08 and route/CTA, catalog, state/scoring references. Implements P10.

## Layout/order

1. Breadcrumb Home / Compare.
2. H1 `Compare sample treks`, short explanation and demo-price note.
3. Selected trek headers with image/name, remove/replace actions, add slot if fewer than3.
4. Show differences only toggle.
5. Semantic comparison table with labeled row groups.
6. View Trek and Plan This Trek actions for each column.
7. Help Me Choose and safe return-to-planner when applicable.

Use a true table with caption, row/column headers and scope associations. No div soup with unreliable alignment. On mobile the table scrolls inside a labeled region, not the page. Keep row labels readable and selected names visible where practical; do not let sticky cells cover text or reserve excessive width at 320px. Offer a clear horizontal-scroll hint and keyboard access. No shadows.

## Comparison rows

Overview: region and summary. Time: duration, walking hours. Physical demands: difficulty and maximum altitude (sample metrics). Timing: suitable months. Comfort: accommodation and pace. Experience: highlights and categories. Cost: USD per-person ground-package starting price. Mark unpriced extras/flight exclusions once clearly near cost row.

Show differences only compares canonical values with order-insensitive set equality for month/experience lists. Missing is not zero. Keep trek identity/action rows visible even if all data rows match. Announce filter change without moving focus. No winner ribbon or overall safest/best badge.

## Selection behavior

GET treks[] list is authoritative; normalize unknown/duplicate/>3 IDs with a notice, not a crash. Picker lists unselected records with labels and optional simple search; do not allow nested modal focus traps. Add/replace/remove/clear rebuilds URL and server-rendered content; JS may enhance. Compare page works with no JS.

0 selected → helpful browse/picker state. 1 → render chosen summary plus add slots and explanation. 2/3 → full table. If `from=planner`, keep session draft intact, offer `Return to my plan`; selecting a different trek requires validated planner transition, not URL state mutation.

## Acceptance

All rows sourced from fixture IDs; differences computation stable; USD values match detail/listing; only known IDs; links retain safe return context; back/refresh predictable; proper no-JS output. Test t-ebc/t-abc/t-langtang and two similar Annapurna fixtures, empty/one/three/four query IDs, duplicate IDs, missing optional metric, 320px and keyboard. Stop and report.
