<?php

$attributes = get_query_var('attributes');

print_r($attributes['color']);



$args = [

  'post_type' => 'cars',
  'posts_per_page' => -1, // no limit, no paging

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

        <ul style="list-style:none">
          <li><b>Registration:</b> <?php the_field('registration'); ?></li>
          <li><b>Color:</b> <?php the_field('color'); ?></li>
          <li><b>Price:</b> <?php the_field('price'); ?></li>
        </ul>

      </div><!-- END card-body -->

    </article><!-- END card -->


  <?php endwhile; ?>

<?php endif; ?>