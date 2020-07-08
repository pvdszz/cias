<?php
/**
 * Related Products
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

global $product, $woocommerce_loop;

if ( GBT_Opt::getOption( 'related_products_on_product_page', true ) ) {

	$related = wc_get_related_products($product->get_id(), 12);

	if ( sizeof($related) == 0 ) return;

	$args = apply_filters('woocommerce_related_products_args', array(
		'post_type'				=> 'product',
		'ignore_sticky_posts'	=> 1,
		'no_found_rows' 		=> 1,
		'posts_per_page' 		=> GBT_Opt::getOption( 'related_products_number', 4 ),
		'orderby' 				=> $orderby,
		'post__in' 				=> $related
	) );

	$products = new WP_Query( $args );

	$woocommerce_loop['columns'] 	= $columns;

	if ( $products->have_posts() ) : ?>

		<?php if ( $related_products ) : ?>

			<div class="products_slider related_products_section">

				<div class="gbtr_items_sliders_header">
					<div class="gbtr_items_sliders_title">
						<?php esc_html_e( 'Related products', 'woocommerce' ); ?>
					</div>
				</div>

				<div class="swiper-container">

					<div class="swiper-wrapper">

						<?php while ( $products->have_posts() ) : $products->the_post(); ?>

							<ul class="swiper-slide">
								<?php wc_get_template_part( 'content', 'product' ); ?>
							</ul>

						<?php endwhile; // end of the loop. ?>

					</div>

				</div>

				<div class="swiper-pagination"></div>

				<div class="slider-button-prev"></div>
				<div class="slider-button-next"></div>

			</div>

		<?php endif; ?>

	<?php endif;

	wp_reset_postdata();

}
