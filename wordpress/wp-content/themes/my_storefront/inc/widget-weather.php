<?php
/**
 * Widhet for displaying weather in a city
 *
 * @package my_storefront
 */

class Weather_Widget extends WP_Widget
{
	public function __construct() {
		parent::__construct(
			'weather_widget', // ID виджета
			 'Weather in the city',
			array( 'description' => 'Displays the city name and current temperature')
		);
	}

	/**
	 * Form for settings in admin panel
	 */
	public function form( $instance ) {
		$selected_city = $instance['city_id'] ?? '';
		$api_key = $instance['api_key'] ?? '';
		$cities = get_posts([
			'post_type' => 'cities',
			'posts_per_page' => -1
		]);
		?>
		<p>
            <label for="<?= $this->get_field_id('city_id') ?>">Select city:</label>
            <select class="widefat" id="<?= $this->get_field_id('city_id') ?>" name="<?= $this->get_field_name('city_id') ?>">
				<?php foreach ($cities as $city): ?>
                    <option value="<?= $city->ID ?>" <?= selected($selected_city, $city->ID) ?>>
						<?= esc_html($city->post_title) ?>
                    </option>
				<?php endforeach; ?>
            </select>
		</p>
        <p>
            <label for="<?= $this->get_field_id('api_key'); ?>">OpenWeather API Key:</label>
            <input class="widefat" type="text" id="<?= $this->get_field_id('api_key') ?>"
                   name="<?= $this->get_field_name('api_key') ?>" value="<?= esc_attr($api_key) ?>" />
        </p>
		<?php
	}

	/**
	 * Update settings widget
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['city_id'] = ( ! empty( $new_instance['city_id'] ) ) ? (int)( $new_instance['city_id'] ) : '';
        $instance['api_key'] = ( ! empty( $new_instance['api_key'] ) ) ? sanitize_text_field( $new_instance['api_key'] ) : '';
		return $instance;
	}

    /**
     * Get weather data from OpenWeatherMap API
     *
     * @param float $lat Latitude
     * @param float $lon Longitude
     * @param string $api_key API key
     * @return int|bool Temperature in Celsius or false on error
     */
	private function get_weather_data($lat, $lon, $api_key)
    {
        //$url = "https://api.openweathermap.org/data/3.0/onecall?lat=$lat&lon=$lon&units=metric&appid=$api_key";
        // 3.0 API get 401 error for free API key
		$url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&units=metric&appid=$api_key";

		$response = wp_remote_get($url);

		if (is_wp_error($response)) {
//            return false;
			return "wp error";
		}

		$data = json_decode(wp_remote_retrieve_body($response), true);

		if (isset($data['main']['temp'])) {
			// temperature in C
			return round( $data['main']['temp']);
		}

		return false;
	}

	/**
	 * Display widget at frontend
	 */
	public function widget( $args, $instance ) {
		$city_id = !empty( $instance['city_id'] ) ? (int)( $instance['city_id'] ) : 0;
		if ( ! $city_id ) {
			return;
		}
		$city_title = get_the_title( $city_id );
		$api_key = isset($instance['api_key']) ? sanitize_text_field($instance['api_key']) : '';

		echo $args['before_widget'];
		echo $args['before_title'] . esc_html( $city_title ) . $args['after_title'];

		// Get the temperature from OpenWeatherMap API
		$latitude = get_post_meta( $city_id, 'latitude', true );
		$longitude = get_post_meta( $city_id, 'longitude', true );
		if ( $latitude && $longitude && $api_key ) {
            // call the function to get weather data
			$temp = $this->get_weather_data($latitude, $longitude, $api_key);

			if ($temp) {
				echo "<h4>{$city_title}</h4>";
				echo "<p>Temperature: {$temp}°C</p>";
			} else {
				echo "<p>Unable to retrieve weather data.</p>";
			}
		} else {
			echo '<p>' . 'City coordinates not specified or API KEY'. '</p>';
		}
		echo $args['after_widget'];
	}
}

// Widget Weather registration
add_action( 'widgets_init', 'register_weather_widget' );
function register_weather_widget() {
	register_widget( 'Weather_Widget' );
}
