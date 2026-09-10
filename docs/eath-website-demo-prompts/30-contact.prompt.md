# 30 — Complete simulated contact page

## Read first

Master, 03, 04, 13, route/CTA, demo-content and state/scoring references. Implements P25.

## Page order

1. Breadcrumb Home / Contact.
2. H1 and demo communication notice.
3. Sample contact-method area.
4. Short general inquiry form.
5. Office-information unavailable/sample state.
6. Relevant FAQ links.
7. Plan My Trek alternative.

## Form

Fields: sample name, sample email, topic (general/trek/custom/departure/other), optional validated trek ID, message max 1000 chars. Prefill Demo Traveler and traveler@example.test. Optional trek context from detail sets a visible selector, not a hidden unauthorized lookup. The message label warns not to enter sensitive information.

Use bounded server validation, CSRF and a preview-only handler. Reuse validation/display patterns from13 without creating a planner draft for a simple contact message. Submission says `Simulate message`, never `Send to our team`. On success show an accessible confirmation: nothing sent/stored as a lead. Do not persist raw message/contact in session flash, database, logs or analytics. A minimal success flag can be used for Post/Redirect/Get.

## Contact buttons

WhatsApp/phone/email sample controls open local informational disclosure/dialog and offer this demo form; no tel/mailto/wa.me navigation. No real phone number or office address in fixture; display unavailable sample slot. No external map embed or fake office pin.

## States/tests

Inline errors, summary focus, success message, double-submit prevention, expired CSRF handled, unknown trek ignored/rejected with explanation. Verify no mail/job/CRM/HTTP integration through spies, no persistent PII, no hidden real inquiry.js handlers. Test keyboard, 320px and no-JS POST behavior. Planner alternative doesn't erase an existing plan.
