<!-- HEADER -->
<?php get_header(); ?>

<!-- BODY -->
<h1><?php bloginfo('name'); ?></h1>
<p><?php bloginfo('description'); ?></p>

<!-- SHOW POSTS -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<h1 class="here">Hello World!</h1>

<?php the_content(); ?>

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<!-- FOOTER -->
 <?php get_footer(); ?>