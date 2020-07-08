<?php

if ( !empty(GBT_Opt::getOption( 'main_bg', '' ) ) ) {

    $custom_style .= '

        body
        {
            background-image:url( ' . GBT_Opt::getOption( 'main_bg', '' ) . ' );
            background-size:cover;
            background-attachment:fixed;
        }
    ';
}

if ( 'boxed' === GBT_Opt::getOption( 'gb_layout', 'fullscreen' ) ) {

    $custom_style .= '

        #global_wrapper
        {
            margin: 0 auto;
            width: 100%;
            max-width: ' . GBT_Opt::getOption( 'boxed_layout_width', 1100 ) . 'px !important;
        }

        .gbtr_header_wrapper.site-header-sticky
        {
            max-width: ' . GBT_Opt::getOption( 'boxed_layout_width', 1100 ) . 'px !important;
        }
    ';
} else {

    $custom_style .= '

        #global_wrapper
        {
            margin: 0 auto;
            width: 100%;
        }
    ';
}

if ( !TR_ELEMENTOR_IS_ACTIVE && GBT_Opt::getOption( 'progress_bar', false ) ) {

    $custom_style .= '

        .shop_top,
        .product_top,
        .category_header,
        .global_content_wrapper,
        .page_full_width
        {
            opacity: 0;
            transition: opacity .3s linear;
        }
    ';
}

?>
