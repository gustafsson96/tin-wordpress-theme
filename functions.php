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

    // Enable featured images for pages and posts
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'tinsart_theme_setup');


// CSS and JavaScript
function tinsart_enqueue_scripts() {
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



// Register Custom Post Type: Konstverk (created using Custom Post Type UI)
function register_konstverk_post_type() {
    $labels = array(
        'name'          => 'Konstverk',
        'singular_name' => 'Konstverk',
        'add_new'       => 'Lägg till nytt',
        'add_new_item'  => 'Lägg till nytt konstverk',
        'edit_item'     => 'Redigera konstverk',
        'new_item'      => 'Nytt konstverk',
        'view_item'     => 'Visa konstverk',
        'search_items'  => 'Sök konstverk',
        'not_found'     => 'Inga konstverk hittades',
        'menu_name'     => 'Konstverk',
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'has_archive'   => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-art',
        'supports'      => array('title', 'editor', 'thumbnail', 'custom-fields'),
    );

    register_post_type('konstverk', $args);
}
add_action('init', 'register_konstverk_post_type');



// Register Taxonomy: Konstkategorier (created using Custom Post Type UI + ACF field for image)
function register_konstkategorier_taxonomy() {
    $labels = array(
        'name'          => 'Konstkategorier',
        'singular_name' => 'Konstkategori',
        'search_items'  => 'Sök kategorier',
        'all_items'     => 'Alla kategorier',
        'edit_item'     => 'Redigera kategori',
        'update_item'   => 'Uppdatera kategori',
        'add_new_item'  => 'Lägg till ny kategori',
        'menu_name'     => 'Konstkategorier',
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true, 
        'show_ui'           => true, 
        'show_admin_column' => true, 
        'query_var'         => true,
        'rewrite'           => array('slug' => 'konstkategorier'),
    );

    register_taxonomy('konstkategorier', array('konstverk'), $args);
}
add_action('init', 'register_konstkategorier_taxonomy');