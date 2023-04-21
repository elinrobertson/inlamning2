<?php
/*
Plugin Name: Labb2 plugin
*/

function labb2_css()
{
    echo "
    <style type='text/css'>
    #masthead {
    background-color: rgb(41, 41, 41);
    }
    #page {
    background-color: rgb(41, 41, 41);
    }
    #colophon {
    background-color: rgb(41, 41, 41);
    }
    a {
    color: white;
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
<form method="post">
    <input type="hidden" name="labb2_button" value="1" />
    <button type="submit"><i class="fa-solid fa-moon"></i></button>
</form>
<form method="post">
    <input type="hidden" name="remove_labb2_button" value="1" />
    <button type="submit"><i class="fa-solid fa-sun"></i></button>
</form>

<script src="https://kit.fontawesome.com/d07cbe297a.js" crossorigin="anonymous"></script>