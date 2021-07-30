<?php get_header(); ?>
<div class="category_post">
    <?php 
    the_category();
    $categories = get_the_category();
    $category = $categories[0]->cat_ID;

    echo do_shortcode('[ajaxloadmore post_type="post" initial_posts="4" loadmore_posts="2" category_id="' . $category . '"]'); ?>
</div>
<?php get_footer(); ?>