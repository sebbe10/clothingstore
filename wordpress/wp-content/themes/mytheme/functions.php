<?php
// Detta gör så att man kan lägga till en annan sorts meny
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

// Change add to cart text on product page
add_filter('woocommerce_product_add_to_cart_text', 'woocommerce_add_to_cart_button_text_page');
function woocommerce_add_to_cart_button_text_page()
{
    return __('Klicka för att komma till produkten / lägga till', 'woocommerce');
}
?>