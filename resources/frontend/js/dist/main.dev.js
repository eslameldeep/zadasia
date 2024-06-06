"use strict";

$('.plus-btn').click(function () {
  $('body').toggleClass('menu-open');
});
$('.menu-close').click(function () {
  $('body').toggleClass('menu-open');
});
var challengesSwiper = new Swiper(".challenges-solved-slider", {
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
    clickable: true
  }
});
var productsSwiper = new Swiper(".products-slider", {
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
    prevEl: ".swiper-button-prev"
  }
});
var partnersSwiper = new Swiper(".partners-slider", {
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
    clickable: true
  }
});
$('.collapse').hide();
$('.expand').click(function (event) {
  var expandDiv = this;
  var collapse_id = expandDiv.id.replace("expand", "collapse");
  var icon = $("#".concat(expandDiv.id)).find('.icon');
  $("#".concat(collapse_id)).toggle(500, function () {
    if ($("#".concat(collapse_id)).is(':visible')) {
      icon.html('<i class="bi bi-dash"></i> ');
    } else {
      icon.html('<i class="bi bi-plus"></i> ');
    }
  });
});