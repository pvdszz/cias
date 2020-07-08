<?php

$custom_style .= '

    .gbtr_light_footer_wrapper,
    .gbtr_light_footer_no_widgets
    {
        background-color: ' . GBT_Opt::getOption( 'primary_footer_bg_color', '#f4f4f4' ) . ';
    }

    .gbtr_dark_footer_wrapper,
    .gbtr_dark_footer_wrapper .tagcloud a
    {
        background-color: ' . GBT_Opt::getOption( 'secondary_footer_bg_color', '#000' ) . ';
    }

    .gbtr_dark_footer_wrapper .widget h4.widget-title,
    .gbtr_dark_footer_wrapper .widget .wcva_filter-widget-title
    {
        border-bottom-color: ' . GBT_Opt::getOption( 'secondary_footer_color_light' ) . ';
    }

    .gbtr_light_footer_wrapper .widget ul li,
    .gbtr_light_footer_wrapper .widget_shopping_cart ul.product_list_widget li,
    .gbtr_light_footer_wrapper .widget_shopping_cart .cart_list li
    {
        border-bottom-color: ' . GBT_Opt::getOption( 'primary_footer_color_ultra_light' ) . '!important;
    }

    .gbtr_dark_footer_wrapper .widget ul li,
    .gbtr_dark_footer_wrapper .widget_shopping_cart ul.product_list_widget li,
    .gbtr_dark_footer_wrapper .widget_shopping_cart .cart_list li
    {
        border-bottom-color: ' . GBT_Opt::getOption( 'secondary_footer_color_ultra_light' ) . '!important;
    }

    .gbtr_light_footer_wrapper .widget ul li ul
    {
        border-top-color: ' . GBT_Opt::getOption( 'primary_footer_color_ultra_light' ) . ';
    }

    .gbtr_dark_footer_wrapper .widget ul li ul
    {
        border-top-color: ' . GBT_Opt::getOption( 'secondary_footer_color_ultra_light' ) . ';
    }

    .gbtr_light_footer_wrapper .woocommerce.widget_shopping_cart .total,
    .gbtr_light_footer_wrapper .widget_shopping_cart .total, .woocommerce .total
    {
        border-top-color: ' . GBT_Opt::getOption( 'primary_footer_color_light' ) . '!important;
    }

    .gbtr_dark_footer_wrapper .woocommerce.widget_shopping_cart .total,
    .gbtr_dark_footer_wrapper .widget_shopping_cart .total, .woocommerce .total
    {
        border-top-color: ' . GBT_Opt::getOption( 'secondary_footer_color_light' ) . '!important;
    }

    .gbtr_light_footer_wrapper,
    .gbtr_light_footer_wrapper .widget h4.widget-title,
    .gbtr_light_footer_wrapper .widget .wcva_filter-widget-title,
    .gbtr_light_footer_wrapper a,
    .gbtr_light_footer_wrapper .widget ul li,
    .gbtr_light_footer_wrapper .widget ul li a,
    .gbtr_light_footer_wrapper .textwidget,
    .gbtr_light_footer_wrapper #mc_subheader,
    .gbtr_light_footer_wrapper ul.product_list_widget span.amount,
    .gbtr_light_footer_wrapper .widget_calendar,
    .gbtr_light_footer_wrapper .mc_var_label,
    .gbtr_light_footer_wrapper .tagcloud a
    {
        color: ' . GBT_Opt::getOption( 'primary_footer_color', '#000' ) . ';
    }

    .gbtr_dark_footer_wrapper,
    .gbtr_dark_footer_wrapper .widget h4.widget-title,
    .gbtr_dark_footer_wrapper .widget .wcva_filter-widget-title,
    .gbtr_dark_footer_wrapper a,
    .gbtr_dark_footer_wrapper .widget ul li,
    .gbtr_footer_widget_copyrights a, 
    .gbtr_dark_footer_wrapper .widget ul li a,
    .gbtr_dark_footer_wrapper .textwidget,
    .gbtr_dark_footer_wrapper #mc_subheader,
    .gbtr_dark_footer_wrapper ul.product_list_widget span.amount,
    .gbtr_dark_footer_wrapper .widget_calendar,
    .gbtr_dark_footer_wrapper .mc_var_label,
    .gbtr_dark_footer_wrapper .tagcloud a,
    .trigger-footer-widget-area
    {
        color: ' . GBT_Opt::getOption( 'secondary_footer_color', '#fff' ) . ';
    }

    .gbtr_dark_footer_wrapper ul.product_list_widget span.amount,
    .gbtr_dark_footer_wrapper .widget_shopping_cart ul.product_list_widget li a.remove
    {
        color: ' . GBT_Opt::getOption( 'secondary_footer_color', '#fff' ) . '!important;
    }

    .gbtr_light_footer_wrapper .widget_shopping_cart ul.product_list_widget li a.remove,
    .gbtr_light_footer_wrapper .woocommerce-mini-cart__empty-message
    {
        color: ' . GBT_Opt::getOption( 'primary_footer_color', '#000' ) . '!important;
    }

    .gbtr_dark_footer_wrapper .widget input[type=submit],
	.gbtr_dark_footer_wrapper .widget button[type=submit],
    .gbtr_dark_footer_wrapper .widget_shopping_cart .buttons a
    {
        background-color: ' . GBT_Opt::getOption( 'secondary_footer_color', '#fff' ) . ';
    }

    .gbtr_light_footer_wrapper .widget input[type=submit],
	.gbtr_light_footer_wrapper .widget button[type=submit],
    .gbtr_light_footer_wrapper .widget_shopping_cart .buttons a
    {
        color: ' . GBT_Opt::getOption( 'primary_footer_bg_color', '#f4f4f4' ) . ';
        background-color: ' . GBT_Opt::getOption( 'primary_footer_color', '#000' ) . ';
    }

    .gbtr_dark_footer_wrapper .widget input[type=submit]:hover,
	.gbtr_dark_footer_wrapper .widget button[type=submit]:hover,
    .gbtr_dark_footer_wrapper .widget_shopping_cart .buttons a:hover
    {
        background-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ';
    }

    .gbtr_light_footer_wrapper .widget input[type=submit]:hover,
	.gbtr_light_footer_wrapper .widget button[type=submit]:hover,
    .gbtr_light_footer_wrapper .widget_shopping_cart .buttons a:hover
    {
        background-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ';
    }

    .gbtr_dark_footer_wrapper .shortcode_socials svg
    {
        fill: ' . GBT_Opt::getOption( 'secondary_footer_color', '#fff' ) . ';
    }

    .gbtr_dark_footer_wrapper .widget input[type=text],
    .gbtr_dark_footer_wrapper .widget input[type=password],
    .gbtr_dark_footer_wrapper .tagcloud a
    {
        border: 1px solid ' . GBT_Opt::getOption( 'secondary_footer_color_ultra_light' ) . ';
    }

    .gbtr_footer_wrapper
    {
        background: ' . GBT_Opt::getOption( 'copyright_bar_bg_color', '#000' ) . ';
    }

    .gbtr_footer_widget_copyrights
    {
        color: ' . GBT_Opt::getOption( 'copyright_text_color', '#a8a8a8' ) . ';
    }
';

if ( !GBT_Opt::getOption( 'expandable_footer_mobiles', true ) ) {

    $custom_style .= '

        .trigger-footer-widget-area
        {
            display: none !important;
        }

        .gbtr_widgets_footer_wrapper,
        .gbtr_light_footer_wrapper,
        .gbtr_dark_footer_wrapper
        {
            display: block !important;
        }
    ';
}

?>
