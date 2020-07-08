<?php

// [products_by_category]
function tr_ext_shortcode_products_by_category($atts, $content = null) {

    wp_enqueue_style('swiper');
    wp_enqueue_script('swiper');

	wp_enqueue_script('theretailer-wc-products-slider-script');

	extract(shortcode_atts(array(
		"title" => '',
		'per_page'  => '12',
        'orderby' => 'date',
        'order' => 'desc',
		'category' => ''
	), $atts));

	ob_start();

    $args = array(
        'post_type'     => 'product',
        'orderby'       => $orderby,
        'order'         => $order,
        'post_status'   => 'publish',
        'tax_query'     => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $category
            )
        ),
        'ignore_sticky_posts'   => 1,
        'posts_per_page' => $per_page
    );

    $products = new WP_Query($args);

    tr_products_slider( 'products-by-category', $products, $title );

	wp_reset_postdata();
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("products_by_category", "tr_ext_shortcode_products_by_category");
