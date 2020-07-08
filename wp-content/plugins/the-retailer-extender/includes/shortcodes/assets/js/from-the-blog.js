jQuery(function($) {
	
	"use strict";

	$('.from-the-blog-wrapper.swiper-container').each(function() {

		var myPostsSwiper = new Swiper($(this), {
			slidesPerView: 2,
			loop: true,
			spaceBetween: 50,
			breakpoints: {
				640: {
			      slidesPerView: 1,
			      spaceBetween: 0,
			    },
			    959: {
			    	spaceBetween: 30,
			    }
			},
			navigation: {
			    nextEl: '.big_arrow_right',
			    prevEl: '.big_arrow_left',
			},
		});
	});

});