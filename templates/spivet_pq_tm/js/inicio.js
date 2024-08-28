(() => {
  "use strict";
    
    /**
     * Incializacion del slider swipper
     */
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


    // Button de tipos de oferta academica
    $(document).on("click", ".ofertaacademica__tipos li", function () {
        $(".ofertaacademica__tipos li").removeClass("active");
        $(this).addClass("active");
        $(this).removeData("id_categoria");
        var id_categoria = $(this).data("id_categoria");
        $(".ofertaacademica__modalidades").css("display", "none");
        $(".ofertaacademica__loading").css("display", "flex");
        setTimeout(() => {
        //console.log("Se muestra informacion");
        $(".ofertaacademica__loading").css("display", "none");
        $(".ofertaacademica__modalidades--" + id_categoria).fadeToggle();
        //$(".ofertaacademica__modalidades--"+id_categoria).removeAttr("style");
        }, 500);
    });
})();
