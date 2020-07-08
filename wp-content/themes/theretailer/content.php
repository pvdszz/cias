<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if (is_single()) : ?>
        <h1 class="entry-title gbtr_post_title_listing"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'theretailer' ), the_title_attribute( 'echo=0' )); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <?php else : ?>
        <h2 class="entry-title gbtr_post_title_listing"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'theretailer' ), the_title_attribute( 'echo=0' )); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php endif ?>
	</header><!-- .entry-header -->

    <footer class="entry-meta">

        <span class="author vcard tr_upper_link"><a class="url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>" title="<?php printf( esc_attr__( 'View all posts by %s', 'theretailer' ), get_the_author()); ?>" rel="author"><?php echo get_the_author(); ?></a></span>
        <span class="date-meta tr_upper_link"><a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>" title="<?php echo esc_attr( get_the_time() ); ?>" rel="bookmark" class="entry-date"><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></a></span>
        <?php if ( is_single() ) : ?>
        <span class="categories-meta tr_upper_link"><?php echo get_the_category_list(', '); ?></span>
        <?php endif; ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link tr_upper_link"><?php comments_popup_link( esc_attr__( 'Leave a comment', 'theretailer' ), esc_attr__( '1 Comment', 'theretailer' ), esc_attr__( '% Comments', 'theretailer' ) ); ?></span>
		<?php endif; ?>

    </footer><!-- .entry-meta -->

	<?php if ( has_post_thumbnail() ) : ?>

        	<?php if ( is_single() ) : ?>

	            <?php if ( GBT_Opt::getOption( 'featured_image_single_post', true ) ) : ?>

		            <div class="entry-thumbnail">

						<?php the_post_thumbnail('large'); ?>

					</div>

				<?php endif; ?>

			<?php else: ?>

				<div class="entry-thumbnail">

					<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'theretailer' ), the_title_attribute( 'echo=0' )); ?>" rel="bookmark"><?php the_post_thumbnail('large'); ?></a>

				</div>

			<?php endif; ?>

    <?php endif; ?>

    <div class="entry-content">
		<?php if (is_single()) { ?>
        	<?php the_content(); ?>

			<div class="tags_share_wrapper">
				<?php if ( has_tag() ) : ?>
					<span class="tags-meta tr_upper_link"><?php echo get_the_tag_list('',', ',''); ?></span>
				<?php endif; ?>
				<?php do_action( 'tr_post_share_button'); ?>
			</div>

        <?php } else { ?>
        	<?php if ( GBT_Opt::getOption( 'show_full_post', false ) ) { ?>
				<?php global $more; $more = 0; the_content(esc_html__( 'Continue reading', 'theretailer' )); ?>
            <?php } else { ?>
                <?php global $more; $more = 0; the_excerpt(esc_html__( 'Continue reading', 'theretailer' )); ?>
                <?php echo '<a class="more-link auto" href='.get_permalink($post->ID ).'>'.__( 'Continue reading', 'theretailer' ).'</a>'; ?>
            <?php } ?>
        <?php } ?>
        <div class="clr"></div>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_attr__( 'Pages:', 'theretailer' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->



</article><!-- #post-<?php the_ID(); ?> -->
