<?php

// [products_slider]
function tr_ext_shortcode_products_slider($atts, $content=null, $code) {

	wp_enqueue_style('swiper');
    wp_enqueue_script('swiper');

	wp_enqueue_style('theretailer-featured-products-slider-shortcode-styles');
	wp_enqueue_script('theretailer-featured-products-slider-script');

	$sliderrandomid = rand();
	extract(shortcode_atts(array(
		'per_page'  => '12',
        'orderby' => 'date',
        'order' => 'desc'
	), $atts));
	ob_start();
	?>

    <div class="featured_products_slider swiper-container">

		<div class="swiper-wrapper">

            <?php

			$atts = shortcode_atts( array(
				'per_page' => '12',
				'columns'  => '4',
				'orderby'  => 'date',
				'order'    => 'desc',
				'category' => '',  // Slugs
				'operator' => 'IN', // Possible values are 'IN', 'NOT IN', 'AND'.
			), $atts, 'featured_products' );

			$meta_query  = WC()->query->get_meta_query();
			$tax_query   = WC()->query->get_tax_query();
			$tax_query[] = array(
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => 'featured',
				'operator' => 'IN',
			);

			$query_args = array(
				'status'         	  => 'publish',
				'ignore_sticky_posts' => 1,
				'posts_per_page'      => $per_page,
				'orderby'             => $orderby,
				'order'               => $order,
				'meta_query'          => $meta_query,
				'tax_query'           => $tax_query,
			);

			$products = wc_get_products( $query_args );

			foreach( $products as $product ) : ?>

				<div class="swiper-slide">

                	<li class="products_slider_item">

					    <div class="products_slider_content">

					        <div class="products_slider_images_wrapper">
					            <div class="products_slider_images">
					            	<a href="<?php echo $product->get_permalink(); ?>">
					            		<?php echo $product->get_image( 'large' ); ?>
					            	</a>
					            </div>
					        </div>

					        <div class="products_slider_infos">

					            <!-- Show only the first category-->
					            <?php $gbtr_product_cats = wc_get_product_category_list($product->get_id(), '|||', '',''); ?>
					            <div class="products_slider_category">
					            	<?php list($firstpart) = explode('|||', $gbtr_product_cats); echo $firstpart; ?>
					            </div>

					            <div class="products_slider_title">
					            	<a href="<?php echo $product->get_permalink(); ?>"><?php echo $product->get_name(); ?></a>
					            </div>

					            <div class="products_slider_price">
									<?php echo $product->get_price_html(); ?>
					            </div>

					            <?php if ( !get_theme_mod( 'catalog_mode', false ) ) { ?>

					            <div class="products_slider_button_wrapper">

									<?php
					                if ( ! $product->is_purchasable() && ! in_array( $product->get_type(), array( 'external', 'grouped' ) ) ) return;
					                ?>

					                <?php if ( ! $product->is_in_stock() ) : ?>

					                    <a class="dark_button" href="<?php echo apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->get_id() ) ); ?>"><?php echo apply_filters( 'out_of_stock_add_to_cart_text', __( 'Read More', 'woocommerce' ) ); ?></a>

					                <?php else : ?>

					                    <?php

					                        switch ( $product->get_type() ) {
					                            case "variable" :
					                                $link 	= apply_filters( 'variable_add_to_cart_url', get_permalink( $product->get_id() ) );
					                                $label 	= apply_filters( 'variable_add_to_cart_text', __('Select options', 'woocommerce') );
					                            break;
					                            case "grouped" :
					                                $link 	= apply_filters( 'grouped_add_to_cart_url', get_permalink( $product->get_id() ) );
					                                $label 	= apply_filters( 'grouped_add_to_cart_text', __('View options', 'woocommerce') );
					                            break;
					                            case "external" :
					                                $link 	= apply_filters( 'external_add_to_cart_url', get_permalink( $product->get_id() ) );
					                                $label 	= apply_filters( 'external_add_to_cart_text', __('Read More', 'woocommerce') );
					                            break;
					                            default :
					                                $link 	= apply_filters( 'add_to_cart_url', esc_url( $product->add_to_cart_url() ) );
					                                $label 	= apply_filters( 'add_to_cart_text', __('Add to cart', 'woocommerce') );
					                            break;
					                        }

					                        printf('<a class="dark_button" href="%s" rel="nofollow" data-product_id="%s">%s</a>', $link, $product->get_id(), $label);

					                    ?>

					                <?php endif; ?>

					            </div>
					            <?php } ?>

					        </div>

					    </div>

					</li>

                </div>

            <?php endforeach; ?>

        </div>

		<div class='swiper-button-prev'></div>
        <div class='swiper-button-next'></div>

	</div>

	<?php
	wp_reset_postdata();
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

add_shortcode("products_slider", "tr_ext_shortcode_products_slider");
