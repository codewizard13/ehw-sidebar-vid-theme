<?php

$args = [

  'post_type' => 'cars',

];

$query = new WP_Query($args);

?>


<?php if ($query->have_posts()): ?>

  <?php while ($query->have_posts()):
    $query->the_post(); ?>


    <article class="card mb-3 mt-3">

      <div class="card-body">


        <h3><?php the_title(); ?></h3>

        <?php the_field('registration'); ?>

      </div><!-- END card-body -->

    </article><!-- END card -->


  <?php endwhile; ?>

<?php endif; ?>