<?php

/**
 * Checks if topbar is enabled.
 */
function topbar_is_enabled(){

    return GBT_Opt::getOption( 'hide_topbar', true );
}

/**
 * Checks if mini shopping bag is enabled.
 */
function mini_shopping_bag_is_enabled(){

    return GBT_Opt::getOption( 'shopping_bag_in_header', true );
}

/*
 * Logo.
 */

// Site Logo.
$wp_customize->add_setting(
    'site_logo',
    array(
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'theretailer_sanitize_image',
        'default'	        => '',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'site_logo',
        array(
            'type'        => 'image',
            'label'       => esc_html__( 'Site Logo', 'theretailer' ),
            'section'     => 'header_logo',
            'priority'    => 10,
        )
    )
);

// Alternative Logo.
$wp_customize->add_setting(
    'alternative_logo',
    array(
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'theretailer_sanitize_image',
        'default'	        => get_theme_mod('site_logo', ''),
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'alternative_logo',
        array(
            'type'        => 'image',
            'label'       => esc_html__( 'Alternative Logo', 'theretailer' ),
            'section'     => 'header_logo',
            'priority'    => 10,
        )
    )
);

/*
 * Top Bar.
 */

// Top Bar.
$wp_customize->add_setting(
    'hide_topbar',
    array(
        'type'                 => 'theme_mod',
        'capability'           => 'edit_theme_options',
        'sanitize_callback'    => 'theretailer_sanitize_checkbox',
        'default'              => true,
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'hide_topbar',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Top Bar', 'theretailer' ),
            'section'  => 'header_topbar',
            'priority' => 10,
        )
    )
);

// Top Bar Text.
$wp_customize->add_setting(
    'topbar_text',
    array(
        'type'               => 'theme_mod',
        'capability'         => 'edit_theme_options',
        'sanitize_callback'  => 'wp_kses',
        'default'            => esc_html__( 'FREE SHIPPING ON ALL ORDERS OVER $75', 'theretailer' ),
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'topbar_text',
        array(
            'type'        => 'textarea',
            'label'       => esc_html__( 'Top Bar Text', 'theretailer' ),
            'description' => esc_html__( 'Allowed HTML tags: a, abbr, acronym, b, blockquote, cite, code, del, em, i, q, s, strike, strong', 'theretailer' ),
            'section'     => 'header_topbar',
            'priority'    => 10,
            'active_callback' => 'topbar_is_enabled'
        )
    )
);

// Search Input Open at All Times.
$wp_customize->add_setting(
    'search_input_style',
    array(
        'type'                 => 'theme_mod',
        'capability'           => 'edit_theme_options',
        'sanitize_callback'    => 'theretailer_sanitize_checkbox',
        'default'              => false,
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'search_input_style',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Search Input Open at All Times', 'theretailer' ),
            'section'  => 'header_topbar',
            'priority' => 10,
            'active_callback' => 'topbar_is_enabled',
        )
    )
);

// Top Bar Background Color.
$wp_customize->add_setting(
    'topbar_bg_color',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default'    => '#000',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'topbar_bg_color',
        array(
            'label'    => esc_html__( 'Top Bar Background Color', 'theretailer' ),
            'section'  => 'header_topbar',
            'priority' => 10,
            'active_callback' => 'topbar_is_enabled',
        )
    )
);

// Top Bar Text Color.
$wp_customize->add_setting(
    'topbar_color',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default'    => '#fff',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'topbar_color',
        array(
            'label'    => esc_html__( 'Top Bar Text Color', 'theretailer' ),
            'section'  => 'header_topbar',
            'priority' => 10,
            'active_callback' => 'topbar_is_enabled',
        )
    )
);

// Top Bar Font Size.
$wp_customize->add_setting(
    'top_bar_font_size',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
        'default'    => 10,
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'top_bar_font_size',
        array(
            'type'        => 'number',
            'label'       => esc_html__( 'Top Bar Font Size', 'theretailer' ),
            'description' => esc_html__( "(8px - 16px)", 'theretailer' ),
            'section'     => 'header_topbar',
            'priority'    => 10,
            'input_attrs' => array(
                'min'  => 8,
                'max'  => 16,
                'step' => 1,
            ),
            'active_callback' => 'topbar_is_enabled',
        )
    )
);

// Include Top Bar in Sticky Header.
$wp_customize->add_setting(
    'sticky_topbar',
    array(
        'type'                 => 'theme_mod',
        'capability'           => 'edit_theme_options',
        'sanitize_callback'    => 'theretailer_sanitize_checkbox',
        'default'              => false,
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'sticky_topbar',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Include Top Bar in Sticky Header', 'theretailer' ),
            'section'  => 'header_topbar',
            'priority' => 10,
            'active_callback' => 'topbar_is_enabled',
        )
    )
);

/*
 * Header Layout.
 */

// Header Layout.
$wp_customize->add_setting(
     'gb_header_style',
     array(
         'type'              => 'theme_mod',
         'capability'        => 'edit_theme_options',
         'sanitize_callback' => 'theretailer_sanitize_select',
         'default'           => '0',
     )
);

$wp_customize->add_control(
     new WP_Customize_Control(
         $wp_customize,
         'gb_header_style',
         array(
             'type'     => 'select',
             'label'    => esc_html__( 'Header Layout', 'theretailer' ),
             'section'  => 'header_layout',
             'priority' => 10,
             'choices'  => array(
                '0'    => esc_html__( 'Layout 1', 'theretailer' ),
                '1'    => esc_html__( 'Layout 2', 'theretailer' ),
                '2'    => esc_html__( 'Layout 3', 'theretailer' ),
             ),
         )
     )
);

// Header Background Color.
$wp_customize->add_setting(
    'header_bg_color',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default'    => '#f4f4f4',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'header_bg_color',
        array(
            'label'    => esc_html__( 'Header Background Color', 'theretailer' ),
            'section'  => 'header_layout',
            'priority' => 10,
        )
    )
);

// Enable Sticky Header.
$wp_customize->add_setting(
    'sticky_header',
    array(
        'type'                 => 'theme_mod',
        'capability'           => 'edit_theme_options',
        'sanitize_callback'    => 'theretailer_sanitize_checkbox',
        'default'              => true,
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'sticky_header',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Enable Sticky Header', 'theretailer' ),
            'section'  => 'header_layout',
            'priority' => 10,
        )
    )
);

/*
 * Navigation
 */

// Main Navigation Text Color.
$wp_customize->add_setting(
    'primary_menu_color',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default'    => '#000',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'primary_menu_color',
        array(
            'label'    => esc_html__( 'Main Navigation Text Color', 'theretailer' ),
            'section'  => 'header_navigation',
            'priority' => 10,
        )
    )
);

// Main Navigation Font Size.
$wp_customize->add_setting(
    'main_navigation_font_size',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
        'default'    => 12,
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'main_navigation_font_size',
        array(
            'type'        => 'number',
            'label'       => esc_html__( 'Main Navigation Font Size', 'theretailer' ),
            'description' => esc_html__( "(8px - 16px)", 'theretailer' ),
            'section'     => 'header_navigation',
            'priority'    => 10,
            'input_attrs' => array(
                'min'  => 8,
                'max'  => 16,
                'step' => 1,
            ),
        )
    )
);

// Secondary Navigation Text Color.
$wp_customize->add_setting(
    'secondary_menu_color',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default'    => '#777',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'secondary_menu_color',
        array(
            'label'    => esc_html__( 'Secondary Navigation Text Color', 'theretailer' ),
            'section'  => 'header_navigation',
            'priority' => 10,
        )
    )
);

// Secondary Navigation Font Size.
$wp_customize->add_setting(
    'secondary_navigation_font_size',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
        'default'    => 12,
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'secondary_navigation_font_size',
        array(
            'type'        => 'number',
            'label'       => esc_html__( 'Secondary Navigation Font Size', 'theretailer' ),
            'description' => esc_html__( "(8px - 16px)", 'theretailer' ),
            'section'     => 'header_navigation',
            'priority'    => 10,
            'input_attrs' => array(
                'min'  => 8,
                'max'  => 16,
                'step' => 1,
            ),
        )
    )
);

// Spacing Above the Navigation.
$wp_customize->add_setting(
    'menu_header_top_padding_1_7',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
        'default'    => 25,
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'menu_header_top_padding_1_7',
        array(
            'type'        => 'number',
            'label'       => esc_html__( 'Spacing Above the Navigation', 'theretailer' ),
            'description' => esc_html__( "(0px - 100px)", 'theretailer' ),
            'section'     => 'header_navigation',
            'priority'    => 10,
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

// Spacing Below the Navigation.
$wp_customize->add_setting(
    'menu_header_bottom_padding_1_7',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
        'default'    => 25,
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'menu_header_bottom_padding_1_7',
        array(
            'type'        => 'number',
            'label'       => esc_html__( 'Spacing Below the Navigation', 'theretailer' ),
            'description' => esc_html__( "(0px - 100px)", 'theretailer' ),
            'section'     => 'header_navigation',
            'priority'    => 10,
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

/*
 * Mini Shopping Bag
 */
if( TR_WOOCOMMERCE_IS_ACTIVE ) {

    // Enable Mini Shopping Bag.
    $wp_customize->add_setting(
        'shopping_bag_in_header',
        array(
            'type'                 => 'theme_mod',
            'capability'           => 'edit_theme_options',
            'sanitize_callback'    => 'theretailer_sanitize_checkbox',
            'default'              => true,
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'shopping_bag_in_header',
            array(
                'type'     => 'checkbox',
                'label'    => esc_html__( 'Enable Mini Shopping Bag', 'theretailer' ),
                'section'  => 'header_shopping_bag',
                'priority' => 10,
            )
        )
    );

    // Mini Shopping Bag Style.
    $wp_customize->add_setting(
         'shopping_bag_style',
         array(
             'type'              => 'theme_mod',
             'capability'        => 'edit_theme_options',
             'sanitize_callback' => 'theretailer_sanitize_select',
             'default'           => 'style2',
         )
    );

    $wp_customize->add_control(
         new WP_Customize_Control(
             $wp_customize,
             'shopping_bag_style',
             array(
                 'type'     => 'select',
                 'label'    => esc_html__( 'Mini Shopping Bag Style', 'theretailer' ),
                 'section'  => 'header_shopping_bag',
                 'priority' => 10,
                 'choices'  => array(
                    'style1'    => esc_html__( 'Style 1', 'theretailer' ),
                    'style2'    => esc_html__( 'Style 2', 'theretailer' ),
                 ),
                 'active_callback' => 'mini_shopping_bag_is_enabled',
             )
         )
    );

    // Shopping Bag Icon.
    $wp_customize->add_setting(
        'shoppinh_bag_icon',
        array(
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'theretailer_sanitize_image',
            'default'	        => '',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'shoppinh_bag_icon',
            array(
                'type'        => 'image',
                'label'       => esc_html__( 'Shopping Bag Icon', 'theretailer' ),
                'section'     => 'header_shopping_bag',
                'priority'    => 10,
                'active_callback' => 'mini_shopping_bag_is_enabled',
            )
        )
    );
}
