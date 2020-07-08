<div class="gbtr_tools_wrapper <?php echo ( GBT_Opt::getOption( 'sticky_topbar', false ) ) ? 'sticky' : ''; ?>">
    <div class="tr_content_wrapper">
        <div class="topbar_text_wrapper">
        	<div class="topbar_text_content">
				<?php do_action( 'tr_topbar_social_media' ); ?>

				<div class="gbtr_tools_info">
					<span>
						<?php if ( !empty( GBT_Opt::getOption( 'topbar_text', esc_html__( 'FREE SHIPPING ON ALL ORDERS OVER $75', 'theretailer' ) ) ) ) { ?>
							<?php printf(esc_html__( '%s', 'theretailer' ), GBT_Opt::getOption( 'topbar_text', esc_html__( 'FREE SHIPPING ON ALL ORDERS OVER $75', 'theretailer' ) )); ?>
						<?php } ?>
					</span>
				</div>
			</div>
        </div>
        <div class="topbar_tools_wrapper">
            <div class="gbtr_tools_search <?php echo ( GBT_Opt::getOption( 'search_input_style', false ) ) ? 'open_always' : ''; ?>">
				<button class="gbtr_tools_search_trigger"><i class="gbtr_tools_search_icon"></i></button>
                <form method="get" action="<?php echo home_url(); ?>">
                    <input class="gbtr_tools_search_inputtext" type="text" value="<?php echo esc_html($s, 1); ?>" name="s" id="s" />
                    <button type="submit" class="gbtr_tools_search_inputbutton"><i class="gbtr_tools_search_icon"></i></button>
                    <?php if ( TR_WOOCOMMERCE_IS_ACTIVE ) { ?>
                        <input type="hidden" name="post_type" value="product">
                    <?php } ?>
                </form>
            </div>

		<?php if ( is_user_logged_in() ) { ?>
			<div class="logout-wrapper">
				<a href="<?php echo get_site_url(); ?>/?<?php echo get_option('woocommerce_logout_endpoint'); ?>=true" class="logout_link"><i class="logout_link_icon"></i></a>
			</div>
		<?php } ?>

		<?php $menu_to_count = wp_nav_menu( array(
			'echo' => false,
			'theme_location' => 'tools'
		));
		$top_bar_menu_items = substr_count($menu_to_count,'class="menu-item ');

		if ( $top_bar_menu_items > 2 ) :
		?>
		<div class="gbtr_tools_account_wrapper">
			<div class="top-bar-menu-trigger">
				<i class="gbtr_tools_menu_icon"></i>
			</div>

		<?php endif; ?>

			<div class="gbtr_tools_account <?php echo esc_attr($top_bar_menu_items) > 2 ? 'menu-hidden' : '';?>">
				<ul class="topbar-menu">
					<?php if ( has_nav_menu( 'tools' ) ) : ?>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'tools',
						'container' =>false,
						'menu_class' => '',
						'echo' => true,
						'items_wrap'      => '%3$s',
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'fallback_cb' => false,
					));
					?>

					<?php else: ?>
						<li></li>
					<?php endif; ?>
				</ul>
			</div><!--.gbtr_tools_account-->
			<?php	if ( $top_bar_menu_items > 2 ) :?>
				</div>
			<?php endif; ?>
        </div>
    </div><!--.container-12-->

</div>
