<?php

/**
 * Checks if light footer is enabled.
 */
function light_footer_is_enabled(){

    return GBT_Opt::getOption( 'light_footer_all_site', true );
}

/**
 * Checks if dark footer is enabled.
 */
function dark_footer_is_enabled(){

    return GBT_Opt::getOption( 'dark_footer_all_site', true );
}

// Expandable Footer on Mobiles.
$wp_customize->add_setting(
    'expandable_footer_mobiles',
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
        'expandable_footer_mobiles',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Expandable Footer on Mobiles', 'theretailer' ),
            'section'  => 'mobile_footer',
            'priority' => 10,
        )
    )
);

// Light Footer.
$wp_customize->add_setting(
    'light_footer_all_site',
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
        'light_footer_all_site',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Light Footer', 'theretailer' ),
            'section'  => 'light_footer',
            'priority' => 10,
        )
    )
);

// Light Footer Layout.
$wp_customize->add_setting(
    'light_footer_layout',
    array(
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'theretailer_sanitize_select',
        'default'           => '4col',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'light_footer_layout',
        array(
            'type'     => 'select',
            'label'    => esc_html__( 'Light Footer Layout', 'theretailer' ),
            'section'  => 'light_footer',
            'priority' => 10,
            'choices'  => array(
                '3col'  => esc_html__( '3 Columns', 'theretailer' ),
                '4col'  => esc_html__( '4 Columns', 'theretailer' ),
            ),
            'active_callback' => 'light_footer_is_enabled'
        )
    )
);

// Light Footer Background Color.
$wp_customize->add_setting(
    'primary_footer_bg_color',
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
        'primary_footer_bg_color',
        array(
            'label'    => esc_html__( 'Light Footer Background Color', 'theretailer' ),
            'section'  => 'light_footer',
            'priority' => 10,
            'active_callback' => 'light_footer_is_enabled',
        )
    )
);

// Light Footer Text Color.
$wp_customize->add_setting(
    'primary_footer_color',
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
        'primary_footer_color',
        array(
            'label'    => esc_html__( 'Light Footer Text Color', 'theretailer' ),
            'section'  => 'light_footer',
            'priority' => 10,
            'active_callback' => 'light_footer_is_enabled',
        )
    )
);

// Dark Footer.
$wp_customize->add_setting(
    'dark_footer_all_site',
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
        'dark_footer_all_site',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Dark Footer', 'theretailer' ),
            'section'  => 'dark_footer',
            'priority' => 10,
        )
    )
);

// Dark Footer Layout.
$wp_customize->add_setting(
    'dark_footer_layout',
    array(
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'theretailer_sanitize_select',
        'default'           => '4col',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'dark_footer_layout',
        array(
            'type'     => 'select',
            'label'    => esc_html__( 'Dark Footer Layout', 'theretailer' ),
            'section'  => 'dark_footer',
            'priority' => 10,
            'choices'  => array(
                '3col'  => esc_html__( '3 Columns', 'theretailer' ),
                '4col'  => esc_html__( '4 Columns', 'theretailer' ),
            ),
            'active_callback' => 'dark_footer_is_enabled'
        )
    )
);

// Dark Footer Background Color.
$wp_customize->add_setting(
    'secondary_footer_bg_color',
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
        'secondary_footer_bg_color',
        array(
            'label'    => esc_html__( 'Dark Footer Background Color', 'theretailer' ),
            'section'  => 'dark_footer',
            'priority' => 10,
            'active_callback' => 'dark_footer_is_enabled',
        )
    )
);

// Dark Footer Text Color.
$wp_customize->add_setting(
    'secondary_footer_color',
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
        'secondary_footer_color',
        array(
            'label'    => esc_html__( 'Dark Footer Text Color', 'theretailer' ),
            'section'  => 'dark_footer',
            'priority' => 10,
            'active_callback' => 'dark_footer_is_enabled',
        )
    )
);

// Footer Credit Card Icons.
$wp_customize->add_setting(
    'footer_logos',
    array(
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'theretailer_sanitize_image',
        'default'	        => get_template_directory_uri() . '/inc/customizer/assets/images/payment_cards.png',
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'footer_logos',
        array(
            'type'        => 'image',
            'label'       => esc_html__( 'Footer Credit Card Icons', 'theretailer' ),
            'section'     => 'footer_copyright_bar',
            'priority'    => 10,
        )
    )
);

// Footer Copyright Text.
$wp_customize->add_setting(
    'copyright_text',
    array(
        'type'               => 'theme_mod',
        'capability'         => 'edit_theme_options',
        'sanitize_callback'  => 'wp_kses',
        'default'            => esc_html__( 'Powered by ', 'theretailer' ) . '<a href="https://theretailer.getbowtied.com" title="eCommerce WordPress Theme for Woocommerce">'.esc_html__( 'The Retailer', 'theretailer' ).'</a>.',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'copyright_text',
        array(
            'type'        => 'textarea',
            'label'       => esc_html__( 'Footer Copyright Text', 'theretailer' ),
            'description' => esc_html__( 'Allowed HTML tags: a, abbr, acronym, b, blockquote, cite, code, del, em, i, q, s, strike, strong', 'theretailer' ),
            'section'     => 'footer_copyright_bar',
            'priority'    => 10,
        )
    )
);

// Copyright Bar Background Color.
$wp_customize->add_setting(
    'copyright_bar_bg_color',
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
        'copyright_bar_bg_color',
        array(
            'label'    => esc_html__( 'Copyright Bar Background Color', 'theretailer' ),
            'section'  => 'footer_copyright_bar',
            'priority' => 10,
        )
    )
);

// Copyright Bar Text Color.
$wp_customize->add_setting(
    'copyright_text_color',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default'    => '#a8a8a8',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'copyright_text_color',
        array(
            'label'    => esc_html__( 'Copyright Bar Text Color', 'theretailer' ),
            'section'  => 'footer_copyright_bar',
            'priority' => 10,
        )
    )
);
