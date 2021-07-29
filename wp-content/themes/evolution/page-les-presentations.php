<?php get_header(); ?>
<div class="page_pres">
    <div class="title_presentations">
        <img class="light_cross1" src="<?php echo get_template_directory_uri(); ?>/img/cross_light.svg" alt="cross">
        <h1><?php the_title(); ?></h1>
        <img class="light_cross2" src="<?php echo get_template_directory_uri(); ?>/img/cross_light.svg" alt="cross">
    </div>
    <div class="presentation_all">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type'      => 'presentation',
            'posts_per_page' => 6,
            'paged'          => $paged
        );

        $pres = new WP_Query($args);
        if ($pres->have_posts()) :
        ?>

            <div class="presentation_container">
                <?php while ($pres->have_posts()) : $pres->the_post(); ?>
                    <div class="presentation">
                        <?php the_post_thumbnail('medium_large', ['class' => 'thumbnail', 'alt' => '']); ?>
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            </div>
    </div>
    <div class="pagination_pres">
        <ul>
            <li><?php previous_posts_link('&laquo; précédent', $pres->max_num_pages) ?></li>
            <li><?php next_posts_link('suivant &raquo;', $pres->max_num_pages) ?></li>
        </ul>
    </div>
<?php endif; ?>
</div>
<?php get_footer(); ?>