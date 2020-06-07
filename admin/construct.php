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
	// 	$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'adseo_metbox_create' );
	// nonce field
	public function wis_list_function($post) {
		$wis_lat = get_post_meta( $post->ID, '_wis_lat', true );
		wp_nonce_field( 'adseo_inner_custom_box', 'adseo_inner_custom_box_nonce' );
		echo '<ul class="tabs">
		
		
		
	} // > ?
	
	// Save data
	public function adseo_metabox_save_data($post_id) {
 		// Check if our nonce is set.
    		if ( ! isset( $_POST['adseo_inner_custom_box_nonce'] ) )
        		return $post_id;
			$nonce = $_POST['adseo_inner_custom_box_nonce'];
		// Verify that the nonce is valid.
    		if ( ! wp_verify_nonce( $nonce, 'adseo_inner_custom_box' ) )
        		return $post_id;
		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
    		if ( defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE )
        		return $post_id;
		// Check the user's permissions.
    		if ( 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) )
            		return $post_id;
    		} else {
		if ( ! current_user_can( 'edit_post', $post_id ) )
            		return $post_id;
		}
		// fetch if exists
				$old_lat = get_post_meta( $post_id, '_wis_lat', true );
		// Sanitize input
				$lat = sanitize_text_field( $_POST['wis_lat'] );
		// Update the meta field in the database.
				update_post_meta( $post_id, '_wis_lat', $lat, $old_lat );
		
		
		

// class end


}
