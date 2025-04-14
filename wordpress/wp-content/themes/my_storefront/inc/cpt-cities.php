<?php
/**
 * Registration Custom Post Type "Cities"
 *
 * @package my_storefront
 */
add_action( 'init', 'register_cities_cpt' );
function register_cities_cpt() : void
{
//	labels for admin panel on the page of adding a new city
	$labels = array(
		'name'               => 'Cities',
		'singular_name'      => 'City',
		'menu_name'          => 'Cities',
		'name_admin_bar'     => 'City',
		'add_new'            => 'Add new',
		'add_new_item'       => 'Add new city',
		'new_item'           => 'New city',
		'edit_item'          => 'Edit city',
		'view_item'          => 'View city',
		'all_items'          => 'All cities',
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-location-alt',
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'         => true,
		'rewrite'             => array( 'slug' => 'cities' ),
	);

	register_post_type( 'cities', $args );
}