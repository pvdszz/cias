<?php
/**
 * Single Product Up-Sells
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

global $product, $woocommerce_loop;

$upsells = $product->get_upsell_ids();

if ( sizeof( $upsells ) == 0 ) return;

$args = array(
	'post_type'				=> 'product',
	'ignore_sticky_posts'	=> 1,
	'posts_per_page' 		=> GBT_Opt::getOption( 'related_products_number', 4 ),
	'no_found_rows' 		=> 1,
	'orderby' 				=> 'rand',
	'post__in' 				=> $upsells
);

$products = new WP_Query( $args );

if ( $products->have_posts() ) : ?>

    <div class="products_slider up_sells_section">

        <div class="gbtr_items_sliders_header">
            <div class="gbtr_items_sliders_title">
                <?php esc_html_e( 'You may also like&hellip;', 'woocommerce' ); ?>
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

<?php endif;

wp_reset_postdata();
