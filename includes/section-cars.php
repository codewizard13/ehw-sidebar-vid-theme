<?php if ( have_posts() ): while( have_posts() ): the_post(); ?>


  <?php the_content(); ?>

  <?php
  $fname = get_the_author_meta('first_name');
  $lname = get_the_author_meta('last_name');
  ?>

  
  <?php  // Add tags
  $tags = get_the_tags();
  if($tags):
  foreach ($tags as $tag): ?>

    <a href="<?php echo get_tag_link($tag->term_id); ?>" class="badge bg-success"><?php echo $tag->name; ?></a>

  <?php endforeach; endif; ?>



  <?php // Add categories
  $categories = get_the_category();
  foreach($categories as $cat): ?>

  <a href="<?php echo get_category_link($cat->term_id); ?>">
    <?php echo $cat->name; ?>
  </a>

  <?php endforeach; ?>


  <?php echo '📅 ' . get_the_date( 'F j, Y') . ' ⏰' . get_the_date( 'g:i a' ); ?>

  <?php // Comments
  comments_template(); ?>


  <?php get_template_part('includes/part', 'pagination-single'); ?>

  

<?php endwhile; else: endif; ?>