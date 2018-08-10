jQuery(document).ready(function($) {


  $('.slider-inner').slick({
    infinite: true,
    slidesToShow: 6,
    slidesToScroll: 6,
    arrows: true,
    prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
    nextArrow: '<div class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
  });

  $('.product-slider__control-prev').click(function () {
    var currentSlider = $(this).parent().parent().closest('.slider-inner').slick("slickPrev");
    currentSlider.slick("slickPrev");
  });

  $('.product-slider__control-next').click(function () {
    var currentSlider = $(this).parent().parent().closest('.slider-inner').slick("slickNext");
    currentSlider.slick("slickNext");
  });
});
