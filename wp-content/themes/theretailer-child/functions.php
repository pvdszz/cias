<?php
add_action('wp_enqueue_scripts', 'theretailer_enqueue_styles', 99);
function theretailer_enqueue_styles()
{

	wp_enqueue_style('the_retailer_styles', get_template_directory_uri() . '/css/styles.css');
	wp_enqueue_style('stylesheet', get_template_directory_uri() . '/style.css');

	wp_enqueue_style(
		'the-retailer-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array('stylesheet'),
		wp_get_theme()->get('Version')
	);

	// enqueue RTL styles
	if (is_rtl()) {
		wp_enqueue_style('the-retailer-child-rtl-styles',  get_template_directory_uri() . '/rtl.css', array('the_retailer_styles'), wp_get_theme()->get('Version'));
	}
	
	// js
}
//  skip cart
add_filter('woocommerce_add_to_cart_redirect', 'themeprefix_add_to_cart_redirect');
function themeprefix_add_to_cart_redirect()
{
	global $woocommerce;
	$checkout_url = wc_get_checkout_url();
	return $checkout_url;
}

