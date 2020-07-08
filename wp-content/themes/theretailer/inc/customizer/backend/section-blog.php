<?php

// Full Post on Blog Listing.
$wp_customize->add_setting(
    'show_full_post',
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
        'show_full_post',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Full Post on Blog Listing', 'theretailer' ),
            'section'  => 'blog',
            'priority' => 10,
        )
    )
);

// Featured Image on Single Post.
$wp_customize->add_setting(
    'featured_image_single_post',
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
        'featured_image_single_post',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Featured Image on Single Post', 'theretailer' ),
            'section'  => 'blog',
            'priority' => 10,
        )
    )
);

// Blog Sidebar.
$wp_customize->add_setting(
    'blog_sidebar',
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
        'blog_sidebar',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Blog Sidebar', 'theretailer' ),
            'section'  => 'blog',
            'priority' => 10,
        )
    )
);

// Post Sidebar.
$wp_customize->add_setting(
    'post_sidebar',
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
        'post_sidebar',
        array(
            'type'     => 'checkbox',
            'label'    => esc_html__( 'Post Sidebar', 'theretailer' ),
            'section'  => 'blog',
            'priority' => 10,
        )
    )
);
