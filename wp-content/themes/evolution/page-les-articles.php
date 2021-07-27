<?php get_header(); ?>

<div class="title_articles">
	<h1><?php the_title(); ?></h1>
</div>
<div class="search_bar">
    <?= get_search_form() ?>
</div>
<div class="container_post_all">
    <div class="post_all">
    <?php the_content() ?>
    </div>
    <div class="category">
          <h2>Catégorie</h2>
          <img class="cross1" src="<?php echo get_template_directory_uri(); ?>/img/cross.svg" alt="cross">
          <p>Liste des catégories</p>
          <img class="cross2" src="<?php echo get_template_directory_uri(); ?>/img/cross.svg" alt="cross">
          <img class="light_line" src="<?php echo get_template_directory_uri(); ?>/img/light_line.svg" alt="lines">
    </div>
</div>

<?php get_footer(); ?>
