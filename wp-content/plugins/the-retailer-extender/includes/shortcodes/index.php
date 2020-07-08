<?php

// Helpers
include_once( 'wc/helpers/products-slider.php' );

// WP
include_once( 'wp/banner.php' );
include_once( 'wp/from-the-blog.php' );
include_once( 'wp/icon-box.php' );
include_once( 'wp/slider.php' );
include_once( 'wp/team-members.php' );
include_once( 'wp/title-subtitle.php' );

// WC
if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
	include_once( 'wc/featured-products-slider.php' );
	include_once( 'wc/wc-featured-products.php' );
	include_once( 'wc/wc-best-selling-products.php' );
	include_once( 'wc/wc-products-by-attribute.php' );
	include_once( 'wc/wc-products-by-category.php' );
	include_once( 'wc/wc-products-by-ids-skus.php' );
	include_once( 'wc/wc-recent-products.php' );
	include_once( 'wc/wc-sale-products.php' );
	include_once( 'wc/wc-top-rated-products.php' );
}

// Mixed
if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
	include_once( 'mixed/recent-products-mixed.php' );
	include_once( 'mixed/featured-products-mixed.php' );
	include_once( 'mixed/sale-products-mixed.php' );
	include_once( 'mixed/best-selling-products-mixed.php' );
	include_once( 'mixed/top-rated-products-mixed.php' );
	include_once( 'mixed/products-by-category-mixed.php' );
	include_once( 'mixed/products-mixed.php' );
	include_once( 'mixed/products-by-attribute-mixed.php' );
}

// Add Shortcodes to WP Bakery
add_action( 'plugins_loaded', function() {
	if ( defined( 'WPB_VC_VERSION' ) ) {
		
		add_action( 'init', 'getbowtied_tr_visual_composer_shortcodes', 99 );
		function getbowtied_tr_visual_composer_shortcodes() {
			
			// Add new WP shortcodes to VC
			include_once( 'wb/wp/banner.php' );
			include_once( 'wb/wp/from-the-blog.php' );
			include_once( 'wb/wp/icon-box.php' );
			include_once( 'wb/wp/slider.php' );
			include_once( 'wb/wp/team-members.php' );
			include_once( 'wb/wp/title-subtitle.php' );
			
			// Add new WC shortcodes to VC
			if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {

				include_once( 'wb/wc/featured-products-slider.php' );
				include_once( 'wb/wc/wc-best-selling-products.php' );
				include_once( 'wb/wc/wc-featured-products.php' );
				include_once( 'wb/wc/wc-products-by-attribute.php' );
				include_once( 'wb/wc/wc-products-by-category.php' );
				include_once( 'wb/wc/wc-products-by-ids-skus.php' );
				include_once( 'wb/wc/wc-recent-products.php' );
				include_once( 'wb/wc/wc-sale-products.php' );
				include_once( 'wb/wc/wc-top-rated-products.php' );

			}
		}
	}
});

add_action( 'admin_enqueue_scripts', 'getbowtied_tr_shortcodes_admin_styles' );
function getbowtied_tr_shortcodes_admin_styles() {
	if ( defined( 'WPB_VC_VERSION' ) ) {
		wp_enqueue_style('theretailer-icon-box-admin-shortcode-styles',
			plugins_url( 'assets/css/wp/icon-box-admin.css', __FILE__ ),
			NULL
		);
		wp_enqueue_style('theretailer-linea-fonts-styles',
			plugins_url( 'fonts/linea-fonts/styles.css', dirname(__FILE__) ),
			NULL
		);
	}
}

add_action( 'wp_enqueue_scripts', 'getbowtied_tr_shortcodes_styles' );
function getbowtied_tr_shortcodes_styles() {

	wp_register_style('theretailer-banner-shortcode-styles',
		plugins_url( 'assets/css/wp/banner.css', __FILE__ ),
		NULL
	);

	wp_register_style('theretailer-from-the-blog-shortcode-styles',
		plugins_url( 'assets/css/wp/from-the-blog.css', __FILE__ ),
		NULL
	);

	wp_register_style('theretailer-icon-box-shortcode-styles',
		plugins_url( 'assets/css/wp/icon-box.css', __FILE__ ),
		NULL
	);

	wp_register_style('theretailer-linea-fonts-styles',
		plugins_url( 'fonts/linea-fonts/styles.css', dirname(__FILE__) ),
		NULL
	);

	wp_register_style('theretailer-slider-shortcode-styles',
		plugins_url( 'assets/css/wp/slider.css', __FILE__ ),
		NULL
	);

	wp_register_style('theretailer-team-members-shortcode-styles',
		plugins_url( 'assets/css/wp/team-members.css', __FILE__ ),
		NULL
	);

	wp_register_style('theretailer-title-subtitle-shortcode-styles',
		plugins_url( 'assets/css/wp/title-subtitle.css', __FILE__ ),
		NULL
	);

	if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
		
		wp_register_style('theretailer-featured-products-slider-shortcode-styles',
			plugins_url( 'assets/css/wc/featured-products-slider.css', __FILE__ ),
			NULL
		);
	}

	$theme = wp_get_theme();
	if ( $theme->template != 'theretailer') {
		wp_enqueue_style('theretailer-slider-elements-styles',
			plugins_url( 'assets/css/products-slider.css', __FILE__ ),
			NULL
		);
	}
}

add_action( 'wp_enqueue_scripts', 'getbowtied_mc_shortcodes_scripts', 99 );
function getbowtied_mc_shortcodes_scripts() {

	wp_register_script('theretailer-from-the-blog-shortcode-scripts', 
		plugins_url( 'assets/js/from-the-blog.js', __FILE__ ),
		array('jquery')
	);

	wp_register_script('theretailer-slider-shortcode-script', 
		plugins_url( 'assets/js/slider.js', __FILE__ ),
		array('jquery')
	);

	if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
		wp_register_script('theretailer-featured-products-slider-script', 
			plugins_url( 'assets/js/featured-products-slider.js', __FILE__ ),
			array('jquery')
		);

		$theme = wp_get_theme();
		if ( $theme->template != 'theretailer') {
			wp_register_script('theretailer-wc-products-slider-script', 
				plugins_url( 'assets/js/wc-products-slider.js', __FILE__ ),
				array('jquery')
			);
		}
	}
}