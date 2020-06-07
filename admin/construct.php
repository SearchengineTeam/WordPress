<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://searchengine.team
 * @since      1.0.0
 *
 * @package    Adseo_Panel
 * @subpackage Adseo_Panel/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Adseo_Panel
 * @subpackage Adseo_Panel/admin
 * @author     Volkan Kücükbudak <plugins@searchengine.team>
 */
class Adseo_Metabox_Admin {
	private $plugin_name;
	private $version;
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}
	/* --------------------------------- load css to admin backend ------------------------- */
	public function enqueue_styles() {
	wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/adseo-panel-admin.css', array(), $this->version, 'all' );
	}
	/* --------------------------------- load js to admin backend ------------------------- */
	public function enqueue_scripts() {
	wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/adseo-panel-admin.js', array( 'jquery' ), $this->version, false );
	}
	/* --------------------------------- load js to admin backend ------------------------- */
	public function adseo_metbox_create() {
	$screens = array( 'post' , 'page' ); // to use customs type please put your arguments in it exp: 'portfolio' or 'customs_name' 
	foreach ( $screens as $screen ) {
	add_meta_box(
        'ad-seo',
        'Advanced SEO',
        'ad_list_function',
        $screen,
        'normal',
        'high'
         ); }
	}

// class end


}
