<?php

/**
 * Social Media widget class
 *
 * @since 1.3
 */
class TR_Social_Media_Widget extends WP_Widget {

	/**
	 * TR_Social_Media_Widget constructor.
	 *
	 * @since 1.3
	*/
	public function __construct() {
			
		parent::__construct(
			'the_retailer_connect',
			__('Social Media Profiles', 'the-retailer-extender'),
			array( 
				'classname' 	=> 'the_retailer_connect',
				'description' 	=> __('A widget that displays customized social icons ', 'the-retailer-extender'),
			)
		);
	}
	
	/**
	 * Widget output.
	 *
	 * @since 1.3
	 * @return void
	*/
	public function widget( $args, $instance ) {
		
		if( isset( $instance['title'] ) ) {
			$title = apply_filters( 'widget_title', $instance['title'] );
		}

		echo $args['before_widget'];
		
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
		echo do_shortcode('[social-media align="left"]');

		echo $args['after_widget'];
	}

	/**
	 * Widget update.
	 *
	 * @since 1.3
	 * @return array
	*/
	public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

	/**
	 * Widget backend output.
	 *
	 * @since 1.3
	 * @return void
	*/
	public function form( $instance ) {
		
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'The Retailer Connect', 'the-retailer-extender' );
		}
		?>
		
        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'the-retailer-extender' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		
		<?php 
	}
}

add_action( 'widgets_init', function() {
	register_widget( 'TR_Social_Media_Widget' );
} );