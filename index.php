<!-- HEADER -->
<?php get_header(); ?>

<!-- BODY -->
<h1><?php bloginfo('name'); ?></h1>
<p><?php bloginfo('description'); ?></p>

<!-- SHOW POSTS -->
<?php
$custom_query = new WP_Query([
  'post_type' => ['videos', 'guests'],
  'posts_per_page' => -1,
  'post_status' => 'publish',
  'orderby' => 'date',
  'order' => 'DESC',
]);

if ($custom_query->have_posts()): while ($custom_query->have_posts()): $custom_query->the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
      <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
      </h2>
    </header>
    
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <hr>
  
  </article>

<?php endwhile;

// Reset post data to prevent conflicts
wp_reset_postdata();

else:
  echo '<p>No posts found.</p>';
endif;
?>


<!-- FOOTER -->
<?php get_footer(); ?>