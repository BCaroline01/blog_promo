<?php get_header(); ?>
<div>
<?php var_dump(the_category())?>
    <?php echo do_shortcode('[ajaxloadmore post_type="post" initial_posts="4" loadmore_posts="2" cat="'. the_category() .'"]'); ?>
</div>
<?php get_footer(); ?>