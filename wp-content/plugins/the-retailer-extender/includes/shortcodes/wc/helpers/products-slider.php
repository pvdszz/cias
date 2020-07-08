<?php

function tr_products_slider( $type = '', $products = null, $title = '' ) {
?>

	<div class="<?php echo $type; ?>-wrapper wc-products-slider products_slider">

        <div class="gbtr_items_sliders_header">
            <div class="gbtr_items_sliders_title">
                <?php echo $title ?>
            </div>
        </div>

        <div class="swiper-container">

            <div class="swiper-wrapper">

                <?php if ( $products->have_posts() ) : ?>

                    <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                		<ul class="products swiper-slide">
                        	<?php wc_get_template_part( 'content', 'product' ); ?>
                        </ul>

                    <?php endwhile; ?>

                <?php endif; ?>

    		</div>

        </div>

        <div class="swiper-pagination"></div>

        <div class="slider-button-prev"></div>
        <div class="slider-button-next"></div>

    </div>

<?php
}
