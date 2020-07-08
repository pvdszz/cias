<?php

/**
 * Define constants.
 */
define( 'TR_WOOCOMMERCE_IS_ACTIVE', 	class_exists( 'WooCommerce' ) );
define( 'TR_WPBAKERY_IS_ACTIVE', 		class_exists( 'Vc_Manager' ) );
define( 'TR_PRODUCT_BLOCKS_IS_ACTIVE', 	defined( 'PBFW_VERSION' ) );
define( 'TR_WISHLIST_IS_ACTIVE', 		class_exists( 'YITH_WCWL' ) );
define( 'TR_WPML_IS_ACTIVE', 			class_exists( 'SitePress' ) );
define( 'TR_WOO_SWATCHES_IS_ACTIVE', 	class_exists( 'wcva_swatch_form_fields' ) );
define( 'TR_ELEMENTOR_IS_ACTIVE', 		did_action( 'elementor/loaded' ) );

/**
 * Theme name.
 */
if ( ! function_exists( 'getbowtied_theme_name' ) ) :
function getbowtied_theme_name() {
	$theme = wp_get_theme();
	if ( $theme->parent() !== false ) {
		$theme_name = $theme->parent()->get('Name');
	} else {
		$theme_name = $theme->get('Name');
	}

	return $theme_name;
}
endif;

/**
 * Theme slug.
 */
if ( ! function_exists( 'getbowtied_theme_slug' ) ) :
function getbowtied_theme_slug() {
	$getbowtied_theme = wp_get_theme();
	return $getbowtied_theme->template;
}
endif;

/**
 * Theme author.
 */
if ( ! function_exists( 'getbowtied_theme_author' ) ) :
function getbowtied_theme_author() {
	$getbowtied_theme = wp_get_theme();
	return $getbowtied_theme->get('Author');
}
endif;

/**
 * Theme description.
 */
if ( ! function_exists( 'getbowtied_theme_description' ) ) :
function getbowtied_theme_description() {
	$getbowtied_theme = wp_get_theme();
	return $getbowtied_theme->get('Description');
}
endif;

/**
 * Theme version.
 */
if ( ! function_exists( 'getbowtied_theme_version' ) ) :
function getbowtied_theme_version() {
	$getbowtied_theme = wp_get_theme();

	return $getbowtied_theme->parent() ? $getbowtied_theme->parent()->get( 'Version' ) : $getbowtied_theme->get( 'Version' );
}
endif;

/**
 * String to slug.
 */
if ( ! function_exists( 'getbowtied_string_to_slug' ) ) :
function getbowtied_string_to_slug($str) {
	$str = strtolower(trim($str));
	$str = preg_replace('/[^a-z0-9-]/', '_', $str);
	$str = preg_replace('/-+/', "_", $str);
	return $str;
}
endif;

/**
 * Convert HEX to RGB.
 *
 * @param string $hex [the input].
 *
 * @return string rgb value.
 */
function getbowtied_hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);

	return implode(",", $rgb); // returns the rgb values separated by commas
}

/**
 * String to bool.
 *
 * @param string $string [the input].
 *
 * @return bool
 */
function theretailer_string_to_bool( $string ) {
    return is_bool( $string ) ? $string : ( 'yes' === $string || 1 === $string || 'true' === $string || '1' === $string );
}

/**
 * Sanitizes select controls.
 *
 * @param string $input [the input].
 * @param string $setting [the settings].
 *
 * @return string
 */
function theretailer_sanitize_select( $input, $setting ) {
	$input   = sanitize_key( $input );
	$choices = isset($setting->manager->get_control( $setting->id )->choices) ? $setting->manager->get_control( $setting->id )->choices : '';

	return ( $choices && array_key_exists( $input, $choices ) ) ? $input : $setting->default;
}

/**
 * Sanitizes checkbox controls.
 * Returns true if checkbox is checked.
 *
 * @param string $input [the input].
 *
 * @return boolean
 */
function theretailer_sanitize_checkbox( $input ){

	return theretailer_string_to_bool($input);
}

/**
 * Sanitizes image upload.
 *
 * @param string $input potentially dangerous data.
 */
function theretailer_sanitize_image( $input ) {
	$filetype = wp_check_filetype( $input );
	if ( $filetype['ext'] && ( wp_ext2type( $filetype['ext'] ) === 'image' || $filetype['ext'] === 'svg' ) ) {
		return esc_url( $input );
	}
	return '';
}
