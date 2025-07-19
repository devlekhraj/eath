// Import core libraries
import './bootstrap';
import $ from 'jquery';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

// Lucide Icons
import { createIcons, icons } from 'lucide';

// Make libraries globally available (optional)
window.$ = $;
window.jQuery = $;
window.Swiper = Swiper;

// When DOM is fully loaded
document.addEventListener('DOMContentLoaded', () => {

  // ✅ jQuery test button
  $('#jqueryTestBtn').on('click', () => {
    console.log('jQuery is working!');
  });

  // ✅ Replace all <i data-lucide="..."> with SVGs
  createIcons({ icons });
});
