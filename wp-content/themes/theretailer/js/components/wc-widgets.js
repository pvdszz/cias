jQuery(function($) {

	"use strict";

    // shorten product titles in widgets
    $('.product_list_widget > li > a span.product-title').each(function() {
        if ($(this).text().length > 43 ) {
            $(this).text( $(this).text().substr(0, 43) + "..." );
        }
    });

    // shorten product titles in minicart
    $('.woocommerce-mini-cart > li a:nth-child(2)').each(function() {
        if ($(this).contents().not($('img').children()).text().length > 50 ) {
            var newText = $(this).contents().not($('img').children()).text().substr(0, 50) + "...";
            $(this).html(($(this).contents('img')[0].outerHTML) + newText);
        }
    });
});
