<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_single_product_breadcrumb', 'woocommerce_breadcrumb', 20 );

$terms = get_the_terms($post->ID,'product_cat');
$count = count($terms); $i=0;

if ($terms) {
	foreach ($terms as $term) {
		$i++;
	}
}

get_header('shop');

if ( GBT_Opt::getOption( 'breadcrumbs', false ) ) { ?>

	<div class="product_top">

		<?php do_action( 'woocommerce_single_product_breadcrumb' ); ?>

		<?php if ($i >= 1) { ?>

			<div class="product_nav_buttons">
				<div class="arrow_left"><?php previous_post_link( '%link', '', true, '', 'product_cat' ); ?></div>
				<div class="arrow_right"><?php next_post_link( '%link', '', true, '', 'product_cat' ); ?></div>
			</div>

		<?php } ?>
	</div>

<?php
}

?>

<div class="global_content_wrapper">

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php wc_get_template_part( 'content', 'single-product' ); ?>

	<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<div class="clear"></div>

</div>

<div class="gbtr_widgets_footer_wrapper">
	<?php get_template_part("light_footer"); ?>
	<?php get_template_part("dark_footer"); ?>
</div>

<?php get_footer('shop'); ?>
