<?php

function theretailer_widgets_init() {

	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'name' => esc_html__( 'Sidebar', 'theretailer' ),
			'id' => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		));

		register_sidebar(array(
			'name' => esc_html__( 'Product listing', 'theretailer' ),
			'id' => 'widgets_product_listing',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		));

		register_sidebar(array(
			'name' => esc_html__( 'Light footer', 'theretailer' ),
			'id' => 'widgets_light_footer',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		));


		register_sidebar(array(
			'name' => esc_html__( 'Dark footer', 'theretailer' ),
			'id' => 'widgets_dark_footer',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		));
	}
}
add_action( 'widgets_init', 'theretailer_widgets_init', 99 );

?>
