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
function child_enqueue_styles()
{

	// 08/27/24
	// Makes the style.css URL unique after each child theme update
	//  for CACHE-BUSTING
	$themeVer = wp_get_theme()->get('Version'). "?bust=" . rand(1001, 9999);


	wp_enqueue_style('elsm-astra-child', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), $themeVer, 'all');

}
add_action('wp_enqueue_scripts', 'child_enqueue_styles', 15);

// NOTE: The rest of the "plugins" and custom PHP code should be either in the CUSTOM SITE PLUGIN or Code Snippets
