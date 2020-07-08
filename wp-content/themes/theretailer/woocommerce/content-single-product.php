<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

	global $post, $product;

	//woocommerce_single_product_summary
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

	add_action( 'woocommerce_single_product_summary_single_title', 'woocommerce_template_single_title', 5 );
	add_action( 'woocommerce_single_product_summary_single_rating', 'woocommerce_template_single_rating', 10 );
	add_action( 'woocommerce_single_product_summary_single_price', 'woocommerce_template_single_price', 10 );
	add_action( 'woocommerce_single_product_summary_single_excerpt', 'woocommerce_template_single_excerpt', 20 );
	add_action( 'woocommerce_single_product_summary_single_add_to_cart', 'woocommerce_template_single_add_to_cart', 30 );
	add_action( 'woocommerce_single_product_summary_single_meta', 'woocommerce_template_single_meta', 40 );
	add_action( 'woocommerce_single_product_summary_single_sharing', 'woocommerce_template_single_sharing', 50 );

	//woocommerce_before_single_product_summary
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

	add_action( 'woocommerce_before_single_product_summary_sale_flash', 'woocommerce_show_product_sale_flash', 10 );
	add_action( 'woocommerce_before_single_product_summary_product_images', 'woocommerce_show_product_images', 20 );

	$product_page_has_sidebar = false;
    $layout = 'product-layout-1';

	if ( GBT_Opt::getOption( 'products_layout', false ) ) {
		$product_page_has_sidebar = true;
        $layout = 'product-layout-2';
	}
?>

<div id="product-<?php the_ID(); ?>" <?php function_exists('wc_product_class')? wc_product_class('product ' . $layout, $product) : post_class(); ?>>

	<?php if ( $product_page_has_sidebar ) : ?>

	<div class="product_page_has_sidebar page_has_sidebar_left">
		<div class="product_main_infos with_sidebar">

	<?php else : ?>

		<div class="product_main_infos without_sidebar">

	<?php endif; ?>


			<?php
				/**
				 * woocommerce_before_single_product hook
				 *
				 * @hooked woocommerce_show_messages - 10
				 */
				 do_action( 'woocommerce_before_single_product' );
			?>

			<div class="grtr_product_header_mobiles">

				<?php the_title( '<h2 class="product_title entry-title">', '</h2>' ); ?>
				<?php do_action( 'woocommerce_single_product_summary_single_price' ); ?>

			</div>

			<div class="gbtr_product_details_left_col">

				<?php if ( !GBT_Opt::getOption( 'catalog_mode', false ) ) : ?>
					<?php if ( !$product->is_in_stock() ) : ?>
                        <div class="out_of_stock_badge_single <?php if (!$product->is_on_sale()) : ?>first_position<?php endif; ?>">
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


				<?php
					/**
					 * woocommerce_show_product_images hook
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					if ( !GBT_Opt::getOption( 'catalog_mode', false ) ) {
						do_action( 'woocommerce_before_single_product_summary_sale_flash' );
					}
					do_action( 'woocommerce_before_single_product_summary_product_images' );
					do_action( 'woocommerce_before_single_product_summary' );
				?>

			</div>

			<div class="gbtr_product_details_right_col">

				<div class="product_infos summary">

					<?php
						do_action( 'woocommerce_single_product_summary_single_title' );
						do_action( 'woocommerce_single_product_summary_single_rating' );
						do_action( 'woocommerce_single_product_summary_single_price' );
						do_action( 'woocommerce_single_product_summary_single_excerpt' );
						if ( !GBT_Opt::getOption( 'catalog_mode', false ) ) {
							do_action( 'woocommerce_single_product_summary_single_add_to_cart' );
						}
						do_action( 'woocommerce_single_product_summary' );
						do_action( 'woocommerce_single_product_summary_single_meta' );
						do_action( 'woocommerce_single_product_summary_single_sharing' );
					?>

				</div><!-- .summary -->

			</div>

		</div>

		<?php do_action( 'getbowtied_woocommerce_single_product_share' ); ?>

		<?php
			/**
			 * woocommerce_after_single_product_summary hook
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woocommerce_after_single_product_summary' );
		?>

<?php if ( $product_page_has_sidebar ) : ?>

	</div>
	<?php if ( is_active_sidebar( 'widgets_product_listing' ) ) : ?>
	<div class="page_sidebar page_sidebar_left">
		<?php dynamic_sidebar('widgets_product_listing'); ?>
	</div>
	<?php endif; ?>

<?php endif; ?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
