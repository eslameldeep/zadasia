import $ from 'jquery'; 


import * as bootstrap from 'bootstrap'

import {Swiper} from 'swiper/bundle';
import '../scss/main.scss' ;
import WOW from 'wow.js'
import select2 from 'select2';

window.$ = $ ;
select2();
const wow = new WOW({
  boxClass: 'wow',
  animateClass: 'animated',
  offset: 0,
  live: true
});

wow.init();

$('.plus-btn').click(function () {
    $('body').toggleClass('menu-open');  
}) ;

$('.menu-close').click(function () {
    $('body').toggleClass('menu-open');  
});


let challengesSwiper = new Swiper(".challenges-solved-slider", {
    slidesPerView: 3,
    spaceBetween: 30,
    breakpoints: {
        // when window width is >= 320px
        0: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        // when window width is >= 480px
        768: {
            slidesPerView: 1,
            spaceBetween: 30
        },
        // when window width is >= 640px
        992: {
            slidesPerView: 2,
            spaceBetween: 40
        },
        1200: {
            slidesPerView: 3,
            spaceBetween: 40
        }
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

let productsSwiper = new Swiper(".products-slider", {
    slidesPerView: 'auto',
    spaceBetween: 30,
    // breakpoints: {
    //     0: {
    //         slidesPerView: 1,
    //         spaceBetween: 20
    //     },
    //     // when window width is >= 480px
    //     768: {
    //         slidesPerView: 1,
    //         spaceBetween: 30
    //     },
    //     // when window width is >= 640px
    //     992: {
    //         slidesPerView: 2,
    //         spaceBetween: 40
    //     },
    //     1200: {
    //         slidesPerView: 3,
    //         spaceBetween: 40
    //     }
    // },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});


let partnersSwiper = new Swiper(".partners-slider", {
    slidesPerView: 3,
    spaceBetween: 30,
    breakpoints: {
        // when window width is >= 320px
        0: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        // when window width is >= 480px
        768: {
            slidesPerView: 3,
            spaceBetween: 30
        },
        // when window width is >= 640px
        992: {
            slidesPerView: 4,
            spaceBetween: 40
        },
        1200: {
            slidesPerView: 5,
            spaceBetween: 40
        }
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});


var swiper = new Swiper(".objectivesSwiper", {
    autoplay: {
        delay: 2000,
        pauseOnMouseEnter : true , 
        reverseDirection : true ,
      },
    breakpoints: {
        // when window width is >= 320px
        0: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        // when window width is >= 480px
        768: {
            slidesPerView: 2,
            spaceBetween: 40
        },
        // when window width is >= 640px
        992: {
            slidesPerView: 2,
            spaceBetween: 40
        },
        1200: {
            slidesPerView: 3,
            spaceBetween: 30
        },
        1370: {
            slidesPerView: 3,
            spaceBetween: 30
        }
    },

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
  });

$('.collapse').hide();

$('.expand').click(function (event) {
  let expandDiv = this ; 
   let collapse_id =  expandDiv.id.replace("expand", "collapse") ;
   let icon = $(`#${expandDiv.id}`).find('.icon') ;
   $(`#${collapse_id}`).toggle(500 , function () {
    if($(`#${collapse_id}`).is(':visible')){
        icon.html('<i class="bi bi-dash"></i> ');
     }else{
        icon.html('<i class="bi bi-plus"></i> ');
    }
   }) ;
  
});



