<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://khaninejad.ir
 * @since             1.0.0
 * @package           Demobitly
 *
 * @wordpress-plugin
 * Plugin Name:       demobitly
 * Plugin URI:        localhost
 * Description:       this a quick sample plugin for URL shortening using bitly service, visit <a href="options-general.php?page=demobitly">setting</a>
 * Version:           1.0.0
 * Author:            Payam Khaninejad
 * Author URI:        https://khaninejad.ir
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       demobitly
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-demobitly-activator.php
 */
function activate_demobitly() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-demobitly-activator.php';
	Demobitly_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-demobitly-deactivator.php
 */
function deactivate_demobitly() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-demobitly-deactivator.php';
	Demobitly_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_demobitly' );
register_deactivation_hook( __FILE__, 'deactivate_demobitly' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-demobitly.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_demobitly() {

	$plugin = new Demobitly();
	$plugin->run();

}
run_demobitly();
