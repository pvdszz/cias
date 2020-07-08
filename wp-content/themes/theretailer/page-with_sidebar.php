<?php
/*
Template Name: Page with Sidebar
*/

$page_id = "";
if ( is_single() || is_page() ) {
	$page_id = get_the_ID();
} else if ( is_home() ) {
	$page_id = get_option('page_for_posts');
}

$page_light_footer_option = "on";
if ( get_post_meta( $page_id, 'page_light_footer_meta_box_check', true ) ) {
	$page_light_footer_option = get_post_meta( $page_id, 'page_light_footer_meta_box_check', true );
}

$page_dark_footer_option = "on";
if ( get_post_meta( $page_id, 'page_dark_footer_meta_box_check', true ) ) {
	$page_dark_footer_option = get_post_meta( $page_id, 'page_dark_footer_meta_box_check', true );
}

$page_title_option = "on";
if ( get_post_meta( $page_id, 'page_title_meta_box_check', true ) ) {
	$page_title_option = get_post_meta( $page_id, 'page_title_meta_box_check', true );
}

?>

<?php get_header(); ?>

<div class="global_content_wrapper <?php echo ( esc_attr($page_title_option) == "off" ) ? 'hidden-title' : ''; ?>">

    <div class="page_has_sidebar page_has_sidebar_right">

		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

	</div>

	<div class="page_sidebar page_sidebar_right">
		<?php get_sidebar(); ?>
    </div>

    <div class="clear"></div>

</div>

<?php if ( $page_light_footer_option == "on" || $page_dark_footer_option == "on" ) { ?>
	<div class="gbtr_widgets_footer_wrapper">
		<?php

		if ( $page_light_footer_option == "on" ) {
			get_template_part("light_footer");
		}

		if ( $page_dark_footer_option == "on" ) {
			get_template_part("dark_footer");
		}

		?>
	</div>
<?php } ?>

<?php get_footer(); ?>
