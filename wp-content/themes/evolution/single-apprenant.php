<?php get_header(); ?>
    <?php 
    
    while(have_posts() ) : the_post(); ?>
    <div class="img_diamond">
        <p>lkzbmozribgeroghyoeot(iym</p>
        <?php the_post_thumbnail('medium_large', ['class' => 'thumbnail', 'alt' => '']); ?>
    </div>
    
    <?php endwhile; ?>

<?php get_footer(); ?>
