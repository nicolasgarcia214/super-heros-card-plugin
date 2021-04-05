<?php

/**
 *
 * @since             1.0.0
 * @package           SuperHeroCard
 *
 * @wordpress-plugin
 * Plugin Name:       Super Hero Card
 * Description:       This plugin allows editors to embed a Superhero card with the image, abilities, and biography on a WordPress post/page.
 * Version:           1.0.0
 * Author:            Nicolas Garcia
 * Author URI:        https://nicolasgarcia214.site
 * License:           GPL-3.0+
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 */

 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'SUPERHERO_CARD_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-superhero-card-activator.php
 */
function activate_superhero_card() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-superhero-card-activator.php';
	Superhero_Card_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-superhero-card-deactivator.php
 */
function deactivate_superhero_card() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-superhero-card-deactivator.php';
	Superhero_Card_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_superhero_card' );
register_deactivation_hook( __FILE__, 'deactivate_superhero_card' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-superhero-card.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_superhero_card() {

	$plugin = new Superhero_Card();
	$plugin->run();

}
run_superhero_card();