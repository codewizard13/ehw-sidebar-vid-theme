<!-- HEADER -->
<?php get_header(); ?>

<!-- BODY -->
<h1><?php bloginfo('name'); ?></h1>
<p><?php bloginfo('description'); ?></p>

<!-- SHOW POSTS -->
<?php
$args = array(
    'post_type'      => array('videos', 'guests'),
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$custom_query = new WP_Query($args);

if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) : $custom_query->the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h2>
            </header>

            <div class="entry-content">
                <?php
                the_content(
                    sprintf(
                        wp_kses(
                            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'your-theme-textdomain'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post(get_the_title())
                    )
                );
                ?>
            </div>
        </article>
        <?php
    endwhile;

    // Pagination (if needed)
    the_posts_navigation();

else :
    ?>
    <p><?php esc_html_e('No posts found', 'your-theme-textdomain'); ?></p>
    <?php
endif;

wp_reset_postdata();
?>


<!-- FOOTER -->
 <?php get_footer(); ?>