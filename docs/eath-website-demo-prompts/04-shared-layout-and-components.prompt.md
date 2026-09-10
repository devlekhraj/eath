# 04 — Demo shell, navigation and reusable components

## Read first

Master, 03, route/CTA map, demo-content and asset references. Apply the master verification/report contract.

## 1. Shared shell order

1. Skip link (first focusable element).
2. Compact top trust/demo bar.
3. Main header.
4. Breadcrumb when page is not home.
5. Main content slot.
6. Contextual closing CTA when specified, not duplicate automatic CTA everywhere.
7. Footer.
8. One coordinated action region for compare/mobile CTA if active.

The demo notice may occupy the top bar; it must not create a new marketing section that shifts the locked homepage numbering. Keep a persistent compact reminder visible in demo interactions even after the top bar scrolls away.

## 2. Header

Logo → demo.home. Navigation: Treks, Destinations, Experiences, When to Go, Travel Guide; Company disclosure contains About, Guides, Stories, Safety, Responsible Travel and Contact. Primary action Plan My Trek; Compare control shows count.

Desktop height about 80px with normal content growth. Use opaque surface for reliable contrast rather than an unpredictable transparent state. If sticky, reserve height and provide scroll-margin for anchors. No header box-shadow.

Mobile: logo, menu button and at most one compact action. Drawer/disclosure navigation has aria-expanded/controls, Escape, focus return and correct background interaction rules. Use existing proven component or native dialog only with complete focus handling. Do not add a new UI package for a menu. Navigation must also have a usable no-JS disclosure/link path.

## 3. Footer

Groups: Treks (listing and fixture regions), Plan (planner/compare/departures), Travel Guide (articles/months/FAQ), Company (about/guides/stories/safety/responsibility/contact). Legal links all map to five policy pages. Use only sample contact data and local contact simulation. Dynamic real year for copyright is acceptable; do not confuse it with the separate labeled2030 demo calendar.

Mobile groups stack or use accessible disclosures. No fake social network URLs, fake review-platform logos or made-up office map. Sample contact slots can say `Contact integration disabled in demo` and link to the demo contact page.

## 4. Reusable patterns

- Container, SectionHeading, Breadcrumbs, DemoNotice, Button/Link, Badge, FormField, FieldError, EmptyState.
- TrekCard with independent View and Compare actions.
- DestinationCard and ExperienceCard: photography-first, not miniature TrekCards.
- ArticleCard, GuideCard and StoryCard with visible sample-person/content disclosures.
- QuickFacts, PriceDisplay (USD cents + illustrative label), DepartureRow.
- Accordion for itinerary/FAQ using semantic accessible disclosure.
- CompareTray and mobile action coordinator (logic implemented in08).
- Planner step header, progress list, preference summary and warning banner (logic in10–13).

Use Blade includes/components compatible with the existing view namespace. Files under `website/components` are not automatically anonymous `<x-...>` components unless registered; inspect and use `@include` if appropriate. Do not assume registration.

## 5. Footer and overlay safety

Never reuse a production inquiry modal without disconnecting its submit handler. All contact affordances open a local explanation or demo.contact. No tel:, mailto:, wa.me, remote chat widget or payment link in preview. Demo dialogs include clear close control and return focus to launcher.

If compare tray and mobile Plan CTA are both relevant, combine them into one bottom action area or prioritize one. Account for safe-area inset and add matching content padding. No fixed UI may cover the final form button or footer links.

## Tests

Verify all route-helper URLs remain under `/demo`; no orphan links by final phase. Desktop/dropdown/mobile menu keyboard path, Escape and focus return; logo, skip link, breadcrumb, footer and reset. Check 320px and 200% zoom. Inspect DOM for duplicate main/header/IDs and network for side-effect scripts. Stop after shared shell work.
