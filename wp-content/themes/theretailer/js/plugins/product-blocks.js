jQuery(function($) {

	"use strict";

    $('.gbt_18_snap_look_book').each(function() {

		if( $(this).index() == 0 ) {

			var windowHeight = $(window).height();
			var offsetTop = $(this).offset().top;
			var fullHeight = 100-offsetTop/(windowHeight/100);

			if( windowHeight && fullHeight ) {
				$(this).find('.gbt_18_hero_look_book_item').css('min-height', fullHeight+"vh");
				$(this).find('.gbt_18_hero_look_book_item').css('max-height', fullHeight+"vh");
			}
		} else {
            $(this).find('.gbt_18_hero_look_book_item').css('min-height', '90vh');
            $(this).find('.gbt_18_hero_look_book_item').css('max-height', '90vh');
        }
	});

    $('.gbt_18_default_slider').each(function() {

		if( $(this).index() == 0 ) {

			var windowHeight = $(window).height();
			var offsetTop = $(this).offset().top;
			var fullHeight = 100-offsetTop/(windowHeight/100);

			if( windowHeight && fullHeight ) {
				$(this).css('min-height', fullHeight+"vh");
				$(this).css('max-height', fullHeight+"vh");
			}
		} else {
            $(this).css('min-height', '90vh');
            $(this).css('max-height', '90vh');
        }
	});

	if( theretailer_options.sticky_header ) {

		$(".gbt_18_pagination a").off();
		$('.gbt_18_scroll_down_button').off();

		$(".gbt_18_pagination a").off().on("click",function(e) {
			e.preventDefault();
			let section = $(this).attr('href').substr(1);
			$('html, body').animate({
				scrollTop: $('.gbt_18_look_book_item[data-section-name="'+section+'"]').offset().top - 115
			}, 500);
		});

		$('.gbt_18_scroll_down_button').on('click',function(e){
			if ($('.gbt_18_look_book_item[data-section-name="1"]').length) {
				setTimeout( function() {
					var offset = $('.gbt_18_look_book_item[data-section-name="1"]').offset().top - $('.gbtr_header_wrapper').outerHeight() - 115;
					$('html, body').animate({
						scrollTop: offset
					}, 500);
				}, 100);
			}
		});
	}

});
