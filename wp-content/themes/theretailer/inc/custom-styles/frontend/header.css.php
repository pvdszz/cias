<?php

$custom_style .= '

    @media all and (min-width: 960px) {
        .gbtr_header_wrapper .content_header
        {
            padding-top: ' . GBT_Opt::getOption( 'menu_header_top_padding_1_7', '25' ) . 'px;
            padding-bottom: ' . GBT_Opt::getOption( 'menu_header_bottom_padding_1_7', '25' ) . 'px;
        }
    }

    .gbtr_header_wrapper,
    .js-offcanvas
    {
        background-color: ' . GBT_Opt::getOption( 'header_bg_color', '#f4f4f4' ) . ';
    }

    .gb_cart_contents_count
    {
        color: ' . GBT_Opt::getOption( 'header_bg_color', '#f4f4f4' ) . ';
    }

    .sf-menu a,
    .main-navigation .mega-menu > ul > li > a,
    .shopping_bag_centered_style
    {
        font-size: ' . GBT_Opt::getOption( 'main_navigation_font_size', 12 ) . 'px;
    }

    .gbtr_second_menu
    {
        font-size: ' . GBT_Opt::getOption( 'secondary_navigation_font_size', 12 ) . 'px;
    }
';

?>
