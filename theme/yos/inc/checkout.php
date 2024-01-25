<?php

/* unset checkout fields */

add_filter( 'woocommerce_checkout_fields' , 'quadlayers_remove_checkout_fields' );

function quadlayers_remove_checkout_fields( $fields ) {

    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_state']);
    unset($fields['order']['order_comments']);
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_address_2']);
    unset($fields['shipping']['shipping_city']);
    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_state']);
    return $fields;

}

/* add custom checkout field */
add_action( 'woocommerce_before_order_notes', 'add_custom_checkout_field' );

function add_custom_checkout_field( $checkout ) {
    $current_user = wp_get_current_user();
    $saved_mid_name = $current_user->billing_mid_name;
    woocommerce_form_field( 'billing_mid_name', array(
        'type' => 'text',
        'class' => '',
        'label' => __('По-батькові', 'yos'),
        'placeholder' => '',
        'required' => true,
        'default' => $saved_mid_name,
    ), $checkout->get_value( 'billing_mid_name' ) );
}


add_action( 'woocommerce_checkout_process', 'validate_new_checkout_field' );

function validate_new_checkout_field() {
    if ( ! $_POST['billing_mid_name'] ) {
        wc_add_notice( '<strong>'.__('По-батькові', 'yos').'</strong> '.__('is a required field.', 'yos'), 'error' );
    }
}

add_action( 'woocommerce_checkout_update_order_meta', 'save_new_checkout_field' );

function save_new_checkout_field( $order_id ) {
    if ( $_POST['billing_mid_name'] ) update_post_meta( $order_id, '_billing_mid_name', esc_attr( $_POST['billing_mid_name'] ) );
}

add_action( 'woocommerce_thankyou', 'show_new_checkout_field_thankyou' );

function show_new_checkout_field_thankyou( $order_id ) {
    if ( get_post_meta( $order_id, '_billing_mid_name', true ) ) echo '<p><strong>'. __('По-батькові', 'yos').': </strong> ' . get_post_meta( $order_id, '_billing_mid_name', true ) . '</p>';
}

add_action( 'woocommerce_admin_order_data_after_billing_address', 'show_new_checkout_field_order' );

function show_new_checkout_field_order( $order ) {
    $order_id = $order->get_id();
    if ( get_post_meta( $order_id, '_billing_mid_name', true ) ) echo '<p><strong>'. __('По-батькові', 'yos').': </strong> ' . get_post_meta( $order_id, '_billing_mid_name', true ) . '</p>';
}

add_action( 'woocommerce_email_after_order_table', 'show_new_checkout_field_emails', 20, 4 );

function show_new_checkout_field_emails( $order, $sent_to_admin, $plain_text, $email ) {
    if ( get_post_meta( $order->get_id(), '_billing_mid_name', true ) ) echo '<p><strong>'. __('По-батькові', 'yos').': </strong> ' . get_post_meta( $order->get_id(), '_billing_mid_name', true ) . '</p>';
}

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );

add_action( 'woocommerce_review_order_and_proceed', 'woocommerce_order_review', 20 );
