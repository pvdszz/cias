<?php

function the_retailer_vendor_styles() {

	if ( !TR_ELEMENTOR_IS_ACTIVE && GBT_Opt::getOption( 'progress_bar', false ) ) {
		wp_enqueue_style( 'nprogress', get_template_directory_uri() . '/inc/_vendor/nprogress/css/nprogress.css', array(), '0.1.6', 'all' );
	}

	wp_enqueue_style( 'fresco', 		 get_template_directory_uri() . '/inc/_vendor/fresco/css/fresco.css', 			array(), '1.4.11', 'all' );
	wp_enqueue_style( 'swiper', 		 get_template_directory_uri() . '/inc/_vendor/swiper/css/swiper.css', 			array(), '4.4.6',  'all' );
	wp_enqueue_style( 'js-Offcanvas', 	 get_template_directory_uri() . '/inc/_vendor/offcanvas/css/js-offcanvas.css',  array(), '1.2.9',  'all' );
}
add_action( 'wp_enqueue_scripts', 'the_retailer_vendor_styles', 98 );

function theretailer_plugin_styles() {

	if( TR_PRODUCT_BLOCKS_IS_ACTIVE ) {
		wp_enqueue_style( 'the-retailer-product-blocks', get_template_directory_uri() . '/css/plugins/product-blocks.css', array(), getbowtied_theme_version(), 'all' );
	}
	if( TR_WPBAKERY_IS_ACTIVE ) {
		wp_enqueue_style( 'the-retailer-wpbakery', get_template_directory_uri() . '/css/plugins/wpbakery.css', array(), getbowtied_theme_version(), 'all' );
	}
	if( TR_WISHLIST_IS_ACTIVE ) {
		wp_enqueue_style( 'the-retailer-wishlist', get_template_directory_uri() . '/css/plugins/wishlist.css', array(), getbowtied_theme_version(), 'all' );
	}
	if( TR_WPML_IS_ACTIVE ) {
		wp_enqueue_style( 'the-retailer-wpml', get_template_directory_uri() . '/css/plugins/wpml.css', array(), getbowtied_theme_version(), 'all' );
	}
	if( TR_WOO_SWATCHES_IS_ACTIVE ) {
		wp_enqueue_style( 'the-retailer-woo-swatches', get_template_directory_uri() . '/css/plugins/woo-swatches.css', array(), getbowtied_theme_version(), 'all' );
	}
}
add_action( 'wp_enqueue_scripts', 'theretailer_plugin_styles', 98 );

function the_retailer_styles() {

	// Enqueue Main Font
	if( 'google' === GBT_Opt::getOption( 'main_font_source', 'default' ) ) {
	    $main_font = GBT_Opt::getOption( 'google_gb_main_font', 'Roboto' );
	    $google_font_url = TheRetailer_Fonts::get_google_font_url( $main_font, GBT_Opt::getOption( 'font_face_display', 'swap' ) );
	    if ( $google_font_url ) {
	        wp_enqueue_style( 'the-retailer-google-main-font', $google_font_url, false, getbowtied_theme_version(), 'all' );
	    }
	}

	// Enqueue Main Font
	if( 'google' === GBT_Opt::getOption( 'secondary_font_source', 'default' ) ) {
	    $secondary_font = GBT_Opt::getOption( 'google_gb_secondary_font', 'Roboto' );
	    $google_font_url = TheRetailer_Fonts::get_google_font_url( $secondary_font, GBT_Opt::getOption( 'font_face_display', 'swap' ) );
	    if ( $google_font_url ) {
	        wp_enqueue_style( 'the-retailer-google-secondary-font', $google_font_url, false, getbowtied_theme_version(), 'all' );
	    }
	}

	wp_enqueue_style( 'the_retailer_styles', get_template_directory_uri() .'/css/styles.css', array(), getbowtied_theme_version(), 'all' );

	wp_enqueue_style('stylesheet', get_stylesheet_uri(), array(), getbowtied_theme_version(), 'all');
}
add_action( 'wp_enqueue_scripts', 'the_retailer_styles', 99 );

?>
