<?php
/*
 * Customizer Backend Config
 */

include_once( get_template_directory() . '/inc/customizer/backend/sections.php' );

/*
 * Remove Customize Pages
 */
add_action('admin_menu', 'remove_customize_pages');
function remove_customize_pages(){
    global $submenu;
    unset($submenu['themes.php'][15]); // remove Header link
    unset($submenu['themes.php'][20]); // remove Background link
}

/*
 * Go To Page
 */
function theretailer_get_section_url() {

    switch($_POST['page']) {
        case 'shop':
            echo get_permalink( wc_get_page_id( 'shop' ) );
            break;
        case 'blog':
            echo get_permalink( get_option( 'page_for_posts' ) );
            break;
        case 'product':
            $args = array('orderby' => 'rand', 'limit' => 1);
            $product = wc_get_products($args);
            echo get_permalink( $product[0]->get_id() );
            break;
        default:
            echo get_home_url();
            break;
    }
    exit();
}
add_action( 'wp_ajax_theretailer_get_section_url', 'theretailer_get_section_url' );

function theretailer_sanitize_new_font_options() {

    $main_font = GBT_Opt::getOption( 'new_gb_main_font', 'Radnika Next Alt' );
    $secondary_font = GBT_Opt::getOption( 'new_gb_secondary_font', 'HK Nova' );

    if( is_array($main_font) && isset($main_font['font-family']) ) {
        $main_font = $main_font['font-family'];
        set_theme_mod( 'new_gb_main_font', $main_font['font-family'] );
    }

    if( is_array($secondary_font) && isset($secondary_font['font-family']) ) {
        $secondary_font = $secondary_font['font-family'];
        set_theme_mod( 'new_gb_secondary_font', $secondary_font['font-family'] );
    }

    $web_safe_fonts = array(
        '--apple-system', 'Arial', 'Comic Sans', 'Courier New',
		'Courier', 'Garamond', 'Georgia', 'Helvetica', 'Impact', 'Palatino',
		'Times New Roman', 'Times', 'Trebuchet', 'Verdana'
	);

    if( 'Radnika Next Alt' === $main_font || 'HK Nova' === $main_font ) {
        set_theme_mod( 'main_font_source', 'default' );
        set_theme_mod( 'new_gb_main_font', $main_font );
    } else if( in_array( $main_font, $web_safe_fonts ) ) {
        set_theme_mod( 'main_font_source', 'web-safe' );
        set_theme_mod( 'web_safe_gb_main_font', $main_font );
    } else {
        set_theme_mod( 'main_font_source', 'google' );
        set_theme_mod( 'google_gb_main_font', $main_font );
    }

    if( 'Radnika Next Alt' === $secondary_font || 'HK Nova' === $secondary_font ) {
        set_theme_mod( 'secondary_font_source', 'default' );
        set_theme_mod( 'new_gb_secondary_font', $secondary_font );
    } else if( in_array( $secondary_font, $web_safe_fonts ) ) {
        set_theme_mod( 'secondary_font_source', 'web-safe' );
        set_theme_mod( 'web_safe_gb_secondary_font', $secondary_font );
    } else {
        set_theme_mod( 'secondary_font_source', 'google' );
        set_theme_mod( 'google_gb_secondary_font', $secondary_font );
    }
}

if( !get_option( 'tr_font_options_sanitize', false ) ) {
    theretailer_sanitize_new_font_options();
    update_option( 'tr_font_options_sanitize', true );
}
