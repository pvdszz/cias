<?php

function theretailer_vendor_scripts() {

	if ( !TR_ELEMENTOR_IS_ACTIVE && GBT_Opt::getOption( 'progress_bar', false ) ) {
		wp_enqueue_script( 'nprogress', get_template_directory_uri() . '/inc/_vendor/nprogress/js/nprogress.js', array('jquery'), '0.1.6', TRUE );
		$nprogress_init = ' jQuery(document).ready(function($) {
	    	"use strict";

	    	NProgress.configure({ parent: ".progress-bar-wrapper" });
	    	NProgress.start();
	    	$(window).load(function(){
	    		NProgress.done();
	    		setTimeout(function(){
	    			$(".shop_top, .product_top, .category_header, .global_content_wrapper, .page_full_width").css("opacity", "1");
	    		},600);
	    	});
	    });';
		wp_add_inline_script( 'nprogress', $nprogress_init);
	}

	wp_enqueue_script( 'customSelect',  get_template_directory_uri() . '/inc/_vendor/customSelect/js/jquery.customSelect.min.js', 	array('jquery'), '0.3.0',  TRUE );
	wp_enqueue_script( 'fresco', 		get_template_directory_uri() . '/inc/_vendor/fresco/js/fresco.js', 							array('jquery'), '1.4.11', TRUE );
	wp_enqueue_script( 'swiper', 		get_template_directory_uri() . '/inc/_vendor/swiper/js/swiper.js', 							array('jquery'), '4.4.6',  TRUE );
	wp_enqueue_script( 'js-Offcanvas',  get_template_directory_uri() . '/inc/_vendor/offcanvas/js/js-offcanvas.js', 				array('jquery'), '1.2.9',  TRUE );
}
add_action( 'wp_enqueue_scripts', 'theretailer_vendor_scripts', 98 );

function theretailer_plugin_scripts() {

	if( TR_PRODUCT_BLOCKS_IS_ACTIVE ) {
		wp_enqueue_script( 'the-retailer-product-blocks',  get_template_directory_uri() . '/js/plugins/product-blocks.js', 	array('jquery'), NULL,  TRUE );
	}

	wp_localize_script( 'the-retailer-product-blocks', 'theretailer_options',
		array(
			'sticky_header' => GBT_Opt::getOption( 'sticky_header', true ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'theretailer_plugin_scripts', 98 );

function theretailer_scripts() {

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_script('the_retailer_scripts', get_template_directory_uri() . '/js/scripts-dist.js', array('jquery'), NULL, TRUE);

	wp_localize_script( 'the_retailer_scripts', 'theretailer_options',
		array(
			'sticky_header' 			=> GBT_Opt::getOption( 'sticky_header', true ),
			'related_products_number'	=> GBT_Opt::getOption( 'related_products_number', 4 ),
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theretailer_scripts', 99 );

?>
