<?php

$actions = [
    'add_to_cart',
    'set_cart_item_qty',
    'update_totals',
    'update_mini_cart',
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
    update_totals();

    WC_AJAX :: get_refreshed_fragments();
    wp_die();


}

add_action('wp_ajax_nopriv_add_to_cart', 'add_to_cart');
add_action('wp_ajax_add_to_cart',  'add_to_cart');

/*
*

Set Car Item QTY

*/

function set_cart_item_qty() {

    $key = $_GET['key'];
    $qty = (int)$_GET['qty'];
    WC()->cart->set_quantity( $key, $qty, true  );

    update_totals();

    wp_die();
}

add_action('wp_ajax_nopriv_set_cart_item_qty', 'set_cart_item_qty');
add_action('wp_ajax_set_cart_item_qty', 'set_cart_item_qty');


/**
 *
Update Totals
 */


function update_totals() {

    ob_start();


    WC()->cart->calculate_totals();

    $tax = WC()->cart->get_total_tax();
    $taxes = number_format($tax, 2, ',', ' ');
    $sub = number_format(WC()->cart->subtotal, 2, ',', ' ');
    $total = number_format(WC()->cart->total, 2, ',', ' ');
    $count = WC()->cart->get_cart_contents_count();


    $html = ob_get_clean();

    wp_send_json_success(
        ['totals' => $html,
            'total' => $total . get_woocommerce_currency_symbol(),
            'subtotal' => $sub . get_woocommerce_currency_symbol(),
            'cart_qty' => $count,
            'tax_total' => 'inkl. MwSt. ' .$taxes .get_woocommerce_currency_symbol(),
        ]
    );


    die();
}

add_action('wp_ajax_update_totals', 'update_totals');
add_action('wp_ajax_nopriv_update_totals', 'update_totals');


/**
 *
Update Mini Cart
 */

function update_mini_cart() {
    wc_get_template('cart/mini-cart.php');
    die();
}

add_action('wp_ajax_update_mini_cart', 'update_mini_cart');
add_action('wp_ajax_nopriv_update_mini_cart', 'update_mini_cart');
