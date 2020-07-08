<?php
add_action( 'wp_enqueue_scripts', 'theretailer_enqueue_styles', 99 );
function theretailer_enqueue_styles() {

    wp_enqueue_style( 'the_retailer_styles', get_template_directory_uri() .'/css/styles.css' );
    wp_enqueue_style( 'stylesheet', get_template_directory_uri() . '/style.css' );

    wp_enqueue_style( 'the-retailer-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'stylesheet' ),
        wp_get_theme()->get('Version')
    );

    // enqueue RTL styles
    if( is_rtl() ) {
    	wp_enqueue_style( 'the-retailer-child-rtl-styles',  get_template_directory_uri() . '/rtl.css', array( 'the_retailer_styles' ), wp_get_theme()->get('Version') );
    }\
    // js
    wp_enqueue_script('cias_script',get_stylesheet_directory_uri() . '/js/script.js', array(), '20151215', true);
}
//  skip cart
add_filter('woocommerce_add_to_cart_redirect', 'themeprefix_add_to_cart_redirect');
function themeprefix_add_to_cart_redirect() {
 global $woocommerce;
 $checkout_url = wc_get_checkout_url();
 return $checkout_url;
}


// booking tab
/**
 * Add a custom product tab.
 */
function cias_custom_product_tabs( $tabs) {

	$tabs['giftcard'] = array(
		'label'		=> __( 'Booking', 'woocommerce' ),
		'target'	=> 'giftcard_options',
		'class'		=> array( 'booking' ),
	);

	return $tabs;

}
add_filter( 'woocommerce_product_data_tabs', 'cias_custom_product_tabs' ); // WC 2.5 and below\


/**
 * Contents of the gift card options product tab.
 */
function cias_booking_options_product_tab_content() {

	global $post;
	
	// Note the 'id' attribute needs to match the 'target' parameter set above
	?><div id='giftcard_options' class='panel woocommerce_options_panel'><?php

		?><div class='options_group'><?php
			woocommerce_wp_text_input( array(
				'id'				=> 'price_for_adult',
				'label'				=> __( 'Giá cho một người lớn:', 'woocommerce' ),
				'desc_tip'			=> 'true',
				'type' 				=> 'number',
				'custom_attributes'	=> array(
					'min'	=> '1',
					'step'	=> '1',
				),
            ) );
            woocommerce_wp_text_input( array(
				'id'				=> 'price_for_child',
				'label'				=> __( 'Giá cho một trẻ em:', 'woocommerce' ),
				'desc_tip'			=> 'true',
				'type' 				=> 'number',
				'custom_attributes'	=> array(
					'min'	=> '1',
					'step'	=> '1',
				),
			) );

		?></div>

	</div><?php

}
add_filter( 'woocommerce_product_data_panels', 'cias_booking_options_product_tab_content' ); // WC 2.6 and up
/**
 * Save the custom fields.
 */
function save_giftcard_option_fields( $post_id ) {
	
	$allow_personal_message = isset( $_POST['_allow_personal_message'] ) ? 'yes' : 'no';
	update_post_meta( $post_id, '_allow_personal_message', $allow_personal_message );
	
	if ( isset( $_POST['price_for_adult'] ) ) :
		update_post_meta( $post_id, 'price_for_adult', absint( $_POST['price_for_adult'] ) );
    endif;
    if ( isset( $_POST['price_for_child'] ) ) :
		update_post_meta( $post_id, 'price_for_child', absint( $_POST['price_for_child'] ) );
	endif;
	
}
add_action( 'woocommerce_process_product_meta_simple', 'save_giftcard_option_fields'  );
add_action( 'woocommerce_process_product_meta_variable', 'save_giftcard_option_fields'  );




