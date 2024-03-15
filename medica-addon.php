<?php
/**
 * Plugin Name: Medica Addon
 * Description: Medica Addon
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Iftekhar Rahman
 * Author URI:  https://iftekharrahman.com/
 * Text Domain: medica-addon
 * 
 * Elementor tested up to:     3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function medica_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );

	// Run the plugin
	\Medica_Addon\Plugin::instance();

}
add_action( 'plugins_loaded', 'medica_addon' );