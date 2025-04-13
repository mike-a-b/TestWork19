<?php
/**
 * Metabox for Custom Post Type "Cities"
 */

// Metabox registration for CPT "cities"
add_action( 'add_meta_boxes', 'cities_register_metabox' );
function cities_register_metabox() {
	add_meta_box(
		'cities_meta', // ID
		__( 'Данные города', 'my_storefront' ),
		'cities_meta_callback', // display callback function
		'cities', // which post type
		'normal',
		'default'
	);
}

// metabox custom fields for latitude and longitude
function cities_meta_callback( $post ) {
	// use nonce for security
	wp_nonce_field( 'save_cities_meta', 'cities_meta_nonce' );
    // Get values for latitude и longitude
	$latitude = get_post_meta( $post->ID, 'latitude', true );
	$longitude = get_post_meta( $post->ID, 'longitude', true );
	?>
    <p>
        <label for="cities_meta"><?php _e( 'Geo coordinates:', 'my_storefront' ); ?></label>
    </p>
	<p>
		<label for="cities_latitude"><?php _e( 'Latitude:', 'my_storefront' ); ?></label>
		<input type="text" id="cities_latitude" name="cities_latitude" value="<?php echo esc_attr( $latitude ); ?>" />
	</p>
	<p>
		<label for="cities_longitude"><?php _e( 'Longitude:', 'my_storefront' ); ?></label>
		<input type="text" id="cities_longitude" name="cities_longitude" value="<?php echo esc_attr( $longitude ); ?>" />
	</p>
	<?php
}

// save data from metabox
add_action( 'save_post', 'cities_save_metabox' );
function cities_save_metabox( $post_id ) {
	// Check nonce and rules
	if ( ! isset( $_POST['cities_meta_nonce'] ) ||
	     ! wp_verify_nonce( $_POST['cities_meta_nonce'], 'save_cities_meta' ) ) {
		return;
	}

	// checking autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Checking user permissions
	if ( isset( $_POST['post_type'] ) && $_POST['post_type'] === 'cities' && (! current_user_can( 'edit_post', $post_id )) ) {
			return;
	}

	// validate and sanitize latitude and longitude
    $longitude = sanitize_text_field( $_POST['cities_longitude'] );
    $longitude = isset($longitude) ? (float)$longitude : null;
    $latitude = sanitize_text_field( $_POST['cities_latitude'] );
    $latitude = isset($latitude) ? (float)$latitude : null;

	if ($latitude < -90 || $latitude > 90) {
		return;
	}

	if ($longitude < -180 || $longitude > 180) {
		return;
	}

	// Save or update latitude and longitude
    update_post_meta( $post_id, 'latitude', $latitude );
    update_post_meta( $post_id, 'longitude', $longitude );
}
