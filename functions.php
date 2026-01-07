<?php

// Register menu + logotype
add_action('init', 'register_my_menus');
function register_my_menus()
{
    register_nav_menus(array(
        'main-nav' => 'Huvudmeny'
    ));
}

// Theme setup
function tinsart_theme_setup()
{
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 60,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Enable featured images for pages and posts
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'tinsart_theme_setup');



// Register footer

// CSS and JavaScript

function tinsart_enqueue_scripts()
{
    wp_enqueue_style(
        'tinsart-style',
        get_template_directory_uri() . '/css/styles.css',
        array(),
        filemtime(get_template_directory() . '/css/styles.css')
    );
    wp_enqueue_script(
        'tinsart-script',
        get_template_directory_uri() . '/js/script.js',
        array(),
        filemtime(get_template_directory() . '/js/script.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'tinsart_enqueue_scripts');