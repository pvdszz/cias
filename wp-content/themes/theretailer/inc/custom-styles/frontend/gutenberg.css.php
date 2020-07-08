<?php

$title_size     = 3.75  * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$h1_size        = 2.488 * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$h2_size        = 2.074 * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$h3_size        = 1.728 * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$h4_size        = 1.44  * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$h5_size        = 1.2   * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$drop_cap_size  = 6.4   * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';

$custom_style .= '

    .boxed-content .gbt_18_snap_look_book,
    .boxed-content .gbt_18_snap_look_book .gbt_18_look_book_item
    {
        width: ' . GBT_Opt::getOption( 'boxed_layout_width', 1100 ) . 'px;
    }

    .gbt_18_tr_banner_title,
    .gbt_18_tr_posts_grid_title,
    .gbt_18_tr_slide_title,
    .wp-block-cover .wp-block-cover__inner-container p,
    .gbt_18_snap_look_book .gbt_18_current_book,
    .gbt_18_snap_look_book .gbt_18_hero_section_content .gbt_18_hero_subtitle,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_header .gbt_18_current_slide,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_header .gbt_18_number_of_items,
    .gbt_18_pagination .gbt_18_snap_page a,
    .wc-block-grid .wc-block-grid__product-add-to-cart .wp-block-button__link,
    .wc-block-grid ul.wc-block-grid__products li.wc-block-grid__product .wc-block-grid__product-add-to-cart .wp-block-button__link,
    .wp-block-woocommerce-active-filters .wc-block-active-filters__clear-all
    {
        font-family: ' . TheRetailer_Fonts::get_secondary_font() . ' !important;
    }

    .wc-block-grid ul.wc-block-grid__products li.wc-block-grid__product .wc-block-grid__product-title a,
    .wc-block-grid .wc-block-pagination .wc-block-pagination-page
    {
        font-family: ' . TheRetailer_Fonts::get_main_font() . ';
    }

    @media all and (min-width: ' . GBT_Opt::getOption( 'boxed_layout_width', 1100 ) . 'px) {
        .page #global_wrapper.boxed-content .page_default .alignwide
        {
            margin-left: calc( (-' . GBT_Opt::getOption( 'boxed_layout_width', 1100 ) . 'px + 940px) / 4 );
            margin-right: calc( (-' . GBT_Opt::getOption( 'boxed_layout_width', 1100 ) . 'px + 940px) / 4 );
            max-width: 100vw;
        }

        .page #global_wrapper.boxed-content .page_full_width .alignfull,
        .page #global_wrapper.boxed-content .page_full_width .alignwide,
        .page #global_wrapper.boxed-content .page_default .alignfull
        {
            margin-left: calc( -' . GBT_Opt::getOption( 'boxed_layout_width', 1100 ) . 'px / 2 + 100% / 2 );
            margin-right: calc( -' . GBT_Opt::getOption( 'boxed_layout_width', 1100 ) . 'px / 2 + 100% / 2 );
        }

        .page #global_wrapper.boxed-content .page_full_width .wp-block-table.alignwide,
        .page #global_wrapper.boxed-content .page_default .wp-block-table.alignwide
        {
            width: calc( ' . GBT_Opt::getOption( 'boxed_layout_width', 1100 ) . 'px - ( 2 * (' . GBT_Opt::getOption( 'boxed_layout_width', 1100 ) . 'px - 940px) / 4 ) );
        }

        .page #global_wrapper.boxed-content .page_full_width .wp-block-table.alignfull,
        .page #global_wrapper.boxed-content .page_default .wp-block-table.alignfull
        {
            width: ' . GBT_Opt::getOption( 'boxed_layout_width', 1100 ) . 'px;
        }
    }

    .wp-block-quote,
    .wp-block-pullquote,
    .wp-block-image figcaption,
    .wp-block-embed figcaption,
    .wp-block-search .wp-block-search__input,
    .gbt_18_tr_posts_grid .gbt_18_tr_posts_grid_excerpt,
    .wp-block-latest-posts__post-date,
    .wc-block-grid ul.wc-block-grid__products li.wc-block-grid__product .wc-block-grid__product-title a,
    .wc-block-grid__product-price .wc-block-grid__product-price__value,
    .wp-block-woocommerce-attribute-filter ul.wc-block-checkbox-list li label .wc-block-attribute-filter-list-count,
    .wp-block-woocommerce-active-filters .wc-block-active-filters__clear-all:hover
    {
        color: ' . GBT_Opt::getOption( 'primary_color', '#000' ) . ';
    }

    .gbt_portfolio_wrapper .portfolio_categories li,
    .gbt_portfolio_wrapper .portfolio_item_cat
    {
        color: ' . GBT_Opt::getOption( 'primary_color_dark' ) . ';
    }

    .gbt_portfolio_wrapper .portfolio_categories li:hover,
    .wc-block-grid .wc-block-pagination .wc-block-pagination-page.wc-block-pagination-page--active,
    .wc-block-grid .wc-block-pagination .wc-block-pagination-page.wc-block-pagination-page--active:hover
    {
        border-color: ' . GBT_Opt::getOption( 'primary_color' ) . ';
        background-color: ' . GBT_Opt::getOption( 'primary_color' ) . ';
    }

    .wc-block-grid .wc-block-pagination .wc-block-pagination-page.wc-block-pagination-page--active,
    .wc-block-grid .wc-block-pagination .wc-block-pagination-page.wc-block-pagination-page--active:hover
    {
        color: ' . GBT_Opt::getOption( 'main_bg_color', '#fff' ) . ';
    }

    .wp-block-quote cite,
    .wp-block-quote.is-style-large cite,
    .wp-block-pullquote cite,
    .wp-block-pullquote footer,
    .wp-block-getbowtied-categories-grid .gbt_18_category_grid_item .gbt_18_category_grid_item_title
    {
        font-size: ' . GBT_Opt::getOption( 'base_font_size', 13 ) . 'px;
    }

    .gbt_18_snap_look_book .gbt_18_hero_section_content .gbt_18_hero_title
    {
        font-size: ' . $title_size . ';
    }

    @media all and (max-width: 1023px) {
        .gbt_18_snap_look_book .gbt_18_hero_section_content .gbt_18_hero_title
        {
            font-size: ' . $h1_size . ';
        }
    }

    .gbt_18_lookbook_reveal_wrapper .gbt_18_content_top h2,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_title a
    {
        font-size: ' . $h1_size . ';
    }

    .wp-block-quote p,
    .wp-block-pullquote p,
    .wp-block-pullquote.is-style-solid-color blockquote p
    {
        font-size: ' . $h4_size . ';
    }

    .wp-block-quote.is-style-large p,
    .gbt_18_expanding_grid .gbt_18_grid .gbt_18_expanding_grid_item .gbt_18_product_title
    {
        font-size: ' . $h3_size . ';
    }

    .wp-block-calendar td,
    .wp-block-calendar th,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_title a,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_link a,
    .wc-block-grid .wc-block-grid__product-add-to-cart .wp-block-button__link:hover,
    .wc-block-grid .wc-block-pagination .wc-block-pagination-page
    {
        color: ' . GBT_Opt::getOption( 'primary_color', '#000' ) . ';
    }

    .gbt_18_tr_posts_grid .gbt_18_tr_posts_grid_item:hover .gbt_18_tr_posts_grid_title,
    .wp-block-calendar a, .wp-block-calendar tfoot a,
    .gbt_portfolio_wrapper .portfolio_link:hover .portfolio_title,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_title a:hover,
    .gbt_18_default_slider .gbt_18_content .gbt_18_content_wrapper .gbt_18_slide_link a:hover,
    .wc-block-grid .wc-block-grid__product-add-to-cart .wp-block-button__link,
    .wc-block-grid__product-rating .wc-block-grid__product-rating__stars span:before,
    .wc-block-grid .wc-block-pagination .wc-block-pagination-page:hover,
    .wp-block-woocommerce-active-filters .wc-block-active-filters__clear-all
    {
        color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ';
    }

    .wc-block-grid .wc-block-pagination .wc-block-pagination-page:hover
    {
        border-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ';
    }

    @media all and (max-width: 768px) {

        .wp-block-media-text .wp-block-media-text__content p,
        .gbt_18_tr_banner .gbt_18_tr_banner_subtitle,
        .gbt_18_tr_slider .gbt_18_tr_slide_description
        {
            font-size: ' . GBT_Opt::getOption( 'base_font_size', 13 ) . 'px!important;
        }

        .gbt_18_tr_banner .gbt_18_tr_banner_title,
        .gbt_18_tr_slider .gbt_18_tr_slide_title,
        .gbt_18_lookbook_reveal_wrapper .gbt_18_content_top h2
        {
            font-size: ' . $h3_size . ' !important;
        }
    }

    .wp-block-tag-cloud a:hover
    {
        background-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ';
        border-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ';
    }

    .wp-block-woocommerce-attribute-filter ul.wc-block-checkbox-list li input:checked + label,
    .wp-block-woocommerce-active-filters ul.wc-block-active-filters-list li .wc-block-active-filters-list-item__name
    {
        background-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ';
    }

    .wp-block-woocommerce-attribute-filter h3,
    .wp-block-woocommerce-active-filters h3,
    .wp-block-woocommerce-price-filter h3
    {
        border-color: ' . GBT_Opt::getOption( 'primary_color', '#000' ) . ';
    }

    .wp-block-woocommerce-attribute-filter ul.wc-block-checkbox-list li
    {
        border-bottom-color: ' . GBT_Opt::getOption( 'primary_color_ultra_light' ) . ';
    }
';

?>
