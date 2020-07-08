<?php

include_once( get_template_directory() 	. '/inc/tgm/class-tgm-plugin-activation.php' );
include_once( get_template_directory() 	. '/inc/tgm/plugins.php' );

include_once( get_template_directory() 	. '/inc/admin/wizard/class-gbt-install-wizard.php' );

include_once( get_template_directory() 	. '/inc/demo/ocdi-setup.php');

//-------------------------------------------------------------------
// On theme activation redirect to splash page
//-------------------------------------------------------------------
global $pagenow;

if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
	wp_redirect(admin_url("themes.php?page=gbt-setup")); // Your admin page URL
}

//-------------------------------------------------------------------
// Admin notifications
//-------------------------------------------------------------------
add_action( 'admin_notices', 'tr_hookmeup_notification' );
function tr_hookmeup_notification() {
	if ( !get_option('dismissed-hookmeup-notice', FALSE ) && !class_exists('HookMeUp') ) { ?>
		<div class="notice-warning settings-error notice is-dismissible hookmeup_notice">
			<p>
				<strong>
					<span>This theme recommends the following plugin: <em><a href="https://wordpress.org/plugins/hookmeup/" target="_blank">HookMeUp – Additional Content for WooCommerce</a></em>.</span>
				</strong>
			</p>
		</div>
	<?php }
}

function tr_gbt_dismiss_dashboard_notice() {
	if( $_POST['notice'] == 'hookmeup' ) {
		update_option('dismissed-hookmeup-notice', TRUE );
	}
}
add_action( 'wp_ajax_gbt_dismiss_dashboard_notice', 'tr_gbt_dismiss_dashboard_notice' );

/**
 * Block editor layout class
 *
 * @param string $classes
 * @return string
 */
function theretailer_editor_layout_class( $classes ) {
	global $post;

	$screen = get_current_screen();
	if( ! $screen->is_block_editor() )
		return $classes;

	if ( isset( $post ) && get_post_type($post->ID) == 'page' ) {
		$pagetemplate = get_post_meta( $post->ID, '_wp_page_template', true );
		if ( !empty( $pagetemplate ) ) {
			switch ( $pagetemplate ) {
				case 'page-full.php':
					$classes .= ' page-template-full ';
					break;
				case 'page-with_left_sidebar.php':
					$classes .= ' page-template-sidebar ';
					break;
				case 'page-with_sidebar.php':
					$classes .= ' page-template-sidebar ';
					break;
				default:
					$classes .= ' page-template-default ';
					break;
			}
		} else {
			$classes .= ' page-template-default ';
		}
	}

	if ( 'boxed' === GBT_Opt::getOption( 'gb_layout', 'fullscreen' ) ) {
		$classes .= ' page-layout-boxed ';
	}

	if ( isset( $post ) && get_post_type($post->ID) == 'post' ) {
		if( GBT_Opt::getOption( 'post_sidebar', true ) ) {
			$classes .= 'post_layout_with_sidebar';
		}
	}

	return $classes;
}
add_filter( 'admin_body_class', 'theretailer_editor_layout_class' );

?>
