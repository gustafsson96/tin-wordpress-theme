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
    </article>
</main>

<?php get_footer(); ?>