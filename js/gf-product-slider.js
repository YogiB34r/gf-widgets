jQuery(document).ready(function($) {
  //don't start on wrong pages
  if (typeof gfSliderColumnCount !== "undefined") {
    startSlider('#tabs-0');
    hookSliderEvents();

    //@Important activate slider after tab is displayed in order to have access to proper width
    $("#tabs").tabs({
      activate: function(event, ui) {
        if (!$(ui.newPanel.selector).hasClass('slick-initialized')) {
          startSlider(ui.newPanel.selector);
        }
      }
    });
  }

  function startSlider(selector) {
    $(selector).slick({
      infinite: true,
      slidesToShow: gfSliderColumnCount,
      slidesToScroll: gfSliderColumnCount,
      arrows: false,
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
			]
    });
  }

  function hookSliderEvents() {
    $('.product-slider__control-prev').click(function(e) {
      e.preventDefault();
      $('.slider-inner').each(function(key, value) {
        if ($(value).attr('aria-hidden') == 'false') {
          $('#' + $(value).attr('id')).slick('slickPrev');
        }
      });
    });

    $('.product-slider__control-next').click(function(e) {
      e.preventDefault();
      $('.slider-inner').each(function(key, value) {
        if ($(value).attr('aria-hidden') == 'false') {
          $('#' + $(value).attr('id')).slick('slickNext');
        }
      });
    });
  }

});
