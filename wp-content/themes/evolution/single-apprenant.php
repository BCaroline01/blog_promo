<?php get_header(); ?>
    <?php 
    
    while(have_posts()) : the_post(); ?>
    <h1><?php the_title();?></h1>
    <div class="img_diamond">
        <?php the_post_thumbnail('medium_large', ['class' => 'thumbnail', 'alt' => '']); ?>
    </div>
    
    <?php endwhile; ?>

<?php get_footer(); ?>
