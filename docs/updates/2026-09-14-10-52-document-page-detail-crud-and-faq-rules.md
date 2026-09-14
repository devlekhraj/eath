# Document Frontend Page Detail Dynamic CRUD & Polymorphic FAQs Standards

**Timestamp:** 2026-09-14 10:52 (Nepal Time / NPT / UTC+05:45)

## Summary
- Formally documented the mandatory engineering instructions requiring that every public frontend detail page has complete, corresponding dynamic CRUD in its Admin Panel manager, mirroring the Destination Detail implementation.
- Established the permanent polymorphic FAQs architecture standard based on `nullableMorphs('faqable')` and the `HasFaqs` trait.
- Created dedicated rulebook [`.agents/rules/page-detail-crud-and-faqs.md`](file:///Volumes/TOSHIBA/Herd/eath/.agents/rules/page-detail-crud-and-faqs.md) and added high-priority sections to [`AGENTS.md`](file:///Volumes/TOSHIBA/Herd/eath/AGENTS.md) for all future agent and developer reference.

## Detailed Changes

### Documentation & Agent Rules
- **[`.agents/rules/page-detail-crud-and-faqs.md`](file:///Volumes/TOSHIBA/Herd/eath/.agents/rules/page-detail-crud-and-faqs.md)**:
  - Documented the rule that every frontend detail page must be fully backed by database CRUD in Admin without permanently hardcoded copy or static arrays in templates.
  - Specified the required dynamic sections: Hero banner & media (via `HasMediaAttachments`), titles & summaries, rich text description/overview, logistics & operational notice (`operational_notice`), entity-specific FAQs (via `HasFaqs`), bottom CTA banner (custom title, description, buttons/URLs), and SEO metadata.
  - Detailed the Zero Breakage & Fallback Policy: every field must gracefully fall back to sensible defaults when left empty.
  - Documented the polymorphic FAQ standard: schema (`nullableMorphs('faqable')`), `HasFaqs` trait, `Faq` model relations and accessors, Admin UI blueprint (`TabFaqs.vue`), and public controller retrieval patterns.
- **[`AGENTS.md`](file:///Volumes/TOSHIBA/Herd/eath/AGENTS.md)**:
  - Added section `## Frontend Page Detail Dynamic CRUD Standard` referencing `.agents/rules/page-detail-crud-and-faqs.md`.
  - Added section `## Polymorphic FAQs Standard (HasFaqs)` summarizing the schema and trait usage rules.

## Verification Commands & Outputs

```bash
git status
```
Output confirms clean tracking of `AGENTS.md` and `.agents/rules/page-detail-crud-and-faqs.md`.
