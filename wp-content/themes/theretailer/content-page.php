<?php

/**
 * The template used for displaying page content in page.php
 *
 * @package theretailer
 * @since theretailer 1.0
 */

$page_id = "";
if ( is_single() || is_page() ) {
	$page_id = get_the_ID();
} else if ( is_home() ) {
	$page_id = get_option('page_for_posts');
}

$page_title_option = "on";
if ( get_post_meta( $page_id, 'page_title_meta_box_check', true ) ) {
	$page_title_option = get_post_meta( $page_id, 'page_title_meta_box_check', true );
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( $page_title_option == "on" ) { ?>
	    <header class="entry-header">
			<?php if (!is_front_page()) : ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
	        <?php endif; ?>
		</header>
	<?php } ?>

	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
        <div class="entry-thumbnail">
            <?php the_post_thumbnail('large'); ?>
        </div>
    <?php } ?>

    <div class="entry-content">
		<div class="content_wrapper">
			<?php the_content(); ?>
            <div class="clr"></div>
            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'theretailer' ), 'after' => '</div>' ) ); ?>
        </div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php

if ( GBT_Opt::getOption( 'page_comments', false ) ) {
	// If comments are open or we have at least one comment, load up the comment template
	if ( comments_open() || '0' != get_comments_number() ) {
		comments_template( '', true );
	}
}

?>

<div class="clr"></div>
