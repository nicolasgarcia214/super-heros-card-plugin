<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://nicolasgarcia214.site
 * @since      1.0.0
 *
 * @package    Superhero_Card
 * @subpackage Superhero_Card/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Superhero_Card
 * @subpackage Superhero_Card/admin
 * @author     Nicolas Garcia <nicolasgarcia214@gmail.com>
 */
class Superhero_Card_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/superhero-card-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/superhero-card-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add Admin menu.
	 *
	 * @since    1.0.0
	 */

	 public function shc_admin_menu(){
		 add_menu_page( 'Superhero Card Settings', 'Superhero Card', 'manage_options', 'superhero-card', array($this, 'superhero_admin_page'), 'dashicons-superhero', 2);
	 }

	 public function superhero_admin_page(){
		 //return views
		 require_once 'partials/superhero-card-admin-display.php';
	 }

	 /**
	 * Register custom fields - plugin setting.
	 *
	 * @since    1.0.0
	 */

	 public function register_shc_settings(){
		 register_setting('shccustomsetting', 'hero');
	 }

}
