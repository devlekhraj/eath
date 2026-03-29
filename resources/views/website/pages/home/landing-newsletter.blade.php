 <section class="planning-section py-60 sm:py-60">
     <div class="planning-inner max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
         <div class="relative overflow-hidden  ">

             <div class="relative grid gap-8 lg:grid-cols-[1.2fr_0.8fr] items-center">

                 <div>
                     <span class="inline-flex items-center gap-2 text-sm font-semibold text-sky-700">

                         Trek Planning Updates
                     </span>

                     <h2 class="mt-3 text-3xl sm:text-4xl font-semibold tracking-tight text-slate-900">
                         Get Himalaya trekking tips in your inbox
                     </h2>

                     <p class="mt-3 text-base leading-relaxed text-slate-600">
                         Monthly safety guidance, packing checklists, seasonal trail notes, and itinerary
                         ideas—made for trekking in Nepal.
                     </p>

                     <ul class="mt-6 grid gap-3 sm:grid-cols-2 text-sm text-slate-700">
                         <li class="flex items-start gap-2">
                             <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 text-emerald-600"
                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                 aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round"
                                     d="M9 12.75 11.25 15 15 9.75m6 2.25a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                             </svg>
                             Altitude & acclimatization tips
                         </li>
                         <li class="flex items-start gap-2">
                             <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 text-emerald-600"
                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                 aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round"
                                     d="M9 12.75 11.25 15 15 9.75m6 2.25a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                             </svg>
                             Gear lists & packing reminders
                         </li>
                         <li class="flex items-start gap-2">
                             <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 text-emerald-600"
                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                 aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round"
                                     d="M9 12.75 11.25 15 15 9.75m6 2.25a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                             </svg>
                             Best seasons & route notes
                         </li>
                         <li class="flex items-start gap-2">
                             <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 text-emerald-600"
                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                 aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round"
                                     d="M9 12.75 11.25 15 15 9.75m6 2.25a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                             </svg>
                             No spam—unsubscribe anytime
                         </li>
                     </ul>
                 </div>


                 <div id="newsletter-container"
                     class="relative rounded-2xl bg-white p-6 sm:p-7 shadow-sm border ring-slate-200">
                     <form method="POST" class="space-y-4 newsletter-form" id="formnewsletter">
                         @csrf
                         <div>
                             <label for="newsletter_email" class="sr-only">Email address</label>
                             <input id="newsletter_email" name="email" type="email" required
                                 placeholder="Enter your email"
                                 class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2" />
                         </div>

                         <button type="submit"
                             class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2">
                             <svg class="h-4 w-4 animate-spin text-white hidden" data-newsletter-spinner
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                 <circle cx="12" cy="12" r="10" class="opacity-25"></circle>
                                 <path class="opacity-75" d="M4 12a8 8 0 0 1 8-8" />
                             </svg>
                             <span data-newsletter-label>Subscribe</span>
                         </button>

                         <p class="text-xs text-slate-500 leading-relaxed hidden" data-newsletter-feedback></p>

                         <p class="text-xs text-slate-500 leading-relaxed">
                             By subscribing, you agree to receive email updates about trekking in Nepal. You can
                             unsubscribe anytime.
                         </p>
                     </form>

                 </div>
             </div>
         </div>
     </div>
 </section>
 <script>
     document.addEventListener("DOMContentLoaded", function() {
         const form = document.getElementById("formnewsletter");
         const button = form.querySelector("button[type='submit']");
         const spinner = form.querySelector("[data-newsletter-spinner]");
         const label = form.querySelector("[data-newsletter-label]");
         const feedback = form.querySelector("[data-newsletter-feedback]");

         form.addEventListener("submit", async function(e) {
             e.preventDefault();

             const formData = new FormData(form);

             // UI: loading state
             spinner.classList.remove("hidden");
             label.textContent = "Subscribing...";
             button.disabled = true;
             feedback.classList.add("hidden");

             try {
                 const response = await fetch("{{ route('newsletter.subscribe') }}", {
                     method: "POST",
                     headers: {
                         "X-CSRF-TOKEN": form.querySelector("input[name='_token']").value,
                         "Accept": "application/json"
                     },
                     body: formData
                 });

                 const data = await response.json();

                 // Success
                 // Success
                 if (response.ok) {
                     const container = document.getElementById("newsletter-container");

                     container.innerHTML = `
                        <div class="flex flex-col items-center justify-center text-center space-y-4 py-6">
                            
                            <div class="h-14 w-14 rounded-full bg-green-100 flex items-center justify-center">
                                <svg class="h-7 w-7 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>

                            <h3 class="text-lg font-semibold text-slate-900">
                                Thank you for subscribing!
                            </h3>

                            <p class="text-sm text-slate-500">
                                You will now receive updates about trekking in Nepal.
                            </p>

                        </div>
                    `;
                 } else {
                     throw data;
                 }

             } catch (error) {
                 // Error handling
                 let message = "Something went wrong. Please try again.";

                 if (error.errors && error.errors.email) {
                     message = error.errors.email[0];
                 } else if (error.message) {
                     message = error.message;
                 }

                 feedback.textContent = message;
                 feedback.classList.remove("hidden");
                 feedback.classList.remove("text-green-600");
                 feedback.classList.add("text-red-500");
             }

             // Reset UI
             spinner.classList.add("hidden");
             label.textContent = "Subscribe";
             button.disabled = false;
         });
     });
 </script>
