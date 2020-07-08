jQuery(function($) {
	
	"use strict";

	$('.trigger-share-list').on('click',function(){
		
		$('.box-share-container').addClass('open');
		
		$("body").on('click',function(e) {
			if ( $('.box-share-container').hasClass('open') ) {
			
				if ( $(e.target).attr('class') == 'box-share-list-inner' ) {
					return;
				} else {
					$('.box-share-container').removeClass('open');
					$('body').unbind('click');
				}
			
			}
		});
		
		return false;
	})
});