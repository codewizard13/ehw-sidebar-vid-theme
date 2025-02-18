<?php
/*
 * functions.php
 * 
 * NOTE: The rest of the "plugins" and custom PHP code should be either in the CUSTOM SITE PLUGIN or Code Snippets
 * 
 */

// Exit if accessed directly
if (!defined('ABSPATH'))
	exit;

/**
 * Enqueue styles
 */

// Load Stylesheets
function load_css()
{

	wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', [], false, 'all');
	wp_enqueue_style('bootstrap');

	wp_register_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', [], false, 'all');
	wp_enqueue_style('magnific-popup');

	wp_register_style('main', get_template_directory_uri() . '/css/main.css', [], false, 'all');
	wp_enqueue_style('main');

	wp_register_style('elsms_styles_min', get_template_directory_uri() . '/style.min.css', [], false, 'all');
	// wp_enqueue_style( 'elsms_styles_min' );



}
add_action('wp_enqueue_scripts', 'load_css');

// Load JavaScript
function load_js()
{

	wp_enqueue_script('jquery');

	wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true); // last arg is whether to add to footer
	wp_enqueue_script('bootstrap');

	wp_register_script('magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', 'jquery', false, true); // last arg is whether to add to footer
	wp_enqueue_script('magnific-popup');

}
add_action('wp_enqueue_scripts', 'load_js');



// Theme Options
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');



// Menus
register_nav_menus([

	'top-menu' => 'Top Menu Location',
	'mobile-menu' => 'Mobile Menu Location',
	'footer-menu' => 'Footer Menu Location',

]);




// Custom Image Sizes
add_image_size('blog-wide', 1440, 400, true);
add_image_size('blog-large', 800, 400, true);
add_image_size('blog-small', 300, 200, true); // last arg is whether to hard-crop





// Register Sidebars
function my_sidebars() {

	register_sidebar([

		'name' => 'Page Sidebar',
		'id' => 'page-sidebar',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',

	]);

	register_sidebar([

		'name' => 'Blog Sidebar',
		'id' => 'blog-sidebar',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',

	]);

}
add_action('widgets_init', 'my_sidebars');




/// CUSTOM POST TYPES


function my_first_post_type() {

	$args = [

		'labels' => [
			'name' => 'Cars',
			'singular_name' => 'Car',
		],
		'hierarchical' => true,
		'public' => true, // publically accessible by the user on backend and frontend
		'has_archive' => true,
		'supports' => ['title','editor','thumbnail','custom-fields'],
		// 'rewrite' => ['slug','my-cars'],
		'menu_icon' => 'dashicons-admin-generic',
	];

	register_post_type('cars', $args);


}
add_action('init', 'my_first_post_type');



function my_first_taxonomy() {

	$args = [
		'labels' => [
			'name' => 'Brands',
			'singular_name' => 'Brand',
		],
		'public' => true,
		'hierarchical' => true,

	];

	register_taxonomy('brands', ['cars'], $args); // param 2 is the array of post types to apply this tax to

}
add_action('init', 'my_first_taxonomy');