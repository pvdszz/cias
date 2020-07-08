<?php

$custom_style .= '

    a:hover,
    .entry-content,
    .content_wrapper,
    div.product div.summary a:not(.button):hover,
    .product a:not(.button):hover,
    .input-text,
    .sf-menu a,
    .sf-menu a:visited,
    .sf-menu li li a,
    .widget h4.widget-title,
    .widget .wcva_filter-widget-title,
    .entry-title,
    .page-title,
    .entry-title a,
    .page-title a,
    .entry-content h1,
    .entry-content h2,
    .entry-content h3,
    .entry-content h4,
    .entry-content h5,
    .entry-content h6,
    ul.products .product_item .product-title a,
    .woocommerce ul.products li.product .price,
    .global_content_wrapper label,
    .global_content_wrapper select,
    .gbtr_little_shopping_bag .title a,
    .shipping_calculator h3 a,
    p.has-drop-cap:first-letter,
    .tr_upper_link,
    .tr_upper_link a,
    .comments-area .comment-list a,
    .comments-area .comment-list .comment-author cite,
    .comments-area .comments-title,
    .comment-form .logged-in-as a,
    .post-navigation a,
    .woocommerce-pagination a,
    .posts-pagination a,
    .comments-pagination a,
    .page-numbers.dots,
    span.page-numbers.dots:hover,
    .woocommerce-Reviews #review_form_wrapper .comment-reply-title,
    .woocommerce-review__author,
    .woocommerce-Reviews #review_form_wrapper label,
    .comments-area .comment-respond .comment-reply-title,
    .comments-area .comment-respond label,
    .gbtr_product_share ul li > a > span,
    .woocommerce div.product .product_meta, div.product .product_meta,
    div.product .summary p.price,
    .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
    .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
    .gbtr_items_sliders_title,
    .woocommerce div.product p.price,
    .woocommerce div.product span.price,
    a.reset_variations,
    .shop_offcanvas_button span,
    .global_content_wrapper .widget,
    .global_content_wrapper .widget ul li a,
    .woocommerce-cart .content_wrapper .woocommerce-cart-form .shop_table tr.cart_item td.product-name a:hover,
    .cart-collaterals .woocommerce-shipping-calculator .shipping-calculator-button:hover,
    .woocommerce-cart .content_wrapper .cart-collaterals .shop_table tr.shipping td:before,
    .woocommerce-checkout .woocommerce-form-login-toggle .woocommerce-info,
    .woocommerce-checkout .woocommerce-form-coupon-toggle .woocommerce-info,
    woocommerce-form-login label,
    ul.payment_methods li .payment_box p,
    .woocommerce-MyAccount-navigation ul li a:hover,
    .woocommerce-MyAccount-content a:hover,
    .woocommerce-order-received ul.order_details li strong span,
    .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a,
    .woocommerce-order-received mark,
    .woocommerce-MyAccount-content mark,
    .woocommerce .woocommerce-breadcrumb a,
    .product_infos.summary,
    .gbtr_minicart_wrapper ul.product_list_widget li .quantity,
    .gbtr_minicart_wrapper ul.product_list_widget li .variation,
    .gbtr_minicart_wrapper .total,
    .wc-block-grid__product-title,
    .wc-block-grid__product-add-to-cart a.wp-block-button__link:hover,
    ul.swiper-slide .product_item .product-title a,
    div.product .group_table tr td.woocommerce-grouped-product-list-item__label a,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_header .gbt_18_current_slide,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_header .gbt_18_number_of_items,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_controls span,
    .gbt_18_expanding_grid .gbt_18_product_price,
    .category_header .term-description p,
    .category_header .page-description p,
    .gbtr_minicart .widget_shopping_cart_content,
    .gbt_18_pagination a,
    .product_infos .add_to_wishlist span:hover
    {
        color: ' . GBT_Opt::getOption( 'primary_color', '#000' ) . ';
    }

    .shop_table td.product-remove a.remove,
    .widget_shopping_cart ul.product_list_widget li a.remove
    {
        color: ' . GBT_Opt::getOption( 'primary_color', '#000' ) . '!important;
    }

    a.button,
    button.button,
    input.button,
    #respond input#submit,
    #content input.button,
    .woocommerce a.button,
    .woocommerce button.button,
    .woocommerce input.button,
    .woocommerce #respond input#submit,
    .woocommerce #content input.button,
    .woocommerce-widget-layered-nav-dropdown__submit,
    button.wc-stripe-checkout-button,
    .button_create_account_continue,
    .button_billing_address_continue,
    .addresses a,
    .button_shipping_address_continue,
    .button_order_review_continue,
    #place_order,
    .single_add_to_cart_button,
    .woocommerce button.button.alt,
    .more-link:hover,
    .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
    .woocommerce .woocommerce-table--order-downloads a.button.alt,
    .posts-pagination .page-numbers.current,
    .comments-pagination .page-numbers.current,
    .woocommerce nav.woocommerce-pagination .current,
    form input[type=submit],
    #yith-wcwl-form .wishlist_table .additional-info-wrapper .product-add-to-cart a:hover,
    .products_slider .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_header .gbt_18_line,
    label.selectedswatch.wcva_single_textblock
    {
        background-color: ' . GBT_Opt::getOption( 'primary_color', '#000' ) . ';
    }

    .return-to-shop a.button:hover,
    .wp-block-getbowtied-carousel .swiper-pagination .swiper-pagination-bullet-active,
    .gbt_18_tr_slider .gbt_18_tr_slider_pagination .swiper-pagination-bullet.swiper-pagination-bullet-active,
    .woocommerce table.wishlist_table tbody td.product-add-to-cart .button.add_to_cart:hover
    {
        background-color: ' . GBT_Opt::getOption( 'primary_color', '#000' ) . '!important;
    }

    .box-share-container .trigger-share-list > svg,
    .box-share-container .box-share-list .box-share-link svg,
    .gbtr_product_share ul li svg,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_link a svg,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_controls svg
    {
        fill: ' . GBT_Opt::getOption( 'primary_color', '#000' ) . ';
    }

    .gbtr_product_share ul li svg,
    .products_slider .swiper-pagination .swiper-pagination-bullet,
    .gbt_18_tr_slider .gbt_18_tr_slider_pagination .swiper-pagination-bullet.swiper-pagination-bullet
    {
        border-color: ' . GBT_Opt::getOption( 'primary_color', '#000' ) . ';
    }

    blockquote,
    div.product .woocommerce-tabs-wrapper .woocommerce-tabs .tabs-list ul.tabs li.active a,
    .gbtr_product_share,
    .global_content_wrapper .widget h4.widget-title,
    .global_content_wrapper .widget .wcva_filter-widget-title,
    .cart_totals h3,
    .cart_totals h2,
    .woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-checkout-review-order-table tbody .cart_item:last-child td,
    .woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-checkout-review-order-table thead th,
    .wp-block-getbowtied-carousel .swiper-pagination-bullet,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_controls span,
    .woocommerce table.wishlist_table thead th
    {
        border-color: ' . GBT_Opt::getOption( 'primary_color', '#000' ) . '!important;
    }

    .woocommerce div.product .woocommerce-tabs-wrapper, div.product .woocommerce-tabs-wrapper,
    .post-navigation
    {
        border-top-color: ' . GBT_Opt::getOption( 'primary_color', '#000' ) . ';
    }

    .woocommerce .hr.shop_separator,
    .woocommerce .woocommerce-ordering,
    .woocommerce-cart .content_wrapper .woocommerce-cart-form,
    .woocommerce-cart .content_wrapper .shop_table td,
    .woocommerce-cart .cart-collaterals .cart_totals .shop_table td,
    .woocommerce-cart .content_wrapper .cart-collaterals .shop_table th,
    .woocommerce-cart .content_wrapper .shop_table tr.cart_item,
    .woocommerce-cart .content_wrapper .shop_table .actions .coupon,
    .woocommerce-checkout .content_wrapper form.woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-checkout-review-order-table td,
    .woocommerce-checkout .content_wrapper form.woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-checkout-review-order-table th,
    .woocommerce-checkout .content_wrapper form.woocommerce-checkout .woocommerce-checkout-review-order #payment ul.payment_methods li .payment_box,
    .woocommerce-account #add_payment_method .woocommerce-Payment#payment ul.payment_methods li .payment_box,
    .woocommerce-checkout .content_wrapper form.woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-checkout-payment#payment ul.payment_methods li,
    .woocommerce-account #add_payment_method .woocommerce-Payment#payment ul.payment_methods li,
    .woocommerce-checkout .content_wrapper form.woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-terms-and-conditions,
    .woocommerce-order-received table.shop_table.order_details td,
    .woocommerce-order-received table.shop_table.order_details th,
    .woocommerce-MyAccount-content table.shop_table.order_details th,
    .woocommerce-MyAccount-content table.shop_table.order_details td,
    .woocommerce-order-pay table.shop_table td,
    .woocommerce-order-pay table.shop_table th,
    .woocommerce-order-pay #payment ul.payment_methods li,
    .woocommerce-order-pay #payment ul.payment_methods li .payment_box,
    .woocommerce ul.order_details li,
    .woocommerce div.product .product_main_infos .gbtr_product_details_right_col .group_table tr td,
    .woocommerce table.wishlist_table tbody tr
    {
        border-color: ' . GBT_Opt::getOption( 'primary_color_ultra_light' ) . ';
    }

    .rtl.woocommerce-cart .content_wrapper .woocommerce-cart-form
    {
        border-color: ' . GBT_Opt::getOption( 'primary_color_ultra_light' ) . '!important;
    }

    .woocommerce-checkout .content_wrapper form.woocommerce-checkout .woocommerce-checkout-review-order #payment ul.payment_methods li .payment_box:before,
    .woocommerce-account #add_payment_method .woocommerce-Payment#payment ul.payment_methods li .payment_box:before,
    .woocommerce-order-pay #payment ul.payment_methods li .payment_box:before,
    table.shop_table.woocommerce-MyAccount-paymentMethods td,
    table.shop_table.woocommerce-MyAccount-paymentMethods th,
    .page_sidebar .widget ul li
    {
        border-bottom-color: ' . GBT_Opt::getOption( 'primary_color_ultra_light' ) . ';
    }

    .widget_shopping_cart ul.product_list_widget li,
    .widget_shopping_cart .cart_list li,
    .woocommerce table.wishlist_table td
    {
        border-bottom-color: ' . GBT_Opt::getOption( 'primary_color_ultra_light' ) . '!important;
    }

    .woocommerce div.product .product_main_infos .gbtr_product_details_right_col form.cart .variations select,
    .quantity input.qty, .woocommerce .quantity .qty,
    .wp-block-woocommerce-all-reviews .wc-block-order-select .wc-block-order-select__select,
    .wp-block-woocommerce-reviews-by-product .wc-block-order-select .wc-block-order-select__select,
    .wp-block-woocommerce-reviews-by-category .wc-block-order-select .wc-block-order-select__select,
    hr, .hr
    {
        border-bottom-color: ' . GBT_Opt::getOption( 'primary_color_light' ) . ';
    }

    .global_content_wrapper .widget ul li ul
    {
        border-top-color: ' . GBT_Opt::getOption( 'primary_color_ultra_light' ) . '!important;
    }

    .woocommerce.widget_shopping_cart .total,
    .widget_shopping_cart .total, .woocommerce .total
    {
        border-top-color: ' . GBT_Opt::getOption( 'primary_color_light' ) . '!important;
    }

    .woocommerce-cart .content_wrapper .cart-collaterals .shop_table tr.shipping td,
    .woocommerce .woocommerce-breadcrumb,
    .woocommerce-result-count
    {
        color: ' . GBT_Opt::getOption( 'primary_color_medium' ) . ';
    }

    .sep,
    .woocommerce div.product .woocommerce-tabs ul.tabs li a,
    .woocommerce-account .woocommerce-Addresses address,
    .woocommerce-account .woocommerce-EditAccountForm .form-row span em,
    .gbtr_minicart_wrapper ul.product_list_widget li a
    {
        color: ' . GBT_Opt::getOption( 'primary_color_dark' ) . ';
    }
';

?>
