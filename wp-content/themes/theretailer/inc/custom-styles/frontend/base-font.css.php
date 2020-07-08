<?php

$title_size     = 3.75  * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$h1_size        = 2.488 * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$h2_size        = 2.074 * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$h3_size        = 1.728 * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$h4_size        = 1.44  * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$h5_size        = 1.2   * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$drop_cap_size  = 6.4   * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';

$custom_style .= '

    .entry-title,
    .page-title
    {
        font-size: ' . $title_size . ';
    }

    @media all and (max-width: 1023px) {
        .entry-title,
        .page-title
        {
            font-size: ' . $h1_size . ';
        }
    }

    .content-area h6,
    .entry-content h6,
    .woocommerce-review__author,
    .wp-block-woocommerce-reviews-by-product .wc-block-review-list .wc-block-review-list-item__author,
    .category_header .term-description,
    .category_header .page-description,
    .entry-content,
    .gbtr_product_details_right_col .quantity .qty,
    .content-area,
    .content-area p,
    .woocommerce-product-details__short-description,
    .woocommerce table.wishlist_table tbody td.wishlist-empty
    {
        font-size: ' . GBT_Opt::getOption( 'base_font_size', 13 ) . 'px;
    }

    .content-area h1,
    .entry-content h1,
    .content-area .gbtr_post_title_listing,
    .product_title,
    .grtr_product_header_mobiles .product_title
    {
        font-size: ' . $h1_size . ';
    }

    .content-area h2,
    .entry-content h2,
    .gbtr_header_wrapper .site-title a
    {
        font-size: ' . $h2_size . ';
    }

    @media screen and (max-width: 639px) {
        .content-area .gbtr_post_title_listing
        {
            font-size: ' . $h2_size . ';
        }
    }

    .content-area h3,
    .entry-content h3,
    #customer_details .woocommerce-shipping-fields h3 span,
    .woocommerce-account .woocommerce-EditAccountForm fieldset legend,
    .wp-block-latest-posts li > a
    {
        font-size: ' . $h3_size . ';
    }

    @media screen and (max-width: 639px) {
        .comments-area .comments-title
        {
            font-size: ' . $h3_size . ';
        }
    }

    .content-area h4,
    .entry-content h4,
    .comments-area .comment-list .comment-author cite,
    .js-offcanvas .search-text,
    .wc-block-featured-product__price
    {
        font-size: ' . $h4_size . ';
    }

    .content-area h5,
    .entry-content h5
    {
        font-size: ' . $h5_size . ';
    }

    @media screen and (max-width: 639px) {
        .comments-area .comment-list .comment-author cite
        {
            font-size: ' . $h5_size . ';
        }
    }

    .content-area p.has-drop-cap:first-letter,
    .entry-content p.has-drop-cap:first-letter
    {
        font-size: ' . $drop_cap_size . ';
    }
';

?>
