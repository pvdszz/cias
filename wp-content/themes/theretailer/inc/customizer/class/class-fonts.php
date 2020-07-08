<?php
/**
 * This class manages fonts
 */

?>
<?php
/**
 * Reads theme options and generates fonts enqueue urls
 */
class TheRetailer_Fonts {

	/**
	 * List of web safe fonts that don't need Google Fonts.
	 *
	 * @var array web fonts.
	 */
	private static $web_safe_fonts = array(
		'--apple-system',
		'Arial',
		'Comic Sans',
		'Courier New',
		'Courier',
		'Garamond',
		'Georgia',
		'Helvetica',
		'Impact',
		'Palatino',
		'Times New Roman',
		'Times',
		'Trebuchet',
		'Verdana'
	);

	/**
	 * List of web suggested fonts.
	 *
	 * @var array suggested fonts.
	 */
	private static $suggested_fonts = array(
		'Arial',
		'Helvetica',
		'Georgia',
		'Alegreya Sans',
		'Alegreya',
		'Times New Roman',
		'Blinker',
		'Cabin',
		'Catamaran',
		'DM Sans',
		'DM Serif Display',
		'DM Serif Text',
		'EB Garamond',
		'Exo 2',
		'IBM Plex Sans',
		'IBM Plex Serif',
		'Lato',
		'Lexend Deca',
		'Libre Baskerville',
		'Libre Franklin',
		'Literata',
		'Lora',
		'Merriweather Sans',
		'Merriweather',
		'Montserrat',
		'Muli',
		'Neuton',
		'Noto Sans',
		'Noto Serif',
		'Nunito Sans',
		'Nunito',
		'Open Sans',
		'PT Sans Caption',
		'PT Sans',
		'PT Serif Caption',
		'PT Serif',
		'Playfair Display',
		'Red Hat Display',
		'Quattrocento Sans',
		'Quattrocento',
		'Roboto Condensed',
		'Roboto Mono',
		'Roboto Slab',
		'Roboto',
		'Rubik',
		'Source Sans Pro',
		'Source Serif Pro',
		'Titillium Web',
		'Ubuntu',
		'Vollkorn',
		'Work Sans',
	);

	/**
	 * Get the enqueue URL for the fonts selected.
	 *
	 * @return [string] [font link]
	 */
	public static function get_google_font_url( $font, $font_display = 'swap' ) {

 		$web_safe_fonts = array( 'web-safe-sans-serif', 'web-safe-serif' );
 		$google_font_family = '';

 		// Continue if the font name is empty, or matches one of the web safe fonts
 		if ( $font && !in_array( $font, self::$web_safe_fonts ) ) {

 			$font_value = $font . ':400,500,600,700,400italic,700italic';

 			if ( $font_value && ! in_array( $font_value, $web_safe_fonts ) ) {
 				$google_font_family = urlencode( $font_value );
 			}

 			if ( $google_font_family ) {
 				$google_fonts_url = '//fonts.googleapis.com/css?display='.$font_display.'&family=' . $google_font_family;

 				return $google_fonts_url;
 			}
 		}

 		return;
 	}

	/**
	* Get the font fallback list.
	*
	* @return [array] [font fallback list]
	*/
	private static function get_font_fallbacks( $font ) {

		$sans_serif_list = '-apple-system, BlinkMacSystemFont, Arial, Helvetica, \'Helvetica Neue\', Verdana, sans-serif';
		$serif_list 	 = 'Bookman Old Style, Georgia, Garamond, \'Times New Roman\', Times, serif';
		$mono_list 		 = 'Courier, Lucida Console, Monaco, monospace';

		if ( strpos( $font, ' Mono' ) !== false ) {
			return $mono_list;
		} else if ( strpos( $font, ' Sans' ) !== false ) {
			return $sans_serif_list;
		} else if ( strpos( $font, ' Serif' ) !== false || strpos( $font, ' Slab' ) !== false ) {
			return $serif_list;
		}

		return $sans_serif_list;
	}

	/**
	* Returns the array of suggested fonts.
	*
	* @return [string] [processed value]
	*/
	public static function get_suggested_fonts_list() {

		$list = '<datalist id="theretailer-suggested-fonts">';
		foreach ( self::$suggested_fonts as $font ) {
			$list .= '<option value="' . esc_attr( $font ) . '">';
		}
		$list .= '</datalist>';

		return $list;
	}

	/**
	* Returns the array of suggested theme fonts.
	*
	* @return [string] [processed value]
	*/
	public static function get_defaults_suggested_fonts_list() {
		$list = '<datalist id="theretailer-suggested-default-fonts">
					<option value="Radnika Next Alt">
					<option value="HK Nova">
				</datalist>';

		return $list;
	}

	/**
	* Returns the array of suggested web safe fonts.
	*
	* @return [string] [processed value]
	*/
	public static function get_web_safe_suggested_fonts_list() {

		$list = '<datalist id="theretailer-suggested-web-fonts">';
		foreach ( self::$web_safe_fonts as $font ) {
			$list .= '<option value="' . esc_attr( $font ) . '">';
		}
		$list .= '</datalist>';

		return $list;
	}

	/**
	* Get the font used as custom style.
	*
	* @return [string] [processed value]
	*/
	public static function get_font( $font ) {

		$font = self::sanitize_font( $font );

		$main_font_stack = 	self::get_font_fallbacks( $font );

		if( $font ) {
			return $font . ', '. $main_font_stack;
		}

		return $main_font_stack;
	}

	/**
	* Get the main font used as custom style.
	*
	* @return [string] [processed value]
	*/
	public static function get_main_font() {

		switch( GBT_Opt::getOption( 'main_font_source', 'default' ) ) {
			case 'default':
				$font = GBT_Opt::getOption( 'new_gb_main_font', 'Radnika Next Alt' );
				break;
			case 'google':
				$font = GBT_Opt::getOption( 'google_gb_main_font', 'Roboto' );
				break;
			case 'web-safe':
				$font = GBT_Opt::getOption( 'web_safe_gb_main_font', 'Arial' );
				break;
			case 'custom':
				$font = GBT_Opt::getOption( 'custom_gb_main_font', '' );
				break;
			default:
				$font = GBT_Opt::getOption( 'new_gb_main_font', 'Radnika Next Alt' );
				break;
		}

		return self::get_font( $font );
	}

	/**
	* Get the secondary font used as custom style.
	*
	* @return [string] [processed value]
	*/
	public static function get_secondary_font() {

		switch( GBT_Opt::getOption( 'secondary_font_source', 'default' ) ) {
			case 'default':
				$font = GBT_Opt::getOption( 'new_gb_secondary_font', 'HK Nova' );
				break;
			case 'google':
				$font = GBT_Opt::getOption( 'google_gb_secondary_font', 'Roboto' );
				break;
			case 'web-safe':
				$font = GBT_Opt::getOption( 'web_safe_gb_secondary_font', 'Arial' );
				break;
			case 'custom':
				$font = GBT_Opt::getOption( 'custom_gb_secondary_font', '' );
				break;
			default:
				$font = GBT_Opt::getOption( 'new_gb_secondary_font', 'HK Nova' );
				break;
		}

		return self::get_font( $font );
	}

    /**
	* Sanitizes the font.
	*/
	public static function sanitize_font( $font ) {

		if( !is_array($font) ) {
			return $font;
		}

		if( isset( $font['font-family'] ) ) {
			return $font['font-family'];
		}

		return $font;
	}


    /**
     * Checks if theme default font needs to be loaded
     */
    public static function preload_default_fonts( $fonts = array() ) {
    	if( empty($fonts) ) return;

    	foreach( $fonts as $font ) {
    		$preload = false;
			if( 'default' === GBT_Opt::getOption( 'main_font_source', 'default' ) ) {
				if( $font === GBT_Opt::getOption( 'new_gb_main_font', 'Radnika Next Alt' ) ) {
					$preload = true;
				}
			}
			if( 'default' === GBT_Opt::getOption( 'secondary_font_source', 'default' ) ) {
				if( $font === GBT_Opt::getOption( 'new_gb_secondary_font', 'HK Nova' ) ) {
					$preload = true;
				}
			}

    		if( $preload ) {
    			printf( '<link rel="preload" as="font" href="%s" type="font/woff2" crossorigin>
    	<link rel="preload" as="font" href="%s" type="font/woff2" crossorigin>
    	',
    				get_template_directory_uri() . '/inc/fonts/theme-fonts/subset-'.str_replace( ' ', '', $font).'-Regular.woff',
    				get_template_directory_uri() . '/inc/fonts/theme-fonts/subset-'.str_replace( ' ', '', $font).'-Bold.woff'
    			);
    		}
    	}

    	return;
    }

    /**
     * Loads theme default fonts if they are used.
     */
    public static function load_default_fonts( $fonts = array() ) {
    	if( empty($fonts) ) return;

    	$font_face = '';
    	foreach( $fonts as $font ) {
    		$preload = false;
			if( 'default' === GBT_Opt::getOption( 'main_font_source', 'default' ) ) {
	            if( $font === GBT_Opt::getOption( 'new_gb_main_font', 'Radnika Next Alt' ) ) {
					$preload = true;
				}
			}
			if( 'default' === GBT_Opt::getOption( 'secondary_font_source', 'default' ) ) {
				if( $font === GBT_Opt::getOption( 'new_gb_secondary_font', 'HK Nova' ) ) {
					$preload = true;
				}
			}

    		if( $preload ) {
    			$font_face .= self::load_font( $font, str_replace( ' ', '', $font).'-Regular', 'normal' );
    			$font_face .= self::load_font( $font, str_replace( ' ', '', $font).'-Bold', 'bold' );
    		}
    	}

    	return $font_face;
    }

    /**
     * Creates font-face for default font.
     */
    public static function load_font( $font_name, $font, $font_weight ) {
    	return '@font-face {
    		font-family: '.$font_name.';
    		font-display: '.GBT_Opt::getOption( 'font_face_display', 'swap' ).';
    		font-style: normal;
    		font-weight: '.$font_weight.';
    		src: url("'.get_template_directory_uri().'/inc/fonts/theme-fonts/subset-'.$font.'.eot");
    		src: url("'.get_template_directory_uri().'/inc/fonts/theme-fonts/subset-'.$font.'.eot?#iefix") format("embedded-opentype"),
    		url("'.get_template_directory_uri().'/inc/fonts/theme-fonts/subset-'.$font.'.woff") format("woff"),
    		url("'.get_template_directory_uri().'/inc/fonts/theme-fonts/subset-'.$font.'.ttf") format("truetype");
    	}';
    }

}
