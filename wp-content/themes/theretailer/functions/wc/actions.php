<?php

//-------------------------------------------------------------------
// Archive Products per Row and Page Limits
//-------------------------------------------------------------------
add_action( 'after_setup_theme', 'getbowtied_woocommerce_support' );
function getbowtied_woocommerce_support() {

	add_theme_support( 'woocommerce', array(

    // Product grid theme settings
    'product_grid'        => array(
        'default_rows'    => get_option('woocommerce_catalog_rows', 5),
        'min_rows'        => 2,
        'max_rows'        => '',

        'default_columns' => 4,
        'min_columns'     => 2,
        'max_columns'     => 5,

    	),
	) );
}

//-------------------------------------------------------------------
// Fix shop swatches position
//-------------------------------------------------------------------
if( TR_WOO_SWATCHES_IS_ACTIVE ) {
	add_action( 'after_setup_theme', 'theretailer_woo_swatches_display_fix' );
	function theretailer_woo_swatches_display_fix() {
		if( '03' == get_option( 'woocommerce_shop_swatches_display', '01' ) ) {
			update_option( 'woocommerce_shop_swatches_display', '01' );
		}
	}
}

?>
