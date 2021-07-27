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
<section class="review" id="slider">
    <div id="before"><</div>
    <div id="slide"></div>
    <?php $posts = get_posts(array(
        'numberposts' => -1,
        'post_type' => 'apprenant',
        ));
        if ($posts) {
            $i = 0;
        foreach ($posts as $post) { 
    ?>
        
    <div class="reviewdiv">
        <h3><?php the_title(); ?></h2>
        <p><?php echo get_fields()['avis']; ?></p>
        <div class="image">
            <?php
                switch (get_fields()['note']) {
                case 0:
            ?>
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt=""  />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <?php
                break;
                case 0.5:
            ?>
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/half_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <?php
                break;
                case 1:
            ?>
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <?php
                break;
                case 1.5:
            ?>
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/half_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <?php
                break;
                case 2:
            ?>
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <?php
                break;
                case 2.5:
            ?>
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/half_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <?php
                break;
                case 3:
            ?>
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <?php
                break;
                case 3.5:
            ?>
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/half_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>img/empty_star.svg" alt="" />
            <?php
                break;
                case 4:
            ?>
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/empty_star.svg" alt="" />
            <?php
                break;
                case 4.5:
            ?>
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/half_star.svg" alt="" />
            <?php
                break;
                case 5:
            ?>
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <img class="img" src="<?php echo get_template_directory_uri(); ?>/img/full_star.svg" alt="" />
            <?php
                break;
                }
            ?>
        </div>
    </div>
    
    <?php }
    } ?>
    <div id="after">></div>
</section>
<?php get_footer(); ?>
<script>
    const next = document.getElementById('after')
    const previous = document.getElementById('before')

    var slide = Array.from(document.getElementsByClassName('reviewdiv'));
    console.log(slide);
    var numero = 0;
    document.getElementById("slide").setAttribute('class', 'sliderDiv');
document.getElementById("slide").innerHTML = slide[0].innerHTML;

    next.addEventListener('click', function() {
        numero = numero + 1;
        if (numero < 0)
            numero = slide.length - 1;
        if (numero > slide.length - 1)
            numero = 0;
        document.getElementById("slide").setAttribute('class', 'sliderDiv');
        document.getElementById("slide").innerHTML = slide[numero].innerHTML;
    })

    previous.addEventListener('click', function() {
        numero = numero + -1;
        if (numero < 0)
            numero = slide.length - 1;
        console.log(numero)
        if (numero > slide.length - 1)
            numero = 0;
        document.getElementById("slide").setAttribute('class', 'sliderDiv');
        document.getElementById("slide").innerHTML = slide[numero].innerHTML;
    })
</script>