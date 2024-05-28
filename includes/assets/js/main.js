(function ($) {
  jQuery(document).ready(function () {
    
    
    var mySwiper = new Swiper(".testimonials", {
      slidesPerView: 2,
      spaceBetween: 30, // Distance between slides in px.
      loop: false,
      centeredSlides: false,
      autoplay: false,
      // autoplay: {
      //   delay: 3000,
      // },
      // navigation: {
      //   nextEl: ".swiper-button-next",
      //   prevEl: ".swiper-button-prev",
      // },
      fadeEffect: {
        crossFade: true,
      },
      breakpoints: {
        1024: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 1,
          spaceBetween: 15,
        },
        0: {
          slidesPerView: 1,
          spaceBetween: 0,
        },
      },
    });

    const swiper = new Swiper('.gallery', {
      centeredSlides: false,
      loop: false,
      speed: 500,
      slidesPerView: 8,
      spaceBetween: 15,
      autoplay: true,
      autoplay: {
          delay: 3000,
      },
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        1624: {
          slidesPerView: 8,
        },
        1324: {
          slidesPerView: 6,
        },
        1024: {
          slidesPerView: 5,
        },
        768: {
          slidesPerView: 4,
        },
        0: {
          slidesPerView: 2,
        },
      },
  });

    

    
  });
})(jQuery);
