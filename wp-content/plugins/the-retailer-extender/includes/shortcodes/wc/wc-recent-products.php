<?php

// [custom_latest_products]
function tr_ext_shortcode_custom_latest_products($atts, $content = null) {

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

    $args = array(
        'post_type'             => 'product',
        'post_status'           => 'publish',
        'orderby'               => $orderby,
        'order'                 => $order,
        'ignore_sticky_posts'   => 1,
        'posts_per_page'        => $per_page
    );

    $products = new WP_Query( $args );

    tr_products_slider( 'recent-products', $products, $title );

	wp_reset_postdata();
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("custom_latest_products", "tr_ext_shortcode_custom_latest_products");
