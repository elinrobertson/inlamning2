<?php

remove_action('woocommerce_sidebar', 'remove_sidebar');

function remove_sidebar() {
    return false;
}

add_filter('is_active_sidebar', 'remove_sidebar', 10, 2);

function my_remove_product_result_count() {
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
}

add_action('after_setup_theme', 'my_remove_product_result_count', 99);


function my_remove_catalog_ordering() {
    remove_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10);
}
add_action('after_setup_theme', 'my_remove_catalog_ordering', 99);


function free_shipping() {
    echo '<div class="shippinginfo">'."Fri frakt vid köp över 299 kr".'</div>';
}

add_action('storefront_before_content', 'free_shipping');

function register_menu()
{
    $menus = array(
    'undermeny' => 'Undermeny',
    );
    register_nav_menus($menus);
}

add_action('init', 'register_menu');

?>