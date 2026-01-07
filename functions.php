<?php

// Register menu + logotype
add_action('init', 'register_my_menus');
function register_my_menus() {
    register_nav_menus(array(
        'main-nav' => 'Huvudmeny'
    ));
}

// Theme setup
function tinsart_theme_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 60, 
        'width'       => 60, 
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'tinsart_theme_setup');



// Register footer