<?php
// *************************************Les fonctions********************************
// *****************Titre et images****************
function ph_supports()
{
    // Ajouter automatiquement le titre du site dans l'en-tête du site
    add_theme_support('title-tag');
    // Ajouter la prise en charge des images mises en avant
    add_theme_support('post-thumbnails');
}
// *****************Ajoute une nouvelle zone de menu**************
function register_menu()
{
    register_nav_menu('header-menu', __('Menu Header'));
}

// ****************************************Ajout du style*******************************************
function ph_register_assets()
{

    // ********************* BOOTSTRAP ********************************
    //style
    // wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');

    //js
    wp_register_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', [], false, true);


    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('jquery');
    wp_enqueue_script('js-file', get_template_directory_uri() . '/js/main.js', array('jquery'));

    // ******************MON STYLE.CSS ******************************
    wp_register_style('style', get_stylesheet_uri());
    wp_enqueue_style('style');
}
function ph_init()
{
    //test Taxonomy
    register_taxonomy('service', ['post', 'page'], [
        'labels' => [
            'name' => 'Service',
            'plural_name' => 'Services',
            'search_items' => 'Rechercher les différents services',
            'all_items' => 'Tous les services',
            'edit_item' => 'Editer le service',
            'update_item' => 'Mettre à jour le service',
            'add_new_item' => 'ajouter un nouveau service',
            'new_item_name' => 'ajouter un nouveau nom au service',
            'menu_name' => 'Service'

        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_cloumn' => true
    ]);
}

// ********************************ADD_ACTION******************************
//init
add_action('init', 'ph_init');
//action qui ajoute le titre du site dans l'entête et la prise en charge des images en avant
add_action('after_setup_theme', 'ph_supports');
//Ajoute une zone de menu
add_action('init', 'register_menu');
// Ajout du style Bootstrap/jquery
add_action('wp_enqueue_scripts', 'ph_register_assets');
// Ajout des apprenants
add_action('init', 'pax_register_post_types');
// Ajout les presentations
add_action('init', 'presentation_register_post_types');
// Ajout les technos
add_action('init', 'techno_register_post_types');

// ********************************CUSTOM_POST_PAX******************************

function pax_register_post_types()
{

    // CPT APPRENANT
    $labels = array(
        'name' => 'Apprenant',
        'all_items' => 'Tous les apprenants',
        'singular_name' => 'apprenant',
        'add_new' => 'Ajouter un apprenant',
        'edit' => 'Modifier un apprenant',
        'menu_name' => 'promo'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-id',
    );

    register_post_type('apprenant', $args);
}


// ********************************CUSTOM_POST_PRESENTATION******************************

function presentation_register_post_types()
{

    // CPT PRESENTATION
    $labels = array(
        'name' => 'presentation',
        'all_items' => 'Toutes les presentations',
        'singular_name' => 'presentation',
        'add_new' => 'Ajouter une presentation',
        'edit' => 'Modifier une presentation',
        'menu_name' => 'presentation'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_position' => 6,
        'menu_icon' => 'dashicons-media-interactive',
    );

    register_post_type('presentation', $args);
}

// ********************************CUSTOM_POST_techno******************************

function techno_register_post_types()
{

    // CPT PRESENTATION
    $labels = array(
        'name' => 'techno',
        'all_items' => 'Toutes les technos',
        'singular_name' => 'techno',
        'add_new' => 'Ajouter une techno',
        'edit' => 'Modifier une techno',
        'menu_name' => 'techno'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_position' => 7,
        'menu_icon' => 'dashicons-hammer',
        'taxonomies' => array('category'),
    );

    register_post_type('techno', $args);
}

// ********************************LENGHT EXCERPT******************************
function custom_excerpt_length($length)
{
    if (is_page('les-articles')) {
        return 50;
    } else {
        return 15;
    }
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);


// ********************BUTTON LOADMORE POAST*************************** //


//add a shortcode 
add_shortcode('ajaxloadmoreblogdemo', 'ajaxloadmoreblogdemo');
function ajaxloadmoreblogdemo($atts, $content = null)
{
    ob_start();
    $atts = shortcode_atts(
        array(
            'post_type' => 'post',
            'initial_posts' => '9',
            'loadmore_posts' => '4',
        ),
        $atts,
    );
    $additonalArr = array();
    $additonalArr['appendBtn'] = true;
    $additonalArr["offset"] = 0; ?>
    <div class="dcsAllPostsWrapper">
    <input type="hidden" name="initial_posts" value="<?= $atts['initial_posts'] ?>">
        <input type="hidden" name="dcsPostType" value="<?= $atts['post_type'] ?>">
        <input type="hidden" name="offset" value="0">
        <input type="hidden" name="dcsloadMorePosts" value="<?= $atts['loadmore_posts'] ?>">
        <div class="dcsDemoWrapper">
            <?php dcsGetPostsFtn($atts, $additonalArr); ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

// set the content 
function dcsGetPostsFtn($atts, $additonalArr = array())
{
    $args = array(
        'post_type' => $atts['post_type'],
        'posts_per_page' => $atts['initial_posts'],
        'offset' => $additonalArr["offset"]
    );

    $allPosts = new WP_Query($args);
    $havePosts = true;
    if ($allPosts->have_posts()) {
        while ($allPosts->have_posts()) {
            $allPosts->the_post(); ?>
            <article class="loadMoreRepeat">
                <?php the_post_thumbnail('medium', ['class' => 'thumbnail', 'alt' => '']); ?>
                <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
                <button><a href="<?php the_permalink(); ?>" class="post_link">Lire la suite</a></button>
            </article>
        <?php
        }
    } else {
        $havePosts = false;
    }
    wp_reset_postdata();

    if ($havePosts && $additonalArr['appendBtn']) { ?>
        <div class="btnLoadmoreWrapper">
            <a href="javascript:void(0);" class="btn btn-primary dcsLoadMorePostsbtn">Charger plus d'articles</a>
        </div>

        <!-- loader for ajax -->
        <div class="dcsLoaderImg" style="display: none;">
            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve" style="
      color: #ff7361;">
                <path fill="#ff7361" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite"></animateTransform>
                </path>
            </svg>
        </div>

        <p class="noMorePostsFound" style="display: none;">No More Posts Found</p>
<?php
    }
}

//enqueue a custom js file which we will use to add our script to load more posts

function dcsEnqueue_scripts() {
    wp_enqueue_script( 'dcsLoadMorePostsScript', get_template_directory_uri() . '/js/loadmoreposts.js', array( 'jquery' ), '20131205', true );
    wp_localize_script( 'dcsLoadMorePostsScript', 'dcs_frontend_ajax_object',
    array( 
    'ajaxurl' => admin_url( 'admin-ajax.php' )
    )
    );
   }
   add_action( 'wp_enqueue_scripts', 'dcsEnqueue_scripts' );

//ajax callback function

add_action("wp_ajax_dcsAjaxLoadMorePostsAjaxReq", "dcsAjaxLoadMorePostsAjaxReq");
add_action("wp_ajax_nopriv_dcsAjaxLoadMorePostsAjaxReq", "dcsAjaxLoadMorePostsAjaxReq");
function dcsAjaxLoadMorePostsAjaxReq()
{
    extract($_POST);
    $additonalArr = array();
    $additonalArr['appendBtn'] = false;
    $additonalArr["offset"] = $offset;
    $atts["initial_posts"] = $dcsloadMorePosts;
    $atts["post_type"] = $postType;
    dcsGetPostsFtn($atts, $additonalArr);
    die();
}
