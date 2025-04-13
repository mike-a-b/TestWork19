<?php
/**
 * Registration Custom Taxonomy "Countries"
 *
 * @package my_storefront
 */

function register_countries_taxonomy() {
	$labels = array(
		'name'              => __( 'Countries', 'my_storefront' ),
		'singular_name'     => __( 'Country', 'my_storefront' ),
		'search_items'      => __( 'Find country', 'my_storefront' ),
		'all_items'         => __( 'All countries', 'my_storefront' ),
		'parent_item'       => __( 'Parent country', 'my_storefront' ),
		'parent_item_colon' => __( 'Parent country:', 'my_storefront' ),
		'edit_item'         => __( 'Edit country', 'my_storefront' ),
		'update_item'       => __( 'Update country', 'my_storefront' ),
		'add_new_item'      => __( 'Add new country', 'my_storefront' ),
		'new_item_name'     => __( 'New name', 'my_storefront' ),
		'menu_name'         => __( 'Countries', 'my_storefront' ),
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
