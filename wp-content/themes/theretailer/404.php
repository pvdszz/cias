<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package theretailer
 * @since theretailer 1.0
 */

get_header(); ?>

<div class="global_content_wrapper">

    <div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

            <div class="entry-content page_404">

                <div class="img_404"></div>
                	<h3>
                        <?php esc_html_e( 'The page you are looking for does not exist.', 'theretailer' ); ?>
                        <a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Return to the home page.', 'theretailer' ); ?></a>
                </div>

    	</div>
	</div>

	<div class="clear"></div>
</div>

<!--Mobile trigger footer widgets-->
<?php if ( GBT_Opt::getOption( 'dark_footer_all_site', true ) ) { ?>
	<div class="trigger-footer-widget-area">
		<i class="getbowtied-icon-more-retailer"></i>
	</div>
<?php } ?>

<div class="gbtr_widgets_footer_wrapper">
    <?php get_template_part("dark_footer"); ?>
</div>

<?php get_footer(); ?>
