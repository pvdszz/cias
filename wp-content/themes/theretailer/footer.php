<?php

    global $woocommerce;

    $page_id = "";
    if ( is_single() || is_page() ) {
        $page_id = get_the_ID();
    } else if ( is_home() ) {
        $page_id = get_option('page_for_posts');
    }

    $page_header_option = "on";
    if ( get_post_meta( $page_id, 'page_header_meta_box_check', true ) ) {
        $page_header_option = get_post_meta( $page_id, 'page_header_meta_box_check', true );
    }

?>
        <div class="gbtr_footer_wrapper">

            <div class="tr_content_wrapper">

                <div class="bottom_wrapper">

                    <div class="gbtr_footer_widget_credit_cards">

    					<?php
                        if ( !empty( GBT_Opt::getOption( 'footer_logos', get_template_directory_uri() . '/inc/customizer/assets/images/payment_cards.png' ) ) ) {

                            $footer_logos_img = '';

                            if (is_ssl()) {
                                $footer_logos_img = str_replace("http://", "https://", GBT_Opt::getOption( 'footer_logos', get_template_directory_uri() . '/inc/customizer/assets/images/payment_cards.png' ));
                            } else {
                                $footer_logos_img = GBT_Opt::getOption( 'footer_logos', get_template_directory_uri() . '/inc/customizer/assets/images/payment_cards.png' );
                            }

                            if( !empty($footer_logos_img) ) { ?>

                                <img src="<?php echo esc_url($footer_logos_img); ?>" alt="footer_logo" />

                            <?php } ?>

                        <?php } ?>

                    </div>

                    <?php if ( !empty( GBT_Opt::getOption( 'copyright_text', esc_html__( 'Powered by ', 'theretailer' ) . '<a href="https://theretailer.getbowtied.com" title="eCommerce WordPress Theme for Woocommerce">'.esc_html__( 'The Retailer', 'theretailer' ).'</a>.' ) ) ) { ?>
    					<div class="gbtr_footer_widget_copyrights">
                            <?php printf( wp_kses_post(__( '%s', 'theretailer' )), GBT_Opt::getOption( 'copyright_text', esc_html__( 'Powered by ', 'theretailer' ) . '<a href="https://theretailer.getbowtied.com" title="eCommerce WordPress Theme for Woocommerce">'.esc_html__( 'The Retailer', 'theretailer' ).'</a>.' )); ?>
    					</div>
    				<?php } ?>

                </div>

            </div>

        </div>

    </div><!-- /global_wrapper -->

    <?php if ( $page_header_option == "on" ) { ?>

        <!-- Left Offcanvas -->
        <aside id="<?php echo is_rtl() ? 'offCanvasRight' : 'offCanvasLeft'; ?>" class="js-offcanvas" data-offcanvas-options='<?php echo is_rtl() ? '{"modifiers": "right,overlay","closeButtonClass":"offcanvas-left-close"}' : '{"modifiers": "left,overlay","closeButtonClass":"offcanvas-left-close"}'; ?>'>

            <?php do_action( 'tr_topbar_social_media' ); ?>

            <div class="menu-close">
                <button class="offcanvas-left-close" type="button">
                    <span>&times;</span>
                </button>
            </div>

            <div class="offcanvas_content">

                <?php if( has_nav_menu("primary") ) : ?>
                    <nav class="mobile-main-navigation" role="navigation">
                        <?php
                        wp_nav_menu( array(
                            'theme_location'   => 'primary',
                            'container'        => false,
                            'menu_class'       => '',
                            'echo'             => true,
                            'items_wrap'       => '<ul class="sf-menu">%3$s</ul>',
                            'before'           => '',
                            'after'            => '',
                            'link_before'      => '',
                            'link_after'       => '',
                            'depth'            => 0,
                            'fallback_cb'      => false,
                        ));
                        ?>
                    </nav>
                <?php endif; ?>

                <?php if ( has_nav_menu( 'secondary' ) ) { ?>
                    <nav class="mobile-secondary-navigation" role="navigation">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'secondary',
                            'container' =>false,
                            'menu_class' => '',
                            'echo' => true,
                            'items_wrap'      => '<ul>%3$s</ul>',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'depth' => 0,
                            'fallback_cb' => false,
                        ));
                        ?>
                    </nav>
                <?php } ?>

                <?php if ( has_nav_menu( 'tools' ) ) { ?>
                    <nav class="mobile-topbar-navigation" role="navigation">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'tools',
                            'container' =>false,
                            'menu_class' => '',
                            'echo' => true,
                            'items_wrap'      => '<ul>%3$s</ul>',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'depth' => 0,
                            'fallback_cb' => false,
                        ));
                        ?>
                    </nav>
                <?php } ?>

            </div>
        </aside>

        <!-- Top Offcanvas -->
        <aside id="offCanvasTop" class="js-offcanvas" data-offcanvas-options='{"modifiers": "top,overlay","closeButtonClass":"offcanvas-top-close"}'>
            <div class="menu-close">
                <button class="offcanvas-top-close" type="button">
                    <span>&times;</span>
                </button>
            </div>

            <div class="offcanvas_content">
                <h4 class="search-text">
                    <?php esc_html_e('What are you looking for?', 'theretailer'); ?>
                </h4>
                <?php
                    if ( TR_WOOCOMMERCE_IS_ACTIVE ) {
                        the_widget( 'WC_Widget_Product_Search', 'title=' );
                    } else {
                        the_widget( 'WP_Widget_Search', 'title=' );
                    }
                ?>
            </div>
        </aside>

    <?php } ?>

    <?php do_action('the_retailer_footer_end'); ?>

    <?php wp_footer(); ?>

</body>
</html>
