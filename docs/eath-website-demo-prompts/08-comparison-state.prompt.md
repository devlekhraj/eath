# 08 — Shared comparison state and tray

## Read first

Master, 04, route/CTA and state/scoring references. This phase wires selection across existing demo components;09 implements the full comparison view.

## Implement

1. Create one shared JS module with add/remove/replace/clear/read operations on validated trek IDs. Use a small server-emitted whitelist/summary, not a second authored catalog.
2. Persist only versioned IDs in `eath.demo.v1.compare`. Normalize duplicates/unknown IDs, enforce max 3 and handle malformed JSON or unavailable storage safely.
3. Reconcile all visible compare buttons and header counts after each change. Accessible names include trek name; use aria-pressed for toggle buttons.
4. Show a tray after first selection: item names, remove controls, `N of 3 selected`, clear and compare link. One item → explain another is needed; allow link to compare's add state. No disabled button with no explanation.
5. When adding a fourth, do not silently drop the first. Show an accessible replacement/remove choice and preserve selection until confirmed.
6. Build the compare URL with canonical `treks[]` values in selected order. Explicit query selection on compare is authoritative and synchronizes convenience storage, including explicit empty arrays after clear.
7. Provide no-JS navigation/forms for comparing via query IDs on the comparison page. Other card actions can lead to the compare page with that trek; explain JS only improves cross-page tray persistence.
8. Coordinate mobile tray/Plan actions into one bottom region; reserve height and safe-area space. No shadow required.

## Tests

Add from home/detail/listing; toggles remain synchronized; max 3; duplicate prevented; remove and clear; reload; storage denied/corrupt; another tab changes selection; keyboard focus after removal; unknown URL IDs. Server must independently validate query IDs in09. No planner/contact data is ever written to localStorage. No production page affected.
