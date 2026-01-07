<?php
/* Template Name: Art Page */
get_header();
?>

<main>
    <h1>Galleri</h1>
    <section class="gallery-overview-section">
        <?php
        // Get all terms for custom artwork taxonomy
        $terms = get_terms([
            'taxonomy'   => 'konstkategorier',
            'hide_empty' => false,
            'orderby'    => 'term_id',
            'order'      => 'ASC',
        ]);

        if (! empty($terms) && ! is_wp_error($terms)) :

            foreach ($terms as $term) :

                // Check if ACF function exists
                if (function_exists('get_field')) {
                    $image_url = get_field('konst_bild', $term);
                } else {
                    $image_url = '';
                }

                // Fallback image if no image is set
                if (! $image_url) {
                    $image_url = get_template_directory_uri() . '/images/fallback.jpg';
                }
        ?>
                <a class="gallery-overview-card" href="<?php echo esc_url(get_term_link($term)); ?>">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($term->name); ?>">
                    <h2><?php echo esc_html($term->name); ?></h2>
                </a>
        <?php
            endforeach;

        else :
            echo '<p>Inga kategorier hittades.</p>';
        endif;
        ?>
    </section>
</main>

<?php get_footer(); ?>