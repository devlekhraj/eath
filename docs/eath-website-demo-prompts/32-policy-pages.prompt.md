# 32 — Five draft policy page layouts

## Read first

Master, 03, 04, route/CTA and demo-content references. Implements P27a–e; all five pages required.

## Shared page structure

1. Breadcrumb Home / Policy title.
2. One H1.
3. Prominent `Demo policy layout — not binding terms; professional and business review required before launch`.
4. No invented legal effective date; use `Draft sample`.
5. Table of contents for longer pages.
6. Distinct titled sections and short explanatory sample paragraphs.
7. Demo contact link.

## Individual content outlines

- Privacy: information a real service may collect; purposes to define; storage/retention to define; sharing to verify; user-request process to establish; demo currently has no real inquiry delivery and no production lead storage.
- Terms: service scope to define; content limitations; responsibilities to approve; site-use conditions to review; contact process. Do not invent jurisdiction, liability waivers or enforceable obligations.
- Booking conditions: inquiry versus quote versus confirmation; pricing basis to approve; payment process to define; traveler details to verify; change handling. State no booking/payment exists here.
- Cancellation: request channel to define; schedule/fees awaiting approval; operator changes; refunds process; exceptional cases. No invented percentages/deadlines.
- Cookies: inventory of actual demo storage keys and purpose; comparison IDs in localStorage; scoped planner session; expiry/reset; no third-party analytics in preview. Do not claim cookie-free if sessions use cookies.

## Behavior and boundaries

Create substantive demo paragraphs explaining what each policy would cover, not identical copy or empty placeholders. No real consent checkbox accepting these draft terms. Footer links all five routes. No fake cookie-consent banner for scripts that aren't loaded; if existing banner reused, it must not enable live trackers in demo.

## Tests

All five routes render distinct H1/body/metadata; unknown policy slug404; TOC links unique; sample labels visible; storage statements match implementation; no accidental noindex change to live policy routes. Readability on mobile and 200% zoom, no box-shadow. Legal approval is deferred, not claimed complete.
