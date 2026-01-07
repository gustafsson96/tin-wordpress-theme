<!-- Basic index.php-file for fallback that loops through blog posts -->
<?php get_header(); ?>

<main>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
    ?>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
    <?php
        }
    }
    ?>
</main>

<?php get_footer(); ?>