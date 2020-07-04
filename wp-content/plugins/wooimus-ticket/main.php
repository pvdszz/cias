<?php



/**

 * Plugin Name:       Wooimus ticket

 * Description:       A handy little plugin to contain your theme customisation snippets.

 * Version:           1.0.0

 * Author:            Imus dev

 * Requires at least: 3.0.0

 * Tested up to:      4.4.2

 *

 * @package wooimus-ticket

 */

if (!defined('ABSPATH')) {

    exit; // Exit if accessed directly.

}



/**

 * Check if WooCommerce is active

 **/

if (in_array('./woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
}

add_action('admin_menu', 'wooimus_ticket_menu');

function wooimus_ticket_menu()

{

    $page_title = 'Wooimus ticket';

    $menu_title = 'Wooimus ticket';

    $capability = 'manage_options';

    $menu_slug  = 'wooimus-ticket';

    $function   = 'wooimus_ticket_page';

    $icon_url   = 'dashicons-media-code';

    $position   = 40;

    add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
}

if (!function_exists("wooimus_ticket_page")) {



    function wooimus_ticket_page()

    {

?>

        <h1 class="page-plugin-title">Wooimus ticket</h1>

        <p class="page-plugin-sub-title"> Plugin for customer coupon codes. </p>



        <?php



        // define the woocommerce_resume_order callback x



        $args = array(

            'limit' => 9999,

            'return' => 'ids',

        );

        $query = new WC_Order_Query($args);

        $orders = $query->get_orders();

        ?>
        <style>
            td {
                font-family: inherit;
                text-align: center;
            }
            .table-header{
                background:rgba(130, 183, 53, 1);
                color: #fff;
                font-size: 16px;
            }
            .table-header th{
                padding: 10px;
            }
            .has-bacground{
                background-color: #f9f9f9;
            }
            
        </style>
        <section class="woocommerce-order-details">

            <?php do_action('woocommerce_order_details_before_order_table', $orders); ?>
            <h2 class="woocommerce-order-details__title"><?php esc_html_e('Order details', 'woocommerce'); ?></h2>



            <table class="woocommerce-table woocommerce-table--order-details shop_table order_details" style=" width: 100%;">
                <thead>
                    <tr class="table-header">
                        <th class="woocommerce-table__product-name product-name"><?php esc_html_e('Product', 'woocommerce'); ?></th>

                        <th class="woocommerce-table__product-table product-total"><?php esc_html_e('Total', 'woocommerce'); ?></th>

                        <th class="woocommerce-table__product-table order-status"><?php esc_html_e('Status', 'woocommerce'); ?></th>

                        <th class="woocommerce-table__product-table customer-info"><?php esc_html_e('Customer', 'woocommerce'); ?></th>

                        <th class="woocommerce-table__product-table order-date"><?php esc_html_e('Date', 'woocommerce'); ?></th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($orders as $order_id) {

                        $order = wc_get_order($order_id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited
                        if (!$order) {

                            return;
                        }
                        $order_items = $order->get_items(apply_filters('woocommerce_purchase_order_item_types', 'line_item'));
                        $order_data = $order->get_data();
                        $order_status = $order_data['status'];
                        $order_date_created = $order_data['date_created']->date('d-m-Y H:i:s');

                    ?>

                        <?php

                        do_action('woocommerce_order_details_before_order_table_items', $orders);
                        foreach ($order_items as $item_id => $item) {

                            $product = $item->get_product();
                            if (!apply_filters('woocommerce_order_item_visible', true, $item)) {

                                return;
                            }

                        ?>

                            <tr class="has-bacground <?php echo esc_attr(apply_filters('woocommerce_order_item_class', 'woocommerce-table__line-item order_item', $item, $order)); ?>">
                                <td class="woocommerce-table__product-name product-name">

                                    <?php

                                    $is_visible        = $product && $product->is_visible();

                                    $product_permalink = apply_filters('woocommerce_order_item_permalink', $is_visible ? $product->get_permalink($item) : '', $item, $order);
                                    echo apply_filters('woocommerce_order_item_name', $product_permalink ? sprintf('<a href="%s">%s</a>', $product_permalink, $item->get_name()) : $item->get_name(), $item, $is_visible); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

                                    $qty          = $item->get_quantity();

                                    $refunded_qty = $order->get_qty_refunded_for_item($item_id);

                                    if ($refunded_qty) {

                                        $qty_display = '<del>' . esc_html($qty) . '</del> <ins>' . esc_html($qty - ($refunded_qty * -1)) . '</ins>';
                                    } else {

                                        $qty_display = esc_html($qty);
                                    }

                                    echo apply_filters('woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf('&times;&nbsp;%s', $qty_display) . '</strong>', $item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

                                    do_action('woocommerce_order_item_meta_start', $item_id, $item, $order, false);

                                    wc_display_item_meta($item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

                                    do_action('woocommerce_order_item_meta_end', $item_id, $item, $order, false);

                                    ?>

                                </td>

                                <td class="woocommerce-table__product-total product-total">

                                    <?php echo $order->get_formatted_line_subtotal($item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 

                                    ?>

                                </td>

                                <td class="woocommerce-table__product-total order-status">

                                    <?php echo $order_status; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 

                                    ?>

                                </td>

                                <td>

                                    <p class="name">

                                        <span><?php echo $order->get_billing_first_name(); ?></span>

                                        <span><?php echo $order->get_billing_last_name(); ?></span>

                                    </p>

                                    <p class="email">Email: <?php echo $order->get_billing_email(); ?> </p>

                                    <p class="phone">Phone number: <?php echo $order->get_billing_phone(); ?> </p>

                                </td>

                                <td>

                                    <?php echo  $order_date_created; ?>

                                </td>

                            </tr>

                    <?php

                        }

                        do_action('woocommerce_order_details_after_order_table_items', $orders);
                    }

                    ?>

                </tbody>

            </table>

            <?php do_action('woocommerce_order_details_after_order_table', $orders); ?>

        </section>

<?php

    }
}
