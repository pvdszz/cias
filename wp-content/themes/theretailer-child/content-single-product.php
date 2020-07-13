<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

global $post, $product;

//woocommerce_single_product_summary
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

add_action('woocommerce_single_product_summary_single_title', 'woocommerce_template_single_title', 5);
add_action('woocommerce_single_product_summary_single_rating', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary_single_price', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary_single_excerpt', 'woocommerce_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary_single_add_to_cart', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary_single_meta', 'woocommerce_template_single_meta', 40);
add_action('woocommerce_single_product_summary_single_sharing', 'woocommerce_template_single_sharing', 50);

//woocommerce_before_single_product_summary
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

add_action('woocommerce_before_single_product_summary_sale_flash', 'woocommerce_show_product_sale_flash', 10);
add_action('woocommerce_before_single_product_summary_product_images', 'woocommerce_show_product_images', 20);

$product_page_has_sidebar = false;
$layout = 'product-layout-1';

if (GBT_Opt::getOption('products_layout', false)) {
    $product_page_has_sidebar = true;
    $layout = 'product-layout-2';
}
?>

<div id="product-<?php the_ID(); ?>"
    <?php function_exists('wc_product_class') ? wc_product_class('product ' . $layout, $product) : post_class(); ?>>

    <?php if ($product_page_has_sidebar) : ?>

    <div class="product_page_has_sidebar page_has_sidebar_left">
        <div class="product_main_infos with_sidebar">

            <?php else : ?>

            <div class="product_main_infos without_sidebar">

                <?php endif; ?>


                <?php
                /**
                 * woocommerce_before_single_product hook
                 *
                 * @hooked woocommerce_show_messages - 10
                 */
                do_action('woocommerce_before_single_product');
                ?>

                <div class="grtr_product_header_mobiles">

                    <?php the_title('<h2 class="product_title entry-title">', '</h2>'); ?>
                    <?php do_action('woocommerce_single_product_summary_single_price'); ?>

                </div>

                <div class="gbtr_product_details_left_col">

                    <?php if (!GBT_Opt::getOption('catalog_mode', false)) : ?>
                    <?php if (!$product->is_in_stock()) : ?>
                    <div
                        class="out_of_stock_badge_single <?php if (!$product->is_on_sale()) : ?>first_position<?php endif; ?>">
                        <?php
                                if (!empty(GBT_Opt::getOption('out_of_stock_text', esc_html__('Out of Stock', 'theretailer')))) {
                                    printf(wp_kses_post(__('%s', 'theretailer')), GBT_Opt::getOption('out_of_stock_text', esc_html__('Out of Stock', 'theretailer')));
                                } else {
                                    esc_html_e('Out of stock', 'woocommerce');
                                }
                                ?>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>


                    <?php
                    /**
                     * woocommerce_show_product_images hook
                     *
                     * @hooked woocommerce_show_product_sale_flash - 10
                     * @hooked woocommerce_show_product_images - 20
                     */
                    if (!GBT_Opt::getOption('catalog_mode', false)) {
                        do_action('woocommerce_before_single_product_summary_sale_flash');
                    }
                    do_action('woocommerce_before_single_product_summary_product_images');
                    do_action('woocommerce_before_single_product_summary');
                    ?>
                    <br>
                    <table id="order_total">
                        <label>
                            <br>
                            <h3>Tạm tính: </h3>
                        </label>

                        <tbody id="data">
                            <tr>
                                <td id="adult-field">Người lớn: </td>
                                <td id="kids-field">Trẻ em: </td>
                                <td id="total-field">Tổng: </td>
                            </tr>
                        </tbody>

                    </table>
                </div>

                <div class="gbtr_product_details_right_col">

                    <div class="product_infos summary">
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
                            <form
                                action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>"
                                method="post" enctype='multipart/form-data'>
                                <!-- <ul>
                                    <li class="has-extra">
                                        <?php
                                            $adult_price = get_post_meta($post->ID, 'price_for_adult', true);
                                            ?>
                                        <label for="adult">NGƯỜI LỚN: <br>
                                            <?php echo number_format($adult_price, 0, '', ','); ?> VNĐ
                                        </label>
                                        <div class="wrap-quantity-num">
                                            <input class="quantity-num-adult poiter-events" type="number" min="0"
                                                step="1" name="adult" id="adult" value="1" />

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
                                                <label for="email">Email: </label>
                                                <input type="text" name="email" id="email" />
                                            </li>
                                        </ul>
                                        <ul class="extra">
                                            <li>
                                                <label for="name2">Họ tên: </label>
                                                <input type="text" name="name2" id="name" />
                                            </li>
                                            <li>
                                                <label for="age">Tuổi: </label>
                                                <input type="text" name="age" id="age" />
                                            </li>
                                            <li>
                                                <label for="email">Email: </label>
                                                <input type="text" name="email" id="email" />
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has-extra">
                                        <?php
                                            $kids_price = get_post_meta($post->ID, 'price_for_child', true);
                                            ?>
                                        <label for="kids">TRẺ EM ( 5 - 12 TUỔI): <br>
                                            <?php echo number_format($kids_price, 0, '', ','); ?> VNĐ
                                        </label>
                                        <div class="wrap-quantity-num">
                                            <input class="quantity-num-kids poiter-events" type="number" min="0"
                                                step="1" max="10" name="kids" id="kids" value="0" />
                                        </div>
                                        <ul class="extra extra-kids">
                                        </ul>
                                    <li>
                                        <label for="child">TRẺ EM ( DƯỚI 5 TUỔI): <br>
                                            0 VNĐ
                                        </label>
                                        <div class="wrap-quantity-num">
                                            <input class="quantity-num-childs poiter-events" type="number" min="0"
                                                step="1" name="childs" id="chids" value="0" />
                                        </div>
                                    </li>
                                </ul>  -->
                                <?php do_action('woocommerce_before_add_to_cart_button'); ?>
                                <button style="margin: 10px 0;" type="submit" name="add-to-cart"
                                    value="<?php echo esc_attr($product->get_id()); ?>"
                                    class="single_add_to_cart_button button alt">Tiếp tục</button>

                                <?php do_action('woocommerce_after_add_to_cart_button'); ?>
                            </form>
                            <?php echo $_POST['adult']; ?>
                            <?php do_action('woocommerce_after_add_to_cart_form'); ?>

                            <?php endif; ?>
                        </div>
                        <?php
                            // do_action( 'woocommerce_single_product_summary_single_title' );
                            do_action( 'woocommerce_single_product_summary_single_rating' );
                            ?>
                            <h3>Tạm tính: </h3>
                            <?php
                            do_action( 'woocommerce_single_product_summary_single_price' );
                            do_action( 'woocommerce_single_product_summary_single_excerpt' );
                            // if ( !GBT_Opt::getOption( 'catalog_mode', false ) ) {
                            // 	do_action( 'woocommerce_single_product_summary_single_add_to_cart' );
                            // }
                            do_action( 'woocommerce_single_product_summary' );
                            do_action( 'woocommerce_single_product_summary_single_meta' );
                            do_action('woocommerce_single_product_summary_single_sharing');
                            ?>

                    </div><!-- .summary -->

                </div>
               
            </div>

            <?php do_action('getbowtied_woocommerce_single_product_share'); ?>

            <?php
                /**
                 * woocommerce_after_single_product_summary hook
                 *
                 * @hooked woocommerce_output_product_data_tabs - 10
                 * @hooked woocommerce_output_related_products - 20
                 */
                do_action('woocommerce_after_single_product_summary');
                ?>

            <?php if ($product_page_has_sidebar) : ?>

        </div>
        <?php if (is_active_sidebar('widgets_product_listing')) : ?>
        <div class="page_sidebar page_sidebar_left">
            <?php dynamic_sidebar('widgets_product_listing'); ?>
        </div>
        <?php endif; ?>

        <?php endif; ?>

    </div><!-- #product-<?php the_ID(); ?> -->

    <?php do_action('woocommerce_after_single_product'); ?>
    <!-- <div class="container test">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="crud_table">
                            <tr>
                                <th width="30%">Name</th>
                                <th width="10%">Email</th>
                                <th width="45%">Age</th>
                                <th width="5%"></th>
                            </tr>
                            <tr>
                                <td contenteditable="true" class="item_name"></td>
                                <td contenteditable="true" class="item_email"></td>
                                <td contenteditable="true" class="item_age"></td>
                                <td></td>
                            </tr>
                        </table>
                        <div align="right">
                            <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
                        </div>
                        <div align="center">
                            <button type="button" name="save" id="save" class="btn btn-info">Save</button>
                        </div>
                        <br />
                        <div id="inserted_item_data"></div>
                    </div>

                </div>

                <script>
                
                jQuery(document).ready(function($) {
                    var count = 1;
                    $('#add').click(function() {
                        count = count + 1;
                        var html_code = "<tr id='row" + count + "'>";
                        html_code += "<td contenteditable='true' class='item_name'></td>";
                        html_code += "<td contenteditable='true' class='item_email'></td>";
                        html_code += "<td contenteditable='true' class='item_age'></td>";
                        html_code += "<td><button type='button' name='remove' data-row='row" + count +
                            "' class='btn btn-danger btn-xs remove'>-</button></td>";
                        html_code += "</tr>";
                        $('#crud_table').append(html_code);
                    });

                    $(document).on('click', '.remove', function() {
                        var delete_row = $(this).data("row");
                        $('#' + delete_row).remove();
                    });

                    $('#save').click(function() {
                        var item_name = [];
                        var item_email = [];
                        var item_age = [];
                        $('.item_name').each(function() {
                            item_name.push($(this).text());
                        });
                        $('.item_email').each(function() {
                            item_email.push($(this).text());
                        });
                        $('.item_age').each(function() {
                            item_age.push($(this).text());
                        });
                        $.ajax({
                            url: "http://localhost/cias/wp-content/themes/theretailer-child/insert.php",
                            method: "POST",
                            data: {
                                item_name: item_name,
                                item_email: item_email,
                                item_age: item_age,
                            },
                            success: function(data) {
                                alert(data);
                                $("td[contentEditable='true']").text("");
                                for (var i = 2; i <= count; i++) {
                                    $('tr#' + i + '').remove();
                                }
                                fetch_item_data();
                            }
                        });
                    });

                    function fetch_item_data() {
                        $.ajax({
                            url: "http://localhost/cias/wp-content/themes/theretailer-child/fetch.php",
                            method: "POST",
                            success: function(data) {
                                $('#inserted_item_data').html(data);
                            }
                        })
                    }
                    fetch_item_data();

                });
                </script> -->