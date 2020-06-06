<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://searchengine.team
 * @since      1.0.0
 *
 * @package    Adseo_Panel
 * @subpackage Adseo_Panel/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Adseo_Panel
 * @subpackage Adseo_Panel/includes
 * @author     Volkan Kücükbudak <plugins@searchengine.team>
 */
class Adseo_Panel {
	protected $loader;
	protected $plugin_name;
	protected $setting_options;
	protected $version;
	public function __construct() {
		if ( defined( 'ADSEO_PANEL_VERSION' ) ) {
			$this->version = ADSEO_PANEL_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'adseo-panel';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_metabox();
		$this->define_public_hooks();

	} 
