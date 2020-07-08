jQuery(function($) {

	"use strict";

    function product_gallery() {

		var thumbnails = $('.woocommerce-product-gallery .flex-control-nav');
		if (thumbnails.length && !thumbnails.closest('.swiper-container').length) {
			thumbnails.addClass('swiper-wrapper');
			thumbnails.find('li').addClass('swiper-slide');
			thumbnails.wrap('<div class="swiper-container gallery-thumbnails"></div>');
			var productThumbnails = new Swiper('.gallery-thumbnails.swiper-container', {
				slidesPerView: 4,
				loop: false,
			});
		}
	}

	product_gallery();

	$(document).ajaxStop(function(){
		product_gallery();
	});

	if ( $(window).width() >= 1024) {
		$('.woocommerce-product-gallery__image').on( 'click', function() {
			$('.woocommerce-product-gallery__trigger').trigger('click');
		});
	}
});
