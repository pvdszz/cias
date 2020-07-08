<?php
function theretailer_theme_options() {

    //==============================================================================
    //  Portfolio
    //==============================================================================
    if( !get_option( 'tr_portfolio_options_import', false ) ) {
        update_option( 'tr_portfolio_items_per_row',  GBT_Opt::getOption( 'portfolio_items_per_row',  3 ) );
        update_option( 'tr_portfolio_items_order_by', GBT_Opt::getOption( 'portfolio_items_order_by', 'date' ) );
        update_option( 'tr_portfolio_items_order',    GBT_Opt::getOption( 'portfolio_items_order',    'DESC' ) );
        update_option( 'tr_portfolio_options_import', true );
    }

    //==============================================================================
    //  IMPORTED OPTIONS
    //==============================================================================
    $mf_temp = get_theme_mod('gb_main_font', false);
    if (!empty($mf_temp)) {
        //run only once
        set_theme_mod('new_gb_main_font', array('font-family' => $mf_temp));
        remove_theme_mod('gb_main_font');

    }

    $sf_temp = get_theme_mod('gb_secondary_font', false);
    if (!empty($sf_temp)) {
        //run only once
        set_theme_mod('new_gb_secondary_font', array('font-family' => $sf_temp));
        remove_theme_mod('gb_secondary_font');

    }
}

function the_retailer_sanitize_toggle_options() {

    if( !get_option( 'tr_toggle_options_sanitize', false ) ) {
        $options = array(
            'hide_topbar'                       => 1,
            'search_input_style'                => 0,
            'sticky_header'                     => 1,
            'shopping_bag_in_header'            => 1,
            'page_comments'                     => 0,
            'progress_bar'                      => 0,
            'show_full_post'                    => 0,
            'featured_image_single_post'        => 1,
            'catalog_mode'                      => 0,
            'sidebar_listing'                   => 0,
            'ratings_on_product_listing'        => 0,
            'breadcrumbs'                       => 0,
            'expandable_footer_mobiles'         => 1,
            'products_layout'                   => 0,
            'product_image_zoom'                => 1,
            'reviews_on_product_page'           => 1,
            'related_products_on_product_page'  => 1,
        );

        foreach( $options as $option => $default ) {
            $old = get_theme_mod( $option, $default );
            set_theme_mod( $option, theretailer_string_to_bool($old) );
        }

        update_option( 'tr_toggle_options_sanitize', true );
    }

    if( !get_option( 'tr_options_overwrite', false ) ) {

        if( get_theme_mod( 'light_footer_all_site' ) == '0' ) {
            set_theme_mod( 'light_footer_all_site', true );
        } else {
            set_theme_mod( 'light_footer_all_site', false );
        }

        if( get_theme_mod( 'dark_footer_all_site' ) == '0' ) {
            set_theme_mod( 'dark_footer_all_site', true );
        } else {
            set_theme_mod( 'dark_footer_all_site', false );
        }

        if( get_theme_mod( 'flip_product' ) == '0' ) {
            set_theme_mod( 'flip_product', true );
        } else {
            set_theme_mod( 'flip_product', false );
        }

        if( get_theme_mod( 'footer_logos' ) == get_template_directory_uri() . '/images/customizer/payment_cards.png'  ) {
            set_theme_mod( 'footer_logos', get_template_directory_uri() . '/inc/customizer/assets/images/payment_cards.png' );
        }

        if( !get_theme_mod( 'hide_topbar', false ) ) {
            set_theme_mod( 'hide_topbar', true );
        } else {
            set_theme_mod( 'hide_topbar', false );
        }

        $header_top_padding = intval(get_theme_mod( 'menu_header_top_padding_1_7', '25' ));
        $header_bottom_padding = intval(get_theme_mod( 'menu_header_bottom_padding_1_7', '25' ));

        if( $header_top_padding >= 40 ) {
            $header_top_padding = $header_top_padding - 15;
            if( $header_top_padding > 100) $header_top_padding = 100;
            set_theme_mod( 'menu_header_top_padding_1_7', (string)$header_top_padding );
        }

        if( $header_bottom_padding >= 40 ) {
            $header_bottom_padding = $header_bottom_padding - 15;
            if( $header_bottom_padding > 100) $header_bottom_padding = 100;
            set_theme_mod( 'menu_header_bottom_padding_1_7', (string)$header_bottom_padding );
        }

        update_option( 'tr_options_overwrite', true );
    }
}

function the_retailer_sanitize_image_urls() {

    if( !get_option( 'tr_images_options_sanitize', false ) ) {
        $options = array(
            'footer_logos'      => get_template_directory_uri() . '/inc/customizer/assets/images/payment_cards.png',
            'site_logo'         => GBT_Opt::getOption('site_logo'),
            'alternative_logo'  => GBT_Opt::getOption('alternative_logo'),
            'site_logo_retina'  => GBT_Opt::getOption('site_logo_retina'),
        );

        foreach( $options as $option => $default ) {
            $old = get_theme_mod( $option, $default );
            set_theme_mod( $option, str_replace( array('[site_url]', '[site_url_secure]'), get_site_url(), $old ) );
        }

        if( strpos( get_theme_mod( 'footer_logos' ), '/admin/assets/images/payment_cards.png' ) !== false ) {
            set_theme_mod( 'footer_logos', get_template_directory_uri() . '/inc/customizer/assets/images/payment_cards.png' );
        }

        update_option( 'tr_images_options_sanitize', true );
    }
}

add_action('wp_loaded', 'the_retailer_sanitize_toggle_options');
add_action('wp_loaded', 'the_retailer_sanitize_image_urls');
