<?php get_header(); ?>

<div class="title_articles">
	<h1><?php the_title(); ?></h1>
</div>
<div class="search_bar">
    <?= get_search_form() ?>
</div>
<div class="container_post_all">
    <div class="post_all">
    <?php $allPosts = new WP_Query();
        $allPosts->query(array('DESC', 'posts_per_page' => 9));
    
        while ($allPosts->have_posts()) : $allPosts->the_post(); ?>
            <article>
                <?php the_post_thumbnail('medium', ['class' => 'thumbnail', 'alt' => '']); ?>
                <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
                <button><a href="<?php the_permalink(); ?>" class="post_link">Lire la suite</a></button>
            </article>    
    <?php endwhile;?>
    </div>
    <div class="category">
          <h2>Catégorie</h2>
          <img class="cross1" src="<?php echo get_template_directory_uri(); ?>/img/cross.svg" alt="cross">
          <p>Liste des catégories</p>
          <img class="cross2" src="<?php echo get_template_directory_uri(); ?>/img/cross.svg" alt="cross">
          <img class="light_line" src="<?php echo get_template_directory_uri(); ?>/img/light_line.svg" alt="lines">
    </div>
</div>
<?php
if (  $allPosts->max_num_pages > 1 )
	echo '<button class="loadmore">Charger plus d\'articles</button>';
?>


<?php get_footer(); ?>
<script>


</script>