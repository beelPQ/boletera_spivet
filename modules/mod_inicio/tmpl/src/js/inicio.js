(() => {
    "use strict";

      /**
       * Inicializa el plugin de swiper slider Alianzas
       */
      const initSwiperAlianza = () => {
          setTimeout(() => {
              let swiper = new Swiper(".mySwiper", {
                  cssMode: true,
                  lazy: true,
                  spaceBetween: 10,
                  autoplay: {
                  delay: 2500,
                  disableOnInteraction: false,
                  },
                  pagination: {
                  el: ".swiper-pagination",
                  clickable: true,
                  },
                  navigation: {
                  nextEl: ".swiper-button-next",
                  prevEl: ".swiper-button-prev",
                  },
                  breakpoints: {
                  640: {
                      slidesPerView: 2,
                      spaceBetween: 20,
                  },
                  768: {
                      slidesPerView: 3,
                      spaceBetween: 40,
                  },
                  1024: {
                      slidesPerView: 5,
                      spaceBetween: 50,
                  },
                  },
              });
          }, 500);
      }

      /**
       * Incializacion del slider swipper
       */
      document.addEventListener("DOMContentLoaded", () => {

          initSwiperAlianza();
          const content = document.querySelector(`.content-alianzas`);
          /*setTimeout(() => {
              if(document.querySelector(`.spinner`)){
                  document.querySelector(`.spinner`).style.display = "none";
              }
          }, 1000);*/

      })


  })();
