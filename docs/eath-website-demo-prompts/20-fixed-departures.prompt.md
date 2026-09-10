# 20 — Fixed departures demo page

## Read first

Master, 03, 04, 07, route/CTA, catalog and state references. Implements P15 from generated24 departure records.

## Page order

1. Breadcrumb Home / Sample Departures.
2. H1 and sample-calendar/availability warning.
3. Month, region and trek filters.
4. Count and departure rows grouped by start month.
5. Private/custom-date alternative.
6. Planning CTA.

## Row fields

Trek link, start/end date, duration, sample status, illustrative seats, per-person USD departure price, View Trek and Plan This Departure. Use status text plus symbol, not color alone. Prices include only base + template adjustment. Never label a row Guaranteed, Confirmed departure or Selling fast.

Open/limited with sufficient sample seats can be used as planner context. Full means disabled departure selection with text reason and Custom Dates action. Changing filters never reserves a seat.

Desktop semantic table with caption/headers; mobile readable stacked rows or contained accessible scrolling. Date formatting stays date-only. No carousel/calendar dependency, countdown timer or shadowed availability cards.

## Date logic

Use fixed sample clock2030-09-01 and template offsets. End=start+duration-1. Month filtering uses departure start month. Show a visible Sample calendar label. This calendar is not machine today and must not be used for session TTL. Catalog-generated IDs are authoritative.

## Planner handoff

Choose action sends selected trek/departure IDs. Planner validates ownership, date range, status and party size again. Existing draft requires explicit context update. Party size exceeding sample seats → choose other date/custom request. No inventory decrement, booking record or external HTTP request.

## QA

All 24 rows reachable; default page may paginate12 rows, preserving filters. Trek filter produces3 rows. Full status cannot enter an apparently reserved plan. Filter no results helpful. Test end-date inclusive arithmetic, leap/date boundaries with injected clocks, price variation and sufficient/insufficient party sizes. UI labels always make demo status clear.
