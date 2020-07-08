<?php

function the_retailer_admin_scripts() {
    if ( is_admin() ) {
		wp_enqueue_script('the_retailer_admin_notices', get_template_directory_uri() .'/js/admin/admin-notices.js', array('jquery'), NULL, 'all');
		wp_enqueue_script('the_retailer_customizer', get_template_directory_uri() .'/js/admin/admin-go-to-page.js', array('jquery'), NULL, 'all');
    }
}
add_action( 'admin_enqueue_scripts', 'the_retailer_admin_scripts' );

?>
