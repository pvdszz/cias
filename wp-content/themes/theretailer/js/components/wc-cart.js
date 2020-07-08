jQuery(function($) {

	"use strict";

    if ( $('body').hasClass('woocommerce-cart') && $(window).width() <= 767 ) {
        mobile_cart_product_set_images_height();
    }

    $( document.body ).on( 'updated_cart_totals', function(){
        mobile_cart_product_set_images_height();
    });

    function mobile_cart_product_set_images_height() {
        $('.shop_table tr.cart_item').each( function() {

            var height = 10;

            height += $(this).find('.product-name').outerHeight();
            height += $(this).find('.product-price').outerHeight();
            height += $(this).find('.product-quantity').outerHeight();
            height += $(this).find('.product-subtotal').outerHeight();

            $(this).find('.product-thumbnail').css('min-height', height + 'px');
        });
    }
});
