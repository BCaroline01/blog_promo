<?php get_header(); ?>
<div class="apprenant_page">
    <?php 
    
    while(have_posts()) : the_post(); ?>
    <div class="img_pres">
        <img class="diamond_blue" src="<?php echo get_template_directory_uri(); ?>/img/diamond_blue.svg" alt="diamond blue">
        <div class="img_diamond">
            
            <?php the_post_thumbnail('medium_large', ['class' => 'thumbnail', 'alt' => '']); ?>
        </div>
    </div>
    <?php the_content(); ?>    
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>
