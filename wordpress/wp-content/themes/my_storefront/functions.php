<?php
// Подключаем стили родительской темы
add_action( 'wp_enqueue_scripts', 'my_child_theme_scripts' );
function my_child_theme_scripts()
{
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// Подключение дополнительных файлов
// Custom Post Type Cities
require_once get_stylesheet_directory() . '/inc/cpt-cities.php';
//require_once get_stylesheet_directory() . '/inc/metaboxes.php';
//require_once get_stylesheet_directory() . '/inc/taxonomy-countries.php';
//require_once get_stylesheet_directory() . '/inc/widget-weather.php';
//require_once get_stylesheet_directory() . '/inc/custom-template-functions.php';

// Подключаем скрипт для AJAX (файл assets/js/ajax.js)
add_action( 'wp_enqueue_scripts', 'my_storefront_enqueue_scripts' );
function my_storefront_enqueue_scripts()
{
	wp_enqueue_script( 'ajax', get_stylesheet_directory_uri() . '/assets/js/ajax.js', array('jquery'), null, true );
	// добавление nonce
	wp_localize_script( 'ajax', 'Ajax', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce'    => wp_create_nonce( 'child_ajax_nonce' )
	));
}
