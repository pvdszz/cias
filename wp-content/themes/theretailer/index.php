<?php get_header(); ?>

<div class="global_content_wrapper">

	<div class="articles_list <?php echo GBT_Opt::getOption( 'blog_sidebar', true ) ? 'page_has_sidebar page_has_sidebar_right' : ''; ?>">

        <div id="primary" class="content-area page-blog">
            <div id="content" class="site-content" role="main">

                <?php

                $args = array(
                    'posts_per_page'    => get_option('posts_per_page'),
                    'paged'             => $paged,
                );

                $the_query = new WP_Query($args);

                if ( $the_query->have_posts() ) :

                    while ( $the_query->have_posts() ) : $the_query->the_post();

                        get_template_part( 'content', get_post_format() );

                    endwhile;

                    wp_reset_postdata();

                endif;

                ?>

            </div><!-- #content .site-content -->

            <div class="posts-pagination">
                <?php echo paginate_links( array(
                    'next_text' => '',
                    'prev_text' => '',
                    )
                ); ?>
            </div>

        </div><!-- #primary .content-area -->

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
