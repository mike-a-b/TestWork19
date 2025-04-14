<?php
// connect to parent theme stylessheet
add_action( 'wp_enqueue_scripts', 'my_child_theme_scripts' );
function my_child_theme_scripts()
{
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// include custom files
// Custom Post Type Cities
require_once get_stylesheet_directory() . '/inc/cpt-cities.php';
require_once get_stylesheet_directory() . '/inc/metaboxes.php';
require_once get_stylesheet_directory() . '/inc/taxonomy-countries.php';
require_once get_stylesheet_directory() . '/inc/widget-weather.php';
require_once get_stylesheet_directory() . '/inc/custom-template-functions.php';

// Include AJAX script (файл assets/js/ajax.js)
// AJAX handler for getting weather data
add_action( 'wp_enqueue_scripts', 'my_storefront_enqueue_scripts' );
function my_storefront_enqueue_scripts()
{
	wp_enqueue_script( 'ajax', get_stylesheet_directory_uri() . '/assets/js/ajax.js', array('jquery'),
		null, true );
	// добавление nonce
	wp_localize_script( 'ajax', 'Ajax', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce'    => wp_create_nonce( 'ajax_nonce' )
	));
}

//include js for frontend validation of latitude and longitude in metabox
add_action('admin_enqueue_scripts', 'city_meta_box_scripts');
function city_meta_box_scripts($hook) {
	if ($hook !== 'post.php' && $hook !== 'post-new.php') {
		return;
	}

	wp_enqueue_script(
		'city-meta-validation',
		get_stylesheet_directory_uri() . '/js/city-meta-validation.js',
		['jquery'],
		null,
		true
	);
}
