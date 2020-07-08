<?php

	$light_footer_active = false;
	if( GBT_Opt::getOption( 'light_footer_all_site', true ) && is_active_sidebar( 'widgets_light_footer' ) ) {
		$light_footer_active = true;
	}

	$dark_footer_active = false;
	if( GBT_Opt::getOption( 'dark_footer_all_site', true ) && is_active_sidebar( 'widgets_dark_footer' ) ) {
		$dark_footer_active = true;
	}
?>

<?php if( $light_footer_active || $dark_footer_active ) { ?>

	<div class="trigger-footer-widget-area">
		<i class="getbowtied-icon-more-retailer"></i>
	</div>

<?php } ?>

<?php if( $light_footer_active ) { ?>

    <div class="gbtr_light_footer_wrapper">
        <div class="tr_content_wrapper">
        	<div class="grid_<?php echo esc_attr( GBT_Opt::getOption( 'light_footer_layout', '4col' ) ); ?>">
            	<?php dynamic_sidebar('widgets_light_footer'); ?>
            </div>
        </div>
    </div>

<?php } ?>
