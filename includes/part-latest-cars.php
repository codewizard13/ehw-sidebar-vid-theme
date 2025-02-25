<?php

$args = [

  'post_type' => 'cars',

];

$query = new WP_Query($args);

?>


<?php if( $query->have_posts() ):?>

  <?php while( $query->have_posts() ) : $query->the_post();?>

    <?php the_title();?>

  <?php endwhile;?>

<?php endif;?>