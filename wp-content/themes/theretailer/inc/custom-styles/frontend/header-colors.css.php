<?php

$custom_style .= '

    .mobile-secondary-navigation ul li a,
    .mobile-topbar-navigation ul li a
    {
        color: ' . GBT_Opt::getOption( 'primary_menu_color_medium' )  . ';
    }

    .js-offcanvas.c-offcanvas--top .search-field,
    .js-offcanvas.c-offcanvas--top #searchform .field
    {
        border-bottom-color: ' . GBT_Opt::getOption( 'primary_menu_color_ultra_light' )  . ';
    }

    .js-offcanvas.c-offcanvas--left .mobile-secondary-navigation,
    .js-offcanvas.c-offcanvas--left .mobile-topbar-navigation,
    .js-offcanvas.c-offcanvas--left .shortcode_socials,
    .gbtr_header_wrapper.default_header .gbtr_menu_wrapper_default .menus_wrapper .gbtr_first_menu .first-navigation,
    .gbtr_header_wrapper.centered_header .gbtr_menu_wrapper_centered .menus_wrapper .gbtr_first_menu,
    .gbtr_header_wrapper.menu_under_header .gbtr_menu_wrapper_menu_under .menus_wrapper .gbtr_first_menu .first-navigation,
    .gbtr_header_wrapper .shopping_bag_wrapper .gbtr_little_shopping_bag_wrapper .gbtr_little_shopping_bag,
    .gbtr_header_wrapper .shopping_bag_wrapper .gbtr_little_shopping_bag_wrapper .gbtr_little_shopping_bag .title
    {
        border-color: ' . GBT_Opt::getOption( 'primary_menu_color_ultra_light' )  . ';
    }

    .site-header-sticky .menus_wrapper .gbtr_first_menu .first-navigation
    {
        border-color: ' . GBT_Opt::getOption( 'primary_menu_color_ultra_light' )  . '!important;
    }

    .js-offcanvas .tr_social_icons_list .tr_social_icon a svg
    {
        fill: ' . GBT_Opt::getOption( 'primary_menu_color', '#000' ) . '!important;
    }

    .sf-menu a,
    .sf-menu li li a,
    .sf-menu a:visited,
    .shopping_bag_centered_style,
    .gbtr_header_wrapper .site-title a,
    .gbtr_header_wrapper .mobile-site-title a,
    .js-offcanvas .gbtr_tools_info,
    .js-offcanvas.c-offcanvas--left .menu-close .offcanvas-left-close span,
    .js-offcanvas.c-offcanvas--top .menu-close .offcanvas-top-close span,
    .js-offcanvas.c-offcanvas--top .search-text,
    .js-offcanvas.c-offcanvas--top .search-field,
    .js-offcanvas.c-offcanvas--top #searchform .field,
    .gbtr_header_wrapper .shopping_bag_wrapper .gbtr_little_shopping_bag_wrapper .gbtr_little_shopping_bag .title
    {
        color: ' . GBT_Opt::getOption( 'primary_menu_color', '#000' ) . ';
    }

    .js-offcanvas.c-offcanvas--top .search-field::-webkit-input-placeholder,
    .js-offcanvas.c-offcanvas--top #searchform .field::-webkit-input-placeholder
    {
        color: ' . GBT_Opt::getOption( 'primary_menu_color_medium' )  . ';
    }

    .js-offcanvas.c-offcanvas--top .search-field::-moz-placeholder,
    .js-offcanvas.c-offcanvas--top #searchform .field::-moz-placeholder
    {
        color: ' . GBT_Opt::getOption( 'primary_menu_color_medium' )  . ';
    }

    .js-offcanvas.c-offcanvas--top .search-field:-ms-input-placeholder,
    .js-offcanvas.c-offcanvas--top #searchform .field:-ms-input-placeholder
    {
        color: ' . GBT_Opt::getOption( 'primary_menu_color_medium' )  . ';
    }

    .main-navigation ul ul li a,
    .main-navigation ul ul li a:visited,
    .gbtr_tools_wrapper .topbar_tools_wrapper .gbtr_tools_account.menu-hidden ul.topbar-menu li a,
    .gbtr_second_menu li a,
    .gbtr_header_wrapper .shopping_bag_wrapper .gbtr_little_shopping_bag_wrapper .gbtr_little_shopping_bag .overview
    {
        color: ' . GBT_Opt::getOption( 'secondary_menu_color', '#777' )  . ';
    }

    .main-navigation.secondary-navigation > ul > li > a,
    .rtl .main-navigation.secondary-navigation > ul > li:first-child > a
    {
        border-color: ' . GBT_Opt::getOption( 'secondary_menu_color_ultra_light' )  . '!important;
    }
';

?>
