<form id="inquiry-form" class="px-6 py-6" action="{{ route('footer.inquiry.store') }}" method="post" novalidate>
    @csrf
    <label class="block text-sm font-semibold text-slate-900" for="inquiry-name">Full name</label>
    <input id="inquiry-name" name="full_name" type="text" autocomplete="name" required
        class="mt-2 w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-200" />
    <p class="mt-1 text-xs text-red-600 hidden" data-error-for="full_name"></p>

    <label class="mt-4 block text-sm font-semibold text-slate-900" for="inquiry-email">Email</label>
    <input id="inquiry-email" name="email" type="email" autocomplete="email" required
        class="mt-2 w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-200" />
    <p class="mt-1 text-xs text-red-600 hidden" data-error-for="email"></p>

    <div class="mt-4 grid gap-4 sm:grid-cols-2">
        <div>
            <label class="block text-sm font-semibold text-slate-900" for="inquiry-country">Country</label>
            <select id="inquiry-country" name="country"
                class="mt-2 w-full rounded-md border border-slate-200 bg-white px-3 py-2 text-sm text-slate-900 focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-200">
                <option value="">Select Country</option>
                @if (count($countries) > 0)
                    @foreach ($countries as $country)
                        <option value="{{ $country['name'] }}">{{ $country['name'] }}</option>
                    @endforeach
                @endif
            </select>
            <p class="mt-1 text-xs text-red-600 hidden" data-error-for="country"></p>
        </div>
        <div>
            <label class="block text-sm font-semibold text-slate-900" for="inquiry-phone">Phone / WhatsApp</label>
            <input id="inquiry-phone" name="phone" type="tel" autocomplete="tel" required
                class="mt-2 w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-200" />
            <p class="mt-1 text-xs text-red-600 hidden" data-error-for="phone"></p>
        </div>
    </div>

    <label class="mt-4 block text-sm font-semibold text-slate-900" for="inquiry-destination">Destination</label>
    <select id="inquiry-destination" name="destination" required
        class="mt-2 w-full rounded-md border border-slate-200 bg-white px-3 py-2 text-sm text-slate-900 focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-200">
        <option value="">Select destination</option>
        @if (count($destinations) > 0)
            @foreach ($destinations as $destination)
                <option value="{{ $destination['id'] }}">{{ $destination['name'] }}</option>
            @endforeach
        @endif
    </select>
    <p class="mt-1 text-xs text-red-600 hidden" data-error-for="destination"></p>

    <label class="mt-4 block text-sm font-semibold text-slate-900" for="inquiry-plan-name">Plan name / Trip title</label>
    <input id="inquiry-plan-name" name="plan_name" type="text" autocomplete="off" required
        class="mt-2 w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-200" />
    <p class="mt-1 text-xs text-red-600 hidden" data-error-for="plan_name"></p>

    <div class="mt-4 grid gap-4 sm:grid-cols-2">
        <div>
            <label class="block text-sm font-semibold text-slate-900" for="inquiry-travel-date">Travel date</label>
            <input id="inquiry-travel-date" name="travel_date" type="date" required
                class="mt-2 w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-200" />
            <p class="mt-1 text-xs text-red-600 hidden" data-error-for="travel_date"></p>
        </div>
        <div>
            <label class="block text-sm font-semibold text-slate-900" for="inquiry-people">Number of people</label>
            <input id="inquiry-people" name="number_of_people" type="number" min="1" required
                class="mt-2 w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-200" />
            <p class="mt-1 text-xs text-red-600 hidden" data-error-for="number_of_people"></p>
        </div>
    </div>

    <label class="mt-4 block text-sm font-semibold text-slate-900" for="inquiry-description">Description</label>
    <textarea id="inquiry-description" name="description" rows="4" required
        class="mt-2 w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-200"></textarea>
    <p class="mt-1 text-xs text-red-600 hidden" data-error-for="description"></p>

    <input type="hidden" id="inquiry-package-id" name="package_id" value="">

    <button type="submit"
        class="mt-6 inline-flex w-full items-center justify-center rounded-md bg-slate-900 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-slate-900 focus-visible:ring-offset-2">
        Send Inquiry
    </button>
    <p id="inquiry-form-feedback" class="mt-3 hidden text-sm"></p>
    <a href="https://wa.me/9779867666656?text=Hello%2C%20I%27d%20like%20to%20inquire%20about%20a%20Himalayan%20trek."
        class="mt-3 inline-flex w-full items-center justify-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-700 hover:bg-emerald-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400 focus-visible:ring-offset-2"
        target="_blank" rel="noopener">
        <svg class="h-4 w-4" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true">
            <path
                d="M19.11 17.205c-.27-.135-1.6-.79-1.85-.88-.246-.09-.427-.135-.608.135-.18.27-.7.88-.855 1.06-.156.18-.31.202-.58.067-.27-.135-1.14-.42-2.173-1.34-.804-.716-1.345-1.6-1.5-1.87-.156-.27-.017-.416.118-.55.12-.12.27-.31.405-.465.135-.156.18-.27.27-.45.09-.18.045-.337-.022-.472-.067-.135-.608-1.466-.833-2.005-.22-.53-.446-.457-.608-.465l-.517-.01c-.18 0-.472.067-.72.337-.247.27-.945.924-.945 2.252 0 1.327.968 2.61 1.103 2.79.135.18 1.905 2.91 4.615 4.08.645.278 1.148.444 1.54.568.646.205 1.234.176 1.7.107.518-.077 1.6-.653 1.83-1.283.225-.63.225-1.17.157-1.283-.067-.112-.247-.18-.517-.315ZM16.004 4C9.375 4 4 9.373 4 16c0 2.118.555 4.144 1.606 5.94L4 28l6.258-1.642A11.96 11.96 0 0 0 16.004 28C22.63 28 28 22.627 28 16S22.63 4 16.004 4Zm0 21.818a9.82 9.82 0 0 1-5.018-1.377l-.36-.214-3.71.974.99-3.62-.235-.373A9.78 9.78 0 0 1 6.182 16c0-5.418 4.404-9.818 9.822-9.818 5.417 0 9.818 4.4 9.818 9.818 0 5.42-4.4 9.818-9.818 9.818Z" />
        </svg>
        Message on WhatsApp
    </a>
    <p class="mt-3 text-xs text-slate-500">We reply within 24 hours with route and pricing options.</p>
</form>

<script>
    (function() {
        const inquiryForm = document.getElementById("inquiry-form");
        if (!inquiryForm) {
            return;
        }

        const fieldNames = [
            "full_name",
            "plan_name",
            "email",
            "country",
            "phone",
            "destination",
            "travel_date",
            "number_of_people",
            "description",
        ];

        const showFieldError = (field, message) => {
            const input = inquiryForm.querySelector(`[name="${field}"]`);
            const errorEl = inquiryForm.querySelector(`[data-error-for="${field}"]`);
            if (input) {
                input.classList.add("border-red-500", "focus:border-red-500", "focus:ring-red-100");
            }
            if (errorEl) {
                errorEl.textContent = message;
                errorEl.classList.remove("hidden");
            }
        };

        const clearFieldError = (field) => {
            const input = inquiryForm.querySelector(`[name="${field}"]`);
            const errorEl = inquiryForm.querySelector(`[data-error-for="${field}"]`);
            if (input) {
                input.classList.remove("border-red-500", "focus:border-red-500", "focus:ring-red-100");
            }
            if (errorEl) {
                errorEl.textContent = "";
                errorEl.classList.add("hidden");
            }
        };

        const clearAllErrors = () => {
            fieldNames.forEach((field) => clearFieldError(field));
        };

        const validateClient = (data) => {
            const errors = {};
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            const fullName = (data.full_name || "").trim();
            const email = (data.email || "").trim();
            const country = (data.country || "").trim();
            const phone = (data.phone || "").trim();
            const destination = (data.destination || "").trim();
            const travelDate = (data.travel_date || "").trim();
            const numberOfPeople = (data.number_of_people || "").trim();
            const description = (data.description || "").trim();
            const planName = (data.plan_name || "").trim();

            if (!fullName || fullName.length < 3) {
                errors.full_name = "Please enter full name (at least 3 characters).";
            }

            if (!planName || planName.length < 3) {
                errors.plan_name = "Please enter a plan name (at least 3 characters).";
            }

            if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                errors.email = "Please enter a valid email address.";
            }

            if (!country) {
                errors.country = "Please select a country.";
            }

            if (!phone || !/^[0-9+\-\s()]{7,20}$/.test(phone)) {
                errors.phone = "Please enter a valid phone number.";
            }

            if (!destination) {
                errors.destination = "Please select a destination.";
            }

            if (!travelDate) {
                errors.travel_date = "Please select a travel date.";
            } else {
                const selectedDate = new Date(travelDate);
                if (Number.isNaN(selectedDate.getTime()) || selectedDate < today) {
                    errors.travel_date = "Travel date must be today or a future date.";
                }
            }

            if (!numberOfPeople || !Number.isInteger(Number(numberOfPeople)) || Number(numberOfPeople) < 1) {
                errors.number_of_people = "Number of people must be at least 1.";
            }

            if (!description || description.length < 10) {
                errors.description = "Description must be at least 10 characters.";
            }

            return errors;
        };

        fieldNames.forEach((field) => {
            const input = inquiryForm.querySelector(`[name="${field}"]`);
            if (!input) {
                return;
            }

            const eventName = input.tagName === "SELECT" ? "change" : "input";
            input.addEventListener(eventName, () => clearFieldError(field));
        });

        inquiryForm.addEventListener("submit", async (event) => {
            event.preventDefault();
            clearAllErrors();
            const formData = new FormData(inquiryForm);
            const data = Object.fromEntries(formData.entries());
            console.log("Inquiry form data:", data);
            const submitButton = inquiryForm.querySelector('button[type="submit"]');
            const feedback = document.getElementById("inquiry-form-feedback");
            const originalText = submitButton ? submitButton.textContent : "";

            const clientErrors = validateClient(data);
            if (Object.keys(clientErrors).length > 0) {
                Object.entries(clientErrors).forEach(([field, message]) => showFieldError(field, message));
                if (feedback) {
                    feedback.textContent = "Please fix the highlighted fields and try again.";
                    feedback.classList.remove("hidden", "text-emerald-600");
                    feedback.classList.add("text-red-600");
                }
                return;
            }

            if (feedback) {
                feedback.classList.add("hidden");
                feedback.textContent = "";
            }

            if (submitButton) {
                submitButton.disabled = true;
                submitButton.textContent = "Sending...";
            }

            try {
                const response = await fetch(inquiryForm.action, {
                    method: "POST",
                    body: formData,
                    headers: {
                        Accept: "application/json"
                    }
                });
                const result = await response.json();

                if (!response.ok) {
                    if (response.status === 422 && result.errors) {
                        Object.entries(result.errors).forEach(([field, messages]) => {
                            showFieldError(field, Array.isArray(messages) ? messages[0] : messages);
                        });
                        throw new Error(result.message || "Validation failed.");
                    }
                    throw new Error(result.message || "Failed to submit inquiry.");
                }

                console.log("Inquiry submit response:", result);
                inquiryForm.reset();

                if (feedback) {
                    feedback.textContent = result.message || "Inquiry submitted successfully.";
                    feedback.classList.remove("hidden");
                    feedback.classList.remove("text-red-600");
                    feedback.classList.add("text-emerald-600");
                }
            } catch (error) {
                console.error("Inquiry submit failed:", error);

                if (feedback) {
                    feedback.textContent = error.message || "Something went wrong. Please try again.";
                    feedback.classList.remove("hidden");
                    feedback.classList.remove("text-emerald-600");
                    feedback.classList.add("text-red-600");
                }
            } finally {
                if (submitButton) {
                    submitButton.disabled = false;
                    submitButton.textContent = originalText || "Send Inquiry";
                }
            }
        });
    })();
</script>
