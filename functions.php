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

// NOTE: The rest of the "plugins" and custom PHP code should be either in the CUSTOM SITE PLUGIN or Code Snippets
