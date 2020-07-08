jQuery(function($) {

	"use strict";

	$('.products_slider').each(function() {

		var slides = 4;
		var medium_slides = 3;
		if( theretailer_options.related_products_number < 4  ) {
			slides = theretailer_options.related_products_number;
		}
		if( theretailer_options.related_products_number < 3  ) {
			medium_slides = theretailer_options.related_products_number;
		}

		if( $(this).parents('.product').hasClass('product-layout-2') ) {
			slides = 3;
			medium_slides = 3;
			if( theretailer_options.related_products_number < 3  ) {
				slides = theretailer_options.related_products_number;
				medium_slides = theretailer_options.related_products_number;
			}
		}

		var myPostsSwiper = new Swiper($(this).find('.swiper-container'), {
			slidesPerView: slides,
			loop: false,
			centerInsufficientSlides: true,
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

		var total_slides = slides;
		if( $(window).innerWidth() <= 640 ) {
			total_slides = 2;
		} else if( $(window).innerWidth() > 641 && $(window).innerWidth() <= 959 ) {
			total_slides = medium_slides;
		}

		if ( $(this).find('.swiper-slide').length <= total_slides ) {
          	$(this).find('.slider-button-prev, .slider-button-next').remove();
          	$(this).find('.swiper-wrapper').addClass( "disabled" );
		  	$(this).find('.swiper-pagination').addClass( "disabled" );
        }
	});

});
