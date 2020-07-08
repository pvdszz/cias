jQuery(function($) {

	"use strict";

	$(window).on( 'load', function() {

		setTimeout(function(){
			if ($(window).outerWidth() > 1024) {
				$(window).stellar({
					horizontalScrolling: false,
				});
			}
		},500);
	});
});
