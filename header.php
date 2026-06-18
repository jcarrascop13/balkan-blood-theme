<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="navbar">
  <div class="nav-container">

    <div class="brand">
      <a href="<?php echo home_url(); ?>">
        <?php bloginfo('name'); ?>
      </a>
    </div>

    <nav class="nav-menu">
      <?php
        wp_nav_menu(array(
          'theme_location' => 'menu-principal',
          'container' => false,
          'menu_class' => 'menu'
        ));
      ?>
    </nav>

  </div>
</header>