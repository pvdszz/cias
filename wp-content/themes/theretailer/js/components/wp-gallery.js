jQuery(function($) {

	"use strict";

    $(".wp-block-gallery").each(function() {
		$(this).attr( 'id', 'gallery-' + Math.random() );
		$(this).find('.blocks-gallery-item figure a').addClass('fresco');
	});

	$(".wp-block-image figure a").addClass('fresco');

	$(".gallery, .wp-block-gallery").each(function() {
		$(this).find('.fresco').attr('data-fresco-group', $(this).attr('id'));
	});
});
