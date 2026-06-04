document.addEventListener("DOMContentLoaded", function () {
  const carousel = document.querySelector(".hero-carousel");

  if (!carousel || typeof Swiper === "undefined") {
    return;
  }

  new Swiper(carousel, {
    loop: true,

    autoplay: {
      delay: 7000,
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
  });
});
