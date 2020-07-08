jQuery(document).ready(function($) {	
			
		$(".featured_products_slider .products_slider_item").mouseenter(function(){
			
			var that = $(this);
			
			that.find('.products_slider_infos').stop().fadeTo(100, 0);
			that.find('.products_slider_images img').stop().fadeTo(100, 0.1, function() { 
				that.find('.products_slider_infos').stop().fadeTo(200, 1);
			});

		}).mouseleave(function(){
			$(this).find('.products_slider_images img').stop().fadeTo(100, 1);
			$(this).find('.products_slider_infos').stop().fadeTo(100, 0);
		});


	$('.featured_products_slider.swiper-container').each(function() {

		var myPostsSwiper = new Swiper($(this), {
			slidesPerView: 4,
			loop: false,
			breakpoints: {
				640: {
			      slidesPerView: 1,
			    },
			    720: {
			      slidesPerView: 2,
			    },
			    959: {
			      slidesPerView: 3,
			    }
			},
			navigation: {
			    nextEl: $(this).find('.swiper-button-next'),
			    prevEl: $(this).find('.swiper-button-prev'),
			},
		});
	});

});	