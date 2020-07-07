<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<div class="container">
    <div id="product-<?php the_ID(); ?>" <?php wc_product_class('d-flex', $product); ?>>
        <div class="product-image col-lg-7 col-md-7 col-sm-12">
            <?php
            /**
             * Hook: woocommerce_before_single_product_summary.
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            do_action('woocommerce_before_single_product_summary');
            ?></div>


        <div class="summary entry-summary child-themes  col-lg-5 col-md-5 col-sm-12">
            <?php
            the_title('<h1 class="product_title entry-title">', '</h1>');
            global $product;

            if (!$product->is_purchasable()) {
                return;
            }

            echo wc_get_stock_html($product); // WPCS: XSS ok.

            if ($product->is_in_stock()) : ?>

                <?php do_action('woocommerce_before_add_to_cart_form'); ?>

                <div class="form-booking">
                    <form action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
                        <ul>
                            <li class="has-extra">
                                <label for="adult">NGƯỜI LỚN:</label>
                                <div class="wrap-quantity-num">
                                    <input class="quantity-num" type="number" min="0" step="1" name="adult" id="adult" value="1" />
                                  
                                </div>
                                <ul class="extra">
                                    <li>
                                        <label for="name">Họ tên: </label>
                                        <input type="text" name="name" id="name" />



                                    </li>
                                    <li>
                                        <label for="age">Tuổi: </label>
                                        <input type="text" name="age" id="age" />
                                    </li>
                                    <li>
                                        <label for="sex">Giới tính: </label>
                                        <input type="text" name="sex" id="sex" />
                                    </li>
                                </ul>
                            </li>
                            <li class="has-extra">
                                <label for="childrent">TRẺ EM ( 5 - 12 TUỔI):</label>
                                <div class="wrap-quantity-num">
                                    <input class="quantity-num" type="number" min="0" step="1" max="10" name="childrent" id="childrent" value="0" />
                                </div>
                                <ul class="extra extra-child">
                                    <!-- <li>
                                        <label for="adult">Họ tên các thanh viên: </label>
                                        <textarea name="extra-adult" id="extra-adult"></textarea>
                                    </li> -->
                                </ul>
                            <li>
                                <label for="kid">TRẺ EM ( DƯỚI 5 TUỔI):</label>
                                <div class="wrap-quantity-num">
                                    <input class="quantity-num" type="number" min="0" step="1" name="kid" id="kid" value="0" />
                                </div>
                            </li>
                        </ul>
                        <?php do_action('woocommerce_before_add_to_cart_button'); ?>
                        <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button button alt">Tiếp tục</button>

                        <?php do_action('woocommerce_after_add_to_cart_button'); ?>
                    </form>
                    <?php echo $_POST['adult']; ?> 
                    <?php do_action('woocommerce_after_add_to_cart_form'); ?>

                <?php endif; ?>
                </div>
                <?php 
                global $wpdb;
                $customers = $wpdb->get_results("SELECT * FROM `cias_price_for_each_person`");
                ?>
                
                <table class="table table-hover">
                
                <?php foreach($customers as $customer){ ?>
                
                <tr>
                 <td><center><?php echo $customer->ID; ?></center></td>
                 <td><center><?php echo $customer->Type; ?></center></td>
                 <td><center><?php echo $customer->price * 2; ?></center></td>
                 <td><center><?php echo $customer->reward_amount; ?></center></td>
                </tr>
                
                <?php } ?>
                
                </table>
        </div>
    </div>
</div>

<?php do_action('woocommerce_after_single_product'); ?>