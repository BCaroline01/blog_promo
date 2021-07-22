<?php get_header(); ?>
    <?php 
    $args = array(
        'post_type'      => 'apprenant',
     );
    
    $pax = new WP_Query($args);
    
    while($pax->have_posts() ) : $pax->the_post(); ?>
    <div class="img_diamond">
        <?php the_post_thumbnail('medium_large', ['class' => 'thumbnail', 'alt' => '']); ?>
    </div>
    
    <?php endwhile; ?>

<?php get_footer(); ?>
