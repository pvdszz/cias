<?php

$custom_style .= '

    .global_content_wrapper .widget ul li.recentcomments:before
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'primary_color_rgb' ), 'chat-bubble' ) . ';
    }

    .gbtr_light_footer_wrapper .widget ul li.recentcomments:before
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'primary_footer_color_rgb' ), 'chat-bubble' ) . ';
    }

    .gbtr_dark_footer_wrapper .widget ul li.recentcomments:before
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'secondary_footer_color_rgb' ), 'chat-bubble' ) . ';
    }

    .gbtr_little_shopping_bag .title:after
    {
        background-image: ' . GBT_Icon::getIcon( '16', '16', GBT_Opt::getOption( 'primary_menu_color_rgb' ), 'arrow-down' ) . ';
    }

    .mobile_tools .shopping_bag_button .shopping_bag_icon:before
    {
        background-image: ' . GBT_Icon::getIcon( '24', '30', GBT_Opt::getOption( 'primary_menu_color_rgb' ), 'shopping-cart', '24', '30' ) . ';
    }

    .mobile_tools .search_button .search_icon:before
    {
        background-image: ' . GBT_Icon::getIcon( '20', '20', GBT_Opt::getOption( 'primary_menu_color_rgb' ), 'search', '50', '50' ) . ';
    }

    .mobile_menu_wrapper .hamburger_menu_button .hamburger_menu_icon:before
    {
        background-image: ' . GBT_Icon::getIcon( '24', '24', GBT_Opt::getOption( 'primary_menu_color_rgb' ), 'hamburger', '24', '24' ) . ';
    }

    .woocommerce .woocommerce-ordering select.orderby, .woocommerce-page .woocommerce-ordering select.orderby,
    .wc-block-grid .wc-block-sort-select__select
    {
        background-image: ' . GBT_Icon::getIcon( '20', '20', GBT_Opt::getOption( 'primary_color_rgb' ), 'arrow-down' ) . ';
    }

    .shop_offcanvas_button span:after
    {
        background-image: ' . GBT_Icon::getIcon( '20', '20', GBT_Opt::getOption( 'primary_color_rgb' ), 'arrow-down' ) . ';
    }

    .product_type_variable,
    .product_type_grouped,
    .product_type_external,
    .product.outofstock .product_button a
    {
        background-image: ' . GBT_Icon::getIcon( '20', '20', GBT_Opt::getOption( 'primary_color_rgb' ), 'variable' ) . '!important;
    }

    .img_404
    {
        background-image: ' . GBT_Icon::getIcon( '12', '15', GBT_Opt::getOption( 'primary_color_rgb' ), 'not-found', '30', '33' ) . ';
    }

    .main-navigation ul ul li.menu-item-has-children > a
    {
        background-image: ' . GBT_Icon::getIcon( '16', '16', GBT_Opt::getOption( 'secondary_menu_color_rgb' ), 'arrow-right' ) . ';
    }

    .main-navigation ul ul li.menu-item-has-children > a:hover
    {
        background-image: ' . GBT_Icon::getIcon( '16', '16', 'rgb(255,255,255)', 'arrow-right' ) . ';
    }

    .main-navigation > ul > li.menu-item-has-children > a,
    .mobile-main-navigation > ul.sf-menu > li.menu-item-has-children > .more
    {
        background-image: ' . GBT_Icon::getIcon( '16', '16', GBT_Opt::getOption( 'primary_menu_color_rgb' ), 'arrow-down' ) . ';
    }

    .main-navigation > ul > li.menu-item-has-children:hover > a
    {
        background-image: ' . GBT_Icon::getIcon( '16', '16', GBT_Opt::getOption( 'accent_color_rgb' ), 'arrow-down' ) . ';
    }

    .main-navigation.secondary-navigation > ul > li.menu-item-has-children > a
    {
        background-image: ' . GBT_Icon::getIcon( '16', '16', GBT_Opt::getOption( 'secondary_menu_color_rgb' ), 'arrow-down' ) . ';
    }

    .main-navigation.secondary-navigation > ul > li.menu-item-has-children:hover > a
    {
        background-image: ' . GBT_Icon::getIcon( '16', '16', GBT_Opt::getOption( 'accent_color_rgb' ), 'arrow-down' ) . ';
    }

    .product_nav_buttons .arrow_right a,
    .slider-button-next,
    .wp-block-getbowtied-carousel .swiper-navigation-container .swiper-button-next:before
    {
        background-image: ' . GBT_Icon::getIcon( '20', '20', GBT_Opt::getOption( 'primary_color_rgb' ), 'arrow-right-2' ) . ';
    }

    .product_nav_buttons .arrow_left a,
    .slider-button-prev,
    .wp-block-getbowtied-carousel .swiper-navigation-container .swiper-button-prev:before
    {
        background-image: ' . GBT_Icon::getIcon( '20', '20', GBT_Opt::getOption( 'primary_color_rgb' ), 'arrow-left-2' ) . ';
    }

    .product_nav_buttons .arrow_right a:hover,
    .slider-button-next:hover,
    .wp-block-getbowtied-carousel .swiper-navigation-container .swiper-button-next:hover:before
    {
        background-image: ' . GBT_Icon::getIcon( '20', '20', GBT_Opt::getOption( 'accent_color_rgb' ), 'arrow-right-2' ) . ';
    }

    .product_nav_buttons .arrow_left a:hover,
    .slider-button-prev:hover,
    .wp-block-getbowtied-carousel .swiper-navigation-container .swiper-button-prev:hover:before
    {
        background-image: ' . GBT_Icon::getIcon( '20', '20', GBT_Opt::getOption( 'accent_color_rgb' ), 'arrow-left-2' ) . ';
    }

    a.button.added::before,
    button.button.added::before,
    input.button.added::before,
    #respond input#submit.added::before,
    #content input.button.added::before,
    .woocommerce a.button.added::before,
    .woocommerce button.button.added::before,
    .woocommerce input.button.added::before,
    .woocommerce #respond input#submit.added::before,
    .woocommerce #content input.button.added::before
    {
        background-image: ' . GBT_Icon::getIcon( '22', '22', 'rgb(255,255,255)', 'check' ) . '!important;
    }

    .woocommerce div.product .product_main_infos .gbtr_product_details_right_col form.cart .variations select,
    .wp-block-woocommerce-all-reviews .wc-block-order-select .wc-block-order-select__select,
    .wp-block-woocommerce-reviews-by-product .wc-block-order-select .wc-block-order-select__select,
    .wp-block-woocommerce-reviews-by-category .wc-block-order-select .wc-block-order-select__select
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'primary_color_rgb' ), 'arrow-down' ) . ';
    }

    .product_infos .yith-wcwl-wishlistaddedbrowse:before,
    .product_infos .yith-wcwl-wishlistexistsbrowse:before,
    .product_item .yith-wcwl-wishlistaddedbrowse a:before,
    .product_item .yith-wcwl-wishlistexistsbrowse a:before
    {
        background-image: ' . GBT_Icon::getIcon( '16', '16', GBT_Opt::getOption( 'accent_color_rgb' ), 'heart' ) . ';
    }

    .gbtr_tools_search_trigger .gbtr_tools_search_icon:before,
    .gbtr_tools_search_trigger_mobile .gbtr_tools_search_icon:before,
    .gbtr_tools_search_inputbutton .gbtr_tools_search_icon:before
    {
        background-image: ' . GBT_Icon::getIcon( '14', '14', GBT_Opt::getOption( 'topbar_color_rgb' ), 'search', '50', '50' ) . ';
    }

    .js-offcanvas.c-offcanvas--top .woocommerce-product-search input[type=submit],
    .js-offcanvas.c-offcanvas--top .woocommerce-product-search button[type=submit],
    .js-offcanvas.c-offcanvas--top #searchform input[type=submit],
    .js-offcanvas.c-offcanvas--top #searchform button[type=submit]
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'primary_menu_color_rgb' ), 'search', '50', '50' ) . ';
    }

    .logout_link .logout_link_icon:before
    {
        background-image: ' . GBT_Icon::getIcon( '28', '28', GBT_Opt::getOption( 'topbar_color_rgb' ), 'logout', '48', '48' ) . ';
    }

    .gbtr_tools_account_wrapper .gbtr_tools_menu_icon:before
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'topbar_color_rgb' ), 'hamburger', '24', '24' ) . ';
    }

    .entry-meta .author a:before
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'primary_color_rgb' ), 'author', '24', '24' ) . ';
    }

    .entry-meta .date-meta a:before
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'primary_color_rgb' ), 'date', '24', '24' ) . ';
    }

    .entry-meta .categories-meta:before
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'primary_color_rgb' ), 'folder', '24', '24' ) . ';
    }

    .entry-meta .image-category:before
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'primary_color_rgb' ), 'image', '24', '24' ) . ';
    }

    .entry-meta .tags-meta:before,
    .entry-content .tags-meta:before
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'primary_color_rgb' ), 'tag', '24', '24' ) . ';
    }

    .entry-meta .image-size:before
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'primary_color_rgb' ), 'image-size', '24', '24' ) . ';
    }

    .entry-meta .comments-link a:before
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'primary_color_rgb' ), 'comment', '32', '32' ) . ';
    }

    .post-navigation .nav-next-single a
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'primary_color_rgb' ), 'arrow-right-2' ) . ';
    }

    .post-navigation .nav-next-single a:hover
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'accent_color_rgb' ), 'arrow-right-2' ) . ';
    }

    .post-navigation .nav-previous-single a
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'primary_color_rgb' ), 'arrow-left-2' ) . ';
    }

    .post-navigation .nav-previous-single a:hover
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'accent_color_rgb' ), 'arrow-left-2' ) . ';
    }

    .woocommerce nav.woocommerce-pagination .next:before,
    .posts-pagination .next:before,
    .comments-pagination .next:before
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'primary_color_rgb' ), 'arrow-right-2' ) . ';
    }

    .woocommerce nav.woocommerce-pagination .next:hover:before,
    .posts-pagination .next:hover:before,
    .comments-pagination .next:hover:before
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'accent_color_rgb' ), 'arrow-right-2' ) . ';
    }

    .woocommerce nav.woocommerce-pagination .prev:before,
    .posts-pagination .prev:before,
    .comments-pagination .prev:before
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'primary_color_rgb' ), 'arrow-left-2' ) . ';
    }

    .woocommerce nav.woocommerce-pagination .prev:hover:before,
    .posts-pagination .prev:hover:before,
    .comments-pagination .prev:hover:before
    {
        background-image: ' . GBT_Icon::getIcon( '18', '18', GBT_Opt::getOption( 'accent_color_rgb' ), 'arrow-left-2' ) . ';
    }

    .gbtr_light_footer_wrapper .woocommerce-mini-cart__empty-message:before
    {
        background-image: ' . GBT_Icon::getIcon( '24', '30', GBT_Opt::getOption( 'primary_footer_color_rgb' ), 'shopping-cart', '24', '30' ) . ';
    }

    .gbtr_dark_footer_wrapper .woocommerce-mini-cart__empty-message:before
    {
        background-image: ' . GBT_Icon::getIcon( '24', '30', GBT_Opt::getOption( 'secondary_footer_color_rgb' ), 'shopping-cart', '24', '30' ) . ';
    }
';

if( !empty( GBT_Opt::getOption( 'shoppinh_bag_icon', '' ) ) ) {

    $custom_style .= '
        .gbtr_little_shopping_bag_wrapper.shopping_bag_mobile_style,
        .archive p.no-products-message,
        .woocommerce-mini-cart__empty-message:before,
        .product_button a.button,
        .product_button button.button,
        .product_button input.button,
        .product_button #respond input#submit,
        .product_button #content input.button,
        .product_type_simple,
        .product .product_button a.product_type_simple
        {
            background-image: url(' . esc_url( GBT_Opt::getOption( 'shoppinh_bag_icon', '' ) )  . ');
        }

        .product_button a.button,
        .product_button button.button,
        .product_button input.button,
        .product_button #respond input#submit,
        .product_button #content input.button,
        .product_type_simple,
        .product .product_button a.product_type_simple
        {
            background-size: 20px;
        }

        .gbtr_little_shopping_bag_wrapper.shopping_bag_mobile_style
        {
            background-size: 36px;
            background-position: center !important;
        }
    ';
} else {

    $custom_style .= '
        .gbtr_little_shopping_bag_wrapper.shopping_bag_mobile_style
        {
            background-image: ' . GBT_Icon::getIcon( '39', '45', GBT_Opt::getOption( 'primary_menu_color_rgb' ), 'shopping-cart', '24', '30' ) . ';
        }

        .product_button a.button,
        .product_button button.button,
        .product_button input.button,
        .product_button #respond input#submit,
        .product_button #content input.button,
        .product_type_simple,
        .product .product_button a.product_type_simple
        {
            background-image: ' . GBT_Icon::getIcon( '20', '20', GBT_Opt::getOption( 'primary_color_rgb' ), 'add-to-cart', '26', '35' ) . ';
        }

        .archive p.no-products-message,
        .woocommerce-mini-cart__empty-message:before
        {
            background-image: ' . GBT_Icon::getIcon( '24', '30', GBT_Opt::getOption( 'primary_color_rgb' ), 'shopping-cart', '24', '30' ) . ';
        }
    ';
}

?>
