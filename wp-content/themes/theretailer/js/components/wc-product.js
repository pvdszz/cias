jQuery(function($) {

	"use strict";

    //scroll on reviews tab
	$('.woocommerce-review-link').off('click').on( 'click', function() {

		$('.tabs li a').each(function(){
			if ($(this).attr('href')=='#tab-reviews') {
				$(this).trigger('click');
			}
		});

		var elem_on_screen_height = $('.gbtr_header_wrapper').outerHeight();

		if ( $('#wpadminbar').length > 0 ) {
			elem_on_screen_height += $('#wpadminbar').outerHeight();
		}

		var tab_reviews_topPos = $('#tab-reviews').offset().top - elem_on_screen_height;

		console.log(elem_on_screen_height);

		$('html, body').animate({
            scrollTop: tab_reviews_topPos
        }, 1000);

		return false;
	});

    //visible tab always relative
	$('.panel').each(function(){

		var that = $(this);

		if ( that.is(':visible') ) {
			that.addClass('current');
		}
	});

    //woocommerce tabs
	$('.woocommerce-tabs .panel:first-child').addClass('current');
	$('.woocommerce-tabs ul.tabs li a').off('click').on( 'click', function() {
		var that = $(this);
		var currentPanel = that.attr('href');

		that.parent().siblings().removeClass('active').end().addClass('active');

		$('.woocommerce-tabs').find(currentPanel).siblings().filter(':visible').fadeOut(500,function(){
			$('.woocommerce-tabs').find(currentPanel).siblings().removeClass('current');
			$('.woocommerce-tabs').find(currentPanel).addClass('current').fadeIn(500);
		})

		return false;
	});
});
