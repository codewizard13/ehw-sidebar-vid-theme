<?php get_header(); ?>

<section class="page-wrap">
  <div class="container">



        <h1>Search Results for '<?php echo get_search_query(); ?>'</h1>

        <?php get_template_part('includes/section', 'archive'); ?>

        <?php get_template_part('includes/part', 'pagination-archive'); ?>




  </div>
</section>


<?php get_footer(); ?>