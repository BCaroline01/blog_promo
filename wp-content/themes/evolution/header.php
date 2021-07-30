<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="blog promo">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(). '/sass/style.css';?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="header">
      <div class="upperbar">
        <nav class="barnav">
          <div class="logo_container">
            <a href="<?php echo home_url('/'); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo">
            </a>
            <!-- <p><a href="<?php the_permalink() ?>"><?php echo get_bloginfo('name'); ?></a></p>  -->
          </div>
          <?php
          if (has_nav_menu('header-menu')) {
            wp_nav_menu(
              array(
                'theme_location' => 'header-menu',
                'menu_class' => 'menu-main-menu'
              )
            );
          }
          ?>
        </nav>
      </div>
    </header>
    <?php wp_body_open(); ?>