jQuery(function($) {

	"use strict";

	$('.wc-products-slider').each(function() {

		var slides = 4;
		var medium_slides = 3;
		if( $(this).parents('.wpb_column').hasClass('vc_span6') || $(this).parents('.wpb_column').hasClass('vc_col-sm-6') ) {
			slides = 2;
			medium_slides = 2;
		}

		var myPostsSwiper = new Swiper($(this).find('.swiper-container'), {
			slidesPerView: slides,
			loop: false,
			spaceBetween: 40,
			breakpoints: {
				640: {
			      slidesPerView: 2,
			    },
			    959: {
			      slidesPerView: medium_slides,
			    }
			},
			navigation: {
			    nextEl: $(this).find('.slider-button-next'),
			    prevEl: $(this).find('.slider-button-prev'),
			},
			pagination: {
		        el: $(this).find('.swiper-pagination'),
		        dynamicBullets: true
		    },
		});

		var swiper__slidecount = myPostsSwiper.slides.length - 4;
        if (swiper__slidecount < 4) {
          	$(this).find('.slider-button-prev, .slider-button-next').remove();
          	$(this).find('.swiper-wrapper').addClass( "disabled" );
		  	$(this).find('.slider-pagination').addClass( "disabled" );
        }

	});

});
