<?php

add_action( 'init', 'visual_composer_stuff' );
function visual_composer_stuff() {

	// Remove vc_teaser
	if (is_admin()) :
		function remove_vc_teaser() {
			remove_meta_box('vc_teaser', '' , 'side');
		}
		add_action( 'admin_head', 'remove_vc_teaser' );
	endif;
}

add_action( 'vc_before_init', 'theretailer_vcSetAsTheme' );
function theretailer_vcSetAsTheme() {
	vc_manager()->disableUpdater(true);
	vc_set_as_theme();
}

?>
