<?php

// Helpers
include_once( get_template_directory() . '/functions/helpers/helpers.php' );

// Admin Setup
include_once( get_template_directory() . '/functions/admin-setup.php' );

// Customizer
include_once( get_template_directory() . '/inc/customizer/class/class-fonts.php' );
include_once( get_template_directory() . '/inc/customizer/class/read-options.php' );
include_once( get_template_directory() . '/inc/customizer/backend.php' );
include_once( get_template_directory() . '/inc/customizer/frontend.php' );

// Metaboxes
include_once( get_template_directory() . '/inc/metaboxes/page.php' );

// Styles
include_once( get_template_directory() . '/functions/enqueue/styles.php' );
include_once( get_template_directory() . '/functions/enqueue/admin-styles.php' );

include_once( get_template_directory() . '/inc/custom-styles/custom-styles.php' );

// Scripts
include_once( get_template_directory() . '/functions/enqueue/scripts.php' );
include_once( get_template_directory() . '/functions/enqueue/admin-scripts.php' );

// Theme Settings
include_once( get_template_directory() . '/functions/theme-setup.php' );

// Widget Areas
include_once( get_template_directory() . '/functions/wp/widget-areas.php' );

// WooCommerce
if( TR_WOOCOMMERCE_IS_ACTIVE ) {
	include_once( get_template_directory() . '/functions/wc/actions.php' );
	include_once( get_template_directory() . '/functions/wc/custom.php' );
	include_once( get_template_directory() . '/functions/wc/filters.php' );
}

// WPBakery Page Builder
if( TR_WPBAKERY_IS_ACTIVE ) {
	include_once( get_template_directory() . '/functions/wb/wpbakery-setup.php' );
}

// Revolution Slider
if(function_exists('set_revslider_as_theme')) {
	set_revslider_as_theme();
}
