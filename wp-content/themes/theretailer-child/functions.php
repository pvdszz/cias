<?php
defined( 'ABSPATH' ) || exit;

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
	
	// js
	wp_enqueue_script('cias_script', get_stylesheet_directory_uri() . '/js/script.js', array(), '20151215', true);
	wp_localize_script('cias_script','singleproduct',array('ajaxurl' => admin_url('admin-ajax.php'),));

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
?><div id='booking_options' class='panel woocommerce_options_panel'>
    <div class='options_group'>
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
    <li>
        <input id="coupon" class="coupon" type="hidden" name="cias_coupon" min=0
            value="Coupon code will be sent to you when your order completed.	 Thank you so much!">
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
	if (isset($_REQUEST['cias_coupon'])) {
		$cart_item_data['cias_coupon'] = sanitize_text_field($_REQUEST['cias_coupon']);
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
	if (array_key_exists('cias_coupon', $cart_item)) {
		$custom_details = $cart_item['cias_coupon'];
		$item_data[] = array(
			'key'   => 'Coupon code',
			'value' => $custom_details,
		);
	}

	return $item_data;
}

add_action('woocommerce_checkout_create_order_line_item', 'wdm_add_custom_order_line_item_meta', 10, 4);
// add quantity adult and child to order line
function wdm_add_custom_order_line_item_meta($item, $cart_item_key, $values, $order)
{

	if (array_key_exists('wdm_adult', $values)) {
		$item->add_meta_data('Người lớn', $values['wdm_adult']);
	}
	if (array_key_exists('wdm_kids', $values)) {
		$item->add_meta_data('Trẻ em', $values['wdm_kids']);
	}

	
	
}

add_action( 'woocommerce_before_calculate_totals', 'cias_price', 20, 1);
function cias_price( $cart ) {

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

// Remove old product

/**
 * @snippet       Remove Cart Item Programmatically - WooCommerce
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_action( 'template_redirect', 'bbloomer_remove_product_from_cart_programmatically' );
 
function bbloomer_remove_product_from_cart_programmatically() {
   $product_id = 20;
   $product_cart_id = WC()->cart->generate_cart_id( $product_id );
   $cart_item_key = WC()->cart->find_product_in_cart( $product_cart_id );
   if ( $cart_item_key ) WC()->cart->remove_cart_item( $cart_item_key );
}

// Remove Product Prices
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

// Check order status and generate code

function cias_order_completed($order_id) {

	$order = wc_get_order( $order_id);
	error_log($order_id);

	// Get and Loop Over Order Items
	foreach ( $order->get_items() as $item_id => $item ) {
		$allmeta = $item->get_meta_data();
		$adultCount = $allmeta[0]->__get('value');
		$childCount = $allmeta[1]->__get('value');				
	}	
		$anum_code= 1;
		while ( $anum_code <= $adultCount) {
			$acoupon_code = 'A'.$order_id.'-';
			$length        = 6;
			$charset       = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$count         = strlen( $charset );
		
			while ( $length-- ) {
				$acoupon_code .= $charset[ mt_rand( 0, $count-1 ) ];
			}
		
			// insert to database
			global $wpdb;
			$date = date('Y-m-d', strtotime("+30 days"));
			$table = $wpdb->prefix.'orderextra';
			$data = array(
					'orderExID' => $order_id,
					'code' 		=> $acoupon_code,
					'expiredDate' => $date,
				);
			$wpdb->insert($table,$data,$format=NULL);
			$anum_code++;
		

		}
		$bnum_code= 1;

		while ( $bnum_code <= $childCount) {
			$bcoupon_code = 'B'.$order_id.'-';
			$length        = 6;
			$charset       = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$count         = strlen( $charset );
		
			while ( $length-- ) {
				$bcoupon_code .= $charset[ mt_rand( 0, $count-1 ) ];
			}
		
			// insert to database
			global $wpdb;
			$date = date('Y-m-d', strtotime("+30 days"));
			$table = $wpdb->prefix.'orderextra';
			$data = array(
					'orderExID' => $order_id,
					'code' 		=> $bcoupon_code,
					'expiredDate' => $date,
				);
			$wpdb->insert($table,$data,$format=NULL);
			$bnum_code++;
		

		}

}
function cias_order_pending($order_id) {
	error_log("$order_id set to PENDING");
	global $wpdb;
	$table = $wpdb->prefix.'orderextra';
	$wpdb->delete( $table, array( 'orderExID' => $order_id ) );
}
function cias_order_failed($order_id) {
	error_log("$order_id set to FAILED");
	global $wpdb;
	$table = $wpdb->prefix.'orderextra';
	$wpdb->delete( $table, array( 'orderExID' => $order_id ) );
}
function cias_order_hold($order_id) {
	error_log("$order_id set to ON HOLD");
	global $wpdb;
	$table = $wpdb->prefix.'orderextra';
	$wpdb->delete( $table, array( 'orderExID' => $order_id ) );
}
function cias_order_processing($order_id) {
	error_log("$order_id set to PROCESSING");
	// error_log("$order_id set to PENDING");
	// global $wpdb;
	// $table = $wpdb->prefix.'orderextra';
	// $results = $wpdb->get_results( "SELECT * FROM $table");
	// foreach($results as $row){
	// 	$id = $row->orderExID;
	// 	$code = $row->code;
		
	// 	if( $id == $order_id){
	// 		$data = array(
	// 			''
	// 		)
	// 	}
		// if($id == $order_id && $used == 1){
		// 	echo $row["code"] . " - Erpired Date: " . $row["expiredDate"] ."<br>";
		// }
		// if($id !== $order_id){
		// 	echo "";
		// }

	
	$wpdb->delete( $table, array( 'orderExID' => $order_id ) );
}

function cias_order_refunded($order_id) {
	error_log("$order_id set to REFUNDED");
	global $wpdb;
	$table = $wpdb->prefix.'orderextra';
	$wpdb->delete( $table, array( 'orderExID' => $order_id ) );
}
function cias_order_cancelled($order_id) {
	global $wpdb;
	$table = $wpdb->prefix.'orderextra';
	$wpdb->update( $table, $data, $where );
}

add_action( 'woocommerce_order_status_completed', 'cias_order_completed');
add_action( 'woocommerce_order_status_pending', 'cias_order_pending', 10, 1);
add_action( 'woocommerce_order_status_failed', 'cias_order_failed', 10, 1);
add_action( 'woocommerce_order_status_on-hold', 'cias_order_hold', 10, 1);
add_action( 'woocommerce_order_status_processing', 'cias_order_processing', 10, 1);
add_action( 'woocommerce_order_status_completed', 'cias_order_completed', 10, 1);
add_action( 'woocommerce_order_status_refunded', 'cias_order_refunded', 10, 1);
add_action( 'woocommerce_order_status_cancelled', 'cias_order_cancelled', 10, 1);





/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
	if( current_user_can('administrator') ) {
		global $wpdb;
		$order_id = $order->get_id();
		$table = $wpdb->prefix.'orderExtra';
		$results = $wpdb->get_results( "SELECT * FROM $table"); 
		if(!empty($results)){
				?>
		<h3 style="margin-bottom: 20px"> Chi tiết mã Voucher </h3>
		<table id="code-detail" style="width:100%; margin-bottom: 20px;">
			<style>
			#code-detail {
				border-spacing: 0;
			}

			#code-detail th {
				border: 1px solid #ddd;
			}

			#code-detail td {
				border: 1px solid #ddd;
			}
			</style>
			<thead>
				<tr>
					<th align="center">Mã</th>
					<th align="center">Ngày hết hạn</th>
					<th align="center">Trạng thái</th>
				</tr>
			</thead>
			<tbody>


				<?php
				foreach( $results as $row){
					$id = $row->orderExID;
					$code = $row->code;
					$used = $row->used;
					$deleted = $row->deleted;
					$expired_date = $row->expiredDate;

					if($id == $order_id){
						
						if( $id == $order_id && $used == 0 && $deleted == 1){
							?>
				<tr>
					<td align="center">
						<p><?php echo $code;?></p>
					</td>
					<td align="center">
						<p><?php echo $expired_date;?></p>
					</td>
					<td align="center">
						<p>Khả dụng</p>
					</td>
				</tr>
				<?php
						}
						if($id == $order_id && $used == 1 && $deleted == 1){
							?>
				<tr>
					<td align="center">
						<p><?php echo $code;?></p>
					</td>
					<td align="center">
						<p><?php echo $expired_date;?></p>
					</td>
					<td align="center">
						<p>Đã sử dụng</p>
					</td>
				</tr>
				<?php
						}
						if($id == $order_id && $deleted == 0){
							echo "";
						}
					}
				}
				?>
			</tbody>
		</table>
		<?php
	   };
	}
}
// add_action( 'woocommerce_before_order_itemmeta', 'so_32457241_before_order_itemmeta', 10, 3 );
// 		function so_32457241_before_order_itemmeta($order, $item, $_product ){
			
// 		}
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
unset($fields['billing']['billing_company']);
unset($fields['billing']['billing_address_2']);
unset($fields['billing']['billing_address_1']);
unset($fields['billing']['billing_city']);
unset($fields['billing']['billing_postcode']);
unset($fields['billing']['billing_country']);
unset($fields['billing']['billing_state']);
unset($fields['order']['order_comments']);
unset($fields['account']['account_username']);
unset($fields['account']['account_password']);
unset($fields['account']['account_password-2']);
return $fields;
}