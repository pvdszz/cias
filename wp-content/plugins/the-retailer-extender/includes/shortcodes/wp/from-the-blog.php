<?php

// [from_the_blog]
function tr_ext_shortcode_from_the_blog($atts, $content = null) {

    wp_enqueue_style('swiper');
    wp_enqueue_script('swiper');

    wp_enqueue_style('theretailer-from-the-blog-shortcode-styles');
    wp_enqueue_script('theretailer-from-the-blog-shortcode-scripts');

    extract(shortcode_atts(array(
        "title" => 'From The Blog',
        "posts" => '2',
        "category" => ''
    ), $atts));

    ob_start();

    $args = array(
        'post_status' => 'publish',
        'post_type' => 'post',
        'category_name' => $category,
        'posts_per_page' => $posts
    );

    $recentPosts = new WP_Query( $args );

    ?>

    <div class="from-the-blog-wrapper swiper-container">

        <div class="gbtr_items_sliders_header">
            <div class="gbtr_items_sliders_title">
                <div class="gbtr_featured_section_title"><strong><?php echo $title ?></strong></div>
            </div>
            <div class="gbtr_items_sliders_nav">
                <a class='big_arrow_right'></a>
                <a class='big_arrow_left'></a>
                <div class='clr'></div>
            </div>
        </div>

        <div class="gbtr_bold_sep"></div>

        <div class="swiper-wrapper">

            <?php if ( $recentPosts->have_posts() ) : ?>

                <?php while ( $recentPosts->have_posts() ) : $recentPosts->the_post(); ?>

                    <?php $post_format = get_post_format(get_the_ID()); ?>

                    <div class="swiper-slide from_the_blog_item <?php if ( !has_post_thumbnail()) : ?>no_thumb<?php endif; ?>">

                        <a class="from_the_blog_img img_zoom_in" href="<?php the_permalink() ?>">
                            <?php if ( has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('recent_posts_shortcode') ?>
                            <?php else : ?>
                                <span class="from_the_blog_noimg"></span>
                            <?php endif; ?>
                            <span class="from_the_blog_date">
                                <span class="from_the_blog_date_day"><?php echo get_the_time('d', get_the_ID()); ?></span>
                                <span class="from_the_blog_date_month"><?php echo get_the_time('M', get_the_ID()); ?></span>
                            </span>
                        </a>

                        <div class="from_the_blog_content">

                            <?php if ( ($post_format == "") || ($post_format == "video") ) : ?>
                                <a class="from_the_blog_title" href="<?php the_permalink() ?>"><h3><?php echo tr_string_limit_words(get_the_title(), 5); ?></h3></a>
                            <?php endif ?>

                            <div class="from_the_blog_excerpt">
                                <?php
                                $limit_words = 12;
                                if ( ($post_format == "status") || ($post_format == "quote") || ($post_format == "aside") ) {
                                    $limit_words = 40;
                                }
                                $excerpt = get_the_excerpt();
                                echo tr_string_limit_words($excerpt, $limit_words);
                                ?>
                            </div>

                            <?php if ( ($post_format == "") || ($post_format == "quote") || ($post_format == "video") || ($post_format == "image") || ($post_format == "audio") || ($post_format == "gallery") ) : ?>
                                <div class="from_the_blog_comments">
                                    <?php comments_popup_link( __( 'Leave a comment', 'the-retailer-extender' ), __( '1 Comment', 'the-retailer-extender' ), __( '% Comments', 'the-retailer-extender' ), '', '' ); ?>
                                </div>
                            <?php endif ?>

                        </div>

                    </div>

                <?php endwhile; ?>

            <?php endif; ?>

        </div>

    </div>

    <?php
    wp_reset_postdata();
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

add_shortcode("from_the_blog", "tr_ext_shortcode_from_the_blog");
