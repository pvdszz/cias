jQuery(function($) {

	"use strict";

    //show mobile footer
	$('.getbowtied-icon-more-retailer').on( 'click', function() {

		var trigger = $(this).parent();

		trigger.fadeOut('1000',function(){
			trigger.remove();
			$('.gbtr_widgets_footer_wrapper .gbtr_light_footer_wrapper, .gbtr_widgets_footer_wrapper .gbtr_dark_footer_wrapper').fadeIn();
		});
	});
});
