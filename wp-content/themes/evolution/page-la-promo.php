<?php get_header(); ?>
<div class="title_promo">
    <img class="cross1" src="<?php echo get_template_directory_uri(); ?>/img/cross.svg" alt="cross">
    <h1>LA PROMO</h1>
</div>

<div class="promo">
    <?php
    $args = array(
        'post_type'      => 'apprenant',
    );

    $pax = new WP_Query($args);
    ?>
    <div class="diamond_container">
        <?php while ($pax->have_posts()) : $pax->the_post(); ?>

            <div class="diamond">
                <a href="<?php the_permalink() ?>">
                    <?php the_post_thumbnail('medium_large', ['class' => 'diamond_img', 'alt' => '']); ?>
                    <div class="overlay">
                        <?php the_excerpt(); ?>
                    </div>
                </a>
            </div>

        <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>