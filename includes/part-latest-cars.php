<?php

$attributes = get_query_var('attributes');

print_r($attributes['color']);



$args = [

  'post_type' => 'cars',

  // 'meta_key' => 'color', // ACF field
  // 'meta_value' => $attributes['color'],
  // 'meta_compare' => 'LIKE',

  'posts_per_page' => -1, // no limit, no paging
  // 'tax_query' => [
  //   [
  //     'taxonomy' => 'brands',
  //     'field' => 'slug',
  //     'terms' => [
  //       $attributes['brand'],
  //     ]
  //   ]
  // ],

];

if (isset($attributes['color'])) {

  $args['meta_key'] = 'color';
  $args['meta_value'] = $attributes['color'];
  $args['meta_compare'] = 'LIKE';

}

if (isset($attributes['brand'])) {
  echo "<h3>Brand: " . $attributes['brand'] . "</h3>";

  $args['tax_query'][] =
    [
      'taxonomy' => 'brands',
      'field' => 'slug',
      'terms' => [
        $attributes['brand'],
      ]
    ];
}

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

        <p><b>Registration:</b> <?php the_field('registration'); ?></p>
        <p><b>Color:</b> <?php the_field('color'); ?></p>


      </div><!-- END card-body -->

    </article><!-- END card -->


  <?php endwhile; ?>

<?php endif; ?>