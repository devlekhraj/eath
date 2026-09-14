<?php

namespace Admin\Models\Concerns;

use Admin\Models\Faq;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasFaqs
{
    public function faqs(): MorphMany
    {
        return $this->morphMany(Faq::class, 'faqable')->orderBy('sort_order');
    }
}
