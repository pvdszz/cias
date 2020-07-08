<?php

//-------------------------------------------------------------------
// WooCommerce Related Products
//-------------------------------------------------------------------
function woocommerce_output_related_products() {

	$args = array(
		'posts_per_page' => 12,
		'columns' => 12,
		'orderby' => 'rand'
	);

	woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
}

?>
