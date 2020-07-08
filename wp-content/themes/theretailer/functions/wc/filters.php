<?php

//-------------------------------------------------------------------
// Change breadcrumb defaults delimiter from '/' to '>'
//-------------------------------------------------------------------
add_filter( 'woocommerce_breadcrumb_defaults', 'theretailer_change_breadcrumb_delimiter' );
function theretailer_change_breadcrumb_delimiter( $defaults ) {
	$defaults['delimiter'] = '&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;';

	return $defaults;
}

//-------------------------------------------------------------------
// WooCommerce Update Number of Items in the cart
//-------------------------------------------------------------------
add_filter('woocommerce_add_to_cart_fragments', 'theretailer_refresh_minicart_1');
function theretailer_refresh_minicart_1($fragments) {
	global $woocommerce;

	ob_start();
    ?>

    <div class="overview">
        <?php echo WC()->cart->get_cart_total(); ?> <span class="minicart_items">/ <?php echo sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'theretailer' ), WC()->cart->get_cart_contents_count() ); ?></span>
    </div>

	<?php
	$fragments['.overview'] = ob_get_clean();

	return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'theretailer_refresh_minicart_2');
function theretailer_refresh_minicart_2($fragments) {
	global $woocommerce;

	ob_start();
    ?>

    <div class="gb_cart_contents_count"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></div>

	<?php
	$fragments['.gb_cart_contents_count'] = ob_get_clean();

	return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'theretailer_refresh_minicart_3');
function theretailer_refresh_minicart_3($fragments) {
	global $woocommerce;

	ob_start();
    ?>

    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="gbtr_little_shopping_bag_wrapper_mobiles"><span><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>

	<?php
	$fragments['.gbtr_little_shopping_bag_wrapper_mobiles'] = ob_get_clean();

	return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'theretailer_refresh_minicart_4');
function theretailer_refresh_minicart_4($fragments) {
	global $woocommerce;

	ob_start();
    ?>

    <span class="items_number"><?php echo WC()->cart->get_cart_contents_count(); ?></span>

	<?php
	$fragments['.items_number'] = ob_get_clean();

	return $fragments;
}

//-------------------------------------------------------------------
// WooCommerce Custom Out of Stock
//-------------------------------------------------------------------
add_filter( 'woocommerce_get_availability', 'theretailer_custom_get_availability', 1, 2);
function theretailer_custom_get_availability( $availability, $_product ) {
	if ( !$_product->is_in_stock() ) {
		$availability['availability'] = esc_html(GBT_Opt::getOption('out_of_stock_text'), 'theretailer');
	}

	return $availability;
}

//-------------------------------------------------------------------
// WooCommerce Custom Sale
//-------------------------------------------------------------------
add_filter('woocommerce_sale_flash', 'theretailer_custom_sale_flash', 10, 3);
function theretailer_custom_sale_flash($text, $post, $_product) {
	if ( !empty( GBT_Opt::getOption('sale_text') ) ) {
    	return '<span class="onsale">' . sprintf(esc_html__('%s', 'theretailer'), GBT_Opt::getOption('sale_text')) . '</span>';
	}
}

//-------------------------------------------------------------------
// Limit number of cross-sells
//-------------------------------------------------------------------
add_filter('woocommerce_cross_sells_total', 'cartCrossSellTotal');
function cartCrossSellTotal($total) {
	$total = '1';

	return $total;
}

//-------------------------------------------------------------------
// Show Woocommerce Cart Widget Everywhere
//-------------------------------------------------------------------
add_filter( 'woocommerce_widget_cart_is_hidden', function() {
    return false;
}, 10, 1 );

//-------------------------------------------------------------------
// Change WooCommerce Pagination arrows
//-------------------------------------------------------------------
add_filter( 'woocommerce_pagination_args', function() {
	$args['prev_text'] = '';
	$args['next_text'] = '';

	return $args;
} );

?>
