<?php get_header(); ?>

<main>
    <h1><?php single_term_title(); ?></h1>
    <section class="gallery-section">

        <?php
        // Selected taxonomy term
        $term = get_queried_object();
        // Custom query to get all artworks from selected category 
        $args = [
            'post_type' => 'konstverk',
            'posts_per_page' => -1,
            'tax_query' => [
                [
                    'taxonomy' => 'konstkategorier',
                    'field'    => 'term_id',
                    'terms'    => $term->term_id,
                ],
            ],
        ];
        $konstverk_query = new WP_Query($args);

        // Loop through artworks and display gallery cards
        if ($konstverk_query->have_posts()) :
            while ($konstverk_query->have_posts()) : $konstverk_query->the_post();

                // Get artwork size from custom meta field
                $art_size = get_post_meta(get_the_ID(), 'art_size', true);

                // Featured image with fallback
                if (has_post_thumbnail()) {
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                } else {
                    $image_url = get_template_directory_uri() . '/images/fallback.jpg';
                }
        ?>
        <!-- Single artwork card linking to individual artwork page -->
                <a class="gallery-card" href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    <h2><?php the_title(); ?></h2>
                    <?php if ($art_size) : ?>
                        <p class="art-size"><?php echo esc_html($art_size); ?></p>
                    <?php endif; ?>
                </a>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            // Display if no artworks were found
            echo '<p>Inga verk i denna kategori ännu.</p>';
        endif;
        ?>
    </section>

    <!-- Back to gallery button -->
    <div class="back-to-gallery">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('konst'))); ?>">Tillbaka</a>
    </div>

</main>

<?php get_footer(); ?>