<?php

/**
 * Recent_Posts widget class
 *
 * @since 1.3
 */
class GBTR_TR_Recent_Post_Widget extends WP_Widget {

	/**
	 * GBTR_TR_Recent_Post_Widget constructor.
	 *
	 * @since 1.3
	*/
	public function __construct() {

		wp_enqueue_style(
			'theretailer-recent-posts-widget',
			plugins_url( 'assets/css/recent-posts.css', __FILE__ ),
			array(),
			false
		);

		parent::__construct(
			'the_retailer_recent_posts',
			__('The Retailer Recent Posts', 'the-retailer-extender'),
			array(
				'classname' 	=> 'the_retailer_recent_posts',
				'description' 	=> __('A widget that displays recent posts ', 'the-retailer-extender')
			),
			array(
				'width' 	=> 300,
				'height' 	=> 350,
				'id_base' 	=> 'the_retailer_recent_posts'
			)
		);
	}

	/**
	 * Widget output.
	 *
	 * @since 1.3
	 * @return void
	*/
	public function widget($args, $instance) {

		$cache = wp_cache_get('widget_recent_posts', 'widget');

		if ( !is_array($cache) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);

		if( isset( $instance['title'] ) ) {
			$title = apply_filters( 'widget_title', $instance['title'] );
		} else {
			$title = __('Recent Posts', 'the-retailer-extender');
		}

		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) ) {
			$number = 10;
		}

		$r = new WP_Query(
			apply_filters(
				'widget_posts_args',
				array(
					'posts_per_page' 		=> $number,
					'no_found_rows' 		=> true,
					'post_status' 			=> 'publish',
					'ignore_sticky_posts' 	=> true
				)
			)
		);

		if ($r->have_posts()) :

			echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;
			}
			?>

			<ul>
			<?php while ( $r->have_posts() ) : $r->the_post(); ?>
				<li>
	                <span class="post_date">
	                    <span class="post_date_day"><?php echo get_the_time('d'); ?></span>
	                    <span class="post_date_month"><?php echo get_the_time('M'); ?></span>
	                </span>
	                <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
					<div class="post_comments"><?php echo get_comments_number(); ?> <?php esc_html_e( 'comments', 'the-retailer-extender' ); ?></div>
	            </li>
			<?php endwhile; ?>
			</ul>

			<?php
			echo $after_widget;

			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_recent_posts', $cache, 'widget');
	}

	/**
	 * Widget update.
	 *
	 * @since 1.3
	 * @return array
	*/
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];

		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_entries']) ) {
			delete_option('widget_recent_entries');
		}

		return $instance;
	}

	/**
	 * Widget cache delete.
	 *
	 * @since 1.3
	 * @return void
	*/
	public function flush_widget_cache() {
		wp_cache_delete('widget_recent_posts', 'widget');
	}

	/**
	 * Widget backend output.
	 *
	 * @since 1.3
	 * @return void
	*/
	public function form( $instance ) {

		if ( isset( $instance[ 'title' ] ) ) {
			$title = esc_attr( $instance['title'] );
		}
		else {
			$title = '';
		}

		if ( isset( $instance[ 'number' ] ) ) {
			$number = absint( $instance['number'] );
		}
		else {
			$number = 10;
		}
		?>

       	<p>
       		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'the-retailer-extender' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of posts to show:', 'the-retailer-extender' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<?php
	}
}

add_action( 'widgets_init', function() {
	register_widget( 'GBTR_TR_Recent_Post_Widget' );
} );
