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

	wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', 'jquery', false, true); // last arg is whether to add to footer
	wp_enqueue_script('custom');

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



// WPForms


/**
 * Summary of dynamic_acf_smart_tags:
 * 
 * - Not sure why this works, but it does. Perplexity AI helped.
 * @param mixed $tags
 * 
 * Ref:
 * - https://www.perplexity.ai/search/i-m-trying-to-include-an-acf-c-bDVrWF9dQamDSSUNDcJonA
 */
function dynamic_acf_smart_tags($tags) {
	$tags['acf_field'] = 'ACF Field';
	return $tags;
}
add_filter('wpforms_smart_tags', 'dynamic_acf_smart_tags');

function process_dynamic_acf_smart_tags($content, $tag) {
	if (strpos($tag, 'acf_field_') === 0) {
			$field_name = str_replace('acf_field_', '', $tag);
			$field_value = get_field($field_name, get_the_ID());
			$content = str_replace('{acf_field_' . $field_name . '}', $field_value, $content);
	}
	return $content;
}
add_filter('wpforms_smart_tag_process', 'process_dynamic_acf_smart_tags', 10, 2);






// Custom Hand-Coded, No-Plugin enquiry form

add_action('wp_ajax_enquiry','enquiry_form'); // only works for logged-in users
add_action('wp_ajax_nopriv_enquiry','enquiry_form'); // works for non-logged in users also 
function enquiry_form() {

	if ( !wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' )) {

		wp_send_json_error('Nonce is incorrect', 401);
		die();

	}

	// wp_send_json_success('It works!');
	// $data = json_encode($_POST);

	$formdata = [];

	wp_parse_str($_POST['enquiry'], $formdata );

	// Admin email address
	$admin_email = get_option('admin_email');

	// Create email headers
	$headers[] = 'Content-Type: text/html; charset=UTF-8';
	$headers[] = 'From: My Website <' . $admin_email . '>';
	$headers[] = 'Reply-to: ' . $formdata['email'];

	// Who are we sending the email to?
	$send_to = $admin_email;

	// Subject
	$subject = 'Enquiry from ' . $formdata['fname'] . ' ' . $formdata['lname'];

	// Message
	$message = '';

	foreach($formdata as $index => $field) {
		$message .= '<strong>' . $index . '</strong>: ' . $field . '<br />';
	}

	// Try to send
	try {

		if ( wp_mail($send_to, $subject, $message, $headers) ) {
			wp_send_json_success('Email sent to ' . $admin_email);
		}
		else {
			wp_send_json_error('Email ERROR!');
		}

	} catch (Exception $e) {

		wp_send_json_error($e->getMessage());

	}


}







// //////// NAV WALKER 


/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


/*
Doesn't work
// Source: https://stackoverflow.com/questions/65546253/bootstrap-v5-wp-bootstrap-navwalker-dropdown-navbar-not-work#answer-67331001
add_filter( 'nav_menu_link_attributes', 'bootstrap5_dropdown_fix' );
function bootstrap5_dropdown_fix( $atts ) {
     if ( array_key_exists( 'data-toggle', $atts ) ) {
         unset( $atts['data-toggle'] );
         $atts['data-bs-toggle'] = 'dropdown';
     }
     return $atts;
}
*/



// bootstrap 5 wp_nav_menu walker
// REF: https://github.com/AlexWebLab/bootstrap-5-wordpress-navbar-walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $dropdown_menu_class[] = '';
    foreach($this->current_item->classes as $class) {
      if(in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu dropdown-menu-end';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
    $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}
// register a new menu
register_nav_menu('main-menu', 'Main menu');