<?php
/*
Template Name: Contact Us
*/
?>

<?php get_header(); ?>

<div class="container">

  <h1><?php the_title(); ?></h1>

  <div class="row">

  <!-- Left Column -->
    <div class="col-lg-6">
      This is where the contact form goes
    </div>

    <!-- Right Column -->
    <div class="col-lg-6">
      This is the contact page
    </div>

  </div>

  <?php get_template_part( 'includes/section', 'content'); ?>

</div>


<?php get_footer(); ?>