<?php
/**
 * The template for displaying image attachments.
 *
 * @package theretailer
 * @since theretailer 1.0
 */

get_header();
?>

<div class="global_content_wrapper">

    <div id="primary" class="content-area image-attachment">
        <div id="content" class="site-content" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">

                    <h1 class="entry-title"><?php the_title(); ?></h1>

                    <div class="image-attachment-meta-wrapper">

                        <div class="entry-meta">

                            <?php $metadata = wp_get_attachment_metadata(); ?>

                            <span class="date-meta tr_upper_link inactive">
                                <a>
                                    <time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                        <?php echo esc_html( get_the_date() ); ?>
                                    </time>
                                </a>
                            </span>

                            <span class="image-meta tr_upper_link">
                                <a class="image-size tr_upper_link" href="<?php echo esc_url(wp_get_attachment_url()); ?>" title="Link to full-size image">
                                    <?php echo esc_attr($metadata['width']) . ' x ' . esc_attr($metadata['height']); ?>
                                </a>
                            </span>

                            <span class="categories-meta tr_upper_link">
                                <a href="<?php echo get_permalink( $post->post_parent ); ?>" title="Return to <?php echo get_the_title( $post->post_parent ); ?>" rel="gallery">
                                    <?php echo get_the_title( $post->post_parent ); ?>
                                </a>
                            </span>

                            <span class="author tr_upper_link">
                                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                                    <?php echo get_the_author_link(); ?>
                                </a>
                            </span>

                        </div>

                        <div class="image-pagination">

                            <span class="previous-image tr_upper_link">
                                <?php previous_image_link( false, esc_html__( 'Previous', 'theretailer' ) ); ?>
                            </span>

                            <span class="next-image tr_upper_link">
                                <?php next_image_link( false, esc_html__( 'Next', 'theretailer' ) ); ?>
                            </span>

                        </div>

                    </div>

                </header><!-- .entry-header -->

                <div class="entry-content">

                    <div class="entry-attachment">
                        <div class="attachment">
                            <?php
                                /**
                                 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
                                 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
                                 */
                                $attachments = array_values( get_children( array(
                                    'post_parent'    => $post->post_parent,
                                    'post_status'    => 'inherit',
                                    'post_type'      => 'attachment',
                                    'post_mime_type' => 'image',
                                    'order'          => 'ASC',
                                    'orderby'        => 'menu_order ID'
                                ) ) );
                                foreach ( $attachments as $k => $attachment ) {
                                    if ( $attachment->ID == $post->ID )
                                        break;
                                }
                                $k++;
                                // If there is more than 1 attachment in a gallery
                                if ( count( $attachments ) > 1 ) {
                                    if ( isset( $attachments[ $k ] ) )
                                        // get the URL of the next image attachment
                                        $next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
                                    else
                                        // or get the URL of the first image attachment
                                        $next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
                                } else {
                                    // or, if there's only 1 image, get the URL of the image
                                    $next_attachment_url = wp_get_attachment_url();
                                }
                            ?>

                            <a href="<?php echo esc_url($next_attachment_url); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
                                $attachment_size = apply_filters( 'theretailer_attachment_size', array( 940, 940 ) );
                                echo wp_get_attachment_image( $post->ID, $attachment_size );
                            ?></a>
                        </div><!-- .attachment -->

                    </div><!-- .entry-attachment -->

                </div><!-- .entry-content -->

            </article><!-- #post-<?php the_ID(); ?> -->

        <?php endwhile; // end of the loop. ?>

        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area .image-attachment -->

    <div class="clear"></div>

</div>

<div class="gbtr_widgets_footer_wrapper">
    <?php get_template_part("light_footer"); ?>
    <?php get_template_part("dark_footer"); ?>
</div>

<?php get_footer(); ?>
