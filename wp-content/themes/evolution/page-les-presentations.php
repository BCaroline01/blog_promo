<?php get_header(); ?>

<div class="title_presentations">
    <img class="light_cross1" src="<?php echo get_template_directory_uri(); ?>/img/cross_light.svg" alt="cross">
	<h1><?php the_title(); ?></h1>
    <img class="light_cross2" src="<?php echo get_template_directory_uri(); ?>/img/cross_light.svg" alt="cross">
</div>
<div class="presentation_all">
    <?php
    $args = array(
        'post_type'      => 'presentation',
    );

    $pres = new WP_Query($args);
    ?>

    <div class="presentation_container">
        <?php while ($pres->have_posts()) : $pres->the_post(); ?>
            <div class="presentation">
                    <?php the_title(); ?>
                    <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>