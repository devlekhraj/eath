# 25 — Guide profile detail

## Read first

Master, 03, 04, 24 and route/content/catalog/asset references. Implements P20.

## Page order

1. Breadcrumb Home / Guides / Demo profile.
2. Portrait placeholder, H1 name, role and fictional disclosure.
3. Complete sample biography.
4. Languages/qualifications information (honest unavailable state).
5. Associated sample trekking interests.
6. Linked sample treks.
7. Planning CTA.

## Detailed behavior

Resolve guide slug through fixture repository; unknown404. Use linked trek IDs, validate relationships with trek guide_id assignments. Qualifications and languages currently empty, so show `No verified qualifications are supplied in this demo`; no fake badge or years-of-experience statement.

Do not add reviews about this fictional guide or claim that the guide will lead a specific departure. The CTA says `Plan a sample journey`, not `Book this guide now`. If the UI includes an interest in this profile, describe it as a fictional guide preference, not an assignment or guaranteed availability.

## Layout and QA

Desktop portrait and biography split, long text below in reading width; mobile portrait before title/body with consistent focus order. Related TrekCard grid reuse. No oversized portrait shadow or dramatic certificate decoration.

Test all 3 profiles, unknown slug, empty qualification/language sets, linked trek correctness, long bio, meaningful fictional-image alternative text, mobile and keyboard. No live employee/private data or external booking endpoint.
