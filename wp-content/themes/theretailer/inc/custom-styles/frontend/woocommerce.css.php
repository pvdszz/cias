<?php

if ( !GBT_Opt::getOption( 'ratings_on_product_listing', false ) ) {

    $custom_style .= '

        .product_item .star-rating,
        .products_slider_item .star-rating
        {
            display: none !important;
        }
    ';
}

if ( !GBT_Opt::getOption( 'reviews_on_product_page', true ) ) {

    $custom_style .= '

        .woocommerce-tabs .reviews_tab
        {
            display: none !important;
        }

        .woocommerce-product-rating,
        .woocommerce .woocommerce-product-rating,
        .woocommerce-tabs #reviews
        {
            display: none;
        }
    ';
}

if ( GBT_Opt::getOption( 'flip_product', true ) ) {

    $custom_style .= '

        @media all and (min-width: 1024px ) {

            .image_container a
            {
                float: left;
                perspective: 600px;
                -webkit-perspective: 600px;
            }

            .image_container a .front,
            .image_container a .back
            {
                backface-visibility: hidden;
                -webkit-backface-visibility: hidden;
                transition: 0.6s;
                -webkit-transition: 0.6s;
                transform-style: preserve-3d;
                -webkit-transform-style: preserve-3d;
            }

            .image_container a .front {
                z-index: 2;
                transform: rotateY(0deg);
                -webkit-transform: rotateY(0deg);
            }

            .image_container a .back {
                transform: rotateY(-180deg);
                -webkit-transform: rotateY(-180deg);
            }

            .image_container a:hover .back {
                transform: rotateY(0deg);
                -webkit-transform: rotateY(0deg);
            }

            .image_container a:hover .front {
                transform: rotateY(180deg);
                -webkit-transform: rotateY(180deg);
            }
        }
    ';
}

?>
