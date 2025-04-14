<?php
/**
 * Template Name: Таблица городов
 *
 * Шаблон для вывода таблицы со списком стран, городов и температурой.
 *
 * @package storefront-child
 */
get_header();

/**
 * Выполняем custom action hook перед таблицей.
 */
do_action( 'before_cities_table' );
?>

	<div class="cities-table-search">
		<form id="cities-search-form" method="post">
			<input type="text" name="search_term" id="search_term"
			       placeholder="<?php esc_attr_e( 'Поиск по городам', 'storefront-child' ); ?>" />
			<input type="submit" value="<?php esc_attr_e( 'Искать', 'storefront-child' ); ?>" />
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
        ORDER BY t.name, p.post_title
    ";
		$cities = $wpdb->get_results( $query );
        print_r( $cities );
		?>
		<table class="cities-table">
			<thead>
			<tr>
				<th><?php esc_html_e( 'Страна', 'storefront-child' ); ?></th>
				<th><?php esc_html_e( 'Город', 'storefront-child' ); ?></th>
				<th><?php esc_html_e( 'Температура', 'storefront-child' ); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php
			if ( $cities ) {
				foreach ( $cities as $city ) {
					// Получаем температуру через API (можно вынести в отдельную функцию с кешированием)
					$temp = __( 'Нет данных', 'storefront-child' );
					if ( $city->latitude && $city->longitude ) {
						$api_url = add_query_arg( array(
							'lat'   => $city->latitude,
							'lon'   => $city->longitude,
							'appid' => 'YOUR_API_KEY', // замените на ваш API ключ
							'units' => 'metric',
							'lang'  => 'ru'
						), 'https://api.openweathermap.org/data/2.5/weather' );

						$response = wp_remote_get( $api_url );
						if ( ! is_wp_error( $response ) ) {
							$body = wp_remote_retrieve_body( $response );
							$data = json_decode( $body, true );
							if ( isset( $data['main']['temp'] ) ) {
								$temp = round( $data['main']['temp'] ) . '°C';
							}
						}
					}
					echo '<tr>';
					echo '<td>' . esc_html( $city->country_name ) . '</td>';
					echo '<td>' . esc_html( $city->city_name ) . '</td>';
					echo '<td>' . esc_html( $temp ) . '</td>';
					echo '</tr>';
				}
			} else {
				echo '<tr><td colspan="3">' . __( 'Нет городов для отображения', 'storefront-child' ) . '</td></tr>';
			}
			?>
			</tbody>
		</table>
	</div>

<?php
/**
 * Custom action hook после таблицы
 */
do_action( 'after_cities_table' );

get_footer();
