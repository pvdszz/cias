jQuery(function($) {

	"use strict";

	$('.gbt_18_tr_slider_container').each(function() {

		var autoplay = $(this).attr('data-autoplay');
		if ($.isNumeric(autoplay)) {
			autoplay = autoplay * 1000;
		} else {
			autoplay = 10000;
		}

		var mySwiper = new Swiper ($(this), {

			// Optional parameters
		    direction: 'horizontal',
		    loop: true,
		    grabCursor: true,
			preventClicks: true,
			preventClicksPropagation: true,
			autoplay: {
			    delay: autoplay
		  	},
			speed: 600,
			effect: 'slide',
			parallax: true,
		    // Pagination
		    pagination: {
			    el: $(this).find('.gbt_18_tr_slider_pagination'),
				dynamicBullets: true
			},
		    // Navigation
		    navigation: {
			    nextEl: $(this).find('.swiper-button-next'),
			    prevEl: $(this).find('.swiper-button-prev'),
			},
		});

		if( $(this).hasClass('full_height') ) {

			if( $(this)[0] == $('.content_wrapper').children().first()[0] || $(this)[0] == $('.entry-content').children().first()[0] ) {

				var windowHeight = $(window).height();
				var offsetTop = $(this).offset().top;
				var fullHeight = 100-offsetTop/(windowHeight/100);

				if( windowHeight && fullHeight ) {
					$(this).css('max-height', fullHeight+"vh");
					$(this).css('min-height', fullHeight+"vh");
				}
			}
		}

	});
});
