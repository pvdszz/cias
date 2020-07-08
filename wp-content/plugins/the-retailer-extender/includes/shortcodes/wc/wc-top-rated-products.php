<?php

// [custom_top_rated_products]
function tr_ext_shortcode_custom_top_rated_products($atts, $content = null) {

	wp_enqueue_style('swiper');
    wp_enqueue_script('swiper');

	wp_enqueue_script('theretailer-wc-products-slider-script');

	extract(shortcode_atts(array(
		'title'  => '',
		'per_page'  => '12',
		'orderby'   => 'date',
		'order'     => 'desc',
		'layout'	=> 'slider'
	), $atts));

	ob_start();

	$args = array(
		'post_type' 			=> 'product',
		'post_status' 			=> 'publish',
		'ignore_sticky_posts'   => 1,
		'orderby' 				=> $orderby,
		'order'					=> $order,
		'posts_per_page' 		=> $per_page,
		'layout'				=> $layout,
		'meta_query' 			=> array(
			array(
				'key' 			=> '_visibility',
				'value' 		=> array('catalog', 'visible'),
				'compare' 		=> 'IN'
			)
		)
	);

    add_filter( 'posts_clauses', array( 'WC_Shortcodes', 'order_by_rating_post_clauses' ) );

	$products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );

	remove_filter( 'posts_clauses', array( 'WC_Shortcodes', 'order_by_rating_post_clauses' ) );

	tr_products_slider( 'top-rated-products', $products, $title );

	wp_reset_postdata();
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("custom_top_rated_products", "tr_ext_shortcode_custom_top_rated_products");
