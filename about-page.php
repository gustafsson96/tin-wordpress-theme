<?php
/* Template Name: About Page */
get_header();
?>

<main>
    <article class="about-article">
        <div class="about-content">
            <?php if (has_post_thumbnail()) : ?>
                <div class="about-image">
                    <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                </div>
            <?php endif; ?>
            <div class="about-text">
            <h1><?php the_title(); ?></h1>
                <?php
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>

        <!-- Contact forms and social media links -->
        <div class="contact-section">
            <h2>Kontakta Tin</h2>
            <?php
            if (shortcode_exists('contact-form-7')) {
                echo do_shortcode('[contact-form-7 id="1f8e0db" title="Contact Form"]');
            }
            ?>
        </div>

    </article>
</main>

<?php get_footer(); ?>