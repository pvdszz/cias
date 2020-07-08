<?php

/**
 * Checks if main layout is boxed.
 */
function main_layout_is_boxed(){

    return ( 'boxed' === GBT_Opt::getOption( 'gb_layout', 'fullscreen' ) );
}

// Main Layout Style.
$wp_customize->add_setting(
    'gb_layout',
    array(
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'theretailer_sanitize_select',
        'default'           => 'fullscreen',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'gb_layout',
        array(
            'type'     => 'select',
            'label'    => esc_html__( 'Main Layout Style', 'theretailer' ),
            'section'  => 'general',
            'priority' => 10,
            'choices'  => array(
                'fullscreen' => esc_html__( 'Full Width', 'theretailer' ),
                'boxed'      => esc_html__( 'Boxed', 'theretailer' ),
            ),
        )
    )
);

// Boxed Layout Width.
$wp_customize->add_setting(
    'boxed_layout_width',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
        'default'    => 1100,
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'boxed_layout_width',
        array(
            'type'        => 'number',
            'label'       => esc_html__( 'Boxed Layout Width', 'theretailer' ),
            'description' => esc_html__( "(980px - 1600px)", 'theretailer' ),
            'section'     => 'general',
            'priority'    => 10,
            'input_attrs' => array(
                'min'  => 980,
                'max'  => 1600,
                'step' => 1,
            ),
            'active_callback' => 'main_layout_is_boxed',
        )
    )
);

// Background Color.
$wp_customize->add_setting(
    'main_bg_color',
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
        'main_bg_color',
        array(
            'label'    => esc_html__( 'Background Color', 'theretailer' ),
            'section'  => 'general',
            'priority' => 10,
            'active_callback' => 'main_layout_is_boxed',
        )
    )
);

// Background Image.
$wp_customize->add_setting(
    'main_bg',
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
        'main_bg',
        array(
            'type'        => 'image',
            'label'       => esc_html__( 'Background Image', 'theretailer' ),
            'section'     => 'general',
            'priority'    => 10,
            'active_callback' => 'main_layout_is_boxed',
        )
    )
);

// Comments on Pages.
$wp_customize->add_setting(
    'page_comments',
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
        'page_comments',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Comments on Pages', 'theretailer' ),
            'section'  => 'general',
            'priority' => 10,
        )
    )
);

// Progress Bar.
$wp_customize->add_setting(
    'progress_bar',
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
        'progress_bar',
        array(
            'type'          => 'checkbox',
            'label'         => esc_html__( 'Progress Bar', 'theretailer' ),
            'description'   => TR_ELEMENTOR_IS_ACTIVE ? '<span class="dashicons dashicons-warning"></span>' . esc_html__( 'Progress Bar functionality has been deactivated due to Elementor incompatibility.', 'theretailer' ) : '',
            'section'       => 'general',
            'priority'      => 10,
        )
    )
);
