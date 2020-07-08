<?php

include_once( get_template_directory() . '/inc/custom-styles/icons/class-icons.php' );

// Frontend Styles
add_action( 'wp_enqueue_scripts', 'the_retailer_custom_styles', 100 );
function the_retailer_custom_styles() {

	$path = get_template_directory() . '/inc/custom-styles/frontend/';

	$custom_style = '';

	$custom_style .= TheRetailer_Fonts::load_default_fonts( array( 'Radnika Next Alt', 'HK Nova' ) );

    include_once( $path . 'global.css.php' );
	include_once( $path . 'fonts.css.php' );
    include_once( $path . 'base-font.css.php' );
    include_once( $path . 'accent-color.css.php' );
    include_once( $path . 'primary-color.css.php' );
    include_once( $path . 'header-colors.css.php' );
    include_once( $path . 'topbar.css.php' );
    include_once( $path . 'header.css.php' );
    include_once( $path . 'footer.css.php' );
    include_once( $path . 'icons.css.php' );
	include_once( $path . 'gutenberg.css.php' );

    if( TR_WOOCOMMERCE_IS_ACTIVE ) {
        include_once( $path . 'woocommerce.css.php' );
    }

	$custom_style = theretailer_compress_styles($custom_style);

	wp_add_inline_style( 'stylesheet', $custom_style );
}

// Backend Styles
add_action( 'admin_enqueue_scripts', 'the_retailer_custom_admin_styles' );
function the_retailer_custom_admin_styles() {

	$path = get_template_directory() . '/inc/custom-styles/backend/';

	wp_enqueue_style('theme-fonts', get_template_directory_uri() . '/inc/fonts/theme-fonts/style.css', array(), '1.0', 'all' );

	$current_screen = get_current_screen();
	if ( method_exists($current_screen, 'is_block_editor') && $current_screen->is_block_editor() ) {

		$custom_style = '';

		include_once( $path . 'gutenberg.css.php' );

		$custom_style = theretailer_compress_styles($custom_style);

		wp_add_inline_style( 'the_retailer_admin_custom', $custom_style );
	}
}

/**
 * Compress custom styles
 */
function theretailer_compress_styles( $minify ) {
	$minify = preg_replace('/\/\*((?!\*\/).)*\*\//','',$minify); // negative look ahead
	$minify = preg_replace('/\s{2,}/',' ',$minify);
	$minify = preg_replace('/\s*([:;{}])\s*/','$1',$minify);
	$minify = preg_replace('/;}/','}',$minify);

	return $minify;
}

?>
