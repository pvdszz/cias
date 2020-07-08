<?php
/*
Template Name: 100% Width
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

?>

<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

        <div class="page_full_width">
            <div class="entry-content">
                <?php the_content(); ?>
				<div class="clr"></div>
            </div><!-- .entry-content -->
        </div>

    <?php endwhile; // end of the loop. ?>

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
