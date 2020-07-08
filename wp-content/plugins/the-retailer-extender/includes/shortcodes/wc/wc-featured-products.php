<?php

// [custom_featured_products]
function tr_ext_shortcode_custom_featured_products($atts, $content = null) {

	wp_enqueue_style('swiper');
    wp_enqueue_script('swiper');

	wp_enqueue_script('theretailer-wc-products-slider-script');

	extract(shortcode_atts(array(
		'title'		=> '',
		'per_page'  => '12',
        'orderby' 	=> 'date',
        'order' 	=> 'desc'
	), $atts));

	ob_start();

	$atts = shortcode_atts( array(
		'per_page' => '12',
		'columns'  => '4',
		'orderby'  => 'date',
		'order'    => 'desc',
		'category' => '',  // Slugs
		'operator' => 'IN', // Possible values are 'IN', 'NOT IN', 'AND'.
	), $atts, 'featured_products' );

	$meta_query  = WC()->query->get_meta_query();
	$tax_query   = WC()->query->get_tax_query();
	$tax_query[] = array(
		'taxonomy' => 'product_visibility',
		'field'    => 'name',
		'terms'    => 'featured',
		'operator' => 'IN',
	);

	$query_args = array(
		'post_type'           => 'product',
		'post_status'         => 'publish',
		'ignore_sticky_posts' => 1,
		'posts_per_page'      => $per_page,
		'orderby'             => $orderby,
		'order'               => $order,
		'meta_query'          => $meta_query,
		'tax_query'           => $tax_query,
	);

	$products = new WP_Query( $query_args );

	tr_products_slider( 'featured-products', $products, $title );

	wp_reset_postdata();
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("custom_featured_products", "tr_ext_shortcode_custom_featured_products");
