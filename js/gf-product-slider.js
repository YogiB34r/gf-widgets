jQuery(document).ready(function($) {


	//don't start on wrong pages

	if (typeof gfSliderColumnCount !== "undefined") {
		startSlider('#tabs-0');
        hookSliderEvents();

		//@Important activate slider after tab is displayed in order to have access to proper width
		$( "#tabs" ).tabs({
			activate: function (event, ui) {
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
            arrows: true,
            prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
            nextArrow: '<div class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>'
        });
    }

	function hookSliderEvents() {
		$('#tabs .product-slider__control-prev').click(function (e) {
  		    e.preventDefault();
		    $('.slider-inner').each(function(key, value) {
			    if ($(value).attr('aria-hidden') == 'false') {
				    $('#' + $(value).attr('id')).slick('slickPrev');
			    }
		  });
		});

		$('#tabs .product-slider__control-next').click(function (e) {
			e.preventDefault();
			$('.slider-inner').each(function(key, value) {
				if ($(value).attr('aria-hidden') == 'false') {
					$('#' + $(value).attr('id')).slick('slickNext');
				}
			});
		});
	}

	startSlider('.without-tabs');

    $('.without-tabs').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        arrows: false
    });

});