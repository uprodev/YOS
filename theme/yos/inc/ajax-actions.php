<?php

$actions = [
    'add_to_cart',
    'set_cart_item_qty',
    'update_totals',
    'update_mini_cart',
    'remove_from_cart',
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
    die();
}
