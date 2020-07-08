<?php

class GBT_Opt {

	/**
	 * Cache each request to prevent duplicate queries
	 *
	 * @var array
	 */
	protected static $cached = [];

	/**
	 *  We don't need a constructor
	 */
	private function __construct() {}

	/**
	 * Default values for theme options
	 *
	 * @return array
	 */
	private static function theme_defaults() {
		return [
			// Global
			'gb_layout'							=> 'fullscreen',
			'boxed_layout_width'				=> 1100,
			'main_bg_color' 					=> '#fff',
			'main_bg' 							=> '',
			'page_comments' 					=> false,
			'progress_bar' 						=> false,
			'accent_color' 						=> '#b39964',

			// Header
			'site_logo' 						=> '',
			'alternative_logo' 					=> get_theme_mod( 'site_logo', '' ),
			'hide_topbar' 						=> true,
			'topbar_text' 						=> esc_html__( 'FREE SHIPPING ON ALL ORDERS OVER $75', 'theretailer' ),
			'search_input_style' 				=> false,
			'topbar_bg_color' 					=> '#000',
			'topbar_color' 						=> '#fff',
			'top_bar_font_size' 				=> 10,
			'sticky_topbar' 					=> false,
			'gb_header_style' 					=> '0',
			'header_bg_color' 					=> '#f4f4f4',
			'sticky_header' 					=> true,
			'primary_menu_color' 				=> '#000',
			'main_navigation_font_size' 		=> 12,
			'secondary_menu_color' 				=> '#777',
			'secondary_navigation_font_size' 	=> 12,
			'menu_header_top_padding_1_7' 		=> 25,
			'menu_header_bottom_padding_1_7' 	=> 25,
			'shopping_bag_in_header' 			=> true,
			'shopping_bag_style' 				=> 'style2',
			'shoppinh_bag_icon'					=> '',

			// Footer
			'expandable_footer_mobiles' 		=> true,
			'light_footer_all_site' 			=> true,
			'light_footer_layout' 				=> '4col',
			'primary_footer_bg_color' 			=> '#f4f4f4',
			'primary_footer_color'				=> '#000',
			'dark_footer_all_site' 				=> true,
			'dark_footer_layout' 				=> '4col',
			'secondary_footer_bg_color' 		=> '#000',
			'secondary_footer_color' 			=> '#fff',
			'footer_logos' 						=> get_template_directory_uri() . '/inc/customizer/assets/images/payment_cards.png',
			'copyright_text' 					=> esc_html__( 'Powered by ', 'theretailer' ) . '<a href="https://theretailer.getbowtied.com" title="eCommerce WordPress Theme for Woocommerce">'.esc_html__( 'The Retailer', 'theretailer' ).'</a>.',
			'copyright_bar_bg_color' 			=> '#000',
			'copyright_text_color' 				=> '#a8a8a8',

			// Blog
			'show_full_post' 					=> false,
			'featured_image_single_post' 		=> true,
			'blog_sidebar'						=> true,
			'post_sidebar'						=> true,

			// Shop
			'catalog_mode' 						=> false,
			'sidebar_listing' 					=> false,
			'sidebar_style' 					=> '0',
			'flip_product' 						=> true,
			'category_listing' 					=> '0',
			'ratings_on_product_listing' 		=> false,
			'out_of_stock_text' 				=> esc_html__( 'Out of Stock', 'theretailer' ),
			'sale_text' 						=> esc_html__( 'Sale!', 'theretailer' ),
			'breadcrumbs' 						=> false,

			// Product
			'products_layout' 					=> false,
			'product_image_zoom' 				=> true,
			'reviews_on_product_page' 			=> true,
			'related_products_on_product_page' 	=> true,
			'related_products_number'			=> 4,

			// Fonts
			'main_font_source'					=> 'default',
			'new_gb_main_font'					=> 'Radnika Next Alt',
			'google_gb_main_font'				=> 'Roboto',
			'web_safe_gb_main_font'				=> 'Arial',
			'custom_gb_main_font'				=> '',
			'secondary_font_source'				=> 'default',
			'google_gb_secondary_font'			=> 'Roboto',
			'web_safe_gb_secondary_font'		=> 'Arial',
			'custom_gb_secondary_font'			=> '',
			'new_gb_secondary_font'				=> 'HK Nova',
			'font_face_display'					=> 'swap',
			'primary_color' 					=> '#000',
			'base_font_size' 					=> 13,
		];
	}

	/**
	 * Switch case for options that need post processing
	 *
	 * @param  [string] $key   [name of option]
	 * @param  [string] $value [value]
	 *
	 * @return [string]        [processed value]
	 */
	private static function processOption($key, $value) {

		$opacity_dark           = .75;
	    $opacity_medium         = .5;
	    $opacity_light          = .35;
	    $opacity_ultra_light    = .15;

		switch ($key) {
			case 'accent_color_light':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('accent_color')) . "," . $opacity_light . ")";
				break;
			case 'primary_color_dark':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('primary_color')) . "," . $opacity_dark . ")";
				break;
			case 'primary_color_medium':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('primary_color')) . "," . $opacity_medium . ")";
				break;
			case 'primary_color_light':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('primary_color')) . "," . $opacity_light . ")";
				break;
			case 'primary_color_ultra_light':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('primary_color')) . "," . $opacity_ultra_light . ")";
				break;
			case 'primary_menu_color_medium':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('primary_menu_color')) . "," . $opacity_medium . ")";
				break;
			case 'primary_menu_color_ultra_light':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('primary_menu_color')) . "," . $opacity_ultra_light . ")";
				break;
			case 'secondary_menu_color_ultra_light':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('secondary_menu_color')) . "," . $opacity_ultra_light . ")";
				break;
			case 'primary_footer_color_rgb':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('primary_footer_color')) . ",1)";
				break;
			case 'secondary_footer_color_rgb':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('secondary_footer_color')) . ",1)";
				break;
			case 'primary_color_rgb':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('primary_color')) . ",1)";
				break;
			case 'primary_menu_color_rgb':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('primary_menu_color')) . ",1)";
				break;
			case 'secondary_menu_color_rgb':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('secondary_menu_color')) . ",1)";
				break;
			case 'accent_color_rgb':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('accent_color')) . ",1)";
				break;
			case 'topbar_color_rgb':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('topbar_color')) . ",1)";
				break;
			case 'primary_footer_color_light':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('primary_footer_color')) . "," . $opacity_light . ")";
				break;
			case 'primary_footer_color_ultra_light':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('primary_footer_color')) . "," . $opacity_ultra_light . ")";
				break;
			case 'secondary_footer_color_light':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('secondary_footer_color')) . "," . $opacity_light . ")";
				break;
			case 'secondary_footer_color_ultra_light':
				return "rgba(" . getbowtied_hex2rgb(self::getOption('secondary_footer_color')) . "," . $opacity_ultra_light . ")";
				break;
			default:
				return $value;
		}

		return $value;
	}

	/**
	 * Return the theme option from cache; if it isn't cached fetch it and cache it
	 *
	 * @param  string $option_name
	 * @param  string $default
	 *
	 * @return string
	 */
	public static function getOption( $option_name, $default= '' ) {
 		/* Return cached if possible */
 		if ( array_key_exists($option_name, self::$cached) && empty($default) )
 			return self::$cached[$option_name];
 		/* If no default is given, fetch from theme defaults variable */
 		if (empty($default)) {
 			$default = array_key_exists($option_name, self::theme_defaults())? self::theme_defaults()[$option_name] : '';
 		}

 		$opt= get_theme_mod($option_name, $default);
 		// echo '<br/>I did a database query<br/>';

 		/* Cache the result */
 		self::$cached[$option_name]= $opt;

 		/* Process the variable */
 		if ( $opt !== self::processOption($option_name, $opt) ) {
 			self::$cached[$option_name]= self::processOption($option_name, $opt);
 		}

 		return self::$cached[$option_name];
 	}
}

?>
