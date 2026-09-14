# Dynamic Frontend Page Detail & Polymorphic FAQs Standards

This rule governs how public detail pages connect to the Admin Panel and how the polymorphic FAQ architecture operates across the entire application.

---

## 1. Universal Requirement: Every Frontend Page Detail Must Have Full Dynamic CRUD in Admin

Every public frontend detail page (such as Destination Detail `/destinations/{slug}`, Journey / Trek Detail `/treks/{slug}`, Experience Detail `/experiences/{slug}`, Article Detail `/articles/{slug}`, Guide Detail, etc.) must have corresponding, comprehensive dynamic CRUD in its Admin Panel detail manager (`/admin/{resource}/:id`), exactly as implemented for the Destination Detail page (`/admin/destinations/:id`).

### Key Rules for Page Detail Sections:

1. **No Hardcoded Content Without Database Backing**:
   - Content on public detail pages must never be permanently hardcoded in Blade views, controller methods, or static JSON fixtures.
   - Every section must map to database columns, relationships, or polymorphic attachments on the respective model.

2. **Sections That Must Be Admin-Manageable**:
   - **Hero Banner & Imagery**: Banner, card thumbnail, and gallery visuals must resolve from database media attachments via `HasMediaAttachments`, falling back gracefully to `WebsiteAssetRegistry` only when unassigned.
   - **Titles, Labels & Summary**: Entity name, region/subtitle label, teaser/intro summary.
   - **Main Description / Body**: Rich text or structured section content (e.g., Summernote editor).
   - **Logistics, Practical Guide & Operational Notices**: All route access details, permits, pacing advice, and operational advisory banners (e.g., `operational_notice`) must be editable in Admin.
   - **Assigned Relational Data**: Linking related entities (e.g., Journeys assigned to Destinations, Experiences assigned to Journeys, etc.).
   - **Regional / Entity FAQs**: Every entity must support FAQs through the polymorphic `HasFaqs` trait and a dedicated Admin FAQ tab/component.
   - **Bottom Call-To-Action (CTA) Banners**: Custom CTA title, description, primary button label/url, and secondary button label/url must be editable in Admin.
   - **SEO Metadata**: `meta_title` and `meta_description` with live SERP preview.

3. **Zero Breakage & Smart Fallbacks Policy**:
   - Every dynamic field in Blade templates must have a fallback to prevent layout breakages or blank gaps:
     ```blade
     {{ !empty($entity['cta_title']) ? $entity['cta_title'] : ('Ready to Explore ' . $entity['name'] . '?') }}
     ```
   - If an admin user leaves a field blank, the public website must seamlessly display the smart system default.

---

## 2. Polymorphic FAQs Architecture (`HasFaqs`)

FAQs across E.A.T.H. Travels are strictly polymorphic so that **any model** can have associated FAQs.

### Database Schema
The `faqs` table uses:
```php
$table->nullableMorphs('faqable');
```
This generates:
- `faqable_type` (`string`, nullable): Model class (e.g., `Admin\Models\Destination`, `Admin\Models\Journey`, `Admin\Models\Experience`, `Admin\Models\Article`) or alias (`'destination'`, `'journey'`).
- `faqable_id` (`unsignedBigInteger`, nullable): Foreign ID of the entity.
- Composite index on `(faqable_type, faqable_id)`.

**Global FAQs**: When both `faqable_type` and `faqable_id` are `null`, the FAQ is a general, site-wide FAQ (e.g., general booking policies, payment methods).

### Model Trait: `Admin\Models\Concerns\HasFaqs`
To enable FAQs on any model, use the `HasFaqs` trait:
```php
namespace Admin\Models;

use Admin\Models\Concerns\HasFaqs;
use Admin\Models\Concerns\HasMediaAttachments;
use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    use HasMediaAttachments, HasFaqs;
    // ...
}
```
The trait provides:
```php
public function faqs(): MorphMany
{
    return $this->morphMany(Faq::class, 'faqable')->orderBy('sort_order');
}
```

### `Faq` Model Features
- `faqable(): MorphTo`: Returns the parent entity.
- Backward-compatible accessors (`$faq->destination`, `$faq->journey`, `$faq->experience`) are appended to JSON outputs to ensure zero breakage for existing consumers.

### Admin Panel Management
- Use or reference `packages/admin/resources/admin/pages/destinations/detail_tabs/TabFaqs.vue` as the blueprint when adding FAQs to other entity detail pages (Journeys, Experiences, Articles, etc.).
- When querying or persisting FAQs for an entity, pass `faqable_type` and `faqable_id`:
  ```javascript
  // Load
  getFaqsApi({ faqable_type: 'journey', faqable_id: journey.id })

  // Save
  createFaqApi({
    question: form.question,
    answer: form.answer,
    category: form.category,
    sort_order: form.sort_order,
    is_active: form.is_active,
    faqable_type: 'journey',
    faqable_id: journey.id,
  })
  ```

### Public Frontend Retrieval
In public website controllers (e.g., `DestinationController`, `JourneyController`):
```php
$dbFaqs = Faq::query()
    ->where(function ($q) use ($modelClass, $alias) {
        $q->where('faqable_type', $modelClass)
          ->orWhere('faqable_type', $alias);
    })
    ->where('faqable_id', $entity['db_id'])
    ->where('is_active', true)
    ->orderBy('sort_order')
    ->orderBy('id')
    ->get();

if ($dbFaqs->isNotEmpty()) {
    $faqs = $dbFaqs->map(fn (Faq $f) => [
        'question' => $f->question,
        'answer' => $f->answer,
    ])->all();
} else {
    // Fall back to standard defaults for this entity
    $faqs = $defaultFaqs;
}
```
