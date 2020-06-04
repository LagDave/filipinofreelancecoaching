AOS.init();
$(document).ready(function () {
  $(".projects-slider").slick({
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    adaptiveHeight: true,
    centerPadding: "60px",
    autoplay: true,

    dots: true,
    responsive: [
      {
        breakpoint: 980,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: true,
        },
      },
    ],
  });
});
