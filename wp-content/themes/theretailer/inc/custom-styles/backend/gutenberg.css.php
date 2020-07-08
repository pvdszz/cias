<?php

$title_size     = 3.75  * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$h1_size        = 2.488 * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$h2_size        = 2.074 * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$h3_size        = 1.728 * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$h4_size        = 1.44  * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$h5_size        = 1.2   * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';
$drop_cap_size  = 6.4   * GBT_Opt::getOption( 'base_font_size', 13 ) . 'px';

$custom_style .= '

	.page-layout-boxed.page-template-full .edit-post-visual-editor .wp-block,
	.page-layout-boxed.page-template-default .edit-post-visual-editor .wp-block:not([data-align="full"]):not([data-align="wide"])
	{
		max-width: ' . GBT_Opt::getOption( 'boxed_layout_width', 1100 ) . 'px;
	}

	.editor-styles-wrapper .editor-post-title__block .editor-post-title__input,
	.gbt_18_lookbook_sts_hero_item .gbt_18_hero_section_title
	{
		font-size: ' . $title_size . '!important;
	}

	@media all and (max-width: 1023px) {
		.editor-styles-wrapper .editor-post-title__block .editor-post-title__input,
		.gbt_18_lookbook_sts_hero_item .gbt_18_hero_section_title
		{
			font-size: ' . $h1_size . '!important;
		}
	}

	.gbt_18_lookbook_reveal_product_wrapper .gbt_18_editor_lookbook_product_content .gbt_18_editor_lookbook_product_content_left .gbt_18_editor_lookbook_product_content_left_inner_top .gbt_18_editor_lookbook_product_title
	{
		font-size: ' . $h1_size . '!important;
	}

	.wp-block-quote .editor-rich-text p,
	.wp-block-pullquote blockquote > .block-editor-rich-text p,
	.wp-block-pullquote.is-style-solid-color blockquote > .block-editor-rich-text p,
	.editor-block-list__block[data-type="getbowtied/scattered-product-list"] .gbt_18_expanding_grid_wrapper ul.gbt_18_expanding_grid_products li.gbt_18_grid_product .gbt_18_grid_product_title
    {
        font-size: ' . $h4_size . ';
    }

	.wp-block-quote.is-style-large .editor-rich-text p,
	.wp-block-latest-posts li > a
    {
        font-size: ' . $h3_size . ';
    }

	.edit-post-visual-editor,
	.edit-post-visual-editor .wp-block,
	textarea.editor-default-block-appender__content.block-editor-default-block-appender__content,
	.edit-post-visual-editor p,
	.wp-block-quote .wp-block-quote__citation,
	.wp-block-pullquote .wp-block-pullquote__citation,
	.editor-block-list__block[data-type="getbowtied/products-slider"] .gbt_18_editor_slide_text,
	.editor-styles-wrapper .wc-block-reviews-by-product .wc-block-review-list .wc-block-review-list-item__author
	{
		font-size: ' . GBT_Opt::getOption( 'base_font_size', 13 ) . 'px;
	}

	.wp-block-getbowtied-categories-grid.gbt_18_editor_categories_grid_wrapper .gbt_18_editor_categories_grid .gbt_18_editor_category_grid_item_title
	{
		font-size: ' . GBT_Opt::getOption( 'base_font_size', 13 ) . 'px !important;
	}

	.edit-post-visual-editor h1,
	.editor-styles-wrapper textarea.editor-post-title__input
	{
		font-size: ' . $h1_size . ';
	}

	.edit-post-visual-editor h2,
	.editor-block-list__block[data-type="getbowtied/products-slider"] .gbt_18_editor_default_slider .gbt_18_editor_slide_title
	{
		font-size: ' . $h2_size . ';
	}

	.edit-post-visual-editor h3
	{
		font-size: ' . $h3_size . ';
	}

	.edit-post-visual-editor h4,
	.gbt_18_tr_editor_posts_grid_title,
	.wp-block-getbowtied-categories-grid.gbt_18_editor_categories_grid_wrapper .gbt_18_editor_categories_grid .gbt_18_editor_category_grid_item .gbt_18_editor_category_grid_item_title
	{
		font-size: ' . $h4_size . ';
	}

	.edit-post-visual-editor h5
	{
		font-size: ' . $h5_size . ';
	}

	.edit-post-visual-editor h6,
	.editor-block-list__block[data-type="getbowtied/products-slider"] .gbt_18_editor_default_slider.force-full .gbt_18_editor_slide_text,
	.editor-block-list__block[data-type="getbowtied/lookbook-reveal"][data-align=full] .gbt_18_lookbook_reveal_product_wrapper .gbt_18_editor_lookbook_product_content .gbt_18_editor_lookbook_product_content_left .gbt_18_editor_lookbook_product_content_left_inner_top .gbt_18_editor_lookbook_product_text p
	{
		font-size: ' . GBT_Opt::getOption( 'base_font_size', 13 ) . 'px;
	}

	.edit-post-visual-editor p.has-drop-cap:first-letter
	{
		font-size: ' . $drop_cap_size . ';
	}

	.edit-post-visual-editor button:not(.components-button),
	.edit-post-visual-editor label,
	.edit-post-visual-editor p,
	.edit-post-visual-editor ul li,
	.edit-post-visual-editor ol li,
	.edit-post-visual-editor div,
	.edit-post-visual-editor textarea,
	.edit-post-visual-editor table thead tr th,
	.edit-post-visual-editor input[type="button"],
	.edit-post-visual-editor input[type="reset"],
	.edit-post-visual-editor input[type="submit"],
	.edit-post-visual-editor button[type="submit"],
	.gbt_18_editor_lookbook_sts_product_content .gbt_18_lookbook_sts_product_title,
	.gbt_18_product_carousel ul.gbt_18_carousel_products li.gbt_18_carousel_product .gbt_18_carousel_product_title,
	.wc-block-grid ul.wc-block-grid__products li.wc-block-grid__product .wc-block-grid__product-title a
	{
		font-family: ' . TheRetailer_Fonts::get_main_font() . ' !important;
	}

	.edit-post-visual-editor h1,
	.edit-post-visual-editor h2,
	.edit-post-visual-editor h3,
	.edit-post-visual-editor h4,
	.edit-post-visual-editor h5,
	.edit-post-visual-editor h6,
	.editor-post-title__block .editor-post-title__input,
	.gbt_18_tr_editor_banner_text_content h3,
	.gbt_18_tr_editor_posts_grid_title,
	.gbt_18_tr_editor_slide_title h2,
	.edit-post-visual-editor .wc-block-grid__product-add-to-cart a,
	.gbt_18_product_carousel .gbt_18_product_carousel_wrapper ul.gbt_18_carousel_products li.gbt_18_carousel_product .gbt_18_carousel_product_button,
	.edit-post-visual-editor .wc-block-grid__product-price,
	.gbt_18_product_carousel .gbt_18_product_carousel_wrapper ul.gbt_18_carousel_products li.gbt_18_carousel_product .gbt_18_carousel_product_price,
	.gbt_18_editor_default_slider .gbt_18_editor_slide_link,
	.editor-block-list__block[data-type="getbowtied/products-slider"] .gbt_18_editor_default_slider .gbt_18_editor_add_to_cart,
	.editor-block-list__block[data-type="getbowtied/products-slider"] .gbt_18_editor_default_slider.force-full .gbt_18_editor_slide_price,
	.editor-block-list__block[data-type="getbowtied/scattered-product-list"] .gbt_18_expanding_grid_wrapper ul.gbt_18_expanding_grid_products li.gbt_18_grid_product .gbt_18_grid_product_price,
	.wp-block-getbowtied-categories-grid.gbt_18_editor_categories_grid_wrapper .gbt_18_editor_category_grid_item_title,
	.editor-block-list__block[data-type="getbowtied/lookbook-reveal"][data-align=full] .gbt_18_lookbook_reveal_product_wrapper .gbt_18_editor_lookbook_product_content .gbt_18_editor_lookbook_product_content_left .gbt_18_editor_lookbook_product_content_left_inner_bottom .gbt_18_editor_lookbook_product_price,
	.gbt_18_editor_lookbook_sts_product_content .gbt_18_lookbook_sts_product_price,
	.wp-block p.has-drop-cap:first-letter,
	.wp-block-cover .wp-block-cover__inner-container .wp-block-paragraph,
	.editor-styles-wrapper .wp-block-search .wp-block-search__label div,
	.editor-styles-wrapper .gbt_18_lookbook_reveal_product_wrapper .gbt_18_editor_lookbook_product_content .gbt_18_editor_lookbook_product_content_left .gbt_18_editor_lookbook_product_button,
	.gbt_18_editor_default_slider .gbt_18_editor_slide_price,
	.gbt_18_lookbook_sts_hero_item .gbt_18_hero_section_subtitle,
	.wc-block-order-select .wc-block-order-select__label,
	.wc-block-order-select .wc-block-order-select__select,
	.wp-block-latest-posts li > a,
	.wp-block-latest-posts .wp-block-latest-posts__post-excerpt div > a,
    .wp-block-latest-posts__post-date,
	.wp-block[data-type="woocommerce/price-filter"] h3 textarea,
	.wp-block[data-type="woocommerce/active-filters"] h3 textarea,
	.wp-block[data-type="woocommerce/attribute-filter"] h3 textarea,
	.wp-block[data-type="woocommerce/active-filters"] .wc-block-active-filters__clear-all
	{
		font-family: ' . TheRetailer_Fonts::get_secondary_font() . ' !important;
	}

	.editor-styles-wrapper .wp-block a,
	.editor-styles-wrapper ul.wp-block-latest-posts a,
	.editor-styles-wrapper ul.wp-block-archives a,
	.editor-styles-wrapper .wp-block-categories a,
	.editor-styles-wrapper .wp-block-categories ul li a,
	.gbt_18_tr_editor_posts_grid_item:hover .gbt_18_tr_editor_posts_grid_title,
	.wc-block-grid__product-add-to-cart,
	.wc-block-product-categories.is-list a,
	.gbt_18_product_carousel .gbt_18_product_carousel_wrapper ul.gbt_18_carousel_products li.gbt_18_carousel_product .gbt_18_carousel_product_button,
	.gbt_18_editor_default_slider .gbt_18_editor_slide_title,
	.editor-block-list__block[data-type="getbowtied/products-slider"] .gbt_18_editor_default_slider .gbt_18_editor_slide_link,
	.editor-styles-wrapper p.wp-block-tag-cloud .tag-link-count,
	.wc-block-review-list-item__rating>.wc-block-review-list-item__rating__stars span:before,
	.editor-styles-wrapper .wp-block[data-type="woocommerce/active-filters"] .wc-block-active-filters__clear-all
	{
		color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ';
	}

	.wc-block-grid__product-rating .star-rating span:before
	{
		color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . '!important;
	}

	.wc-block-grid__product-onsale,
	.editor-block-list__block[data-type="getbowtied/products-slider"] .gbt_18_editor_default_slider .gbt_18_editor_add_to_cart:hover
	{
		background-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . '!important;
	}

	.wp-block[data-type="woocommerce/active-filters"] ul.wc-block-active-filters-list li
	{
		background-color: ' . GBT_Opt::getOption( 'accent_color', '#b39964' ) . ';
	}

	.editor-styles-wrapper .wp-block p,
	.editor-styles-wrapper .wp-block td,
	.editor-styles-wrapper .wp-block th,
	.editor-styles-wrapper .wp-block li,
	.editor-styles-wrapper .wp-block-preformatted pre,
	.editor-styles-wrapper .wp-block-verse pre,
	.editor-styles-wrapper .wp-block-heading h1,
	.editor-styles-wrapper .wp-block-heading h2,
	.editor-styles-wrapper .wp-block-heading h3,
	.editor-styles-wrapper .wp-block-heading h4,
	.editor-styles-wrapper .wp-block-heading h5,
	.editor-styles-wrapper .wp-block-heading h6,
	.editor-styles-wrapper .wp-block-image figcaption,
	.editor-styles-wrapper .wp-block-embed figcaption,
	.editor-styles-wrapper textarea.editor-post-title__input,
	.editor-styles-wrapper .wp-block-search .wp-block-search__input,
	.editor-styles-wrapper .wp-block-search .wp-block-search__label,
	textarea.editor-default-block-appender__content.block-editor-default-block-appender__content,
	.wc-block-grid__product-title,
	.wc-block-grid__product-price,
	.gbt_18_product_carousel .gbt_18_product_carousel_wrapper ul.gbt_18_carousel_products li.gbt_18_carousel_product .gbt_18_carousel_product_title,
	.gbt_18_product_carousel .gbt_18_product_carousel_wrapper ul.gbt_18_carousel_products li.gbt_18_carousel_product .gbt_18_carousel_product_price,
	.gbt_18_editor_default_slider .gbt_18_editor_slide_text,
	.editor-block-list__block[data-type="getbowtied/products-slider"] .gbt_18_editor_default_slider.force-full .gbt_18_editor_slide_price,
	.editor-block-list__block[data-type="getbowtied/products-slider"] .gbt_18_editor_default_slider .toggle-next:before,
	.editor-block-list__block[data-type="getbowtied/products-slider"] .gbt_18_editor_default_slider .toggle-prev:before,
	.editor-block-list__block[data-type="getbowtied/scattered-product-list"] .gbt_18_expanding_grid_wrapper ul.gbt_18_expanding_grid_products li.gbt_18_grid_product .gbt_18_grid_product_title,
	.editor-block-list__block[data-type="getbowtied/scattered-product-list"] .gbt_18_expanding_grid_wrapper ul.gbt_18_expanding_grid_products li.gbt_18_grid_product .gbt_18_grid_product_price,
	.wp-block-getbowtied-categories-grid.gbt_18_editor_categories_grid_wrapper .gbt_18_editor_categories_grid .gbt_18_editor_category_grid_item .gbt_18_editor_category_grid_item_title,
	.wp-block-getbowtied-categories-grid.gbt_18_editor_categories_grid_wrapper .gbt_18_editor_categories_grid .gbt_18_editor_category_grid_item .gbt_18_editor_category_grid_item_title .gbt_18_editor_category_grid_item_count,
	.gbt_18_tr_posts_grid .gbt_18_tr_editor_posts_grid_title,
	.gbt_18_tr_editor_portfolio_wrapper .gbt_18_tr_editor_portfolio_item_title,
	.wp-block-latest-posts__post-date,
	.wc-block-grid .wc-block-sort-select__select,
	.wc-block-grid ul.wc-block-grid__products li.wc-block-grid__product .wc-block-grid__product-title,
	.wc-block-grid ul.wc-block-grid__products li.wc-block-grid__product .wc-block-grid__product-title a,
	.wc-block-grid ul.wc-block-grid__products li.wc-block-grid__product .wc-block-grid__product-price__value,
	.wc-block-grid .wc-block-pagination .wc-block-pagination-page,
	.wp-block[data-type="woocommerce/price-filter"] h3 textarea,
	.wp-block[data-type="woocommerce/active-filters"] h3 textarea,
	.wp-block[data-type="woocommerce/attribute-filter"] h3 textarea
	{
		color: ' . GBT_Opt::getOption( 'primary_color', '#000' ) . ';
	}

	.editor-styles-wrapper .wp-block blockquote,
	.editor-styles-wrapper .wp-block-table.is-style-regular td,
	.editor-styles-wrapper .wp-block-table.is-style-regular th,
	.wp-block[data-type="woocommerce/price-filter"] h3 textarea,
	.wp-block[data-type="woocommerce/active-filters"] h3 textarea,
	.wp-block[data-type="woocommerce/attribute-filter"] h3 textarea
	{
		border-color: ' . GBT_Opt::getOption( 'primary_color', '#000' ) . '!important;
	}

	.editor-styles-wrapper .wp-block[data-type="woocommerce/attribute-filter"] ul.wc-block-checkbox-list li
	{
		border-bottom-color: ' . GBT_Opt::getOption( 'primary_color_ultra_light' ) . ' !important;
	}

	.gbt_18_tr_editor_portfolio_wrapper p.gbt_18_tr_editor_portfolio_item_categories
    {
        color: ' . GBT_Opt::getOption( 'primary_color_dark' ) . ';
    }

	.editor-styles-wrapper textarea.editor-post-title__input::-webkit-input-placeholder
    {
        color: ' . GBT_Opt::getOption( 'primary_color_dark' )  . ';
    }

    .editor-styles-wrapper textarea.editor-post-title__input::-moz-placeholder
    {
        color: ' . GBT_Opt::getOption( 'primary_color_dark' )  . ';
    }

    .editor-styles-wrapper textarea.editor-post-title__input:-ms-input-placeholder
    {
        color: ' . GBT_Opt::getOption( 'primary_color_dark' )  . ';
    }

	.gbt_18_editor_lookbook_sts_product_content .gbt_18_lookbook_sts_product_title,
	.gbt_18_editor_lookbook_sts_product_content .gbt_18_lookbook_sts_product_price,
	.wc-block-order-select .wc-block-order-select__select
	{
		color: ' . GBT_Opt::getOption( 'primary_color', '#000' ) . '!important;
	}

	.gbt_18_carousel_products_placeholder_toggle
	{
		fill: ' . GBT_Opt::getOption( 'primary_color', '#000' ) . ';
	}

	.editor-block-list__block[data-type="getbowtied/products-slider"] .gbt_18_editor_default_slider .gbt_18_editor_add_to_cart
	{
		background-color: ' . GBT_Opt::getOption( 'primary_color', '#000' ) . ';
	}
';

?>
