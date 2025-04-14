<?php
/**
 * functions for page "Cities" and AJAX search by city
 *
 * @package my_storefront
 */

// AJAX handler for searching cities
function cities_search_ajax_handler() {
	// check for nonce
	check_ajax_referer( 'ajax_nonce', 'nonce' );

	$search_term = isset( $_POST['search_term'] ) ? sanitize_text_field( $_POST['search_term'] ) : '';

	global $wpdb;
	// SQL - query for selecting countries, cities and coordinates by city
	$query = $wpdb->prepare( "
        SELECT 
            p.ID as city_id, p.post_title as city_name, 
            m_lat.meta_value as latitude, m_lon.meta_value as longitude,
            t.name as country_name
        FROM {$wpdb->posts} p
        LEFT JOIN {$wpdb->postmeta} m_lat ON (p.ID = m_lat.post_id AND m_lat.meta_key = 'latitude')
        LEFT JOIN {$wpdb->postmeta} m_lon ON (p.ID = m_lon.post_id AND m_lon.meta_key = 'longitude')
        LEFT JOIN {$wpdb->term_relationships} tr ON (p.ID = tr.object_id)
        LEFT JOIN {$wpdb->term_taxonomy} tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy = 'countries')
        LEFT JOIN {$wpdb->terms} t ON (tt.term_id = t.term_id)
        WHERE p.post_type = 'cities' AND p.post_status = 'publish' 
          AND p.post_title LIKE %s 
        ORDER BY t.name, p.post_title
    ", '%' . $wpdb->esc_like( $search_term ) . '%' );

	$cities = $wpdb->get_results( $query );

	//Display the results
	if ( $cities ) {
		ob_start();
		?>
		<table class="cities-table">
			<thead>
				<tr>
					<th><?= 'Country' ?></th>
					<th><?= 'City' ?></th>
					<th><?= 'Temperature' ?></th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach ( $cities as $city ) {
				// get temperature over API OpenWeatherMap
				$temp = 'No data';
				if ( $city->latitude && $city->longitude ) {
					$temp = get_temp($city->latitude, $city->longitude);
				}
				echo '<tr>';
				echo '<td>' . $city->country_name . '</td>';
				echo '<td>' . $city->city_name . '</td>';
				echo '<td>' . $temp . '</td>';
				echo '</tr>';
			}
			?>
			</tbody>
		</table>
		<?php
		$output = ob_get_clean();
		wp_send_json_success( $output );
	} else {
		wp_send_json_error('No cities found' );
	}
}
add_action( 'wp_ajax_nopriv_cities_search', 'cities_search_ajax_handler' );
add_action( 'wp_ajax_cities_search', 'cities_search_ajax_handler' );

function get_temp($latitude, $longitiude) {
	$api_url = add_query_arg( array(
		'lat'   => $latitude,
		'lon'   => $longitiude,
		'appid' => 'd7fa018f2f67ac1f659eec67bb0a59b3', // change to your API key of API OpenWeatherMap
		'units' => 'metric',
		'lang'  => 'en'
	), 'https://api.openweathermap.org/data/2.5/weather' );
	$temp = "No data";
	$response = wp_remote_get( $api_url );
	if ( ! is_wp_error( $response ) ) {
		$body = wp_remote_retrieve_body( $response );
		$data = json_decode( $body, true );
		if ( isset( $data['main']['temp'] ) ) {
			$temp = round( $data['main']['temp'] ) . '°C';
		}
	}
	return $temp;
}