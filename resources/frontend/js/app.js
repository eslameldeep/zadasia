import "@fortawesome/fontawesome-free/css/all.min.css"
import '../css/app.css';


import Swiper from 'swiper';

import { Navigation, Pagination ,Autoplay } from 'swiper/modules';

const heroSwiper = new Swiper('.hero-swiper', {
    modules: [Navigation, Pagination],
    loop: true,
    autoplay: {
        delay: 1000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: '.hero-next',
        prevEl: '.hero-prev',
    },
    pagination: {
        el: '.hero-pagination',
        type: 'fraction',
        renderFraction: function (currentClass, totalClass) {
            return (
                '<span class="' + currentClass + ' text-white text-[53px] font-bold"></span>' +
                ' / ' +
                '<span class="' + totalClass + ' text-[#81a5ac] text-[20px] font-semibold"></span>'
            );
        },
        formatFractionCurrent: function (number) {
            return number < 10 ? '0' + number : number;
        },
        formatFractionTotal: function (number) {
            return number < 10 ? '0' + number : number;
        }
    },
});




const categoriesSwiper = new Swiper(".categories-swiper", {
    modules: [Autoplay, Navigation],
    slidesPerView: 1,
    spaceBetween: 10,
    centeredSlides: true,
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
        pauseOnMouseEnter: false,
        stopOnLastSlide: false,
        waitForTransition: true

    },
    loop: false,
    navigation: {
        nextEl: '.categories-next',
        prevEl: '.categories-prev',
    },
    breakpoints: {
        640: { slidesPerView: 2, spaceBetween: 30 },
        768: { slidesPerView: 2, spaceBetween: 30 },
        1024: { slidesPerView: 3, spaceBetween: 30 },
        1280: { slidesPerView: 3, spaceBetween: 30 },
        1536: { slidesPerView: 4, spaceBetween: 30 },
    },
});






const productsSwiper = new Swiper(".products-swiper", {
    modules: [Autoplay, Navigation],
    slidesPerView: 1,
    spaceBetween: 10,
    centeredSlides: true,
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
        pauseOnMouseEnter: false,
        stopOnLastSlide: false,
        waitForTransition: true

    },
    loop: false,
    navigation: {
        nextEl: '.products-next',
        prevEl: '.products-prev',
    },
    breakpoints: {
        640: { slidesPerView: 2, spaceBetween: 30 },
        768: { slidesPerView: 2, spaceBetween: 30 },
        1024: { slidesPerView: 3, spaceBetween: 30 },
        1280: { slidesPerView: 3, spaceBetween: 30 },
        1536: { slidesPerView: 4, spaceBetween: 30 },
    },
});

