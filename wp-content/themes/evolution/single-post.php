<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="single_post">
      <div class="title">
        <h1><?php the_title(); ?></h1>
        <div class="data_single_post">
          <p><?php the_author(); ?> | <?php the_date(); ?> | <?php the_category(); ?> | <?php the_tags(); ?></p>
        </div>
      </div>
      <div class="container_single_post">
        <div class="post_content">
          <?php the_content(); ?>
        </div>
        <div class="category">
          <h2>Catégorie</h2>
          <img class="cross1" src="<?php echo get_template_directory_uri(); ?>/img/cross.svg" alt="cross">
          <p>Liste des catégories</p>
          <img class="cross2" src="<?php echo get_template_directory_uri(); ?>/img/cross.svg" alt="cross">
          <img class="light_line" src="<?php echo get_template_directory_uri(); ?>/img/light_line.svg" alt="lines">
      </div>
    </article>
    <div class="pagination">
      <p><?php previous_post_link()?></p>
      <p><?php next_post_link() ?></p>
    </div>

<?php endwhile;
endif; ?>
<?php get_footer(); ?>