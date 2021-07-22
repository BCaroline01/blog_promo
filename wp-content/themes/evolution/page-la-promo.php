<?php get_header(); ?>
<h1>LA PROMO</h1>
<div class="pax">
    <?php
    $args = array(
        'post_type'      => 'apprenant',
    );

    $pax = new WP_Query($args);

    while ($pax->have_posts()) : $pax->the_post(); ?>

        <div class="diamond">
            <a href="<?php the_permalink() ?>">
                <?php the_post_thumbnail('medium_large', ['class' => 'diamond_img', 'alt' => '']); ?>
                <div class="overlay">
                    <div class="text"><?php the_excerpt(); ?></div>
                </div>
            </a>
        </div>

    <?php endwhile; ?>
</div>
<?php get_footer(); ?>