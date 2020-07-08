<?php


function getbowtied_theme_register_required_plugins() {

    $plugins = array(
        'woocommerce' => array(
        'name'               => 'WooCommerce',
        'slug'               => 'woocommerce',
        'required'           => false,
        'description'        => 'The eCommerce engine of your WordPress site.',
        'demo_required'      => true
        ),
        'product-blocks-for-woocommerce' => array(
          'name'               => 'Product Blocks for WooCommerce',
          'slug'               => 'product-blocks-for-woocommerce',
          'required'           => true,
          'description'        => 'Create beautiful product displays for your WooCommerce store.',
          'demo_required'      => true
        ),
        'one-click-demo-import'=> array(
          'name'               => 'One Click Demo Import',
          'slug'               => 'one-click-demo-import',
          'required'           => false,
          'description'        => 'Adds easy-to-use demo import functionality.',
          'demo_required'      => true
        ),
        'woocommerce-colororimage-variation-select' => array(
            'name'               => 'WooSwatches - Woocommerce Color or Image Variation Swatches',
            'slug'               => 'woocommerce-colororimage-variation-select',
            'source'             => get_template_directory() . '/inc/plugins/woocommerce-colororimage-variation-select.zip',
            'required'           => false,
            'external_url'       => '',
            'description'        => 'Convert variable select box into color or image select.',
            'demo_required'      => false,
            'version'            => '2.8.7'
        ),
        'js_composer' => array(
          'name'               => 'WPBakery Page Builder',
          'slug'               => 'js_composer',
          'source'             => get_template_directory() . '/inc/plugins/js_composer.zip',
          'required'           => false,
          'external_url'       => '',
          'description'        => 'The page builder plugin coming with the theme.',
          'demo_required'      => false,
          'version'            => '6.2.0'
        ),
        'envato-market'        => array(
          'name'               => 'Envato Market',
          'slug'               => 'envato-market',
          'required'           => false,
          'source'             => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
          'description'        => 'Enables updates for all your Envato purchases.',
          'demo_required'      => false
        ),
        'the-retailer-extender'  => array(
          'name'                 => 'The Retailer Extender',
          'slug'                 => 'the-retailer-extender',
          'source'               => 'https://github.com/getbowtied/the-retailer-extender/zipball/master',
          'required'             => true,
          'external_url'         => 'https://github.com/getbowtied/the-retailer-extender',
          'description'          => 'Extends the functionality of with theme-specific features.',
          'demo_required'        => true,
        ),
        'hookmeup'             => array(
          'name'               => 'HookMeUp – Additional Content for WooCommerce',
          'slug'               => 'hookmeup',
          'required'           => false,
          'description'        => 'Customize WooCommerce templates without coding.',
          'demo_required'      => false
        ),
        'the-retailer-portfolio'  => array(
          'name'                 => 'The Retailer Portfolio Addon',
          'slug'                 => 'the-retailer-portfolio',
          'source'               => 'https://github.com/getbowtied/the-retailer-portfolio/zipball/master',
          'required'             => false,
          'external_url'         => 'https://github.com/getbowtied/the-retailer-portfolio',
          'description'          => 'Extends the functionality of The Retailer by adding a "Portfolio" custom post type.',
          'demo_required'        => true,
        ),
        'the-retailer-deprecated'  => array(
          'name'                 => 'The Retailer Deprecated Features',
          'slug'                 => 'the-retailer-deprecated',
          'source'               => 'https://github.com/getbowtied/the-retailer-deprecated/zipball/master',
          'required'             => false,
          'external_url'         => 'https://github.com/getbowtied/the-retailer-deprecated',
          'description'          => 'Old features of The Retailer that are no longer used.',
          'demo_required'        => false,
        ),
    );

    $config = array(
        'id'               => 'getbowtied',
        'default_path'      => '',
        'parent_slug'       => 'themes.php',
        'menu'              => 'tgmpa-install-plugins',
        'has_notices'       => true,
        'is_automatic'      => false,
    );

    tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'getbowtied_theme_register_required_plugins' );
