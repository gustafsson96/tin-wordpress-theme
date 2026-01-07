<?php get_header(); ?>

<h1><?php single_term_title(); ?></h1>

<main>

    <div class="back-to-gallery">
        <a href="<?php echo esc_url( get_post_type_archive_link('artwork') ); ?>">
            Tillbaka
        </a>
    </div>

    <section class="gallery-section">

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <a class="gallery-card" href="<?php the_permalink(); ?>">

                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php endif; ?>

                    <h2><?php the_title(); ?></h2>

                    <?php
                    $art_size = get_post_meta( get_the_ID(), 'art_size', true );
                    if ( $art_size ) :
                    ?>
                        <p class="art-size"><?php echo esc_html( $art_size ); ?></p>
                    <?php endif; ?>

                </a>

            <?php endwhile; ?>
        <?php else : ?>
            <p>Inga verk i denna kategori ännu.</p>
        <?php endif; ?>

    </section>

    <div class="back-to-gallery">
        <a href="<?php echo esc_url( get_post_type_archive_link('artwork') ); ?>">
            Tillbaka
        </a>
    </div>

</main>

<?php get_footer(); ?>