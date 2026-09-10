# 13 — Plan review, sample contact and simulated confirmation

## Read first

Master, 10–12, route/CTA and state/scoring references. Implements P12–P14 and closes the main demo journey.

## 1. Plan review page

Require valid draft at permitted stage. Order: heading; selected trek or custom intent; dates/flexibility; party; available days; interests/activity preferences; accommodation/style/pace; budget; requests/add-ons; conflicts needing review; price explanation; Continue to Sample Contact.

Each group has an Edit link to the correct earlier step, not a generic reset. Null/unsure displays as `To discuss`, not blank/zero. Selected trek hero is compact; no giant second detail page. Custom requests without a trek remain legitimate completed drafts.

Price breakdown: base price per person (or selected departure price), illustrative party subtotal for adults+children, all USD integer cents. Explain that the demo applies the same sample unit price to each traveler; this is not an actual child-pricing policy. Extras, flights and insurance are unpriced/excluded, not0. Never label this `Grand total`, `Amount due` or `Confirmed quote`. When no trek is chosen, show `No sample price selected` rather than calculate.

## 2. Sample contact step

Visible warning to use sample data. Prefill name`Demo Traveler`, email`traveler@example.test`; optional phone left blank. Preferred contact method email/phone/WhatsApp/unsure describes a hypothetical preference, never starts external navigation. Field labels and validation accessible; no marketing consent or forced legal agreement to fake policies.

Server validation: name bounded120 chars, email syntax/max 254, optional phone bounded32 and harmless characters, method allowlist. Do not log/flash contact inputs persistently. A contact preference does not authorize messaging in demo mode.

Action text: `Submit Demo Request`. Beside it: `This sends nothing and creates no booking.` Submit must reach demo-only CSRF-protected handler with no Eloquent lead/booking call, queue, mail, notification, HTTP request or payment SDK. Disable live production inquiry handlers through scoped code, not a deceptive UI-only block.

## 3. Submission semantics

Revalidate current draft, IDs and selection conflicts server-side. Ignore client-calculated money. Validate one-use idempotency token owned by draft/session. On success create minimal receipt (reference prefixedDEMO-, selected fixture IDs, non-sensitive planning summary, sample totals and timestamp), discard contact inputs and free-text notes. Use Post/Redirect/Get. Do not include name/email/phone in receipt, URL, logs or browser storage.

Repeated valid token returns the same receipt, not duplicates. Expired/invalid draft cannot submit. After reset, old token cannot revive deleted state. No real reservation or inventory decrement.

## 4. Confirmation page

Heading `Demo request completed`. Prominent explanation: no inquiry sent, no booking made, no payment taken. Show demo reference and concise non-PII plan summary. Actions Edit Plan, Explore Treks, Reset Demo. Do not say a team member will call or email.

Confirmation needs a receipt in the current demo session. Direct URL without one redirects to planner start with explanation. Refresh does not POST. Edit Plan reconstructs permitted non-sensitive fields; notes/contact are intentionally not restored. Explicit reset clears draft/receipt and preview comparison IDs only.

## Tests

Complete selected-trek, discover and no-trek custom flows. Edit every review group, ensure unchanged answers persist; tampered hidden price/departure rejected/recomputed; missing contact errors; no persistent PII; double submit/reload idempotent; expired/missing draft/receipt safe; reset isolated; verify all outbound channels and real jobs remain unused using fakes/spies where available. Desktop/mobile/no-JS forms and focus behavior. Stop with full-flow observations.
