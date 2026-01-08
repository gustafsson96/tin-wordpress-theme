<?php get_header(); ?>

<main>
    <h1>Hem</h1>
    <div class="sp-main">
        <!-- Latest news -->
        <section class="news-container">
            <h2>Senaste nytt</h2>

            <?php
            // Query latest 3 posts
            $news_query = new WP_Query(array(
                'posts_per_page' => 3,
                'post_status'    => 'publish',
                'category_name' => 'nyheter',
            ));

            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post(); ?>
                    <article>
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                        <p>
                            <?php echo wp_trim_words(get_the_content(), 30, ' [...]'); ?>
                        </p>
                        <div class="read-more">
                            <a href="<?php the_permalink(); ?>">Läs mer</a>
                        </div>
                    </article>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Inga nyheter att visa just nu.</p>';
            endif;
            ?>
        </section>

        <!-- Include sidebar to display art -->
        <?php get_sidebar(); ?>

    </div>
</main>

<?php get_footer(); ?>