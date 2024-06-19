import 'tailwindcss-animate';

import Swiper from 'swiper/bundle';

// Script untuk interaksi sidebar (jika diperlukan)
$(document).ready(function() {
    // Toggle submenu
    $('.sidebar ul li ul').hide();
    $('.sidebar ul li a').click(function() {
        $(this).parent().find('ul').slideToggle();
        $(this).parent().toggleClass('active');
    });
});