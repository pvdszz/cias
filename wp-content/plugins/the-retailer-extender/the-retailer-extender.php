<?php

/**
 * Plugin Name:       		The Retailer Extender
 * Plugin URI:        		https://theretailer.wp-theme.design/
 * Description:       		Extends the functionality of The Retailer with theme specific features.
 * Version:           		1.5.0
 * Author:            		GetBowtied
 * Author URI:        		https://getbowtied.com
 * Requires at least: 		5.0
 * Tested up to: 			5.4.1
 *
 * @package  The Retailer Extender
 * @author   GetBowtied
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

require 'core/updater/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://raw.githubusercontent.com/getbowtied/the-retailer-extender/master/core/updater/assets/plugin.json',
	__FILE__,
	'the-retailer-extender'
);

$version = ( isset(get_plugin_data( __FILE__ )['Version']) && !empty(get_plugin_data( __FILE__ )['Version']) ) ? get_plugin_data( __FILE__ )['Version'] : '1.0';
define ( 'TR_EXT_VERSION', $version );

if ( ! class_exists( 'TheRetailerExtender' ) ) :

	/**
	 * TheRetailerExtender class.
	*/
	class TheRetailerExtender {

		/**
		 * The single instance of the class.
		 *
		 * @var TheRetailerExtender
		*/
		protected static $_instance = null;

		/**
		 * TheRetailerExtender constructor.
		 *
		*/
		public function __construct() {

			$theme = wp_get_theme();
			$parent_theme = $theme->parent();

			// Helpers
			include_once( 'includes/helpers/helpers.php' );

			// Vendor
			include_once( 'includes/vendor/enqueue.php' );

			if( ( $theme->template == 'theretailer' && ( $theme->version >= '2.12' || ( !empty($parent_theme) && $parent_theme->version >= '2.12' ) ) ) || $theme->template != 'theretailer' ) {

				//Widgets
				include_once( 'includes/widgets/social-media.php' );
				include_once( 'includes/widgets/recent-posts.php' );

				// Shortcodes
				include_once( 'includes/shortcodes/index.php' );

                // Customizer
    			include_once( dirname( __FILE__ ) . '/includes/customizer/repeater/class-tr-ext-repeater-control.php' );

				// Social Media
				include_once( 'includes/social-media/class-social-media.php' );

				// Addons
				if ( $theme->template == 'theretailer' && is_plugin_active( 'woocommerce/woocommerce.php') ) {
					include_once( 'includes/addons/class-wc-category-header-image.php' );
				}
			}

			// Gutenberg Blocks
			add_action( 'init', array( $this, 'gbt_tr_gutenberg_blocks' ) );

			if( $theme->template == 'theretailer' && ( $theme->version >= '2.12' || ( !empty($parent_theme) && $parent_theme->version >= '2.12' ) ) ) {

				// Custom Code Section
				include_once( 'includes/custom-code/class-custom-code.php' );

				// Social Sharing Buttons
				include_once( 'includes/social-sharing/class-social-sharing.php' );
			}

			// VC Templates
			add_action( 'plugins_loaded', function() {
				$theme = wp_get_theme();
				$parent_theme = $theme->parent();

				if ( defined(  'WPB_VC_VERSION' ) ) {

					if( $theme->version >= '2.12.1' || ( !empty($parent_theme) && $parent_theme->version >= '2.12.1' ) ) {

						// Modify and remove existing shortcodes from VC
						include_once('includes/wpbakery/custom_vc.php');

						// VC Templates
						$vc_templates_dir = dirname(__FILE__) . '/includes/wpbakery/vc_templates/';
						vc_set_shortcodes_templates_dir($vc_templates_dir);
					}
				}
			});
		}

		/**
		 * Loads Gutenberg blocks
		 *
		 * @return void
		*/
		public function gbt_tr_gutenberg_blocks() {

			if( is_plugin_active( 'gutenberg/gutenberg.php' ) || tr_is_wp_version('>=', '5.0') ) {
				include_once 'includes/gbt-blocks/index.php';
			} else {
				add_action( 'admin_notices', 'tr_theme_warning' );
			}
		}

		/**
		 * Ensures only one instance of TheRetailerExtender is loaded or can be loaded.
		 *
		 * @return TheRetailerExtender
		*/
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}
	}
endif;

$theretailer_extender = new TheRetailerExtender;
