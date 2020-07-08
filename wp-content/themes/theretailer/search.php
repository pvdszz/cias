<?php get_header(); ?>

<div class="global_content_wrapper">

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: "%s"', 'theretailer' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php theretailer_content_nav( 'nav-above' ); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title gbtr_post_title_listing"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'theretailer' ), the_title_attribute( 'echo=0' )); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    </header><!-- .entry-header -->

                    <footer class="entry-meta">

                        <span class="author vcard tr_upper_link"><a class="url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>" title="<?php printf( esc_attr__( 'View all posts by %s', 'theretailer' ), get_the_author()); ?>" rel="author"><?php echo get_the_author(); ?></a></span>
                        <span class="date-meta tr_upper_link"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_time() ); ?>" rel="bookmark" class="entry-date"><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></a></span>
                        <span class="categories-meta tr_upper_link"><?php echo get_the_category_list(', '); ?></span>

                        <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                        <span class="comments-link tr_upper_link"><?php comments_popup_link( esc_html__( 'Leave a comment', 'theretailer' ), esc_html__( '1 Comment', 'theretailer' ), esc_html__( '% Comments', 'theretailer' ) ); ?></span>
                        <?php endif; ?>

                    </footer><!-- .entry-meta -->

                </article><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; ?>

            <div class="posts-pagination">
                <?php echo paginate_links( array(
                    'next_text' => '',
                    'prev_text' => '',
                    )
                ); ?>
            </div>

			<?php theretailer_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'search' ); ?>

		<?php endif; ?>

		</div><!-- #content .site-content -->
	</section><!-- #primary .content-area -->

    <div class="clear"></div>

</div>

<div class="gbtr_widgets_footer_wrapper">
	<?php get_template_part("light_footer"); ?>
	<?php get_template_part("dark_footer"); ?>
</div>

<?php get_footer(); ?>
