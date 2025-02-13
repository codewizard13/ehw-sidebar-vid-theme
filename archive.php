<?php get_header(); ?>

<div class="container">

  <?php get_template_part( 'includes/section', 'archive'); ?>

  <?php the_posts_pagination( [ 
  
    'mid_size' => 2,
    'prev_text' => __( 'Previous Page', 'textdomain' ),
    'next_text' => __( 'Next Page', 'textdomain' ),
  
  
  ]);  
  ?>

</div>


<?php get_footer(); ?>