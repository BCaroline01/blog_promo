<?php get_header(); ?>
<!-- *****************************BANNER*************************** -->
<section id="home">
    <div class="banner">
        <img class="banner-img" src="<?php echo get_template_directory_uri(); ?>/img/header1.jpg" alt="image du header">
        <div class="title">
            <h1><?php echo get_bloginfo('name'); ?></h1>
            <!-- <div class="ligne"></div> -->
            <!-- <p><?php echo get_bloginfo('description'); ?></p> -->
        </div>
    </div>
</section>

<!-- *****************************Derniers Articles*************************** -->
<section class="container-articles">
    <h2 class="title-h2-front-page">LES DERNIERS ARTICLES</h2>
    <div class="last-articles">
        <?php
        $recentPosts = new WP_Query();
        $recentPosts->query('showposts=3');
        ?>
        <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
            <div class="post">
                <?php the_post_thumbnail('medium', ['class' => 'thumbnail', 'alt' => '']); ?>
                <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                <p class="post__meta">
                    <?php the_excerpt(); ?>
                </p>
                <button><a href="<?php the_permalink(); ?>" class="post_link">Lire la suite</a></button>
            </div>
        <?php endwhile; ?>
    </div>
</section>
<!-- *****************************Avis des Apprenants*************************** -->
<section class="container-reviews">
    <div class="all-reviews">
        <?php
        $args = array(
            'number_post'      => -1,
            'post_type'      => 'apprenant',
        );

        $pax = new WP_Query($args);

        while ($pax->have_posts()) : $pax->the_post(); ?>

            <div id="slider">
                <a href="#" class="control_next">>></a>
                <a href="#" class="control_prev"><</a>
                <ul>
                    <li><?php echo get_fields()['avis']; ?></li>
                    <li><?php echo get_fields()['note']; ?></li>
                </ul>
                
            </div>
            

        <?php endwhile; ?>
    </div>
</section>


<?php get_footer(); ?>