<?php

// [custom_product_attribute]
function tr_ext_shortcode_custom_product_attribute($atts, $content = null) {

	wp_enqueue_style('swiper');
    wp_enqueue_script('swiper');

	wp_enqueue_script('theretailer-wc-products-slider-script');

	extract(shortcode_atts(array(
		'title'  => '',
		'per_page'  => '12',
		'orderby'   => 'title',
		'order'     => 'asc',
		'attribute' => '',
		'filter'    => ''
	), $atts));

	$attribute 	= strstr( $attribute, 'pa_' ) ? sanitize_title( $attribute ) : 'pa_' . sanitize_title( $attribute );

	$args = array(
		'post_type'           => 'product',
		'post_status'         => 'publish',
		'ignore_sticky_posts' => 1,
		'posts_per_page'      => $per_page,
		'orderby'             => $orderby,
		'order'               => $order,
		'meta_query'          => array(
			array(
				'key'               => '_visibility',
				'value'             => array('catalog', 'visible'),
				'compare'           => 'IN'
			)
		),
		'tax_query' 			=> array(
			array(
				'taxonomy' 	=> $attribute,
				'terms'     => array_map( 'sanitize_title', explode( ",", $filter ) ),
				'field' 	=> 'slug'
			)
		)
	);

	ob_start();

	$products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );

	tr_products_slider( 'products-by-attribute', $products, $title );

	wp_reset_postdata();
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("custom_product_attribute", "tr_ext_shortcode_custom_product_attribute");
