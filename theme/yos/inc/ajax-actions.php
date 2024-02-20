<?php

$actions = [
    'add_to_cart',
    'set_cart_item_qty',
    'update_totals',
    'update_mini_cart',
    'remove_from_cart',
    'apply_coupon',
    'add_to_fav',
    'qty_cart'
];

foreach($actions as $action){
    add_action('wp_ajax_'.$action, $action);
    add_action('wp_ajax_nopriv_'.$action, $action);
}


/**
 * add_to_cart
 */


function add_to_cart() {
    $product_id = (int)$_GET['product_id'];
    $variation_id = (int)$_GET['variation_id'];
    $qty = (int)$_GET['qty']??1;


    $added = WC()->cart->add_to_cart($product_id, $qty, $variation_id);

    wp_die();


}


/**
 * change qty
 */


function qty_cart(){

    $cart_item_key = $_GET['hash'];
    $product_values = WC()->cart->get_cart_item($cart_item_key);
    $product_quantity = apply_filters('woocommerce_stock_amount_cart_item', apply_filters('woocommerce_stock_amount', preg_replace("/[^0-9\.]/", '', filter_var($_GET['quantity'], FILTER_SANITIZE_NUMBER_INT))), $cart_item_key);
    $passed_validation  = apply_filters('woocommerce_update_cart_validation', true, $cart_item_key, $product_values, $product_quantity);


    if ($passed_validation) {
        WC()->cart->set_quantity($cart_item_key, $product_quantity, true);
    }

    die();
}


/**
 *
Update Mini Cart
 */

function update_mini_cart() {

    wc_get_template('cart/mini-cart.php');

    die();
}


/**
 * remove_from_cart
 */



function remove_from_cart() {

    WC()->cart->remove_cart_item( $_GET['key'] );
    wp_send_json([
        'count' => WC()->cart->get_cart_contents_count()
    ]);

    die();
}

/**
 *
Update Totals
 */


function update_totals() {

    ob_start();


    WC()->cart->calculate_totals();

    $sub = WC()->cart->get_cart_subtotal();
    $count = WC()->cart->get_cart_contents_count();


    $html = ob_get_clean();

    wp_send_json_success(
        [
            'cart_qty' => $count,
            'subtotal' => $sub,
        ]
    );


    die();
}


/* apply_coupon */

function apply_coupon(){

    $coupon = $_POST['coupon'];

    $coupon_code = wc_get_coupon_id_by_code($coupon);
    if ($coupon_code) {
        WC()->cart->apply_coupon($coupon);

        $total = WC()->cart->get_cart_total();
        $discount = WC()->cart->get_cart_discount_total();

        wp_send_json(['message' => __('промокод успішно застосуваний', 'yos'),
            'total' => $total,
            'discount' => $discount,
        ]);
    }else{
        $total = WC()->cart->get_cart_total();
        $discount = WC()->cart->get_cart_discount_total();
        wp_send_json(['message' => '<span class="text-color-warning">'.__('Термін дії промокоду закінчено або його не існує!', 'yos').'</span>',
            'total' => $total,
            'discount' => $discount,
        ]);
    }

    die();
}


/* add to fav*/

function add_to_fav() {
    $user_id = $_POST['user_id'];
    $fav = $_POST['fav'];
    update_field('fav',$fav, 'user_'.$user_id);


    wp_die();
}


