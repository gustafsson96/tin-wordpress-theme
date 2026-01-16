<aside class="sidebar">
    <h2>Konst</h2>

    <?php
    // Custom query to display 3 random artworks ('konstverk')
    $sidebar_query = new WP_Query(array(
        'post_type'      => 'konstverk', 
        'posts_per_page' => 3,  
        'orderby'        => 'rand',  
        'post_status'    => 'publish'
    ));

    if ($sidebar_query->have_posts()) :
        while ($sidebar_query->have_posts()) : $sidebar_query->the_post(); ?>
            <!-- Clickable artwork item -->
            <a href="<?php the_permalink(); ?>">
                <article>
                    <!-- Artwork thumbnail -->
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('thumbnail', array('alt' => get_the_title())); ?>
                    <?php endif; ?>
                    <!-- Artwork title -->
                    <div>
                        <h3><?php the_title(); ?></h3>
                    </div>
                </article>
            </a>

        <?php
        endwhile;
        wp_reset_postdata();
    else :
        // Message if no artworks are found
        echo '<p>Inga konstverk att visa just nu.</p>';
    endif;
    ?>
</aside>