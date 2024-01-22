<?php
function otherMenu()
{
    register_nav_menu('page-menu', __('My Custom Menu'));
}
add_action('init', 'otherMenu');

?>
<?php

//Style buttons

// Change add to cart text on single product page
add_filter('woocommerce_product_single_add_to_cart_text', 'woocommerce_add_to_cart_button_text_single');
function woocommerce_add_to_cart_button_text_single()
{
    return __('Lägg till produkt', 'woocommerce');
}

// Change add to cart text on product archives page
add_filter('woocommerce_product_add_to_cart_text', 'woocommerce_add_to_cart_button_text_archives');
function woocommerce_add_to_cart_button_text_archives()
{
    return __('Klicka för att komma till produkten / lägga till', 'woocommerce');
}

?>
<?php
/**
 * Apply a coupon for minimum cart total
 */

add_action('woocommerce_before_cart', 'add_coupon_notice');
add_action('woocommerce_before_checkout_form', 'add_coupon_notice');

function add_coupon_notice()
{

    $cart_total = WC()->cart->get_subtotal();
    $minimum_amount = 1050;
    $currency_code = get_woocommerce_currency();
    wc_clear_notices();

    if ($cart_total < $minimum_amount) {
        WC()->cart->remove_coupon('COUPON');
        wc_print_notice("Get 50% off if you spend more than $minimum_amount $currency_code!", 'notice');
    } else {
        WC()->cart->apply_coupon('COUPON');
        wc_print_notice('You just got 50% off your order!', 'notice');
    }
    wc_clear_notices();
}
?>

