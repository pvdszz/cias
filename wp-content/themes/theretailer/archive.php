<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package theretailer
 * @since theretailer 1.0
 */

get_header(); ?>

<div class="global_content_wrapper">

    <div class="articles_list <?php echo GBT_Opt::getOption( 'blog_sidebar', true ) ? 'page_has_sidebar page_has_sidebar_right' : ''; ?>">

		<section id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title">
							<?php
								if ( is_category() ) {
									esc_html_e( 'Category Archives: ', 'theretailer' );	?>
									<span><?php echo single_cat_title( '', false ); ?></span>
								<?php
								} elseif ( is_tag() ) {
									esc_html_e( 'Tag Archives: ', 'theretailer' ); ?>
									<span><?php echo single_tag_title( '', false ); ?></span>
								<?php
								} elseif ( is_author() ) {
									/* Queue the first post, that way we know
									 * what author we're dealing with (if that is the case).
									*/
									the_post();
									esc_html_e( 'Author Archives: ', 'theretailer' );?>
									<span><?php echo get_the_author(); ?></span><?php
									/* Since we called the_post() above, we need to
									 * rewind the loop back to the beginning that way
									 * we can run the loop properly, in full.
									 */
									rewind_posts();
								} elseif ( is_day() ) {
									esc_html_e( 'Daily Archives: ', 'theretailer' );?>
									<span><?php echo get_the_date(); ?></span><?php
								} elseif ( is_month() ) {
									esc_html_e( 'Monthly Archives: ', 'theretailer' ); ?>
									<span><?php echo get_the_date( 'F Y' ); ?></span><?php
								} elseif ( is_year() ) {
									esc_html_e( 'Yearly Archives: ', 'theretailer' );?>
									<span><?php echo get_the_date( 'Y' ); ?></span><?php
								} else {
									esc_html_e( 'Archives', 'theretailer' );

								}
							?>
						</h1>
						<?php
							if ( is_category() ) {
								// show an optional category description
								$category_description = category_description();
								if ( ! empty( $category_description ) )
									echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

							} elseif ( is_tag() ) {
								// show an optional tag description
								$tag_description = tag_description();
								if ( ! empty( $tag_description ) )
									echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
							}
						?>
					</header><!-- .page-header -->

					<?php theretailer_content_nav( 'nav-above' ); ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to overload this in a child theme then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						?>

					<?php endwhile; ?>

					<?php //theretailer_content_nav( 'nav-below' ); ?>

				<?php else : ?>

					<?php get_template_part( 'no-results', 'archive' ); ?>

				<?php endif; ?>

	            <div class="posts-pagination">
	                <?php echo paginate_links( array(
						'prev_text' => '',
						'next_text' => '',
					) ); ?>
	            </div>

			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->

	</div>

    <?php if( GBT_Opt::getOption( 'blog_sidebar', true ) ) { ?>

        <div class="page_sidebar page_sidebar_right">
    		<?php get_sidebar(); ?>
        </div>

        <div class="clear"></div>

    <?php } ?>

</div>

<div class="gbtr_widgets_footer_wrapper">
    <?php get_template_part("light_footer"); ?>
    <?php get_template_part("dark_footer"); ?>
</div>

<?php get_footer(); ?>
