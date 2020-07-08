<?php

if ( ! function_exists( 'the_retailer_setup' ) ) {
    function the_retailer_setup() {

        if ( ! isset( $content_width ) ) $content_width = 940;

    	add_theme_support( 'woocommerce', array(
    		'gallery_thumbnail_image_width' => 130,
    		)
    	);
    	add_theme_support( "title-tag" );
    	add_theme_support( 'customize-selective-refresh-widgets' );

    	// gutenberg
    	add_theme_support( 'align-wide' );
    	add_theme_support( 'editor-styles' );
    	add_theme_support( 'wp-block-styles' );
    	add_theme_support( 'responsive-embeds' );

    	if( GBT_Opt::getOption( 'product_image_zoom', true ) ) {
    		add_theme_support( 'wc-product-gallery-zoom' );
    	}

        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

    	add_editor_style( 'css/admin/editor-styles.css' );

    	/**
    	 * Custom template tags for this theme.
    	 */
    	include_once( get_template_directory() . '/inc/template-tags.php' );

    	/**
    	 * Custom functions that act independently of the theme templates
    	 */
    	include_once( get_template_directory() . '/inc/extras.php' );

    	/**
    	 * Make theme available for translation
    	 * Translations can be filed in the /languages/ directory
    	 * If you're building a theme based on theretailer, use a find and replace
    	 * to change 'theretailer' to the name of your theme in all the template files
    	 */

    	load_theme_textdomain( 'theretailer', get_template_directory() . '/languages' );


    	/**
    	 * Add default posts and comments RSS feed links to head
    	 */
    	add_theme_support( 'automatic-feed-links' );

    	/**
    	 * Enable support for Post Thumbnails
    	 */
    	add_theme_support( 'post-thumbnails' );

    	function theretailer_register_custom_background() {
    		$args = array(
    			'default-color' => 'ffffff',
    			'default-image' => '',
    		);

    		$args = apply_filters( 'theretailer_custom_background_args', $args );

    		add_theme_support( 'custom-background', $args );
    	}
    	add_action( 'after_setup_theme', 'theretailer_register_custom_background' );



    	function theretailer_add_editor_styles() {
    		add_editor_style( 'custom-editor-style.css' );
    	}
    	add_action( 'init', 'theretailer_add_editor_styles' );

    	/**
    	 * This theme uses wp_nav_menu() in 4 location.
    	 */
    	register_nav_menus( array(
    		'tools' => esc_html__( 'Top Header Navigation', 'theretailer' ),
    		'primary' => esc_html__( 'Main Navigation', 'theretailer' ),
    		'secondary' => esc_html__( 'Secondary Navigation', 'theretailer' )
    	) );

    }
}
add_action( 'after_setup_theme', 'the_retailer_setup' );

// Post Type Support
add_action('init', 'theretailer_post_type_support');
function theretailer_post_type_support() {
	add_post_type_support( 'page', 'excerpt' );
	add_post_type_support( 'post', 'block-editor' );
}

// ADD prettyPhoto rel to [gallery] with link=file
add_filter( 'wp_get_attachment_link', 'sant_prettyadd', 10, 6);
function sant_prettyadd ($content, $id, $size, $permalink, $icon, $text) {
    if ($permalink) {
    	return $content;
    }
    $content = preg_replace("/<a/","<span class=\"fresco\" data-fresco-group=\"\"", $content, 1);

    return $content;
}

// Favicon
add_action('wp_head', 'theretailer_favicon');
function theretailer_favicon() {

	if ( has_site_icon() == false ) {
        echo '<link rel="icon" href="' . get_stylesheet_directory_uri() . '/favicon.ico" />';
    }
}

/**
 * Deactivate Progress Bar when incompatible plugin is active
 */
add_action( 'init', 'theretailer_deactivate_progress_bar' );
function theretailer_deactivate_progress_bar() {
	if( TR_ELEMENTOR_IS_ACTIVE ) { set_theme_mod( 'progress_bar', false ); }

    return;
}

?>
