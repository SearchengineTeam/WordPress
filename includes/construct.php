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
private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-adseo-panel-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-adseo-panel-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-adseo-panel-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-adseo-panel-public.php';
		$this->loader = new Adseo_Panel_Loader();

	}
	private function set_locale() {
		$plugin_i18n = new Adseo_Panel_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}
	private function define_metabox() {
	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/construct.php';
	$plugin_admin = new Adseo_Metabox_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'adseo_metbox_create' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
	}
	private function define_public_hooks() {
		$plugin_public = new Adseo_Panel_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}
	public function run() {
		$this->loader->run();
	}
	public function get_plugin_name() {
		return $this->plugin_name;
	}
	public function get_loader() {
		return $this->loader;
	}
	public function get_version() {
		return $this->version;
	}

}
