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

     // ********************* BOOTSTRAP ********************************
     //style
    // wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');

    //js
    wp_register_script('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper','https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', [], false, true);


    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'js-file', get_template_directory_uri() . '/main.js', array('jquery'));

    // ******************MON STYLE.CSS ******************************
    wp_register_style('style', get_stylesheet_uri());
    wp_enqueue_style( 'style');
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
// Ajout du style Bootstrap/jquery
add_action( 'wp_enqueue_scripts', 'ph_register_assets');
// Ajout des apprenants
add_action( 'init', 'pax_register_post_types' );
// Ajout les presentations
add_action( 'init', 'presentation_register_post_types' );
// Ajout les technos
add_action( 'init', 'techno_register_post_types' );

// ********************************CUSTOM_POST_PAX******************************

function pax_register_post_types() {

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
    'supports' => array( 'title', 'editor','thumbnail'),
    'menu_position' => 5,
    'menu_icon' => 'dashicons-id',
    );
    
    register_post_type( 'apprenant', $args );
    }


    // ********************************CUSTOM_POST_PRESENTATION******************************

function presentation_register_post_types() {

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
    'supports' => array( 'title', 'editor','thumbnail'),
    'menu_position' => 6,
    'menu_icon' => 'dashicons-media-interactive',
    );
    
    register_post_type( 'presentation', $args );
    }

      // ********************************CUSTOM_POST_techno******************************

function techno_register_post_types() {

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
    'supports' => array('title', 'editor','thumbnail'),
    'menu_position' => 7,
    'menu_icon' => 'dashicons-hammer',
    'taxonomies' => array( 'category' ),
    );
    
    register_post_type( 'techno', $args );
    }

// ********************************LENGHT EXCERPT******************************
    function custom_excerpt_length( $length ) {
        if(is_page('les-articles')){
            return 50;
        }else{
           return 15; 
        }
    }
        add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// ********************************BUTTON LOAD MORE ******************************

function my_load_more_scripts() {
 
	global $wp_query; 
 
	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/main.js', array('jquery'));
 
	//pass parameters to main.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'loadmore_params', array(
        'root' => esc_url_raw( rest_url() ),
        'nonce' => wp_create_nonce( 'wp_rest' ),
		'ajaxurl' => site_url() . '/wp-json/wp/v2/posts', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 	wp_enqueue_script( 'my_loadmore' );
}

add_action( 'wp_enqueue_scripts', 'my_load_more_scripts' );

// ********************************AJAX****************************** //

function loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
	if( have_posts() ) :
		// run the loop
		while( have_posts() ): the_post();
              echo '<article>'.
            the_post_thumbnail('medium', ['class' => 'thumbnail', 'alt' => '']); 
            echo  '<h3><a href="'. the_permalink().'" rel="bookmark">'. the_title().'; </a></h3>'.
            the_excerpt();
            echo' <button><a href="'.the_permalink().';" class="post_link">Lire la suite</a></button></article>' ;
             endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); // wp_ajax_nopriv_{action}