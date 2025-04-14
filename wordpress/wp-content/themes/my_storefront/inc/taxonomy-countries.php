<?php
/**
 * Registration Custom Taxonomy "Countries"
 *
 * @package my_storefront
 */

function register_countries_taxonomy() {
	$labels = array(
		'name'              => 'Countries',
		'singular_name'     => 'Country',
		'search_items'      => 'Find country',
		'all_items'         => 'All countries',
		'parent_item'       => 'Parent country',
		'parent_item_colon' => 'Parent country:',
		'edit_item'         => 'Edit country',
		'update_item'       => 'Update country',
		'add_new_item'      => 'Add new country',
		'new_item_name'     => 'New name',
		'menu_name'         => 'Countries',
	);

	$args = array(
		'hierarchical'      => false, // как категории
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'countries' ),
	);
	register_taxonomy( 'countries', array( 'cities' ), $args );
}

add_action( 'init', 'register_countries_taxonomy', 0 );
