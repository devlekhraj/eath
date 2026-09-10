# 31 — General FAQ page

## Read first

Master, 03, 04, route/CTA and demo-content reference. Implements P26.

## Page order

1. Breadcrumb Home / FAQ.
2. H1 and short explanation.
3. Search questions.
4. Category navigation.
5. Question/answer groups.
6. Relevant guide links.
7. Demo contact/planner CTA.

## Data and behavior

Use supplied FAQ records. Omit trek-specific duration question without a valid trek context; never expose {duration_days}. Categories: choosing, planning, pricing, preparation, dates, comfort and booking as represented by actual records. Derive counts; don't create empty category tabs.

GET q max 120 and category filter; search question and answer text. Accessible details/summary or proven accordion with aria-expanded/controls. Answers remain server-rendered, not fetched only after opening. Each question has a stable anchor for links from other pages. Expand/collapse-all optional and must reflect mixed states accurately.

## Design and states

Reading-width question list with thin separators, generous click targets, no shadow panels. Search empty→clear query + view all. Unknown category safely normalized. FAQ answers state demo boundaries and avoid legal/medical advice.

## Acceptance

All general records visible, no unresolved template variables, correct category/search matches and result count, no-JS answers usable, keyboard controls/focus, unique IDs. Do not emit FAQ rich-result claims from fictional content. All internal links preview-only. Stop and report.
