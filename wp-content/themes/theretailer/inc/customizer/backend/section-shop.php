<?php

/**
 * Checks if shop sidebar is enabled.
 */
function shop_sidebar_is_enabled(){

    return GBT_Opt::getOption( 'sidebar_listing', false );
}

// Breadcrumbs.
$wp_customize->add_setting(
    'breadcrumbs',
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
        'breadcrumbs',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Breadcrumbs', 'theretailer' ),
            'section'  => 'shop',
            'priority' => 10,
        )
    )
);

// Catalog Mode.
$wp_customize->add_setting(
    'catalog_mode',
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
        'catalog_mode',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Catalog Mode', 'theretailer' ),
            'description' => esc_html__( 'When enabled, the feature turns off the shopping functionality of WooCommerce by hiding the mini cart in the header and the add-to-cart buttons for products.', 'theretailer' ),
            'section'  => 'shop',
            'priority' => 10,
        )
    )
);

// Shop Sidebar.
$wp_customize->add_setting(
    'sidebar_listing',
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
        'sidebar_listing',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Shop Sidebar', 'theretailer' ),
            'section'  => 'shop',
            'priority' => 10,
        )
    )
);

// Sidebar Style.
$wp_customize->add_setting(
    'sidebar_style',
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
        'sidebar_style',
        array(
            'type'     => 'select',
            'label'    => esc_html__( 'Sidebar Style', 'theretailer' ),
            'section'  => 'shop',
            'priority' => 10,
            'choices'  => array(
                '0'     => esc_html__('Vertical', 'theretailer'),
                '1'     => esc_html__('Horizontal', 'theretailer'),
            ),
            'active_callback' => 'shop_sidebar_is_enabled'
        )
    )
);

// Second Product Image on Hover.
$wp_customize->add_setting(
    'flip_product',
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
        'flip_product',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Second Product Image on Hover', 'theretailer' ),
            'section'  => 'shop',
            'priority' => 10,
        )
    )
);

// Parent Category.
$wp_customize->add_setting(
    'category_listing',
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
        'category_listing',
        array(
            'type'     => 'select',
            'label'    => esc_html__( 'Parent Category', 'theretailer' ),
            'section'  => 'shop',
            'priority' => 10,
            'choices'  => array(
                '0'     => esc_html__('Visible on product card', 'theretailer'),
                '1'     => esc_html__('Hidden on product card', 'theretailer'),
            ),
        )
    )
);

// Rating Stars.
$wp_customize->add_setting(
    'ratings_on_product_listing',
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
        'ratings_on_product_listing',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Rating Stars', 'theretailer' ),
            'section'  => 'shop',
            'priority' => 10,
        )
    )
);

// Out of Stock Badge Text.
$wp_customize->add_setting(
    'out_of_stock_text',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'default'    => esc_html__( 'Out of Stock', 'theretailer'),
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'out_of_stock_text',
        array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Out of Stock Badge Text', 'theretailer' ),
            'section'     => 'shop',
            'priority'    => 10,
        )
    )
);

// Sale Badge Text.
$wp_customize->add_setting(
    'sale_text',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'default'    => esc_html__( 'Sale!', 'theretailer'),
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'sale_text',
        array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Sale Badge Text', 'theretailer' ),
            'section'     => 'shop',
            'priority'    => 10,
        )
    )
);
