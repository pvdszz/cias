<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

//woocommerce_before_shop_loop_item_title
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$attachment_ids = $product->get_gallery_image_ids();

?>

	<li <?php wc_product_class( 'product_item', $product ); ?>>

		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<div class="product_item_inner <?php echo class_exists('YITH_WCWL') ? 'with_wishlist' : ''; ?>">

		<?php if ( !GBT_Opt::getOption( 'catalog_mode', false ) ) : ?>
			<?php wc_get_template( 'loop/sale-flash.php' ); ?>
		<?php endif; ?>

		<?php if ( !GBT_Opt::getOption( 'catalog_mode', false ) ) : ?>

			<?php if ( !$product->is_in_stock() ) : ?>
				<div class="out_of_stock_badge_loop <?php if (!$product->is_on_sale()) : ?>first_position<?php endif; ?>">
					<?php
						if ( !empty( GBT_Opt::getOption( 'out_of_stock_text', esc_html__( 'Out of Stock', 'theretailer' ) ) ) ) {
							printf( wp_kses_post( __('%s', 'theretailer')), GBT_Opt::getOption( 'out_of_stock_text', esc_html__( 'Out of Stock', 'theretailer' ) ) );
						} else {
							esc_html_e( 'Out of stock', 'woocommerce' );
						}
					?>
				</div>
			<?php endif; ?>

		<?php endif; ?>

		<div class="image_container">
			<a href="<?php echo esc_url( apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ) ); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">

				<div class="loop_products_thumbnail_img_wrapper front"><?php echo woocommerce_get_product_thumbnail(); ?></div>

				<?php if ( GBT_Opt::getOption( 'flip_product', true ) ) { ?>

				<?php

					if ( $attachment_ids ) {

						$loop = 0;

						foreach ( $attachment_ids as $attachment_id ) {

							$image_link = wp_get_attachment_url( $attachment_id );

							if ( ! $image_link )
								continue;

							$loop++;

							printf( '<div class="loop_products_additional_img_wrapper back">%s</div>', wp_get_attachment_image( $attachment_id, 'shop_catalog' ) );

							if ($loop == 1) break;

						}

					} else {

					?>

					<div class="loop_products_additional_img_wrapper back"><?php echo woocommerce_get_product_thumbnail(); ?></div>

					<?php

					}
				?>

				<?php } ?>

			</a>

			<div class="clr"></div>
			<?php if ( !GBT_Opt::getOption( 'catalog_mode', false ) ) { ?>
			<div class="product_button"><?php do_action( 'woocommerce_after_shop_loop_item' ); ?></div>
			<?php } ?>

			<?php if (class_exists('YITH_WCWL')) : ?>
			<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
			<?php endif; ?>

		</div>

		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */

			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>

		<?php if ( '0' === GBT_Opt::getOption( 'category_listing', '0' ) ) { ?>
			<!-- Show only the first category-->
			<?php $gbtr_product_cats = strip_tags(wc_get_product_category_list ($product->get_id(), '|||', '', '')); //Categories without links separeted by ||| ?>
			<h3><a href="<?php the_permalink(); ?>"><?php list($firstpart) = explode('|||', $gbtr_product_cats); echo esc_html($firstpart); ?></a></h3>
		<?php } ?>

		<p class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */

			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

		</div><!--.product_item_inner-->
	</li>
