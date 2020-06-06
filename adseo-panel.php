<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://searchengine.team
 * @since             1.0.0
 * @package           Adseo_Panel
 *
 * @wordpress-plugin
 * Plugin Name:       Advanced SEO Toolbox
 * Plugin URI:        https://searchengine.team/plugins/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Volkan Kücükbudak
 * Author URI:        https://searchengine.team
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       adseo-panel
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
	}
	define( 'ADSEO_PANEL_VERSION', '1.0.0' );
	function activate_adseo_panel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-adseo-panel-activator.php';
	Adseo_Panel_Activator::activate();
	}
	function deactivate_adseo_panel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-adseo-panel-deactivator.php';
	Adseo_Panel_Deactivator::deactivate();
	}
	register_activation_hook( __FILE__, 'activate_adseo_panel' );
	register_deactivation_hook( __FILE__, 'deactivate_adseo_panel' );
	require plugin_dir_path( __FILE__ ) . 'includes/class-adseo-panel.php';
	function run_adseo_panel() {
	$plugin = new Adseo_Panel();
	$plugin->run();
	}
	run_adseo_panel();
