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
        'add_new_item'  => 'Lägg till nytt konstverk',
        'edit_item'     => 'Redigera konstverk',
        'not_found'     => 'Inga konstverk hittades',
        'menu_name'     => 'Konstverk',
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'has_archive'   => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-art',
        'supports'      => ['title', 'editor', 'thumbnail', 'custom-fields'],
    );

    register_post_type('konstverk', $args);
}
add_action('init', 'register_konstverk_post_type');

// Art size for CPT artwork
add_action('add_meta_boxes', function () {
    add_meta_box(
        'art_size',
        'Storlek',
        function ($post) {
            $value = get_post_meta($post->ID, 'art_size', true);
            ?>
            <input
                type="text"
                name="art_size"
                value="<?php echo esc_attr($value); ?>"
                placeholder="t.ex. 60 × 80 cm"
                style="width:100%;"
            />
            <?php
        },
        'konstverk',
        'side'
    );
});

add_action('save_post', function ($post_id) {
    if (!isset($_POST['art_size_nonce']) || !wp_verify_nonce($_POST['art_size_nonce'], 'save_art_size')) {
        return;
    }
    if (get_post_type($post_id) !== 'konstverk') return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (wp_is_post_revision($post_id)) return;
    if (isset($_POST['art_size'])) {
        update_post_meta(
            $post_id,
            'art_size',
            sanitize_text_field($_POST['art_size'])
        );
    }
});

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

// Puff for home page
function puff_customizer_settings($wp_customize) {
    $wp_customize->add_section('puff_section', array(
        'title'    => __('Puff Hem', 'tinsart'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('puff_text', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('puff_text_control', array(
        'label'    => __('Text för puff', 'tinsart'),
        'section'  => 'puff_section',
        'settings' => 'puff_text',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'puff_customizer_settings');