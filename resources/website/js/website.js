// Import core libraries
// import './bootstrap';

import $ from 'jquery';
import axios from 'axios';


// Lucide Icons
import { createIcons, icons } from 'lucide';

// Make libraries globally available (optional)
window.$ = $;
window.jQuery = $;
window.Swiper = Swiper;

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import 'bootstrap';
import 'vuetify-pro-tiptap/style.css'

// When DOM is fully loaded
document.addEventListener('DOMContentLoaded', () => {

	console.log("Test");
	// ✅ jQuery test button
	$('#jqueryTestBtn').on('click', () => {
		console.log('jQuery is working!');
	});

	// ✅ Replace all <i data-lucide="..."> with SVGs
	createIcons({ icons });

	new Swiper('.mySwiper', {
		loop: true,
		effect: 'fade',
		autoplay: {
			delay: 4000,
			disableOnInteraction: false,
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
	});

	// Travel Package Swiper (separate)
	new Swiper('#travel-packages', {
		slidesPerView: 5,
		spaceBetween: 20,
		loop: true,
		// autoplay: {
		// 	delay: 3000,
		// 	disableOnInteraction: false,
		// },
		pagination: {
			el: '.travel-package-pagination',
			clickable: true,
		},
		breakpoints: {
			0: { slidesPerView: 2 },
			576: { slidesPerView: 2 },
			768: { slidesPerView: 3 },
			992: { slidesPerView: 4 },
			1200: { slidesPerView: 4 },
		}
	});



	new Swiper('.reviewSwiper', {
		loop: true,
		spaceBetween: 20,
		slidesPerView: 1,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {
			768: { slidesPerView: 2 },
			992: { slidesPerView: 3 },
		}
	});

});
