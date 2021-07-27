<?php 
// *************************************Les fonctions********************************
// *****************Titre et images****************
function ph_supports () {
    // Ajouter automatiquement le titre du site dans l'en-tête du site
    add_theme_support( 'title-tag' );
    // Ajouter la prise en charge des images mises en avant
    add_theme_support( 'post-thumbnails' );
}
// *****************Ajoute une nouvelle zone de menu**************
function register_menu(){
    register_nav_menu('header-menu', __( 'Menu Header'));
}

// ****************************************Ajout du style*******************************************
function ph_register_assets () {
     // ******************* FONTS ***********************************
     
     // ********************* BOOTSTRAP ********************************
     //style
    // wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');

    //js
    wp_register_script('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper','https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', [], false, true);
    //jquery
    wp_deregister_script('jquery');
    wp_register_script('jquery','https://code.jquery.com/jquery-3.5.1.slim.min.js', [], false, true);
    wp_register_script('fontawesome', 'https://kit.fontawesome.com/5458cc12a8.js',[], false, true);

    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('fontawesome');
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'js-file', get_template_directory_uri() . '/main.js', array('jquery'));

    // ******************MON STYLE.CSS ******************************
    wp_register_style('style', get_stylesheet_uri());
    wp_enqueue_style('style');
}
function ph_init(){
    //test Taxonomy
    register_taxonomy('service', ['post', 'page'],[
        'labels' => [
            'name' => 'Service',
            'plural_name' => 'Services',
            'search_items' => 'Rechercher les différents services',
            'all_items' => 'Tous les services',
            'edit_item' => 'Editer le service',
            'update_item' => 'Mettre à jour le service',
            'add_new_item' => 'ajouter un nouveau service',
            'new_item_name'=> 'ajouter un nouveau nom au service',
            'menu_name' => 'Service'

        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_cloumn'=> true
    ]);
}

// ********************************ADD_ACTION******************************
//init
add_action('init', 'ph_init');
//action qui ajoute le titre du site dans l'entête et la prise en charge des images en avant
add_action('after_setup_theme', 'ph_supports');
//Ajoute une zone de menu
add_action('init', 'register_menu');
// Ajout du style Bootstrap
add_action( 'wp_enqueue_scripts', 'ph_register_assets');
// Ajout des apprenants
add_action( 'init', 'pax_register_post_types' );

// ********************************CUSTOM_POST_PAX******************************

function pax_register_post_types() {

    // CPT Portfolio
    $labels = array(
    'name' => 'Apprenant',
    'all_items' => 'Tous les apprenants', // affiché dans le sous menu
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
    'supports' => array( 'title', 'editor','thumbnail'),
    'menu_position' => 5,
    'menu_icon' => 'dashicons-id',
    );
    
    register_post_type( 'apprenant', $args );
    }

// ********************************LENGHT EXCERPT******************************
    function custom_excerpt_length( $length ) {
        return 15;
        }
        add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );