<?php

/**
 * Checks if main font source is theme defaults.
 */
function main_font_source_theme_font() {
    return ( 'default' === GBT_Opt::getOption( 'main_font_source', 'default' ) );
}

/**
 * Checks if secondary font source is theme defaults.
 */
function secondary_font_source_theme_font() {
    return ( 'default' === GBT_Opt::getOption( 'secondary_font_source', 'default' ) );
}

/**
 * Checks if main font source is google.
 */
function main_font_source_google_font() {
    return ( 'google' === GBT_Opt::getOption( 'main_font_source', 'default' ) );
}

/**
 * Checks if secondary font source is google.
 */
function secondary_font_source_google_font() {
    return ( 'google' === GBT_Opt::getOption( 'secondary_font_source', 'default' ) );
}

/**
 * Checks if main font source is web safe.
 */
function main_font_source_web_safe_font() {
    return ( 'web-safe' === GBT_Opt::getOption( 'main_font_source', 'default' ) );
}

/**
 * Checks if secondary font source is web safe.
 */
function secondary_font_source_web_safe_font() {
    return ( 'web-safe' === GBT_Opt::getOption( 'secondary_font_source', 'default' ) );
}

/**
 * Checks if main font source is custom.
 */
function main_font_source_custom_font() {
    return ( 'custom' === GBT_Opt::getOption( 'main_font_source', 'default' ) );
}

/**
 * Checks if secondary font source is custom.
 */
function secondary_font_source_custom_font() {
    return ( 'custom' === GBT_Opt::getOption( 'secondary_font_source', 'default' ) );
}

// Main Font Source
$wp_customize->add_setting(
    'main_font_source',
    array(
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'theretailer_sanitize_select',
        'default'           => 'default',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'main_font_source',
        array(
            'type'     => 'select',
            'label'    => esc_html__( 'Main Font Source', 'theretailer' ),
            'section'  => 'fonts',
            'priority' => 10,
            'choices'  => array(
                'default'       => esc_html__( 'Theme Defaults', 'theretailer' ),
                'google'        => esc_html__( 'Google Fonts', 'theretailer' ),
                'web-safe'      => esc_html__( 'Web Safe Fonts', 'theretailer' ),
                'custom'        => esc_html__( 'Custom Fonts', 'theretailer' ),
            ),
        )
    )
);

// Theme Default Main Font.
$wp_customize->add_setting(
    'new_gb_main_font',
    array(
        'default' 			=> 'Radnika Next Alt',
        'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'type'				=> 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'new_gb_main_font',
        array(
            'type'			=> 'text',
            'label' 		=> __( 'Main Font', 'theretailer' ),
            'description'	=> TheRetailer_Fonts::get_defaults_suggested_fonts_list() . __( 'Radnika Next Alt / HK Nova', 'theretailer' ),
            'section' 		=> 'fonts',
            'input_attrs' 	=> array(
                'placeholder' 		=> __( 'Enter the font name', 'theretailer' ),
                'class'				=> 'theretailer-font-suggestions',
                'list'  			=> 'theretailer-suggested-default-fonts',
                'autocapitalize'	=> 'off',
                'autocomplete'		=> 'off',
                'autocorrect'		=> 'off',
                'spellcheck'		=> 'false',
            ),
            'active_callback' => 'main_font_source_theme_font',
        )
    )
);

// Main Google Font.
$wp_customize->add_setting(
    'google_gb_main_font',
    array(
        'default' 			=> 'Roboto',
        'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'type'				=> 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'google_gb_main_font',
        array(
            'type'			=> 'text',
            'label' 		=> __( 'Main Font', 'theretailer' ),
            'description'	=> TheRetailer_Fonts::get_suggested_fonts_list() . __( 'The Retailer supports all fonts on <a href="https://fonts.google.com" target="_blank">Google Fonts</a>.', 'theretailer' ),
            'section' 		=> 'fonts',
            'input_attrs' 	=> array(
                'placeholder' 		=> __( 'Enter the font name', 'theretailer' ),
                'class'				=> 'theretailer-font-suggestions',
                'list'  			=> 'theretailer-suggested-fonts',
                'autocapitalize'	=> 'off',
                'autocomplete'		=> 'off',
                'autocorrect'		=> 'off',
                'spellcheck'		=> 'false',
            ),
            'active_callback' => 'main_font_source_google_font',
        )
    )
);

// Web Safe Main Font.
$wp_customize->add_setting(
    'web_safe_gb_main_font',
    array(
        'default' 			=> 'Arial',
        'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'type'				=> 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'web_safe_gb_main_font',
        array(
            'type'			=> 'text',
            'label' 		=> __( 'Main Font', 'theretailer' ),
            'description'	=> TheRetailer_Fonts::get_web_safe_suggested_fonts_list() . __( 'The Retailer supports all <a href="https://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">web safe fonts</a>.', 'theretailer' ),
            'section' 		=> 'fonts',
            'input_attrs' 	=> array(
                'placeholder' 		=> __( 'Enter the font name', 'theretailer' ),
                'class'				=> 'theretailer-font-suggestions',
                'list'  			=> 'theretailer-suggested-web-fonts',
                'autocapitalize'	=> 'off',
                'autocomplete'		=> 'off',
                'autocorrect'		=> 'off',
                'spellcheck'		=> 'false',
            ),
            'active_callback' => 'main_font_source_web_safe_font',
        )
    )
);

// Custom Main Font.
$wp_customize->add_setting(
    'custom_gb_main_font',
    array(
        'default' 			=> '',
        'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'type'				=> 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'custom_gb_main_font',
        array(
            'type'			=> 'text',
            'label' 		=> __( 'Main Font', 'theretailer' ),
            'section' 		=> 'fonts',
            'input_attrs' 	=> array(
                'placeholder' 		=> __( 'Enter the font name', 'theretailer' ),
                'autocapitalize'	=> 'off',
                'autocomplete'		=> 'off',
                'autocorrect'		=> 'off',
                'spellcheck'		=> 'false',
            ),
            'active_callback' => 'main_font_source_custom_font',
        )
    )
);

// Secondary Font Source
$wp_customize->add_setting(
    'secondary_font_source',
    array(
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'theretailer_sanitize_select',
        'default'           => 'default',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'secondary_font_source',
        array(
            'type'     => 'select',
            'label'    => esc_html__( 'Secondary Font Source', 'theretailer' ),
            'section'  => 'fonts',
            'priority' => 10,
            'choices'  => array(
                'default'       => esc_html__( 'Theme Defaults', 'theretailer' ),
                'google'        => esc_html__( 'Google Fonts', 'theretailer' ),
                'web-safe'      => esc_html__( 'Web Safe Fonts', 'theretailer' ),
                'custom'        => esc_html__( 'Custom Fonts', 'theretailer' ),
            ),
        )
    )
);

// Theme Default Secondary Font.
$wp_customize->add_setting(
    'new_gb_secondary_font',
    array(
        'default' 			=> 'Radnika Next Alt',
        'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'type'				=> 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'new_gb_secondary_font',
        array(
            'type'			=> 'text',
            'label' 		=> __( 'Secondary Font', 'theretailer' ),
            'description'	=> TheRetailer_Fonts::get_defaults_suggested_fonts_list() . __( 'Radnika Next Alt / HK Nova', 'theretailer' ),
            'section' 		=> 'fonts',
            'input_attrs' 	=> array(
                'placeholder' 		=> __( 'Enter the font name', 'theretailer' ),
                'class'				=> 'theretailer-font-suggestions',
                'list'  			=> 'theretailer-suggested-default-fonts',
                'autocapitalize'	=> 'off',
                'autocomplete'		=> 'off',
                'autocorrect'		=> 'off',
                'spellcheck'		=> 'false',
            ),
            'active_callback' => 'secondary_font_source_theme_font',
        )
    )
);

// Secondary Google Font.
$wp_customize->add_setting(
    'google_gb_secondary_font',
    array(
        'default' 			=> 'Roboto',
        'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'type'				=> 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'google_gb_secondary_font',
        array(
            'type'			=> 'text',
            'label' 		=> __( 'Secondary Font', 'theretailer' ),
            'description'	=> TheRetailer_Fonts::get_suggested_fonts_list() . __( 'The Retailer supports all fonts on <a href="https://fonts.google.com" target="_blank">Google Fonts</a>.', 'theretailer' ),
            'section' 		=> 'fonts',
            'input_attrs' 	=> array(
                'placeholder' 		=> __( 'Enter the font name', 'theretailer' ),
                'class'				=> 'theretailer-font-suggestions',
                'list'  			=> 'theretailer-suggested-fonts',
                'autocapitalize'	=> 'off',
                'autocomplete'		=> 'off',
                'autocorrect'		=> 'off',
                'spellcheck'		=> 'false',
            ),
            'active_callback' => 'secondary_font_source_google_font',
        )
    )
);

// Web Safe Secondary Font.
$wp_customize->add_setting(
    'web_safe_gb_secondary_font',
    array(
        'default' 			=> 'Arial',
        'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'type'				=> 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'web_safe_gb_secondary_font',
        array(
            'type'			=> 'text',
            'label' 		=> __( 'Secondary Font', 'theretailer' ),
            'description'	=> TheRetailer_Fonts::get_web_safe_suggested_fonts_list() . __( 'The Retailer supports all <a href="https://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">web safe fonts</a>.', 'theretailer' ),
            'section' 		=> 'fonts',
            'input_attrs' 	=> array(
                'placeholder' 		=> __( 'Enter the font name', 'theretailer' ),
                'class'				=> 'theretailer-font-suggestions',
                'list'  			=> 'theretailer-suggested-web-fonts',
                'autocapitalize'	=> 'off',
                'autocomplete'		=> 'off',
                'autocorrect'		=> 'off',
                'spellcheck'		=> 'false',
            ),
            'active_callback' => 'secondary_font_source_web_safe_font',
        )
    )
);

// Custom Secondary Font.
$wp_customize->add_setting(
    'custom_gb_secondary_font',
    array(
        'default' 			=> '',
        'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'type'				=> 'theme_mod',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'custom_gb_secondary_font',
        array(
            'type'			=> 'text',
            'label' 		=> __( 'Secondary Font', 'theretailer' ),
            'section' 		=> 'fonts',
            'input_attrs' 	=> array(
                'placeholder' 		=> __( 'Enter the font name', 'theretailer' ),
                'autocapitalize'	=> 'off',
                'autocomplete'		=> 'off',
                'autocorrect'		=> 'off',
                'spellcheck'		=> 'false',
            ),
            'active_callback' => 'secondary_font_source_custom_font',
        )
    )
);

// Font Display.
$wp_customize->add_setting(
    'font_face_display',
    array(
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'theretailer_sanitize_select',
        'default'           => 'swap',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'font_face_display',
        array(
            'type'     => 'select',
            'label'    => esc_html__( 'Font Display', 'theretailer' ),
            'section'  => 'fonts',
            'description' => '<ul><li>'.esc_html__( 'Swap - uses fallback font until the fonts area loaded', 'theretailer' ).'</li><li>'.esc_html__( 'Block - briefly hides the text until the font is fully loaded', 'theretailer' ).'</li></ul>',
            'priority' => 10,
            'choices'  => array(
                'swap'       => esc_html__( 'Use fallback font (swap)', 'theretailer' ),
                'block'      => esc_html__( 'Hide text while loading (block)', 'theretailer' ),
            ),
        )
    )
);

// Primary Font Color.
$wp_customize->add_setting(
    'primary_color',
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
        'primary_color',
        array(
            'label'    => esc_html__( 'Primary Font Color', 'theretailer' ),
            'section'  => 'fonts',
            'priority' => 10,
        )
    )
);

// Accent Color.
$wp_customize->add_setting(
    'accent_color',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default'    => '#b39964',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'accent_color',
        array(
            'label'    => esc_html__( 'Accent Color', 'theretailer' ),
            'section'  => 'fonts',
            'priority' => 10,
        )
    )
);

// Base Font Size.
$wp_customize->add_setting(
    'base_font_size',
    array(
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
        'default'    => 13,
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'base_font_size',
        array(
            'type'        => 'number',
            'label'       => esc_html__( 'Base Font Size', 'theretailer' ),
            'description' => esc_html__( "(10px - 24px)", 'theretailer' ),
            'section'     => 'fonts',
            'priority'    => 10,
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 24,
                'step' => 1,
            ),
        )
    )
);
