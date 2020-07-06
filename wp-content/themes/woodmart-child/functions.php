<?php
/**
 * Enqueue script and styles for child theme
 */
function woodmart_child_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'woodmart-style' ), woodmart_get_theme_info( 'Version' ) );

    wp_enqueue_script('cias_script',get_stylesheet_directory_uri() . '/js/script.js', array(), '20151215', true);
}
add_action( 'wp_enqueue_scripts', 'woodmart_child_enqueue_styles', 10010 );
