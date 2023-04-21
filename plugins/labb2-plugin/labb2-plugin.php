<?php
/*
Plugin Name: Labb2 plugin
*/

function style_button()
{
    echo "
    <style type='text/css'>
    .button_container {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        padding-top: 25px;
        padding-right: 25px;
        font-size: 1.7rem;
    }
    .labb2_button {
        all: unset;
        cursor:pointer;
    }
    .remove_labb2_button {
        all: unset;
        cursor:pointer;
    }

    a.button.wp-element-button.product_type_variable.add_to_cart_button {
        color: #43454b;
    }
    a.cart-contents::after {
        color: orange;
    }

    </style>
    ";
}

add_action('init', 'style_button');

function labb2_css()
{
    echo "
    <style type='text/css'>
    .button_container {
    background-color: rgb(41, 41, 41);
    }
    .labb2_button {
        all: unset;
        cursor:pointer;
        color: white;
        font-size: 1.7rem;
    }
    .remove_labb2_button {
        all: unset;
        cursor:pointer;
        color: white;
        font-size: 1.7rem;
    }

    #masthead {
    background-color: rgb(41, 41, 41);
    color: white;
    }
    #page {
    background-color: rgb(41, 41, 41);
    }
    #colophon {
    background-color: rgb(41, 41, 41);
    color: white;

    }
    a {
    color: white;
    }
    h1, h2, h3, h4, h5, h6, div.shippinginfo {
        color: white;
    }
    .main-navigation ul li a {
        color: white;  
    }
    .side-header-cart {
        color: white; 
    }

    .woocommerce-Price-currencySymbol {
        color: white;
    }
    .woocommerce-Price-amount {
        color: white;
    }

    .count {
        color: white;  
    }

    a.cart-contents::after {
        color: orange;
    }

    a.button.wp-element-button.product_type_variable.add_to_cart_button {
        color: #43454b;
    }


    </style>
    ";
}

function activate_labb2_css()
{
    setcookie('labb2_css', '1', time() + 3600 * 24 * 30, '/');
    add_action('wp_head', 'labb2_css');
}
function deactivate_labb2_css()
{
    setcookie('labb2_css', '', time() - 3600, '/');
    unset($_COOKIE['labb2_css']);
}
if (isset($_POST['labb2_button'])) {
    activate_labb2_css();
} elseif (isset($_POST['remove_labb2_button'])) {
    deactivate_labb2_css();
}
if (isset($_COOKIE['labb2_css'])) {
    add_action('wp_head', 'labb2_css');
}

?>


<!-- Create a button or link to trigger the request -->
<div class="button_container">
    <form method="post">
        <input type="hidden" name="labb2_button" value="1" />
        <button type="submit" class="labb2_button"><i class="fa-solid fa-moon"></i></button>
    </form>
    <form method="post">
        <input type="hidden" name="remove_labb2_button" value="1" />
        <button type="submit" class="remove_labb2_button"><i class="fa-solid fa-sun"></i></button>
    </form>
</div>

<script src="https://kit.fontawesome.com/d07cbe297a.js" crossorigin="anonymous"></script>