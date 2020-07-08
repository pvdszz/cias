<?php
/**
 * Customizer sections
 */

 /**
 * Sets the customizer sections
 *
 * @param  [object] $wp_customize [customizer object].
 */
add_action( 'customize_register','theretailer_customizer_sections' );
function theretailer_customizer_sections( $wp_customize ) {

    // Sections.

    $wp_customize->add_section( 'general', array(
        'title'          => esc_attr__( 'General', 'theretailer' ),
        'priority'       => 1,
        'capability'     => 'edit_theme_options',
    ) );

    $wp_customize->add_panel( 'header', array(
        'title'          => esc_attr__( 'Header', 'theretailer' ),
        'priority'       => 2,
        'capability'     => 'edit_theme_options',
    ) );

    $wp_customize->add_section( 'header_logo', array(
        'title'          => esc_attr__( 'Logo', 'theretailer' ),
        'priority'       => 1,
        'capability'     => 'edit_theme_options',
        'panel'          => 'header',
    ) );

    $wp_customize->add_section( 'header_topbar', array(
        'title'          => esc_attr__( 'Top Bar', 'theretailer' ),
        'priority'       => 1,
        'capability'     => 'edit_theme_options',
        'panel'          => 'header',
    ) );

    $wp_customize->add_section( 'header_layout', array(
        'title'          => esc_attr__( 'Header Layout', 'theretailer' ),
        'priority'       => 1,
        'capability'     => 'edit_theme_options',
        'panel'          => 'header',
    ) );

    $wp_customize->add_section( 'header_navigation', array(
        'title'          => esc_attr__( 'Header Navigation', 'theretailer' ),
        'priority'       => 1,
        'capability'     => 'edit_theme_options',
        'panel'          => 'header',
    ) );

    $wp_customize->add_section( 'header_shopping_bag', array(
        'title'          => esc_attr__( 'Mini Shopping Bag', 'theretailer' ),
        'priority'       => 1,
        'capability'     => 'edit_theme_options',
        'panel'          => 'header',
    ) );

    $wp_customize->add_panel( 'footer', array(
        'title'          => esc_attr__( 'Footer', 'theretailer' ),
        'priority'       => 3,
        'capability'     => 'edit_theme_options',
    ) );

    $wp_customize->add_section( 'light_footer', array(
        'title'          => esc_attr__( 'Light Footer', 'theretailer' ),
        'priority'       => 4,
        'capability'     => 'edit_theme_options',
        'panel'          => 'footer',
    ) );

    $wp_customize->add_section( 'dark_footer', array(
        'title'          => esc_attr__( 'Dark Footer', 'theretailer' ),
        'priority'       => 4,
        'capability'     => 'edit_theme_options',
        'panel'          => 'footer',
    ) );

    $wp_customize->add_section( 'footer_copyright_bar', array(
        'title'          => esc_attr__( 'Copyright Bar', 'theretailer' ),
        'priority'       => 4,
        'capability'     => 'edit_theme_options',
        'panel'          => 'footer',
    ) );

    $wp_customize->add_section( 'mobile_footer', array(
        'title'          => esc_attr__( 'Mobile Footer', 'theretailer' ),
        'priority'       => 4,
        'capability'     => 'edit_theme_options',
        'panel'          => 'footer',
    ) );

    $wp_customize->add_section( 'blog', array(
        'title'          => esc_attr__( 'Blog', 'theretailer' ),
        'priority'       => 4,
        'capability'     => 'edit_theme_options',
    ) );

    if( TR_WOOCOMMERCE_IS_ACTIVE ) {

        $wp_customize->add_section( 'shop', array(
            'title'          => esc_attr__( 'Shop', 'theretailer' ),
            'priority'       => 5,
            'capability'     => 'edit_theme_options',
        ) );

        $wp_customize->add_section( 'product', array(
            'title'          => esc_attr__( 'Product Page', 'theretailer' ),
            'priority'       => 6,
            'capability'     => 'edit_theme_options',
        ) );

    }

    $wp_customize->add_section( 'styling', array(
        'title'          => esc_attr__( 'Styling', 'theretailer' ),
        'priority'       => 8,
        'capability'     => 'edit_theme_options',
    ) );

    $wp_customize->add_section( 'fonts', array(
        'title'          => esc_attr__( 'Fonts', 'theretailer' ),
        'priority'       => 9,
        'capability'     => 'edit_theme_options',
    ) );

    // Controls.

    include_once( get_template_directory() . '/inc/customizer/backend/section-general.php' );
    include_once( get_template_directory() . '/inc/customizer/backend/section-header.php' );
    include_once( get_template_directory() . '/inc/customizer/backend/section-footer.php' );
    include_once( get_template_directory() . '/inc/customizer/backend/section-fonts.php' );
    include_once( get_template_directory() . '/inc/customizer/backend/section-blog.php' );
    //
    if( TR_WOOCOMMERCE_IS_ACTIVE ) {
        include_once( get_template_directory() . '/inc/customizer/backend/section-shop.php' );
        include_once( get_template_directory() . '/inc/customizer/backend/section-product.php' );
    }
}
