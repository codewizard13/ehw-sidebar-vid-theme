<?php get_header(); ?>

<section class="page-wrap">


  <div class="container">


  <button class="btn btn-primary">Click Here</button>
  <button class="btn btn-secondary">btn-secondary</button>


    <h1><?php the_title(); ?></h1>

    <?php get_template_part('includes/section', 'content'); ?>

    <?php get_search_form(); ?>

    <?php get_template_part('includes/part-latest','cars');?>


  </div>

</section>

<?php get_footer(); ?>