<?php
/**
 * Template Name: Cities Table
 *
 * Description: A custom template to display a table of cities with their countries and temperatures.
 *
 * @package my_storefront
 */
get_header();

/**
 * Custom action hook before the cities table
 */
do_action( 'before_cities_table' );
?>

<div class="cities-table-search">
	<form id="cities-search-form" method="post">
		<input type="text" name="search_term" id="search_term" placeholder="<?='Search by city' ?>" />
		<input type="submit" value="<?='Search' ?>" />
	</form>
</div>

<div id="cities-table-container">
	<?php
	// Получение данных через глобальную переменную $wpdb
	global $wpdb;

	// SQL запрос для выборки стран, городов и координат
	// Обратите внимание, что связи между таксономиями и постами хранятся в таблице term_relationships
	// Здесь представлена упрощенная выборка. Для реальных проектов может потребоваться более сложный запрос.
	$query = "
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
        ORDER BY t.name, p.post_title";

	$cities = $wpdb->get_results( $query );
//	print_r( $cities );
	?>
	<table id="cities-table">
		<thead>
			<tr>
				<th><?= 'Country' ?></th>
				<th><?= 'City' ?></th>
				<th><?= 'Temperature' ?></th>
			</tr>
		</thead>
		<tbody>
            <?php
            if ( $cities ) {
                foreach ( $cities as $city ) {
                    // Get temperature over API
                    $temp = 'No data';
                    if ( $city->latitude && $city->longitude ) {
                        $temp = get_temperature($city->latitude, $city->longitude);
//                        $api_url = add_query_arg( array(
//                            'lat'   => $city->latitude,
//                            'lon'   => $city->longitude,
//                            'appid' => 'd7fa018f2f67ac1f659eec67bb0a59b3', // change to your API key of API OpenWeatherMap
//                            'units' => 'metric',
//                            'lang'  => 'en'
//                        ), 'https://api.openweathermap.org/data/2.5/weather' );
//
//                        $response = wp_remote_get( $api_url );
//                        if ( ! is_wp_error( $response ) ) {
//                            $body = wp_remote_retrieve_body( $response );
//                            $data = json_decode( $body, true );
//                            if ( isset( $data['main']['temp'] ) ) {
//                                $temp = round( $data['main']['temp'] ) . '°C';
//                            }
//                        }
                    }
                    echo '<tr>';
                    echo '<td>' . esc_html( $city->country_name ) . '</td>';
                    echo '<td>' . esc_html( $city->city_name ) . '</td>';
                    echo '<td>' . esc_html( $temp ) . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="3">' . 'Нет городов для отображения' . '</td></tr>';
            }
            ?>
		</tbody>
	</table>
</div>

<?php

function get_temperature($latitude, $longitiude) {
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
/**
 * Custom action hook after the cities table
 */
do_action( 'after_cities_table' );

get_footer();