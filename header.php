<?php require_once('init.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php wp_head(); ?>
</head>

<body>


  <header>

    <div class="container">

      <?php
      wp_nav_menu([

        'theme_location' => 'top-menu',
        'menu_class' => 'top-bar',

      ]);
      ?>
    </div>

  </header>


  <!-- Bootstrap5 Navwalker -->
   <!-- REF: https://github.com/AlexWebLab/bootstrap-5-wordpress-navbar-walker -->
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="main-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'top-menu',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?>
        </div>
    </div>
</nav>