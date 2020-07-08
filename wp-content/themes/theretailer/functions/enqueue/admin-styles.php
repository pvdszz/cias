<?php

function the_retailer_admin_styles() {
    if ( is_admin() ) {

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

		wp_enqueue_style('the_retailer_admin_custom', get_template_directory_uri() .'/css/admin/admin-styles.css', false, NULL, 'all');
    }
}
add_action( 'admin_enqueue_scripts', 'the_retailer_admin_styles' );

?>
