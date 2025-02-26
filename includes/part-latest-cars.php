<?php

$args = [

  'post_type' => 'cars',
  // 'meta_key' => 'color', // ACF field
  // 'meta_value' => 'Red', // exact meta value string
  // 'posts_per_page' => -1, // no limit, no paging
  'posts_per_page' => 1,

];

$query = new WP_Query($args);

?>


<?php if ($query->have_posts()): ?>

  <?php while ($query->have_posts()):
    $query->the_post(); ?>


    <article class="card mb-3 mt-3">

      <div class="card-body">

        <a href="<?php the_post_thumbnail_url('blog-large'); ?>">
          <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>"
            class="img-fluid mb-3 img-thumbnail">
        </a>

        <h3><?php the_title(); ?></h3>

        <?php the_field('registration'); ?>

      </div><!-- END card-body -->

    </article><!-- END card -->


  <?php endwhile; ?>

<?php endif; ?>