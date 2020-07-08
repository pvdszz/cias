<?php

if ( ! class_exists( 'TR_Custom_Code' ) ) :

	/**
	 * TR_Custom_Code class.
	 *
	 * @since 1.3
	*/
	class TR_Custom_Code {

		/**
		 * The single instance of the class.
		 *
		 * @since 1.3
		 * @var TR_Custom_Code
		*/
		protected static $_instance = null;

		/**
		 * TR_Custom_Code constructor.
		 *
		 * @since 1.3
		*/
		public function __construct() {

			add_action('init', array( $this, 'import_options' ));

			$this->customizer_options();

			add_action('the_retailer_footer_end', array($this, 'tr_custom_code_footer'));
			add_action('the_retailer_header_start', array($this, 'tr_custom_code_header'));
		}

		/**
		 * Ensures only one instance of TR_Custom_Code is loaded or can be loaded.
		 *
		 * @since 1.3
		 *
		 * @return TR_Custom_Code
		*/
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Outputs custom code to footer action
		 *
		 * @return void
		 */
		public function tr_custom_code_footer() {
			echo get_option( 'tr_custom_code_footer_js', '' );
		}

		/**
		 * Outputs custom code to header action
		 *
		 * @return void
		 */
		public function tr_custom_code_header() {
			echo get_option( 'tr_custom_code_header_js', '' );
		}

		/**
		 * Imports custom code content stored as theme mods into the options WP table.
		 *
		 * @since 1.3
		 * @return void
		 */
		public function import_options() {

			if( !get_option( 'tr_custom_code_options_import', false ) ) {

				wp_update_custom_css_post( wp_get_custom_css() . ' ' . get_theme_mod( 'custom_css', '' ) );

				$custom_header_js_option = get_theme_mod( 'custom_js_header', '' );
				update_option( 'tr_custom_code_header_js', $custom_header_js_option );

				$custom_footer_js_option = get_theme_mod( 'custom_js_footer', '' );
				update_option( 'tr_custom_code_footer_js', $custom_footer_js_option );

				update_option( 'tr_custom_code_options_import', true );
			}
		}

		/**
		 * Registers customizer options.
		 *
		 * @since 1.3
		 * @return void
		 */
		protected function customizer_options() {
			add_action( 'customize_register', array( $this, 'tr_custom_code_customizer' ) );
		}

		/**
		 * Creates customizer options.
		 *
		 * @since 1.3
		 * @return void
		 */
		public function tr_custom_code_customizer( $wp_customize ) {

			// Section
			$wp_customize->add_section( 'tr_custom_code', array(
		 		'title'       => esc_attr__( 'Additional JS', 'the-retailer-extender' ),
		 		'priority'    => 201,
		 	) );

		 	$wp_customize->add_setting( 'tr_custom_code_header_js', array(
				'type'		 => 'option',
				'capability' => 'manage_options',
				'transport'  => 'refresh',
				'default' 	 => '',
			) );

			$wp_customize->add_control(
				new WP_Customize_Code_Editor_Control(
					$wp_customize,
					'tr_custom_code_header_js',
					array(
						'code_type' 	=> 'javascript',
						'label'       	=> esc_attr__( 'Header JavaScript Code', 'the-retailer-extender' ),
						'section'     	=> 'tr_custom_code',
						'priority'    	=> 10,
					)
				)
			);

			$wp_customize->add_setting( 'tr_custom_code_footer_js', array(
				'type'		 => 'option',
				'capability' => 'manage_options',
				'transport'  => 'refresh',
				'default' 	 => '',
			) );

			$wp_customize->add_control(
				new WP_Customize_Code_Editor_Control(
					$wp_customize,
					'tr_custom_code_footer_js',
					array(
						'code_type' 	=> 'javascript',
						'label'       	=> esc_attr__( 'Footer JavaScript Code', 'the-retailer-extender' ),
						'section'     	=> 'tr_custom_code',
						'priority'    	=> 10,
					)
				)
			);
		}
	}

endif;

$tr_custom_code = new TR_Custom_Code;
