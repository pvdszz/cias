<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */

global $wp_query;

//woocommerce_before_main_content
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );

add_action( 'woocommerce_before_main_content_breadcrumb', 'woocommerce_breadcrumb', 20 );

//woocommerce_before_shop_loop
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

add_action( 'woocommerce_before_shop_loop_result_count', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_before_shop_loop_catalog_ordering', 'woocommerce_catalog_ordering', 30 );

// Category Header Image
$category_header_image = '';
$category_class = '';
if( !is_shop() ) {
	$category_header_src = apply_filters( 'getbowtied_get_category_header_image', '' );
	if($category_header_src) {
		$category_class = 'with_featured_img';
		$category_header_image = 'background-image:url("' . $category_header_src . '")';
	}
}

$description = apply_filters( 'the_content', term_description() );

//Sidebar classes
$archive_product_sidebar = 'no';
$sidebar = false;

if ( GBT_Opt::getOption( 'sidebar_listing', false ) ) {
	$archive_product_sidebar = 'yes';
    $sidebar = true;
};

if (isset($_GET["product_listing_sidebar"])) {
	$archive_product_sidebar = $_GET["product_listing_sidebar"];
}

$archive_classes = '';
$sidebar_classes = 'page_sidebar';
if( $archive_product_sidebar != "yes") {
	$archive_classes = 'listing_products_no_sidebar';
} else {
	if( '0' === GBT_Opt::getOption( 'sidebar_style', '0' ) ) {
		$archive_classes = 'page_has_sidebar page_has_sidebar_left listing_products shop_with_sidebar';
		$sidebar_classes .= ' page_sidebar_left';
	} else {
		$archive_classes = 'page_has_horizontal_sidebar listing_products';
		$sidebar_classes .= ' page_sidebar_horizontal';
	}
}

$parent_id      = get_queried_object_id();
$categories     = get_terms('product_cat', array('hide_empty' => 0, 'parent' => $parent_id));
$display_mode 	= woocommerce_get_loop_display_mode();

get_header('shop');

if ( GBT_Opt::getOption( 'breadcrumbs', false ) ) { ?>
	<div class="shop_top <?php echo (!empty($category_header_image)) ? 'category' : ''; ?>">
		<?php do_action('woocommerce_before_main_content_breadcrumb'); ?>
	</div>
<?php
}

?>

<div class="global_content_wrapper">

	<div <?php if ( get_option( 'tr_category_header_parallax', 'yes' ) === 'yes' ) : ?>data-stellar-background-ratio="0.5"<?php endif;?> class="category_header <?php if ( $description ) : ?>with_term_description<?php endif; ?> <?php echo esc_attr($category_class); ?>" style="<?php echo esc_attr($category_header_image); ?>">

		<div class="tr_content_wrapper">

			<div class="category_header_overlay"></div>

				<?php do_action('woocommerce_before_main_content'); ?>

				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

					<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

				<?php endif; ?>

				<?php do_action( 'woocommerce_archive_description' ); ?>

		</div>
	</div>

	<div class="<?php echo esc_attr($archive_classes); ?>">
		<div class="catalog_top <?php echo ( esc_attr($display_mode) == 'both' && $categories) ? 'catalog_top_margin' : ''; ?>">

	    	<?php if( $sidebar ) { ?>
				<div class="shop_offcanvas_button">
					<span><?php esc_html_e( 'Filters', 'theretailer' ); ?></span>
				</div>
			<?php } ?>

	        <?php

	        do_action('woocommerce_before_shop_loop_result_count');
	        do_action( 'woocommerce_before_shop_loop_catalog_ordering' );

	        ?>

	        <div class="clr"></div>

	        <div class="hr shop_separator <?php echo esc_attr($sidebar) ? '' : 'no-sidebar'; ?>"></div>

	    </div>
	</div>

	<?php if ( $archive_product_sidebar == "yes" ) { ?>
        <?php if ( is_active_sidebar( 'widgets_product_listing' ) ) : ?>
            <div class="<?php echo esc_attr($sidebar_classes); ?>">
                <?php dynamic_sidebar('widgets_product_listing'); ?>
            </div>
        <?php endif; ?>

    <?php } ?>

	<div class="<?php echo esc_attr($archive_classes); ?>">

		<?php do_action( 'woocommerce_before_shop_loop' ); ?>

        <?php if ( is_tax() ) : ?>

            <?php do_action( 'woocommerce_taxonomy_archive_description' ); ?>

        <?php elseif ( ! empty( $shop_page ) && is_object( $shop_page ) ) : ?>

            <?php do_action( 'woocommerce_product_archive_description', $shop_page ); ?>

        <?php endif; ?>

		<?php if ( (function_exists('woocommerce_product_loop') && woocommerce_product_loop()) || have_posts() ) : ?>

            <?php woocommerce_product_loop_start(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

                <?php wc_get_template_part( 'content', 'product' ); ?>

            <?php endwhile; // end of the loop. ?>

    		<?php woocommerce_product_loop_end(); ?>

    		<?php do_action( 'woocommerce_after_shop_loop' ); ?>

        <?php else : ?>

            <?php do_action( 'woocommerce_no_products_found' ); ?>

        <?php endif; ?>

    </div>

	<?php do_action( 'woocommerce_after_main_content' ); ?>

	<div class="clear"></div>

</div>

<div class="gbtr_widgets_footer_wrapper">
	<?php get_template_part("light_footer"); ?>
	<?php get_template_part("dark_footer"); ?>
</div>

<?php get_footer('shop'); ?>
