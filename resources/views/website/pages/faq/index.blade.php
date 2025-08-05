@extends('website.layout.master')
@section('content')

<div class="container-fluid py-5">
    <h2 class="mb-4 text-center fw-bold" style="letter-spacing: 0.05em; color: #222;">
        Frequently Asked Questions
    </h2>

    <p class="text-center text-muted mb-5" style="max-width: 700px; margin-left: auto; margin-right: auto; font-size: 1.1rem; line-height: 1.5;">
        Find answers to the most common questions about our travel packages, guides, and services. If you do not find your question here, please contact us directly.
    </p>

    @php
        $faqs = [
            [
                'question' => 'What is included in the travel package?',
                'answer' => 'Our travel packages typically include accommodation, meals as specified, guided tours, and transportation during the trip. Some packages may vary, so please check the details for each package.'
            ],
            [
                'question' => 'Do I need a visa to visit Nepal?',
                'answer' => 'Most visitors to Nepal require a visa which can be obtained on arrival at the airport or at Nepalese consulates. Please check the latest visa regulations for your country before traveling.'
            ],
            [
                'question' => 'Are the travel guides certified?',
                'answer' => 'Yes, all our travel guides are certified professionals with years of experience and deep local knowledge to ensure a safe and enjoyable trip.'
            ],
            [
                'question' => 'What is the cancellation policy?',
                'answer' => 'Cancellation policies vary depending on the package and timing. Generally, cancellations made 30 days before departure are eligible for a full refund minus administrative fees. Please read the specific terms on your booking.'
            ],
            [
                'question' => 'Can I customize my travel itinerary?',
                'answer' => 'Absolutely! We offer customizable itineraries to suit your preferences and interests. Contact us to discuss your requirements.'
            ],
        ];
    @endphp


    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
            <div class="accordion" id="faqAccordion">
                @foreach($faqs as $key => $faq)
                    <div class="accordion-item mb-3 shadow-sm rounded">
                        <h2 class="accordion-header" id="heading{{ $key }}">
                            <button class="accordion-button collapsed fw-semibold text-primary"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $key }}" aria-expanded="false"
                                    aria-controls="collapse{{ $key }}"
                                    style="font-size: 1.1rem;">
                                <i class="fas fa-question-circle me-3"></i> {{ $faq['question'] }}
                            </button>
                        </h2>
                        <div id="collapse{{ $key }}" class="accordion-collapse collapse"
                             aria-labelledby="heading{{ $key }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted" style="font-size: 1rem; line-height: 1.5;">
                                {!! nl2br(e($faq['answer'])) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
