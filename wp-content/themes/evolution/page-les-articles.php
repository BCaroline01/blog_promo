<?php get_header(); ?>

<div class="title_articles">
	<h1><?php the_title(); ?></h1>
</div>
<div class="container_post_all">
    <?php the_content() ?>
    
    <div class="category">
          <img class="cross1" src="<?php echo get_template_directory_uri(); ?>/img/cross.svg" alt="cross">
          <?php wp_list_categories();?>
          <img class="cross2" src="<?php echo get_template_directory_uri(); ?>/img/cross.svg" alt="cross">
          <img class="light_line" src="<?php echo get_template_directory_uri(); ?>/img/light_line.svg" alt="lines">
    </div>
</div>

<?php get_footer(); ?>
