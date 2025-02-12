<!-- HEADER -->
<?php get_header(); ?>

<!-- BODY -->

<!-- SHOW POSTS -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<h1 class="here">Hello World!</h1>

<?php the_content(); ?>

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<!-- FOOTER -->
 <?php get_footer(); ?>