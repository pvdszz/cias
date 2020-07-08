jQuery(function($) {

	"use strict";

    $('.shop_offcanvas_button').on( 'click', function() {
		$('.page_sidebar').toggleClass('open');
	});

	/* button show */
	$('.product_item').on({
		mouseenter: function() {
			$(this).find('.product_button').fadeIn(100, function() {
				// Animation complete.
			});
		},
		mouseleave: function(){
			$(this).find('.product_button').fadeOut(100, function() {
				// Animation complete.
			});
		},
    });
});
