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
		'name'               => __( 'Cities', 'my_storefront' ),
		'singular_name'      => __( 'City', 'my_storefront' ),
		'menu_name'          => __( 'Cities', 'my_storefront' ),
		'name_admin_bar'     => __( 'City', 'my_storefront' ),
		'add_new'            => __( 'Add new', 'my_storefront' ),
		'add_new_item'       => __( 'Add new city', 'my_storefront' ),
		'new_item'           => __( 'New city', 'my_storefront' ),
		'edit_item'          => __( 'Edit city', 'my_storefront' ),
		'view_item'          => __( 'View city', 'my_storefront' ),
		'all_items'          => __( 'All cities', 'my_storefront' ),
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