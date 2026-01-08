<?php get_header(); ?>

<main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article class="article-container">
        <h1><?php the_title(); ?></h1>
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
        <?php endif; ?>
        <div class="article-text">
            <p class="article-date"><?php echo get_the_date('Y-m-d H:i'); ?></p>
            <div class="article-content">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="back-to-gallery">
            <a href="<?php echo esc_url( home_url('/') ); ?>">Tillbaka</a>
        </div>
    </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>