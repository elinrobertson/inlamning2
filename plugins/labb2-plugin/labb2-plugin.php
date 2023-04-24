<?php
/*
Plugin Name: Labb2 plugin
Description: Changing between light and dark mode
*/

//Wrappar upp hela plugin:et så att det inte gäller i Adminpanelen
//Det ska bara vara på själva websidan som det går att ändra färg

if(!is_admin()) {

    //Sätter css för plugin knapparna som man ska använda för att skifta mellan färgtemat
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

    a.checkout-button.button.alt.wc-forward.wp-element-button {
        background: rgb(204,251,63);
        background: radial-gradient(circle, rgba(204,251,63,1) 0%, rgba(95,252,70,1) 100%); 
    }
    </style>
    ";
}

add_action('init', 'style_button');

//Sätter inställningar för det mörka färgtemat
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

    button.single_add_to_cart_button.button.alt.wp-element-button {
        background-color: white;
        color: #43454b;
    }

    a.checkout-button.button.alt.wc-forward.wp-element-button {
        background: rgb(204,251,63);
        background: radial-gradient(circle, rgba(204,251,63,1) 0%, rgba(95,252,70,1) 100%);
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


<!--Skapar knappen som ska kunna byta färg på webbsidan -->
<div class="button_container">
    <form method="post">
        <input type="hidden" name="labb2_button" value="1" />
        <button type="submit" class="labb2_button" onclick="event.stopPropagation();"><i class="fa-regular fa-moon"></i></button>
    </form>
    <form method="post">
        <input type="hidden" name="remove_labb2_button" value="1" />
        <button type="submit" class="remove_labb2_button" onclick="event.stopPropagation();"><i class="fa-solid fa-sun"></i></button>
    </form>
</div>


<?php } ?> 

<script src="https://kit.fontawesome.com/d07cbe297a.js" crossorigin="anonymous"></script>