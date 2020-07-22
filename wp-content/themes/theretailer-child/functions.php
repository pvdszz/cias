<?php
add_action('wp_enqueue_scripts', 'theretailer_enqueue_styles', 99);
function theretailer_enqueue_styles()
{

	wp_enqueue_style('the_retailer_styles', get_template_directory_uri() . '/css/styles.css');
	wp_enqueue_style('stylesheet', get_template_directory_uri() . '/style.css');

	wp_enqueue_style(
		'the-retailer-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array('stylesheet'),
		wp_get_theme()->get('Version')
	);

	// enqueue RTL styles
	if (is_rtl()) {
		wp_enqueue_style('the-retailer-child-rtl-styles',  get_template_directory_uri() . '/rtl.css', array('the_retailer_styles'), wp_get_theme()->get('Version'));
	}
	\
	// js
	wp_enqueue_script('cias_script', get_stylesheet_directory_uri() . '/js/script.js', array(), '20151215', true);
}
//  skip cart
add_filter('woocommerce_add_to_cart_redirect', 'themeprefix_add_to_cart_redirect');
function themeprefix_add_to_cart_redirect()
{
	global $woocommerce;
	$checkout_url = wc_get_checkout_url();
	return $checkout_url;
}


// booking tab
/**
 * Add a custom product tab.
 */
function cias_custom_product_tabs($tabs)
{

	$tabs['booking'] = array(
		'label'		=> __('Booking', 'woocommerce'),
		'target'	=> 'booking_options',
		'class'		=> array('booking'),
	);

	return $tabs;
}
add_filter('woocommerce_product_data_tabs', 'cias_custom_product_tabs'); // WC 2.5 and below\


/**
 * Contents of the gift card options product tab.
 */
function cias_booking_options_product_tab_content()
{

	global $post;

	// Note the 'id' attribute needs to match the 'target' parameter set above
?><div id='booking_options' class='panel woocommerce_options_panel'><?php

																	?><div class='options_group'>
        <?php
			woocommerce_wp_text_input(array(
				'id'				=> 'price_for_adult',
				'label'				=> __('Giá cho một người lớn:', 'woocommerce'),
				'desc_tip'			=> 'true',
				'type' 				=> 'number',
				'custom_attributes'	=> array(
					'min'	=> '1',
					'step'	=> '1',
				),
			));
			woocommerce_wp_text_input(array(
				'id'				=> 'price_for_child',
				'label'				=> __('Giá cho một trẻ em:', 'woocommerce'),
				'desc_tip'			=> 'true',
				'type' 				=> 'number',
				'custom_attributes'	=> array(
					'min'	=> '1',
					'step'	=> '1',
				),
			));

			?></div>

</div><?php

		}
		add_filter('woocommerce_product_data_panels', 'cias_booking_options_product_tab_content'); // WC 2.6 and up
		/**
		 * Save the custom fields.
		 */
		function save_booking_options_fields($post_id)
		{

			$allow_personal_message = isset($_POST['_allow_personal_message']) ? 'yes' : 'no';
			update_post_meta($post_id, '_allow_personal_message', $allow_personal_message);

			if (isset($_POST['price_for_adult'])) :
				update_post_meta($post_id, 'price_for_adult', absint($_POST['price_for_adult']));
			endif;
			if (isset($_POST['price_for_child'])) :
				update_post_meta($post_id, 'price_for_child', absint($_POST['price_for_child']));
			endif;
		}
		add_action('woocommerce_process_product_meta_simple', 'save_booking_options_fields');
		add_action('woocommerce_process_product_meta_variable', 'save_booking_options_fields');

        if (isset($_POST['save'])) {
			$data = array(
				'price_for_adult' => $_POST['price_for_adult'],
				'price_for_child' => $_POST['price_for_child'],
			);
			$table_name = 'cias_price_for_each_person';
			$wpdb->update(
				'cias_price_for_each_person',
				array(
					'price_for_adult' => $_POST['price_for_adult'],
					'price_for_child' => $_POST['price_for_child'],
				),
				array('ID' => 1),
				array(
					'%s',	// value1
					'%d'	// value2
				),
				array('%d')
			);
			$wpdb->update($table, $data, $where, $format = null, $where_format = null);
		}
		// save to database
		add_action('woocommerce_before_add_to_cart_button', 'wdm_add_custom_fields');
		/**
		 * Adds custom field for Product
		 * @return [type] [description]
		 */
		function wdm_add_custom_fields()
		{

			global $product, $post;

			ob_start();

			?>
		<div class="wdm-custom-fields">
			<input type="hidden" name="activepost" id="activepost" value="<?php echo  get_post_meta($post->ID);?>">
			<li>
				<?php $adult_price = get_post_meta($post->ID, 'price_for_adult', true); ?>
				<label for="wdm_adult">Người lớn: <br>
					<?php echo number_format($adult_price, 0, '', ','); ?> VNĐ
				</label>
				<div class="wrap-quantity-num">
					<input id="quantity-num-adult" class="quantity-num-adult poiter-events" type="number" name="wdm_adult" min=1
						value="1">
				</div>
			</li>
			<li>
				<?php $kids_price = get_post_meta($post->ID, 'price_for_child', true); ?>
				<label for="wdm_kids">Trẻ em: <br>
					<?php echo number_format($kids_price, 0, '', ','); ?> VNĐ
				</label>
				<div class="wrap-quantity-num">
					<input id="quantity-num-kids" class="quantity-num-kids poiter-events" type="number" name="wdm_kids" min=0
						value="0">
				</div>
			</li>

		</div>
		<div class="clear"></div>

<?php

			$content = ob_get_contents();
			ob_end_flush();

			return $content;
		}

		add_filter('woocommerce_add_cart_item_data', 'wdm_add_item_data', 10, 3);

		/**
		 * Add custom data to Cart
		 * @param  [type] $cart_item_data [description]
		 * @param  [type] $product_id     [description]
		 * @param  [type] $variation_id   [description]
		 * @return [type]                 [description]
		 */
		function wdm_add_item_data($cart_item_data, $product_id, $variation_id)
		{
			if (isset($_REQUEST['wdm_adult'])) {
				$cart_item_data['wdm_adult'] = sanitize_text_field($_REQUEST['wdm_adult']);
			}

			if (isset($_REQUEST['wdm_kids'])) {
				$cart_item_data['wdm_kids'] = sanitize_text_field($_REQUEST['wdm_kids']);
			}

			return $cart_item_data;
		}
		add_filter('woocommerce_get_item_data', 'wdm_add_item_meta', 10, 2);

		/**
		 * Display information as Meta on Cart page
		 * @param  [type] $item_data [description]
		 * @param  [type] $cart_item [description]
		 * @return [type]            [description]
		 */

		function wdm_add_item_meta($item_data, $cart_item)
		{
			global $custom_details;
			if (array_key_exists('wdm_adult', $cart_item)) {
				$custom_details = $cart_item['wdm_adult'];

				$item_data[] = array(
					'key'   => 'Người lớn',
					'value' => $custom_details
				);
			}
			if (array_key_exists('wdm_kids', $cart_item)) {
				$custom_details = $cart_item['wdm_kids'];

				$item_data[] = array(
					'key'   => 'Trẻ em',
					'value' => $custom_details
				);
			}

			return $item_data;
		}
		add_action('woocommerce_checkout_create_order_line_item', 'wdm_add_custom_order_line_item_meta', 10, 4);

		function wdm_add_custom_order_line_item_meta($item, $cart_item_key, $values, $order)
		{

			if (array_key_exists('wdm_adult', $values)) {
				$item->add_meta_data('Người lớn', $values['wdm_adult']);
			}
			if (array_key_exists('wdm_kids', $values)) {
				$item->add_meta_data('Trẻ em', $values['wdm_kids']);
			}
		}
		add_action('woocommerce_cart_item_custom', 'woocommerce_cart_item_custom', 10, 4);
		function woocommerce_cart_item_custom( $products,$cart_item)
		{	
			global $price;
			$adult = get_post_meta($products->get_id(), 'price_for_adult', true ) * $cart_item['wdm_adult'];
			$kids = get_post_meta($products->get_id(), 'price_for_child', true ) * $cart_item['wdm_kids'];
			$price = $adult + $kids;
			return $price;
		}
		add_action( 'woocommerce_before_calculate_totals', 'add_custom_price', 20, 1);
		function add_custom_price( $cart ) {
		
			// This is necessary for WC 3.0+
			if ( is_admin() && ! defined( 'DOING_AJAX' ) )
				return;
		
			// Avoiding hook repetition (when using price calculations for example)
			if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
				return;
		
			// Loop through cart items
			foreach ( $cart->get_cart() as $item ) {
				$adult = $item['wdm_adult'];
				$adult = get_post_meta($item['product_id'], 'price_for_adult', true ) * $item['wdm_adult'];
				$child = get_post_meta($item['product_id'], 'price_for_child', true ) * $item['wdm_kids'];
				$price = $adult + $child;
				$item['data']->set_price($price );
			}
		}
		// Remove Product Prices
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
		function mysite_pending($order_id) {
			error_log("$order_id set to PENDING", 0);
			}
			function mysite_failed($order_id) {
			error_log("$order_id set to FAILED", 0);
			}
			function mysite_hold($order_id) {
			error_log("$order_id set to ON HOLD", 0);
			}
			function mysite_processing($order_id) {
			error_log("$order_id set to PROCESSING", 0);
			}
			function mysite_completed($order_id) {
				error_log("$order_id set to COMPLETED", 0);
				$chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
				srand((double)microtime()*1000000); 
				$i = 0; 
				$pass = 'Cias-'.'' ; 
			
				while ($i <= 7) { 
					$num = rand() % 33; 
					$tmp = substr($chars, $num, 1); 
					$pass = $pass . $tmp; 
					$i++; 
				} 
			
				error_log($pass); 
			}
			function mysite_refunded($order_id) {
			error_log("$order_id set to REFUNDED", 0);
			}
			function mysite_cancelled($order_id) {
			error_log("$order_id set to CANCELLED", 0);
			}
		
			add_action( 'woocommerce_order_status_pending', 'mysite_pending');
			add_action( 'woocommerce_order_status_failed', 'mysite_failed');
			add_action( 'woocommerce_order_status_on-hold', 'mysite_hold');
			// Note that it's woocommerce_order_status_on-hold, not on_hold.
			add_action( 'woocommerce_order_status_processing', 'mysite_processing');
			add_action( 'woocommerce_order_status_completed', 'mysite_completed');
			add_action( 'woocommerce_order_status_refunded', 'mysite_refunded');
			add_action( 'woocommerce_order_status_cancelled', 'mysite_cancelled');

		// }
		add_filter( 'woocommerce_checkout_fields' , 'cias_remove_billing_fields' );
		// Unset checkout fields
		function cias_remove_billing_fields($fields)
		{

			unset($fields['billing_company']);
			unset($fields['billing_postcode']);
			unset($fields['billing_address_2']);
			unset($fields['billing_country']);
			unset($fields['billing_address_1']);
			unset($fields['billing_city']);
			return $fields;
		}