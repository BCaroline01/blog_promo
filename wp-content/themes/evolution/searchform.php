<form class="content_search" action="<?php echo home_url( '/' ); ?>" method="get">
    <input type="text" class="input_search" name="input_search" id="search" value="<?php the_search_query(); ?>" />
    <button type="reset" class="search"></button>
</form>

