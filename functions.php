<?php
/*
 * functions.php
 * 
 */

// Exit if accessed directly
if (!defined('ABSPATH'))
	exit;

/**
 * Enqueue styles
 */

 function load_theme_files() {
	
	wp_enqueue_style( 'elsms_main_styles', get_stylesheet_uri() );

 }
 add_action( 'wp_enqueue_scripts', 'load_theme_files');


function load_css() {

	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' , [], false, 'all' );
	wp_enqueue_style( 'bootstrap' );

}
add_action( 'wp_enqueue_scripts', 'load_css' );

// NOTE: The rest of the "plugins" and custom PHP code should be either in the CUSTOM SITE PLUGIN or Code Snippets
