<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php do_action('the_retailer_header_start'); ?>

	<?php TheRetailer_Fonts::preload_default_fonts( array('Radnika Next Alt', 'HK Nova') ); ?>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <div id="global_wrapper" class="<?php echo ( GBT_Opt::getOption( 'gb_layout', 'fullscreen' ) == 'boxed' ) ? 'boxed-content' : 'full-content'; ?>">

    <?php

    // header style
    $header_style = 'default';
    if( '1' === GBT_Opt::getOption( 'gb_header_style', '0' ) ) {
        $header_style = 'centered';
    }
    if( '2' === GBT_Opt::getOption( 'gb_header_style', '0' ) ) {
        $header_style = 'menu_under';
    }

    // menu classes
    $menu_classes = 'menus_wrapper';

    if ( 'style2' === GBT_Opt::getOption( 'shopping_bag_style', 'style2' ) ) {
        $menu_classes .= ' menus_wrapper_shopping_bag_mobile_style';
    }
    if ( !GBT_Opt::getOption( 'shopping_bag_in_header', true ) ) {
        $menu_classes .= ' menus_wrapper_no_shopping_bag_in_header';
    }
    if ( !has_nav_menu( 'secondary' ) ) {
        $menu_classes .= ' menus_wrapper_no_secondary_menu';
    }

    // shopping bag
    $shopping_bag = false;
    if( TR_WOOCOMMERCE_IS_ACTIVE && GBT_Opt::getOption( 'shopping_bag_in_header', true ) && !GBT_Opt::getOption( 'catalog_mode', false ) ) {
        $shopping_bag = true;
    }

    // shopping bag classes
    $shopping_bag_classes = 'gbtr_little_shopping_bag_wrapper';

    if( 'style2' === GBT_Opt::getOption( 'shopping_bag_style', 'style2' ) ) {
        $shopping_bag_classes .= ' shopping_bag_mobile_style';
    } else {
        $shopping_bag_classes .= ' shopping_bag_default_style';
    }

    if( GBT_Opt::getOption( 'shopping_bag_in_header', true ) ) {
        $shopping_bag_classes .= ' shopping_bag_in_header';
    } else {
        $shopping_bag_classes .= ' no_shopping_bag_in_header';
    }

    $page_id = "";
    if ( is_single() || is_page() ) {
        $page_id = get_the_ID();
    } else if ( is_home() ) {
        $page_id = get_option('page_for_posts');
    }

    $page_header_option = "on";
    if ( get_post_meta( $page_id, 'page_header_meta_box_check', true ) ) {
        $page_header_option = get_post_meta( $page_id, 'page_header_meta_box_check', true );
    }

    ?>

    <?php if ( $page_header_option == "on" ) { ?>

        <header class="gbtr_header_wrapper <?php echo esc_html($header_style); ?>_header">

            <?php

                if ( GBT_Opt::getOption('hide_topbar', true) ) {
					include( get_parent_theme_file_path( 'header_topbar.php' ) );
                }

            ?>

            <div class="content_header">

                <div class="mobile_menu_wrapper">
                    <ul>
                        <li class="c-offcanvas-content-wrap hamburger_menu_button">
                            <a id="<?php echo is_rtl() ? 'triggerButtonRight' : 'triggerButtonLeft'; ?>" href="<?php echo is_rtl() ? '#offCanvasRight' : '#offCanvasLeft'; ?>" class="js-offcanvas-trigger tools_button" data-offcanvas-trigger="<?php echo is_rtl() ? 'offCanvasRight' : 'offCanvasLeft'; ?>">
                                <span class="hamburger_menu_icon"></span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="gbtr_logo_wrapper_<?php echo esc_html($header_style); ?>">
                    <?php if ( !empty( GBT_Opt::getOption( 'site_logo', '' ) ) ) {

                        $site_logo_img = GBT_Opt::getOption( 'site_logo', '' );
                        if (is_ssl()) {
                            $site_logo_img = str_replace( "http://", "https://", GBT_Opt::getOption( 'site_logo', '' ) );
                        } ?>

                        <a href="<?php echo home_url(); ?>" class="gbtr_logo">
                            <img src="<?php echo esc_url($site_logo_img); ?>" alt="logo" />
                        </a>

                    <?php } else { ?>

                        <div class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                        </div>

                    <?php } ?>

                    <?php if ( !empty( GBT_Opt::getOption( 'alternative_logo', GBT_Opt::getOption( 'site_logo', '' ) ) ) ) {

                        $alternative_logo_img   = GBT_Opt::getOption( 'alternative_logo', GBT_Opt::getOption( 'site_logo', '' ) );
                        if (is_ssl()) {
                            $alternative_logo_img   = str_replace( "http://", "https://", GBT_Opt::getOption( 'alternative_logo', GBT_Opt::getOption( 'site_logo', '' ) ) );
                        } ?>

                        <a href="<?php echo home_url(); ?>" class="gbtr_alt_logo">
                            <img src="<?php echo esc_url($alternative_logo_img); ?>" alt="logo" />
                        </a>

                    <?php } else { ?>

                        <div class="mobile-site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                        </div>

                    <?php } ?>
                </div>

                <div class="gbtr_menu_wrapper_<?php echo esc_html($header_style); ?>">

                    <div class="<?php echo esc_html($menu_classes); ?>">

                        <?php if ( has_nav_menu( 'primary' ) ) { ?>
                            <div class="gbtr_first_menu">
                                <nav class="main-navigation first-navigation" role="navigation">
                                    <?php
                                    wp_nav_menu( array(
                                        'theme_location'   => 'primary',
                                        'container'        => false,
                                        'menu_class'       => '',
                                        'echo'             => true,
                                        'items_wrap'       => '<ul class="sf-menu">%3$s</ul>',
                                        'before'           => '',
                                        'after'            => '',
                                        'link_before'      => '',
                                        'link_after'       => '',
                                        'depth'            => 0,
                                        'fallback_cb'      => false,
                                    ));
                                    ?>
                                </nav>

                                <?php if( $shopping_bag && $header_style == 'centered' ) { ?>

                                    <ul class="shopping_bag_centered_style_wrapper">
                                        <li class="shopping_bag_centered_style">

                                            <span><?php echo esc_html__('Shopping Bag', 'theretailer'); ?></span>
                                            <span class="items_number"><?php echo WC()->cart->cart_contents_count; ?></span>

                                            <div class="gbtr_minicart_wrapper">
                                                <div class="gbtr_minicart">
                                                    <?php if ( class_exists( 'WC_Widget_Cart' ) ) { the_widget( 'WC_Widget_Cart' ); } ?>
                                                </div>
                                            </div>

                                        </li>
                                    </ul>

                                <?php } ?>

                            </div>
                        <?php } ?>

                        <?php if ( has_nav_menu( 'secondary' ) ) { ?>
                        <div class="gbtr_second_menu">
                            <nav class="secondary-navigation main-navigation" role="navigation">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'secondary',
                                    'container' =>false,
                                    'menu_class' => '',
                                    'echo' => true,
                                    'items_wrap'      => '<ul>%3$s</ul>',
                                    'before' => '',
                                    'after' => '',
                                    'link_before' => '',
                                    'link_after' => '',
                                    'depth' => 0,
                                    'fallback_cb' => false,
                                ));
                                ?>
                            </nav>
                        </div>
                        <?php } ?>

                    </div>

                    <?php if( $shopping_bag ) { ?>

                        <div class="shopping_bag_wrapper">

							<a href="<?php echo esc_url( wc_get_cart_url() ); ?>">

	                            <div class="<?php echo esc_html($shopping_bag_classes); ?>">

	                                <div class="gbtr_little_shopping_bag">
	                                    <div class="title">
	                                        <?php esc_html_e( 'Cart', 'woocommerce' ) ?>
	                                    </div>

	                                    <div class="overview">
	                                        <?php echo WC()->cart->get_cart_total(); ?>
	                                        <span class="minicart_items">
	                                            / <?php echo sprintf( _n( '%d item', '%d items', WC()->cart->cart_contents_count, 'theretailer' ), WC()->cart->cart_contents_count ); ?>
	                                        </span>
	                                    </div>

	                                    <div class="gb_cart_contents_count">
	                                        <?php echo WC()->cart->cart_contents_count; ?>
	                                    </div>
	                                </div>

	                                <div class="gbtr_minicart_wrapper">
	                                    <div class="gbtr_minicart">
	                                        <?php if ( class_exists( 'WC_Widget_Cart' ) ) {
	                                            the_widget( 'WC_Widget_Cart' );
	                                        } ?>
	                                    </div>
	                                </div>

	                            </div>

							</a>

                        </div>

                    <?php } ?>

                </div>

                <div class="mobile_tools">
                    <ul>

                        <?php if( $shopping_bag ) { ?>

                            <li class="shopping_bag_button">
                                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="tools_button">
                                    <span class="shopping_bag_icon"></span>
                                    <span class="items_number">
                                        <?php echo WC()->cart->cart_contents_count; ?>
                                    </span>
                                </a>
                            </li>

                        <?php } ?>

                        <li class="c-offcanvas-content-wrap search_button">
                            <a id="triggerButtonTop" href="#offCanvasTop" class="js-offcanvas-trigger tools_button" data-offcanvas-trigger="offCanvasTop">
                                <span class="search_icon"></span>
                            </a>
                        </li>

                    </ul>

                </div>

            </div>

        </header>

    <?php } ?>

	<?php if ( !TR_ELEMENTOR_IS_ACTIVE && GBT_Opt::getOption( 'progress_bar', false ) ) { ?>
        <div class="progress-bar-wrapper"></div>
    <?php } ?>
