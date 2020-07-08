<?php

$dark_footer_active = false;
if( is_active_sidebar( 'widgets_dark_footer' ) && GBT_Opt::getOption( 'dark_footer_all_site', true ) ) {
	$dark_footer_active = true;
}

if( $dark_footer_active ) { ?>

    <div class="gbtr_dark_footer_wrapper">
        <div class="tr_content_wrapper">
        		<div class="grid_<?php echo esc_attr( GBT_Opt::getOption( 'dark_footer_layout', '4col' ) ); ?>">
            		<?php dynamic_sidebar('widgets_dark_footer'); ?>
				</div>
        </div>
    </div>

<?php } ?>
