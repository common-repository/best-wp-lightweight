<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://baonguyenyam.github.io/
 * @since             1.0.0
 * @package           BEST_WP_LIGHTWEIGHT
 *
 * @wordpress-plugin
 * Plugin Name:       WOW Best WP Lightweight
 * Plugin URI:        https://wow-wp.com
 * Description:       Best WP Lightweight help you configure your websites without any coding knowledge required. Lightweight and using best practices for fastest load time.
 * Version:           2.1.0
 * Author:            WOW WordPress
 * Author URI:        https://github.com/baonguyenyam/wp-best-wp-lightweight
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       best-wp-lightweight
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'BEST_WP_LIGHTWEIGHT_NICENAME', 'Best WP Lightweight' );
define( 'BEST_WP_LIGHTWEIGHT_PREFIX', 'best_wp_lightweight' );
define( 'BEST_WP_LIGHTWEIGHT_VERSION', '2.1.0' );

require plugin_dir_path( __FILE__ ) . 'classes/wp_lightweight_setup.php';
require plugin_dir_path( __FILE__ ) . 'classes/wp_lightweight_disable_password_reset.php';
require plugin_dir_path( __FILE__ ) . 'classes/wp_lightweight_init.php';
require plugin_dir_path( __FILE__ ) . 'classes/wp_lightweight_cleanup.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bn-wp-activator.php
 */
function activate_best_wp_lightweight() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bn-wp-activator.php';
	BEST_WP_LIGHTWEIGHT_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bn-wp-deactivator.php
 */
function deactivate_best_wp_lightweight() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bn-wp-deactivator.php';
	BEST_WP_LIGHTWEIGHT_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_best_wp_lightweight' );
register_deactivation_hook( __FILE__, 'deactivate_best_wp_lightweight' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bn-wp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_best_wp_lightweight() {

	$plugin = new BEST_WP_LIGHTWEIGHT();
	$plugin->run();

}
run_best_wp_lightweight();
