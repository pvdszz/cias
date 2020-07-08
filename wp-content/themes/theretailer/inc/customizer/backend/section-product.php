<?php

/**
 * Checks if related products are enabled.
 */
function related_products_are_enabled(){

    return GBT_Opt::getOption( 'related_products_on_product_page', true );
}

// Product Page Sidebar.
$wp_customize->add_setting(
    'products_layout',
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
        'products_layout',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Product Page Sidebar', 'theretailer' ),
            'section'  => 'product',
            'priority' => 10,
        )
    )
);

// Product Image Zoom.
$wp_customize->add_setting(
    'product_image_zoom',
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
        'product_image_zoom',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Product Image Zoom', 'theretailer' ),
            'section'  => 'product',
            'priority' => 10,
        )
    )
);

// Product Reviews.
$wp_customize->add_setting(
    'reviews_on_product_page',
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
        'reviews_on_product_page',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Product Reviews', 'theretailer' ),
            'section'  => 'product',
            'priority' => 10,
        )
    )
);

// Related Products.
$wp_customize->add_setting(
    'related_products_on_product_page',
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
        'related_products_on_product_page',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Related Products', 'theretailer' ),
            'section'  => 'product',
            'priority' => 10,
        )
    )
);

// Number of Related Products.
$wp_customize->add_setting(
    'related_products_number',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
        'default'    => 4,
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'related_products_number',
        array(
            'type'        => 'number',
            'label'       => esc_html__( 'Number of Related Products', 'theretailer' ),
            'description' => esc_html__( "(2 - 12)", 'theretailer' ),
            'section'     => 'product',
            'priority'    => 10,
            'input_attrs' => array(
                'min'  => 2,
                'max'  => 12,
                'step' => 1,
            ),
            'active_callback' => 'related_products_are_enabled',
        )
    )
);
