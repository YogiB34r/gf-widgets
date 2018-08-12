jQuery(document).ready(function($) {
    function startSlider(selector) {
        $(selector).slick({
            infinite: true,
            slidesToShow: gfSliderColumnCount,
            slidesToScroll: gfSliderColumnCount,
            arrows: true,
            prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
            nextArrow: '<div class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
        });
    }

    //activate first slider
    startSlider('#tabs-0');

    //@Important activate slider after tab is displayed in order to have access to proper width
    $( "#tabs" ).tabs({
        activate: function (event, ui) {
            if (!$(ui.newPanel.selector).hasClass('slick-initialized')) {
                startSlider(ui.newPanel.selector);
            }
        }
    });


  $('.product-slider__control-prev').click(function (e) {
      e.preventDefault();
      $('.slider-inner').each(function(key, value) {
          if ($(value).attr('aria-hidden') == 'false') {
            $('#' + $(value).attr('id')).slick('slickPrev');
          }
      });
  });

  $('.product-slider__control-next').click(function (e) {
      e.preventDefault();
      $('.slider-inner').each(function(key, value) {
          if ($(value).attr('aria-hidden') == 'false') {
              $('#' + $(value).attr('id')).slick('slickNext');
          }
      });
  });

});