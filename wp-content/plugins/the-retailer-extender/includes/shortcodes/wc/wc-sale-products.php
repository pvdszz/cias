<?php

// [custom_on_sale_products]
function tr_ext_shortcode_custom_on_sale_products($atts, $content = null) {
	global $woocommerce;

	wp_enqueue_style('swiper');
    wp_enqueue_script('swiper');

	wp_enqueue_script('theretailer-wc-products-slider-script');

	extract(shortcode_atts(array(
		"title" => '',
		'per_page'  => '12',
        'orderby' => 'date',
        'order' => 'desc'
	), $atts));

	ob_start();

	$product_ids_on_sale = wc_get_product_ids_on_sale();
	$product_ids_on_sale[] = 0;

	$meta_query = $woocommerce->query->get_meta_query();

	$args = array(
		'posts_per_page' 	=> $per_page,
		'no_found_rows' => 1,
		'post_status' 	=> 'publish',
		'post_type' 	=> 'product',
		'orderby' 		=> $orderby,
		'order' 		=> $order,
		'meta_query' 	=> $meta_query,
		'post__in'		=> $product_ids_on_sale
	);

    $products = new WP_Query( $args );

	tr_products_slider( 'on-sale-products', $products, $title );

	wp_reset_postdata();
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("custom_on_sale_products", "tr_ext_shortcode_custom_on_sale_products");
