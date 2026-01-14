<?php
/* Template Name: About Page */
get_header();
?>

<main>
    <article class="about-article">
        <h1><?php the_title(); ?></h1>
        <div class="about-content">

            <?php if (has_post_thumbnail()) : ?>
                <div class="about-image">
                    <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                </div>
            <?php endif; ?>

            <div class="about-text">
                <?php
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>

        <!-- Contact forms and social media links -->
        <div class="contact-section">
            <h2>Kontakta mig</h2>
            <?php
            if (shortcode_exists('contact-form-7')) {
                echo do_shortcode('[contact-form-7 id="228ab2a" title="Contact Form"]');
            }
            ?>
        </div>

    </article>
</main>

<?php get_footer(); ?>