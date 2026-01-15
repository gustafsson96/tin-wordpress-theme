<?php get_header(); ?>

<main>
    <article class="single-art-page">
        <div class="art-first-row">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
            <?php endif; ?>

            <div class="art-overview">
                <h1><?php the_title(); ?></h1>
                <?php
                $art_size = get_post_meta(get_the_ID(), 'art_size', true);
                if ($art_size) :
                ?>
                    <p class="single-art-size"><?php echo esc_html($art_size); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="art-second-row">
            <div class="second-row-text">
                <h2>Beskrivning</h2>
                <?php the_content(); ?>
            </div>
        </div>
    </article>

    <?php
    $terms = get_the_terms(get_the_ID(), 'konstkategorier');
    if ($terms && ! is_wp_error($terms)) :
        $term_link = get_term_link($terms[0]);
    ?>
        <div class="back-to-gallery">
            <a href="<?php echo esc_url($term_link); ?>">Tillbaka</a>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>