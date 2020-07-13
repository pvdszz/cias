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

																	?><div class='options_group'><?php
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


		// save to database
		global $wpdb;

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

		if (isset($_POST['add-to-cart'])) {
			$_name = $_POST['name'] + $_POST['name2'];
			$data = array(
				'name' => $_name,
				'email' => $_POST['email'],
				'age' => $_POST['age'],

			);
			printf($_name);
			// $format = array(
			// 	'%s'
			// );

			$table_name = $wpdb->prefix . 'orderdetail';
			$wpdb->insert($table_name, $data, $format = NULL);
		}




add_action('woocommerce_before_add_to_cart_button', 'wdm_add_custom_fields');
/**
 * Adds custom field for Product
 * @return [type] [description]
 */
function wdm_add_custom_fields()
{

	global $product,$post;

	ob_start();

	?>
	<div class="wdm-custom-fields">
		<li>
			<?php  $adult_price = get_post_meta($post->ID, 'price_for_adult', true);?>
			<label for="wdm_adult">Người lớn: <br>
			<?php echo number_format($adult_price, 0, '', ','); ?> VNĐ
		</label>
			<input type="number" name="wdm_adult" value="1">
		</li>
		<li>
		<?php  $kids_price = get_post_meta($post->ID, 'price_for_child', true);?>
			<label for="wdm_kids">Trẻ em: <br>
			<?php echo number_format($kids_price, 0, '', ','); ?> VNĐ
		</label>
			<input type="number" name="wdm_kids">
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
add_filter('woocommerce_product_get_price', 'display_super_sale_price', 10, 2); 
function display_super_sale_price( $price, $product ) {
	
	
		 $aa = $product->get_meta('wdm_adult');
		 echo $aa;
        $price_adult = $product->get_meta('price_for_adult');
		$price_kid = $product->get_meta('price_for_child');
		$price = ($price_adult ) + $price_kid;

    return $price;
}