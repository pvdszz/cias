<?php

if ( ! function_exists( 'theretailer_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function theretailer_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo esc_attr($nav_class); ?>">

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<div class="nav-previous-single"><?php previous_post_link( '%link', '%title' ); ?></div>
		<div class="nav-next-single"><?php next_post_link( '%link', '%title' ); ?></div>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // theretailer_content_nav

/**
 * Returns true if a blog has more than 1 category
 *
 * @since theretailer 1.0
 */
function theretailer_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so theretailer_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so theretailer_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in theretailer_categorized_blog
 *
 * @since theretailer 1.0
 */
function theretailer_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'theretailer_category_transient_flusher' );
add_action( 'save_post', 'theretailer_category_transient_flusher' );