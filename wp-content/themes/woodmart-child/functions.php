<?php
/**
 * Enqueue script and styles for child theme
 */
function woodmart_child_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'woodmart-style' ), woodmart_get_theme_info( 'Version' ) );

    wp_enqueue_script('cias_script',get_stylesheet_directory_uri() . '/js/script.js', array(), '20151215', true);
}
add_action( 'wp_enqueue_scripts', 'woodmart_child_enqueue_styles', 10010 );

//  skip cart
add_filter('woocommerce_add_to_cart_redirect', 'themeprefix_add_to_cart_redirect');
function themeprefix_add_to_cart_redirect() {
 global $woocommerce;
 $checkout_url = wc_get_checkout_url();
 return $checkout_url;
}

// booking product type
add_filter( 'product_type_selector', 'cias_add_custom_product_type' );
 
function cias_add_custom_product_type( $types ){
    $types[ 'custom' ] = 'Booking product';
    return $types;
}
 
// --------------------------
// #2 Add New Product Type Class
 
add_action( 'init', 'cias_create_custom_product_type' );
 
function cias_create_custom_product_type(){
    class WC_Product_Custom extends WC_Product {
      public function get_type() {
         return 'custom';
      }
    }
}
 
// --------------------------
// #3 Load New Product Type Class
 
add_filter( 'woocommerce_product_class', 'cias_woocommerce_product_class', 10, 2 );
 
function cias_woocommerce_product_class( $classname, $product_type ) {
    if ( $product_type == 'custom' ) { 
        $classname = 'WC_Product_Custom';
    }
    return $classname;
}

// remove base product price
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ); 