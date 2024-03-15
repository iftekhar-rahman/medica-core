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
      centeredSlides: true,
      loop: true,
      speed: 500,
      autoplay: false,
      slidesPerView: 1.5,
      spaceBetween: 0,
      // autoplay: {
      //     delay: 3000,
      // },
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
      breakpoints: {
  
          640: {
              slidesPerView: 2.5,
          },
          768: {
              slidesPerView: 2.75,
          },
          1080: {
              slidesPerView: 3.25,
          },
          1280: {
              slidesPerView: 3.75,
          },
      },
  });

    

    
  });
})(jQuery);
