<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://nicolasgarcia214.site
 * @since      1.0.0
 *
 * @package    Superhero_Card
 * @subpackage Superhero_Card/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Superhero_Card
 * @subpackage Superhero_Card/public
 * @author     Nicolas Garcia <nicolasgarcia214@gmail.com>
 */
class Superhero_Card_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Superhero_Card_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Superhero_Card_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/superhero-card-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Superhero_Card_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Superhero_Card_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/superhero-card-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Superhero Card Shortcode
	 *
	 * @since    1.0.0
	 */
	public function testSuperheroCard(){

	$heroName = get_option( 'hero');

	$url = 'https://superheroapi.com/api/10158817483210266/search/'.$heroName;
    
    $arguments = array(
        'method' => 'GET'
    );

	$response = wp_remote_get( $url, $arguments );

	if ( is_wp_error( $response ) ) {
		$error_message = $response->get_error_message();
		return "Something went wrong: $error_message";
	} else {
		$results=json_decode( wp_remote_retrieve_body( $response ) );
		$image = $results->results[0]->image->url;
		$powerstats = $results->results[0]->powerstats;
	}


	return '<div class="shc-card--admin">
	<img src="' . $image . '"/>
	<h4 class="shc__hero-name">' . $results->results[0]->name . '</h4>
	<div class="shc-stats-container">
		<div class="shc-stat-container"><span><b>Intelligence</b></span><span>' . $powerstats->intelligence . '</span></div>
		<div class="shc-stat-container"><span><b>Strength</b></span><span>' . $powerstats->strength . '</span></div>
		<div class="shc-stat-container"><span><b>Speed</b></span><span>' . $powerstats->speed . '</span></div>
		<div class="shc-stat-container"><span><b>Durability</b></span><span>' . $powerstats->durability . '</span></div>
		<div class="shc-stat-container"><span><b>Power</b></span><span>' . $powerstats->power . '</span></div>
		<div class="shc-stat-container"><span><b>Combat</b></span><span>' . $powerstats->combat . '</span></div>
	</div>
</div>';
	}

}
