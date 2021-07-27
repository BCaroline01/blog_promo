<?php get_header(); ?>

<div class="title_technologies">
<img class="cross1" src="<?php echo get_template_directory_uri(); ?>/img/cross.svg" alt="cross">
	<h1><?php the_title(); ?></h1>
</div>
<div class="techno_all">
    <?php
    $front_end = array(
        'post_type'      => 'techno',
		'tax_query' => array(
            array(
                'taxonomy' => 'category',
				'field' => 'name',
                'terms' => 'Front-end'
            )
        )
    );
	$back_end = array(
        'post_type'      => 'techno',
		'tax_query' => array(
            array(
                'taxonomy' => 'category',
				'field' => 'name',
                'terms' => 'Back-end'
            )
        )
    );
	$PAO = array(
        'post_type'      => 'techno',
		'tax_query' => array(
            array(
                'taxonomy' => 'category',
				'field' => 'name',
                'terms' => 'Logiciels de PAO'
            )
        )
    );

    $front = new WP_Query($front_end);
	$back = new WP_Query($back_end);
	$pao = new WP_Query($PAO);
    ?>
    <div class="front_end">
		<h2>Front-end</h2>
		<div class="logo">
			<?php while ($front->have_posts()) : $front->the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
    </div>
	<div class="back_end">
		<h2>Back-end</h2>
        <div class="logo">
			<?php while ($back->have_posts()) : $back->the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
    </div>
	<div class="pao">
		<h2>Logiciels de PAO</h2>
		<div class="logo">
			<?php while ($pao->have_posts()) : $pao->the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
    </div>
</div>
<div class="background">
<img class="crossfooter" src="<?php echo get_template_directory_uri(); ?>/img/cross.svg" alt="cross">
</div>
<?php get_footer(); ?>