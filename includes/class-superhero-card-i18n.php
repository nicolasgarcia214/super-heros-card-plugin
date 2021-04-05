<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://nicolasgarcia214.site
 * @since      1.0.0
 *
 * @package    Superhero_Card
 * @subpackage Superhero_Card/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Superhero_Card
 * @subpackage Superhero_Card/includes
 * @author     Nicolas Garcia <nicolasgarcia214@gmail.com>
 */
class Superhero_Card_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'superhero-card',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
