<?php require_once('init.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php wp_head(); ?>
</head>

<body>


  <header>

    <?php 
    wp_nav_menu([

      'theme_location' => 'top-menu',

    ]);
    ?>

  </header>