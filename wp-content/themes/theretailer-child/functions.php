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


//Product Cat creation page
function text_domain_taxonomy_add_new_meta_field() {
    ?>
<div class="form-field">
    <label for="term_meta[wh_meta_title]"><?php _e('Giá cho một người lớn', 'text_domain'); ?></label>
    <input type="number"  name="term_meta[wh_meta_title]" id="term_meta[wh_meta_title]">
    <!-- <p class="description"><?php _e('Enter a meta titl, <= 60 character', 'text_domain'); ?></p> -->
</div>
<div class="form-field">
    <label for="term_meta[wh_meta_desc]"><?php _e('Giá cho một trẻ em', 'text_domain'); ?></label>
    <input type="number" name="term_meta[wh_meta_desc]" id="term_meta[wh_meta_desc]">
    <p class="description"><?php _e('Enter a meta description, <= 160 character', 'text_domain'); ?></p>
</div>
<?php
}

add_action('product_cat_add_form_fields', 'text_domain_taxonomy_add_new_meta_field', 10, 2);

//Product Cat Edit page
function text_domain_taxonomy_edit_meta_field($term) {

    //getting term ID
    $term_id = $term->term_id;

    // retrieve the existing value(s) for this meta field. This returns an array
    $term_meta = get_option("taxonomy_" . $term_id);
    ?>
<tr class="form-field">
    <th scope="row" valign="top"><label for="term_meta[wh_meta_title]"><?php _e('Giá cho một người lớn', 'text_domain'); ?></label>
    </th>
    <td>
        <input type="number" name="term_meta[wh_meta_title]" id="term_meta[wh_meta_title]"
            value="<?php echo esc_attr($term_meta['wh_meta_title']) ? esc_attr($term_meta['wh_meta_title']) : ''; ?>">
      
    </td>
</tr>
<tr class="form-field">
    <th scope="row" valign="top"><label
            for="term_meta[wh_meta_desc]"><?php _e('Giá cho một trẻ em', 'text_domain'); ?></label></th>
    <td>
        <input type="number" name="term_meta[wh_meta_desc]"
            id="term_meta[wh_meta_desc]" value="<?php echo esc_attr($term_meta['wh_meta_desc']); ?>" >
        <p class="description"><?php _e('Enter a meta description', 'text_domain'); ?></p>
    </td>
</tr>
<?php
}

add_action('product_cat_edit_form_fields', 'text_domain_taxonomy_edit_meta_field', 10, 2);

// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta($term_id) {
    if (isset($_POST['term_meta'])) {
        $term_meta = get_option("taxonomy_" . $term_id);
        $cat_keys = array_keys($_POST['term_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['term_meta'][$key])) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        // Save the option array.
        update_option("taxonomy_" . $term_id, $term_meta);
    }
}

add_action('edited_product_cat', 'save_taxonomy_custom_meta', 10, 2);
add_action('create_product_cat', 'save_taxonomy_custom_meta', 10, 2);


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
		function display_super_sale_price($price, $product)
		{
			require('fetch.php');
			$price = $output;

			return $price;
			
		}
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

	 /*


	//  
	
	 