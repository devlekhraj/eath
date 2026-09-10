# Canonical editorial, people and FAQ fixtures

## 1. Fixture use

Import this seed into the same demo repository as the catalog. All sample people and stories are fictional and visibly labeled at list/card/detail level. Ratings, certifications and contact integrations remain absent, not fake.

No lorem ipsum. Use supplied copy directly or modestly expand it with original nonfactual demonstration wording. Do not add medical/legal/permit advice or operating claims. Link records through their IDs, not unrelated hardcoded names.

## 2. Seed data

```json
{
  "schema_version": 1,
  "is_demo": true,
  "brand": {
    "name": "EATH",
    "tagline": "Find your Nepal journey.",
    "intro": "A sample travel-planning experience built around discovery, comparison and a clear next step.",
    "trust_statement": "Explore the EATH planning demo",
    "contact_email": "hello@example.test",
    "contact_phone": null,
    "whatsapp_number": null,
    "office_address": "Sample office details — not supplied",
    "social_profiles": []
  },
  "articles": [
    {
      "id": "article-seasons",
      "slug": "choosing-a-travel-month",
      "title": "Choosing a travel month",
      "category": "seasons",
      "summary": "A sample planning checklist for comparing dates, flexibility and route preferences.",
      "trek_ids": [
        "t-ebc",
        "t-abc",
        "t-mustang"
      ],
      "sections": [
        {
          "heading": "Start with your available time",
          "body": "Write down the month you can travel and the number of days available. In this demo, choosing a month filters illustrative trek records. The results are examples for testing the interface, not a forecast or confirmation that a route will operate."
        },
        {
          "heading": "Look beyond one perfect date",
          "body": "Compare a few possible departures and consider how much flexibility you have. Your final real-world decision should use verified route information and current advice from the operator. The demo month selector deliberately includes months with no matching records."
        },
        {
          "heading": "Carry your choice into a plan",
          "body": "Open a sample trek, compare alternatives, or start Plan My Trek with a month selected. The planner keeps your preference visible so you can change it later without repeating the entire journey."
        }
      ],
      "is_demo": true,
      "author_label": "EATH Demo Editorial",
      "image_key": "article-seasons",
      "updated_date": "2030-09-01"
    },
    {
      "id": "article-packing",
      "slug": "organizing-your-packing-questions",
      "title": "Organizing your packing questions",
      "category": "packing",
      "summary": "A sample way to organize questions before creating a trek-specific packing list.",
      "trek_ids": [
        "t-langtang",
        "t-mardi"
      ],
      "sections": [
        {
          "heading": "Use categories, not an unverified checklist",
          "body": "Create headings for clothing, personal items, documents and items to discuss with your guide. This sample article demonstrates an educational layout. It is not a complete equipment list and should not be used to prepare for a real trek without route-specific guidance."
        },
        {
          "heading": "Ask what is already included",
          "body": "Check the actual operator's verified inclusion list before buying or renting equipment. The price and inclusion fields on this demo are illustrative, so they do not confirm which supplies will be provided."
        },
        {
          "heading": "Record requests in your plan",
          "body": "The planner has a short requests field for non-sensitive questions. Use sample text when testing, such as asking where an approved packing list would be supplied. Do not upload identity or medical documents."
        }
      ],
      "is_demo": true,
      "author_label": "EATH Demo Editorial",
      "image_key": "article-packing",
      "updated_date": "2030-09-01"
    },
    {
      "id": "article-altitude",
      "slug": "questions-before-a-high-altitude-trip",
      "title": "Questions before a high-altitude trip",
      "category": "preparation",
      "summary": "A sample question-led article layout, not medical guidance.",
      "trek_ids": [
        "t-ebc",
        "t-gokyo",
        "t-manaslu"
      ],
      "sections": [
        {
          "heading": "Treat the displayed metrics as samples",
          "body": "The demo uses illustrative altitude and difficulty fields to show how comparison works. Those values are not a medical assessment, an operational itinerary or confirmation of individual suitability."
        },
        {
          "heading": "Seek appropriate advice before real travel",
          "body": "For a real journey, discuss the actual itinerary with the operator and personal health questions with an appropriate qualified professional. This page intentionally provides no diagnosis, medication advice or treatment instructions."
        },
        {
          "heading": "Use preferences carefully",
          "body": "The demo planner ranks expressed interests and practical preferences. It does not evaluate health. A preference match is not a safety clearance, and it must never be presented as one."
        }
      ],
      "is_demo": true,
      "author_label": "EATH Demo Editorial",
      "image_key": "article-altitude",
      "updated_date": "2030-09-01"
    },
    {
      "id": "article-compare",
      "slug": "how-to-compare-trek-ideas",
      "title": "How to compare trek ideas",
      "category": "planning",
      "summary": "Use duration, pace and interests to make a clearer shortlist.",
      "trek_ids": [
        "t-abc",
        "t-khopra",
        "t-mardi"
      ],
      "sections": [
        {
          "heading": "Choose two or three options",
          "body": "Add sample treks from the listing or detail pages. Keeping the shortlist small makes it easier to inspect the same fields across each option. You can remove or replace a trek without starting a new search."
        },
        {
          "heading": "Read the trade-offs",
          "body": "A lower illustrative price does not prove a lower final trip cost. A shorter itinerary does not automatically mean easier walking. Compare duration, displayed difficulty, walking hours and included sample content separately."
        },
        {
          "heading": "Take the next step",
          "body": "Select Plan This Trek to carry an option into the planner. If none of the samples fits, choose a custom request and explain your preferences using non-sensitive demo text."
        }
      ],
      "is_demo": true,
      "author_label": "EATH Demo Editorial",
      "image_key": "article-compare",
      "updated_date": "2030-09-01"
    },
    {
      "id": "article-culture",
      "slug": "planning-a-culture-led-journey",
      "title": "Planning a culture-led journey",
      "category": "culture",
      "summary": "A sample article about expressing cultural interests in a trip request.",
      "trek_ids": [
        "t-mustang",
        "t-langtang"
      ],
      "sections": [
        {
          "heading": "Name the experience you are interested in",
          "body": "Use the Cultural Trails experience filter to explore sample itineraries tagged with a village and culture theme. These tags describe the demo catalog; they do not promise access to specific sites, events or communities."
        },
        {
          "heading": "Leave space for verified local guidance",
          "body": "Real trips require up-to-date local guidance and respectful arrangements. The demo does not invent event schedules, religious rules, access permissions or named community partnerships."
        },
        {
          "heading": "Build a flexible request",
          "body": "Choose culture as an interest, set your preferred pace and add a sample question. The planning summary will retain these choices while you compare potential routes."
        }
      ],
      "is_demo": true,
      "author_label": "EATH Demo Editorial",
      "image_key": "article-culture",
      "updated_date": "2030-09-01"
    },
    {
      "id": "article-logistics",
      "slug": "organizing-travel-logistics",
      "title": "Organizing travel logistics",
      "category": "logistics",
      "summary": "Separate confirmed arrangements from questions that still need an answer.",
      "trek_ids": [
        "t-ebc",
        "t-manaslu"
      ],
      "sections": [
        {
          "heading": "Separate the package from the wider journey",
          "body": "The sample prices in this website cover only an illustrative ground-package basis. International flights, insurance and customization are not priced. Nothing shown is a ticket, reservation or quote."
        },
        {
          "heading": "Record dependencies",
          "body": "Use your plan to note dates, available days and transfer preferences. Actual transport schedules, permits and operator arrangements need confirmation outside this demo. No external schedule or permit service is connected."
        },
        {
          "heading": "Review before sending a real request",
          "body": "The demo review step lets you edit each group of preferences before a simulated submission. A future production inquiry flow would require separate approval and real integration; it is not implemented by these samples."
        }
      ],
      "is_demo": true,
      "author_label": "EATH Demo Editorial",
      "image_key": "article-logistics",
      "updated_date": "2030-09-01"
    }
  ],
  "guides": [
    {
      "id": "guide-demo-01",
      "slug": "demo-guide-01",
      "name": "Demo Guide 01",
      "role": "Sample Trek Leader",
      "is_demo": true,
      "disclosure": "Fictional demo profile — not an actual employee or credential.",
      "image_key": "guide-demo-01",
      "biography": "This fictional profile demonstrates a calm, approachable guide page. Its sample story emphasizes listening to traveler preferences and discussing the pace of a journey. It must not be published as a real person's experience.",
      "languages": [],
      "qualifications": [],
      "years_experience": null,
      "trek_ids": [
        "t-ebc",
        "t-mardi",
        "t-khopra"
      ]
    },
    {
      "id": "guide-demo-02",
      "slug": "demo-guide-02",
      "name": "Demo Guide 02",
      "role": "Sample Journey Planner",
      "is_demo": true,
      "disclosure": "Fictional demo profile — not an actual employee or credential.",
      "image_key": "guide-demo-02",
      "biography": "This fictional profile demonstrates a planning-focused team member. The sample biography explains how trip questions could be organized before a conversation. It makes no claim about real employment, training or availability.",
      "languages": [],
      "qualifications": [],
      "years_experience": null,
      "trek_ids": [
        "t-abc",
        "t-gokyo",
        "t-mustang"
      ]
    },
    {
      "id": "guide-demo-03",
      "slug": "demo-guide-03",
      "name": "Demo Guide 03",
      "role": "Sample Local Host",
      "is_demo": true,
      "disclosure": "Fictional demo profile — not an actual employee or credential.",
      "image_key": "guide-demo-03",
      "biography": "This fictional profile demonstrates a people-led travel story. The sample narrative highlights curiosity and respectful questions without inventing qualifications or community affiliations.",
      "languages": [],
      "qualifications": [],
      "years_experience": null,
      "trek_ids": [
        "t-langtang",
        "t-manaslu"
      ]
    }
  ],
  "stories": [
    {
      "id": "story-demo-01",
      "slug": "a-slower-morning-on-the-trail",
      "title": "A slower morning on the trail",
      "traveler_name": "Demo Traveler A",
      "trek_id": "t-khopra",
      "summary": "A fictional narrative showing how a photo-led traveler story can read.",
      "body": "This fictional traveler story describes pausing to enjoy a view, adjusting the pace of a day and sharing questions with a guide. It exists to test the editorial layout and links to a sample trek. It is not a review of a real trip or a claim about EATH's services.",
      "is_demo": true,
      "image_key": "story-demo-01",
      "disclosure": "Fictional demo story — not a customer testimonial.",
      "rating": null,
      "source_url": null
    },
    {
      "id": "story-demo-02",
      "slug": "choosing-between-two-journeys",
      "title": "Choosing between two journeys",
      "traveler_name": "Demo Traveler B",
      "trek_id": "t-abc",
      "summary": "A fictional planning story about turning several options into one request.",
      "body": "This fictional story follows a traveler using duration and personal interests to make a shortlist. The comparison screen helps organize questions, and the planner keeps the selected option visible. No actual booking, traveler experience or service rating is represented.",
      "is_demo": true,
      "image_key": "story-demo-02",
      "disclosure": "Fictional demo story — not a customer testimonial.",
      "rating": null,
      "source_url": null
    },
    {
      "id": "story-demo-03",
      "slug": "space-for-a-different-kind-of-trip",
      "title": "Space for a different kind of trip",
      "traveler_name": "Demo Traveler C",
      "trek_id": "t-mustang",
      "summary": "A fictional custom-trip narrative for demonstrating another visitor journey.",
      "body": "This sample narrative describes someone asking for a different pace and more time for cultural interests. It illustrates the custom-request workflow. All people and events are fictional, and every itinerary or price reference remains illustrative.",
      "is_demo": true,
      "image_key": "story-demo-03",
      "disclosure": "Fictional demo story — not a customer testimonial.",
      "rating": null,
      "source_url": null
    }
  ],
  "faqs": [
    {
      "id": "faq-duration",
      "category": "choosing",
      "question": "How long is this sample trek?",
      "answer_template": "The demo itinerary contains {duration_days} days. This is an illustrative record, not a confirmed operating schedule.",
      "trek_specific": true
    },
    {
      "id": "faq-price",
      "category": "pricing",
      "question": "Is the displayed price a confirmed quote?",
      "answer_template": "No. It is an illustrative USD ground-package price per person. Flights, insurance and unpriced requests are excluded, and no reservation or payment is created.",
      "trek_specific": false
    },
    {
      "id": "faq-customize",
      "category": "planning",
      "question": "Can I change this sample plan?",
      "answer_template": "Yes. Choose Customize This Trek or Build My Trip. Your preferences are kept in a demo draft, and the final request is simulated rather than sent.",
      "trek_specific": false
    },
    {
      "id": "faq-contact",
      "category": "planning",
      "question": "Will someone receive my demo request?",
      "answer_template": "No. Demo forms do not send messages or create CRM records. Use the supplied sample contact details and do not enter sensitive information.",
      "trek_specific": false
    },
    {
      "id": "faq-compare",
      "category": "choosing",
      "question": "How many treks can I compare?",
      "answer_template": "Choose up to three different sample treks. At least two are useful for a side-by-side comparison. You can remove or replace a selection.",
      "trek_specific": false
    },
    {
      "id": "faq-preparation",
      "category": "preparation",
      "question": "Does a preference match mean a trek is safe for me?",
      "answer_template": "No. The demo matches expressed preferences only. Real route planning and personal health questions require appropriate verified advice.",
      "trek_specific": false
    },
    {
      "id": "faq-departure",
      "category": "dates",
      "question": "Are the departure seats real?",
      "answer_template": "No. Dates and seat counts are generated from a fixed sample calendar. Choosing one does not reserve inventory.",
      "trek_specific": false
    },
    {
      "id": "faq-accommodation",
      "category": "comfort",
      "question": "Are accommodation upgrades priced?",
      "answer_template": "No. Comfort choices and extras are sample requests. The demo does not confirm lodging availability or calculate upgrade charges.",
      "trek_specific": false
    },
    {
      "id": "faq-policy",
      "category": "booking",
      "question": "Are these booking policies binding?",
      "answer_template": "No. Policy pages are labeled draft layouts awaiting business and legal review. The demo does not create a booking contract.",
      "trek_specific": false
    }
  ],
  "policy_slugs": [
    "privacy",
    "terms",
    "booking-conditions",
    "cancellation",
    "cookies"
  ]
}
```

## 3. Page-copy enrichment

Generate local, stable fixture content for about, safety, responsibility, contact and each policy using their numbered page prompt. The copy must be substantive enough to show hierarchy and reading rhythm, while labels explain that facts are not operationally approved. An honest sample page is allowed; a blank page, generic `Coming soon` block or fake real policy is not.

General FAQ listing excludes the trek-specific duration question unless a trek context resolves its variable. Never expose unresolved braces or raw template variables.

All five policies have their own slug/title, intro and named sections. Do not reuse one content body for all five. No real legal effective date is claimed. Article dates use the visibly labeled demo calendar, not a fake claim of recent editorial verification.

## 4. Derived associations

- Three stories associate with existing treks; derive region through their trek.
- Guide relationships must match the trek guide_id assignments in the catalog; validate both sides or derive one side.
- No aggregate review stars/count used as a real rating anywhere.
- Category counts derive from articles. Empty filters produce a useful state.
- FAQ details interpolate only whitelisted fixture fields and escape output.
- Keep route labels, CTA copy and contact demo disclosures consistent.

