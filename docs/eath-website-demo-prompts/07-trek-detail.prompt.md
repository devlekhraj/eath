# 07 — Complete trek/package detail template

## Read first

Master, 03, 04, route/CTA, catalog, content and asset references. Implements P03 for every fixture trek, not one handcrafted example.

## 1. Route/data contract

Resolve slug from fixtures; unknown slug404. Pass a fully prepared detail view model; no database queries in Blade. Reuse audited existing package-page markup only where it does not load live prices, inquiry endpoints, analytics or galleries. Preserve original routes outside preview.

## 2. Exact content order (shared trust/header/footer around this)

1. Breadcrumb Home / Treks / Region / Trek; region link resolves to demo destination.
2. Hero and primary summary: image, region, H1 name, summary, duration/difficulty and illustrative base price; Plan This Trek, Add to Compare.
3. Quick facts: duration, maximum altitude, walking-hours ceiling, sample accommodation and suitable months; display missing as unknown.
4. Section anchor navigation: Overview, Itinerary, Map, Inclusions, Dates, Preparation, FAQs. Links remain native anchors with scroll-margin for header; no JS-only panels.
5. Overview: original fixture copy + illustrative itinerary warning.
6. Highlights:3 meaningful sample highlights; minimal bullet/icons, no awards.
7. Day-by-day itinerary: all duration_days entries, day/title/body, optional walking/accommodation/meals; disclosure controls, open first day by default and optional Expand/Collapse all. Content exists in initial HTML.
8. Route map: honest unavailable-map state from fixture; optional verified local static map only if actually supplied. No fabricated geographic path.
9. Includes/excludes: two clearly labeled columns, stacked mobile. Symbol + text, never color alone. These are noncontractual samples.
10. Sample departure dates/pricing: show3 rows with full/limited/open fixture states, date-only formatting, seat count disclaimer and correct price. Full rows cannot reserve; offer custom date request.
11. Accommodation/meals: actual fixture label and demo explanation, no unverified upgrades promised.
12. Difficulty/altitude/preparation: clearly labeled explanatory sample, not advice or personalized clearance. Link preparation article and safety page.
13. Permits/transport/logistics: questions to verify before launch, not invented permit fees/schedules.
14. Safety/support: concise sample-operating headings with safety-page link.
15. Gallery:4 resolved assets/fallbacks, no autoplay. If lightbox implemented, keyboard/Escape/focus correct and images still links without JS.
16. Stories: associated fictional narrative(s), local fictional disclosure, no stars. If no associated story, show a compact browse-sample-stories link within the slot.
17. FAQs: resolved fixture questions/answers; no raw template braces and no fake FAQ rich-result schema.
18. Related treks: max 3 derived records excluding current; reuse TrekCard.
19. Final CTA: Plan This Trek / Customize / demo question action.

Do not merge/remove sections in the complete demo template. A missing optional asset can render an honest compact state instead of a blank section. Make the page varied: facts strip, prose, itinerary list, comparison-like departure rows and gallery, not19 bordered boxes.

## 3. Desktop and mobile conversion panel

Desktop content/sidebar about 2fr:1fr with minimum readable widths. Sticky panel uses border/background, no shadow. Bound it within main content before related/final CTA/footer; stack rather than stick if zoom or viewport makes it too tall. Header and section nav offsets must be coordinated.

Panel: illustrative price, per-person ground-package basis, duration, optional selected sample departure, Plan This Trek, Customize This Trek, Ask About This Trek. Selecting a departure uses its adjusted price, not silently the base. A rough subtotal is not a quote.

Mobile: summary inline near top; one bottom action region may coexist with comparison through04's coordinator. Respect safe-area and content padding. No panel that obscures form actions, footer or anchor headings.

## 4. Interactions

- Plan selected → mode=selected, trek ID.
- Customize → mode=custom, trek ID.
- Sample departure → validated departure ID and matching trek; full cannot be selected.
- Compare adds/removes shared ID; preserve draft when coming from planner.
- Question → demo contact with trek context. No existing real inquiry.js handler may receive the event.

## 5. Acceptance

Render all 8 slugs, compare displayed values against shared repository, itinerary count correct, nonworking map honest, departure end dates inclusive, price labels consistent, existing public detail unchanged. Test longest/shortest title, missing optional altitude, gallery failure, all-day expansion, keyboard tabs, 320px and 200% zoom. Unknown slug404; all content in initial HTML. Stop after phase.
