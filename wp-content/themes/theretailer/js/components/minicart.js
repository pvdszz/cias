jQuery(function($) {

	"use strict";

    // open/close minicart on header icon hover
	var hoverIn = null;
	var hoverOut = null;
	$(".gbtr_header_wrapper .gbtr_little_shopping_bag_wrapper, .gbtr_header_wrapper .shopping_bag_centered_style").on({
		mouseenter: function(e) {
			show_minicart(e);
		},
		touchstart: function(e) {
			show_minicart(e);
		},
	});

	$('.gbtr_header_wrapper .gbtr_little_shopping_bag_wrapper, .gbtr_header_wrapper .shopping_bag_centered_style, .gbtr_minicart_wrapper').on({
		mouseenter: function(e) {
			if (hoverOut) {
	            window.clearTimeout(hoverOut);
	            hoverOut = null;
	        }
		},
		mouseleave: function(e) {
			hide_minicart(e);
		},
		touchstart: function(e) {
			if (hoverOut) {
	            window.clearTimeout(hoverOut);
	            hoverOut = null;
	        }
		},
		touchend: function(e) {
			hide_minicart(e);
		},
	});

	function show_minicart(e) {
		if ( $(window).width() >= 960 ) {

			minicart_position();

			if( !($('.gbtr_minicart_wrapper').hasClass('open')) && !hoverIn ) {

				hoverIn = window.setTimeout(function() {
	                hoverIn = null;

					if ( $(window).width() >= 960 ) {

						e.preventDefault();
						$('.gbtr_minicart_wrapper').addClass('open');
						e.stopPropagation();

					} else {
						e.stopPropagation();
					}
				}, 200);
			}
		}
	}

	function hide_minicart(e) {
        if( !hoverOut ) {

        	hoverOut = window.setTimeout(function() {
                hoverOut = null;

                if ( ($(window).width() >= 960) && ($('.gbtr_minicart_wrapper').hasClass('open')) ) {

					$('.gbtr_minicart_wrapper').removeClass('open');

				}
           }, 200);
        }

        if (hoverIn) {
            window.clearTimeout(hoverIn);
            hoverIn = null;
        }
    }

    // calculate minicart top position
    function minicart_position() {
	    var minicart_position = 0;

	    if( $('.gbtr_header_wrapper').hasClass('centered_header') && !$('.gbtr_header_wrapper').hasClass('sticky') ) {
	    	minicart_position = $('.shopping_bag_centered_style_wrapper').outerHeight(true) + 6;
	    } else {
	    	minicart_position = $('.gbtr_little_shopping_bag_wrapper').position().top + $('.gbtr_little_shopping_bag_wrapper').outerHeight(true) - 1;
	    }

	    $('.gbtr_minicart_wrapper').css('top',  minicart_position + 'px');
	}

});
