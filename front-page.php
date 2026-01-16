<?php
/* Template Name: Start Page */
get_header();
?>

<!-- Slideshow -->
<?php
echo do_shortcode('[smartslider3 slider="3"]');
?>

<!-- Puff -->
<?php $puff_text = get_theme_mod('puff_text'); ?>

<?php if (!empty($puff_text)) : ?>
    <div class="puff-banner">
        <?php echo esc_html($puff_text); ?>
    </div>
<?php endif; ?>

<main>
    <h1>Hem</h1>
    <div class="sp-main">

        <!-- Latest news section -->
        <section class="news-container">
            <h2>Senaste nytt</h2>

            <?php
            // Query to get latest 3 posts from "nyheter"
            $news_query = new WP_Query(array(
                'posts_per_page' => 3,
                'post_status'    => 'publish',
                'category_name' => 'nyheter',
            ));

            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post(); ?>
                    <article>
                        <!-- Display featured image if available -->
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                        <?php endif; ?>
                        <!-- Title -->
                        <h3><?php the_title(); ?></h3>
                        <p>
                            <!-- Trim article -->
                            <?php echo wp_trim_words(get_the_content(), 30, ' [...]'); ?>
                        </p>
                        <!-- Read more button -->
                        <div class="read-more">
                            <a href="<?php the_permalink(); ?>" aria-label="Läs mer om <?php the_title(); ?>">Läs mer</a>
                        </div>
                    </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Message if no news are found
                echo '<p>Inga nyheter att visa just nu.</p>';
            endif;
            ?>
        </section>

        <!-- Include sidebar to display art -->
        <?php get_sidebar(); ?>

    </div>
</main>

<?php get_footer(); ?>