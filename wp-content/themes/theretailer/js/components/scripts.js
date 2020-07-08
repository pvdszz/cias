jQuery(function($) {

	"use strict";

	$(document).trigger("enhance");

	$('p').filter(function() {
		return $.trim($(this).text()) === '' && $(this).children().length === 0;
	}).remove();

	//wishlist
	$('.add_to_wishlist').on('click',function(){
		$(this).parents('.yith-wcwl-add-button').addClass('show_overlay');
	})

	$('.single_add_to_wishlist').removeClass('button');

	$('.page_sidebar.page_sidebar_horizontal > br').remove();
});
