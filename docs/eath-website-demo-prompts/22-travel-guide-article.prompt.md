# 22 — Travel-guide article template

## Read first

Master, 03, 04, 21, route/content/catalog/asset references. Implements P17 for all 6 articles.

## Page order

1. Breadcrumb Home / Travel Guide / Category / Article (category links to filtered index).
2. Article H1, summary, `EATH Demo Editorial` and labeled demo date.
3. Hero image.
4. Short intro.
5. Table of contents for the supplied multi-section body.
6. Article body with proper H2/H3 order.
7. Any provided source/reference notes, never invented citations.
8. Relevant sample treks.
9. Related articles by category/intersecting trek IDs, deterministic deduplication.
10. Contextual planning CTA.

## Reading/design

Text column max 800px and roughly65–75 characters measure, body16–18px with1.65 line-height. Headings clear, lists comfortable, no excessive full-width text. Optional desktop contents rail must not obscure body; mobile native details disclosure. Heading anchors unique and stable; reserve sticky header offsets.

Use the complete sample sections from demo-content. Do not convert them into health/permit/legal instructions or add unverified fees, medication, operating facts or external source URLs. It is acceptable to link to other sample articles that expressly note their limitations. Any actual citations added later must be verified primary sources.

## Interactions and privacy

TOC native anchors works without JS. Related cards use real fixture routes and compare actions. Primary CTA can carry a related trek only when explicitly chosen; a generic article CTA must not silently select a trek. No social-share SDKs, comment form, third-party embeds or newsletter capture in this demo.

## Acceptance

Every article has unique H1/meta and all body sections present in initial HTML; unknown slug404. Confirm no invented author portrait/credentials, no raw HTML injection from fixture strings, image fallback, long titles, keyboard anchor navigation and mobile readability. No Article/Review/FAQ rich-result payload derived from misleading sample claims;34 handles final metadata policy.
