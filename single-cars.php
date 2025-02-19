<?php get_header(); ?>

<div class="page-wrap">
  <div class="container">

    <h1><?php the_title(); ?></h1>


    <?php if (has_post_thumbnail()): ?>

      <div class="gallery">
        <a href="<?php the_post_thumbnail_url('blog-large'); ?>">
          <img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="<?php the_title(); ?>"
            class="img-fluid mb-3 img-thumbnail">
        </a>
      </div>

    <?php endif; ?>


    <!-- GALLERY -->
    <?php
    $gallery = get_field('gallery');
    if ($gallery): ?>


      <div class="gallery mb-5">

        <?php foreach ($gallery as $image): ?>

          <a href="<?php echo $image['sizes']['blog-large']; ?>">
            <img src="<?php echo $image['sizes']['blog-small']; ?>" class="img-fluid car-gallery-img">
          </a>
        <?php endforeach; ?>

      </div><!-- END gallery wrapper -->

    <?php endif; ?><!-- END GALLERY -->


    <div class="row">

      <div class="col-lg-6">

        <?php get_template_part('includes/section', 'cars'); ?>
        <?php wp_link_pages(); ?>

      </div>


      <!-- Right Col -->
      <div class="col-lg-6">

        <ul>

          <?php
          $color = get_field('color');
          $registration = get_field('registration');

          ?>
          <?php if ($color): ?>
            <li>Color: <?php echo $color ?></li>
          <?php endif; ?>

          <?php if ($registration): ?>
            <li>Registration: <?php echo $registration ?></li>
          <?php endif; ?>

        </ul>


        <!-- FEATURES -->
        <h3>Features</h3>

        <ul>
          <?php if (have_rows('features')): ?>

            <?php while (have_rows('features')):
              the_row();
              $feature = get_sub_field('feature');
              ?>
              <li><?php echo $feature; ?></li>
            <?php endwhile; ?>

          <?php endif; ?>

        </ul>


        <!-- ENQUIRY FORM -->
        <?php echo do_shortcode('[wpforms id="27000"]'); ?>



      </div><!-- END Right Col -->






    </div>


  </div>
</div>

<?php get_footer(); ?>