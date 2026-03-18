// --------------------------
// Imports
// --------------------------
import $ from 'jquery';
import axios from 'axios';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import 'bootstrap';
import { Modal } from 'bootstrap'; // For opening modals
import 'vuetify-pro-tiptap/style.css';
import { createIcons, icons } from 'lucide';

// --------------------------
// Assign globals
// --------------------------
window.$ = $;
window.jQuery = $;
window.Swiper = Swiper;
window.axios = axios;

// --------------------------
// CSRF setup for jQuery and Axios
// --------------------------
const token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': token.content } });
	window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// --------------------------
// Global AJAX function
// --------------------------
window.sendAjax = function (
	{ url, method = 'GET', data = {}, headers = {} },
	success = null,
	error = null,
	finallyCallback = null
) {
	axios({ url, method, data, headers })
		.then((response) => {
			if (typeof success === 'function') success(response.data);
		})
		.catch((err) => {
			const status = err?.response?.status;
			if (status === 401 || status === 419) {
				const redirectUrl = err?.response?.data?.redirect || '/admin/login';
				window.location.href = redirectUrl;
				return;
			}
			console.error('AJAX Error:', err);
			if (typeof error === 'function') error(err.response?.data || err.message);
		})
		.finally(() => {
			if (typeof finallyCallback === 'function') finallyCallback();
		});
};

// --------------------------
// DOM Ready
// --------------------------
$(document).ready(() => {
	console.log("DOM loaded, jQuery is working!");

	// Test button
	$('#jqueryTestBtn').on('click', () => console.log('Button clicked!'));

	// Lucide icons
	createIcons({ icons });

	// Swipers
	new Swiper('.mySwiper', {
		loop: true,
		effect: 'fade',
		autoplay: { delay: 4000, disableOnInteraction: false },
		pagination: { el: '.swiper-pagination', clickable: true },
	});

	new Swiper('#travel-packages', {
		slidesPerView: 5,
		spaceBetween: 20,
		autoplay: { delay: 2000, disableOnInteraction: false },
		loop: true,
		pagination: { el: '.travel-package-pagination', clickable: true },
		breakpoints: {
			0: { slidesPerView: 2 },
			576: { slidesPerView: 2 },
			768: { slidesPerView: 3 },
			992: { slidesPerView: 4 },
			1200: { slidesPerView: 4 }
		}
	});

	new Swiper('.reviewSwiper', {
		loop: true,
		spaceBetween: 20,
		slidesPerView: 1,
		pagination: { el: '.swiper-pagination', clickable: true },
		navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
		breakpoints: { 768: { slidesPerView: 2 }, 992: { slidesPerView: 3 } }
	});

	// --------------------------
	// Open inquiry modal
	// --------------------------
	// First, remove any previous click handlers
	$(document).off('click', '#inquirySubmitBtn').on('click', '#inquirySubmitBtn', function (e) {
		e.preventDefault();

		let isValid = true;

		// Reset errors
		$('#inquiryForm input, #inquiryForm textarea, #inquiryForm select').removeClass('is-invalid');

		// Get structured form data
		const formDataArray = $('#inquiryForm').serializeArray();
		const formDataObject = {};

		formDataArray.forEach(item => {
			formDataObject[item.name] = item.value.trim();

			const $field = $(`[name="${item.name}"]`);

			switch (item.name) {
				case 'fname':
				case 'lname':
					if (!item.value.trim()) {
						$field.addClass('is-invalid');
						isValid = false;
					}
					break;

				case 'email':
					let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
					if (!item.value.trim() || !emailRegex.test(item.value.trim())) {
						$field.addClass('is-invalid');
						isValid = false;
					}
					break;

				case 'mobile_no':
					let mobileRegex = /^[0-9]{7,15}$/;
					if (!item.value.trim() || !mobileRegex.test(item.value.trim())) {
						$field.addClass('is-invalid');
						isValid = false;
					}
					break;

				case 'country':
					if (!item.value.trim()) {
						$field.addClass('is-invalid');
						isValid = false;
					}
					break;

				case 'service_id':
				case 'category_id':
					if (!item.value.trim()) {
						$field.addClass('is-invalid');
						isValid = false;
					}
					break;

				case 'description':
					if (!item.value.trim() || item.value.trim().length < 10) {
						$field.addClass('is-invalid');
						isValid = false;
					}
					break;

				case 'number_of_people':
					if (!item.value.trim() || parseInt(item.value, 10) <= 0) {
						$field.addClass('is-invalid');
						isValid = false;
					}
					break;
			}
		});

		// Stop if invalid
		if (!isValid) {
			console.warn("Validation failed.");
			return;
		}

		// Submit button loading state
		const $btn = $("#inquirySubmitBtn");
		const originalText = $btn.html();
		$btn.prop("disabled", true).html(`Wait... <span class="spinner-border spinner-border-sm ms-2 text-white"></span>`);

		// Send Ajax
		sendAjax(
			{
				url: '/inquiry',
				method: 'POST',
				data: formDataObject,
				headers: { 'Content-Type': 'application/json' }
			},
			(response) => {
				$("#globalModal").find('.modal-content').empty().append(response.template);
				$btn.prop("disabled", false).html(originalText);
			},
			(error) => {
				console.error('Error submitting inquiry:', error);
				$btn.prop("disabled", false).html(originalText);
			}
		);
	});



	$(document).off('click', '.btnOpenModal').on('click', '.btnOpenModal', function (e) {
		e.preventDefault();
		const type = $(this).data('type'); // e.g. "featured-packages"
		const id = $(this).data('id');     // e.g. "1"

		if (!type || !id) {
			console.error('No type specified for modal!');
			return;
		}

		const modalEl = document.getElementById('globalModal');

		// 1️⃣ Dispose existing modal if open
		let modal = Modal.getInstance(modalEl);
		if (modal) {
			modal.hide();
			modal.dispose();
		}


		// 2️⃣ Fetch modal content via AJAX
		sendAjax(
			{ url: `/inquiry-form?type=${type}&id=${id}`, method: 'GET' },
			(responseHtml) => {
				// Replace modal body with fetched content
				const modalContent = modalEl.querySelector('.modal-content');
				modalContent.innerHTML = responseHtml;

				// 3️⃣ Create new modal instance
				modal = new Modal(modalEl);

				// 4️⃣ Show the modal
				modal.show();


			},
			(error) => {
				console.error('Failed to fetch modal content:', error);

			}
		);
	});



});
