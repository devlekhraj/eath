<div class="modal-header px-4 border-bottom">
    <h5 class="modal-title fw-bold text-primary">Send Inquiry</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body p-4">
    <form id="inquiryForm" class="needs-validation" novalidate>
        <input type="hidden" name="type" value="{{ $type }}">
        <input type="hidden" name="id" value="{{ $id }}">
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="fname" class="form-label fw-semibold">First Name</label>
                <input type="text" id="fname" name="fname" class="form-control shadow-sm" placeholder="John"
                    required>
            </div>
            <div class="col-md-6">
                <label for="lname" class="form-label fw-semibold">Last Name</label>
                <input type="text" id="lname" name="lname" class="form-control shadow-sm" placeholder="Doe"
                    required>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" id="email" name="email" class="form-control shadow-sm"
                    placeholder="john@example.com">
            </div>
            <div class="col-md-6">
                <label for="mobile_no" class="form-label fw-semibold">Mobile Number</label>
                <input type="text" id="mobile_no" name="mobile_no" maxlength="10"
                    class="form-control shadow-sm phone_no" placeholder="98XXXXXXXX">
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label for="country" class="form-label fw-semibold">Country</label>
                <input type="text" id="country" name="country" class="form-control shadow-sm" placeholder="US">
            </div>
            <div class="col-md-4">
                <label for="travel_date" class="form-label fw-semibold">Travel Date</label>
                <input type="date" id="travel_date" name="travel_date" class="form-control shadow-sm">
            </div>
            <div class="col-md-4">
                <label for="number_of_people" class="form-label fw-semibold">No. of People</label>
                <input type="number" id="number_of_people" name="number_of_people" class="form-control shadow-sm"
                    min="1" placeholder="1">
            </div>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label fw-semibold">Notes</label>
            <textarea id="message" name="message" class="form-control shadow-sm" rows="4"
                placeholder="Write your notes here..."></textarea>
        </div>

        {{-- <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold" id="inquirySubmitBtn">
            Submit Inquiry
        </button> --}}
        <div class="text-center">
            <button class="btn btn-gradient" id="inquirySubmitBtn">
                <i class="fa-solid fa-check-circle"></i>
                 <span class="ml-2">Submit</span> 
            </button>
        </div>
    </form>
</div>

<style>
    /* Optional custom styling for a polished look */
    #globalModal .modal-content {
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    #inquiryForm .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, .25);
    }

    #inquiryForm label {
        font-size: 0.95rem;
    }

    #inquirySubmitBtn {
        transition: all 0.2s ease;
    }

    #inquirySubmitBtn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
</style>
