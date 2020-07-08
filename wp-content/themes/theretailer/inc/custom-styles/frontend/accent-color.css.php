<?php

$custom_style .= '

    body
    {
        background-color: ' . GBT_Opt::getOption( 'main_bg_color', '#fff' ) . ';
    }

    a,
    .tr_upper_link *:hover,
    .default-slider-next i,
    .default-slider-prev i,
    .gbtr_tools_account,
    li.product:not(.product-category) h3:hover,
    .product_item h3 a,
    div.product .product_brand,
    div.product div.product_meta a:hover,
    #content div.product div.product_meta a:hover,
    #reviews a,
    div.product .woocommerce_tabs .panel a,
    #content div.product .woocommerce_tabs .panel a,
    div.product .woocommerce-tabs .panel a,
    #content div.product .woocommerce-tabs .panel a,
    table.shop_table td.product-name .product_brand,
    .woocommerce table.shop_table td.product-name .product_brand,
    table.my_account_orders td.order-actions a:hover,
    ul.digital-downloads li a:hover,
    .entry-meta a:hover,
    .shortcode_meet_the_team .role,
    #comments a:hover,
    .portfolio_item a:hover,
    .trigger-share-list:hover,
    .mc_success_msg,
    .page_archive_items a:hover,
    a.reset_variations,
    table.my_account_orders .order-number a,
    .gbtr_dark_footer_wrapper .tagcloud a:hover,
    table.shop_table .product-name small a,
    .woocommerce table.shop_table .product-name small a,
    ul.gbtr_digital-downloads li a,
    div.product div.summary a:not(.button),
    .cart_list.product_list_widget .minicart_product,
    .shopping_bag_centered_style .minicart_product,
    .product_item:hover .add_to_wishlist:before,
    .woocommerce .star-rating span,
    .woocommerce-page .star-rating span,
    .star-rating span,
    .woocommerce-page p.stars a:hover:after,
    .woocommerce-page p.stars .active:after,
    .woocommerce-cart .entry-content .woocommerce .actions input[type=submit],
    .box-share-link:hover,
    .post-navigation a:hover,
    .woocommerce-pagination .page-numbers:hover,
    .posts-pagination .page-numbers:hover,
    .comments-pagination .page-numbers:hover,
    .gbtr_product_share a:hover > span,
    .wc-block-grid__product-add-to-cart a.wp-block-button__link,
    .product_top .woocommerce-breadcrumb a:hover,
    .shop_top .woocommerce-breadcrumb a:hover,
    div.product .group_table tr td.woocommerce-grouped-product-list-item__label a:hover,
    .woocommerce nav.woocommerce-pagination ul li:not(:last-child):not(:first-child) a:focus,
    .woocommerce nav.woocommerce-pagination ul li:not(:last-child):not(:first-child) a:hover,
    .woocommerce nav.woocommerce-pagination ul li a.page-numbers:focus,
    .woocommerce nav.woocommerce-pagination ul li a.page-numbers:hover,
    .main-navigation .mega-menu > ul > li > a,
    .main-navigation .mega-menu > ul > li > a:visited,
    #yith-wcwl-form .wishlist_table .product-name h3,
    .wc-block-review-list-item__rating>.wc-block-review-list-item__rating__stars span:before
    {
        color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ';
    }

    .shopping_bag_centered_style:hover,
    .sf-menu li > a:hover,
    .woocommerce-checkout .woocommerce-info a,
    .main-navigation .mega-menu > ul > li > a:hover,
    .main-navigation > ul > li:hover > a,
    .wc-block-grid__product .wc-block-grid__product-rating .star-rating span:before,
    .product_infos .add_to_wishlist
    {
        color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . '!important;
    }

    form input[type=submit]:hover,
    .widget input[type=submit]:hover,
    .tagcloud a:hover,
    #wp-calendar tbody td a,
    .widget.the_retailer_recent_posts .post_date,
    a.button:hover,button.button:hover,input.button:hover,#respond input#submit:hover,#content input.button:hover,
    .woocommerce #respond input#submit.alt:hover,
    .woocommerce a.button.alt:hover,
    .woocommerce button.button.alt:hover,
    .woocommerce input.button.alt:hover,
    .woocommerce #respond input#submit:hover,
    .woocommerce a.button:hover,
    .woocommerce button.button:hover,
    .woocommerce input.button:hover,
    .woocommerce button.button:disabled[disabled]:hover,
    .myaccount_user,
    .woocommerce button.button.alt.disabled,
    .track_order p:first-child,
    .order-info,
    .from_the_blog_date,
    .featured_products_slider .products_slider_images,
    .portfolio_sep,
    .portfolio_details_sep,
    .gbtr_little_shopping_bag_wrapper_mobiles span,
    #mc_signup_submit:hover,
    .page_archive_date,
    .shopping_bag_mobile_style .gb_cart_contents_count,
    .shopping_bag_centered_style .items_number,
    .mobile_tools .shopping_bag_button .items_number,
    .audioplayer-bar-played,
    .audioplayer-volume-adjust div div,
    .addresses a:hover,
    #load-more-portfolio-items a:hover,
    .shortcode_icon_box .icon_box_read_more:hover,
    #nprogress .bar,
    .main-navigation ul ul li a:hover,
    .woocommerce-widget-layered-nav-dropdown__submit:hover,
    div.product .group_table tr td.woocommerce-grouped-product-list-item__quantity a.button:hover,
    .more-link,
    .gbtr_dark_footer_wrapper .button,
    .gbtr_little_shopping_bag_wrapper_mobiles:hover,
    .gbtr_tools_account.menu-hidden .topbar-menu li a:hover,
    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
    #wp-calendar tbody td a,
    .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
    .woocommerce table.wishlist_table tbody td.product-add-to-cart .remove_from_wishlist:hover,
    .woocommerce table.wishlist_table tbody td.product-add-to-cart .button.add_to_cart,
    .woocommerce div.product .product_infos .stock.in-stock,
    .woocommerce.widget_shopping_cart .buttons > a:first-child:hover,
    #yith-wcwl-form .wishlist_table .additional-info-wrapper .product-add-to-cart a
    {
        background-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ';
    }

    .woocommerce-message,
    .gbtr_minicart_cart_but:hover,
    .gbtr_minicart_checkout_but:hover,
    span.onsale,
    .woocommerce span.onsale,
    .product_main_infos span.onsale,
    .quantity .minus:hover,
    #content .quantity .minus:hover,
    .quantity .plus:hover,
    #content .quantity .plus:hover,
    .single_add_to_cart_button:hover,
    .shortcode_getbowtied_slider .button:hover,
    .add_review .button:hover,
    #fancybox-close:hover,
    .shipping-calculator-form .button:hover,
    .coupon .button-coupon:hover,
    .button_create_account_continue:hover,
    .button_billing_address_continue:hover,
    .button_shipping_address_continue:hover,
    .button_order_review_continue:hover,
    #place_order:hover,
    .gbtr_my_account_button input:hover,
    .gbtr_track_order_button:hover,
    p.product a:hover,
    #respond #submit:hover,
    .widget_shopping_cart .button:hover,
    .lost_reset_password .button:hover,
    .widget_price_filter .price_slider_amount .button:hover,
    .gbtr_order_again_but:hover,
    .gbtr_save_but:hover,
    input.button:hover,#respond input#submit:hover,#content input.button:hover,
    .wishlist_table tr td .add_to_cart:hover,
    .vc_btn.vc_btn_xs:hover,
    .vc_btn.vc_btn_sm:hover,
    .vc_btn.vc_btn_md:hover,
    .vc_btn.vc_btn_lg:hover,
    .order-actions a:hover,
    .widget_price_filter .ui-slider .ui-slider-range,
    .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
    .wc-block-grid__product-onsale,
    .woocommerce #respond input#submit:hover,
    .woocommerce-button--next:hover,
    .woocommerce-button--prev:hover,
    .woocommerce button.button:hover,
    .woocommerce input.button:hover,
    button.wc-stripe-checkout-button:hover,
    .woocommerce .woocommerce-MyAccount-content a.button:hover,
    .select2-container--default .select2-results__option.select2-results__option--highlighted,
    .select2-container--default .select2-results__option--highlighted[aria-selected],
    .select2-container--default .select2-results__option--highlighted[data-selected],
    .return-to-shop a.button,
    .widget_layered_nav ul li.chosen a,
    .widget_layered_nav_filters ul li.chosen a,
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
        background-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ';
    }

    .box-share-container .trigger-share-list:hover > svg,
    .box-share-container .box-share-list .box-share-link:hover svg,
    .gbtr_product_share ul li a:hover svg,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_link a:hover svg,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_controls span:hover svg
    {
        fill: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ';
    }

    .woocommerce nav.woocommerce-pagination ul li:not(:last-child):not(:first-child) a:focus,
    .woocommerce nav.woocommerce-pagination ul li:not(:last-child):not(:first-child) a:hover,
    .woocommerce nav.woocommerce-pagination a.page-numbers:hover,
    .woocommerce nav.woocommerce-pagination .next:hover,
    .woocommerce nav.woocommerce-pagination .prev:hover,
    .posts-pagination a:hover,
    .comments-pagination a:hover,
    .woocommerce nav.woocommerce-pagination .dots:hover,
    .posts-pagination .dots:hover,
    .comments-pagination .dots:hover,
    .gbtr_product_share ul li a:hover svg,
    .default-slider-next,
    .default-slider-prev,
    .shortcode_icon_box .icon_box_read_more:hover,
    .box-share-list
    {
        border-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ';
    }

    .vc_btn.vc_btn_xs:hover,
    .vc_btn.vc_btn_sm:hover,
    .vc_btn.vc_btn_md:hover,
    .vc_btn.vc_btn_lg:hover,
    .tagcloud a:hover,
    .woocommerce-cart .entry-content .woocommerce .actions input[type=submit],
    .widget_layered_nav ul li.chosen a,
    .widget_layered_nav_filters ul li.chosen a,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_controls span:hover
    {
        border-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . '!important;
    }

    .first-navigation ul ul,
    .secondary-navigation ul ul,
    .menu_centered_style .gbtr_minicart
    {
        border-top-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . '!important;
    }

    .product_type_simple,
    .product_type_variable,
    .myaccount_user:after,
    .track_order p:first-child:after,
    .order-info:after
    {
        border-bottom-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . '!important;
    }

    .gbtr_tools_wrapper .topbar_tools_wrapper .gbtr_tools_account_wrapper .gbtr_tools_account.menu-hidden ul.topbar-menu
    {
        border-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ' #cccccc #cccccc;
    }

    #nprogress .spinner-icon
    {
        border-top-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ';
        border-left-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ';
    }

    .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content
    {
        background-color: ' . GBT_Opt::getOption( 'accent_color_light' ) . ';
    }
';

?>
