<?php
/* ==========================================================================
 *  Plugin Name: Hide Links
 *   Plugin URI: http://wp-puzzle.com/hide-links/
 *  Description: Magically hides external links from indexing by search engines. Automatically hides all comment authors links. Adds shortcode for easy hiding links in posts, pages or widgets content.
 *      Version: 1.4.2
 *       Author: Alexandra Vovk
 *   Author URI: http://wp-puzzle.com/
 *      License: GPLv2 or later
 *  Text Domain: hide-links
 *  Domain Path: /languages
 * ========================================================================== */


__( 'Hide Links', 'hide-links' );
__( 'Magically hides external links from indexing by search engines. Automatically hides all comment authors links. Adds shortcode for easy hiding links in posts, pages or widgets content.', 'hide-links' );

$plugin_dir = plugin_dir_path( __FILE__ );
$declared = get_declared_classes();


if ( !in_array( 'WPPZ_HideLinks', $declared ) ) {
	require_once( $plugin_dir . 'class.hidelinks.php' );
}
add_action( 'init', array( 'WPPZ_HideLinks', 'init' ) );



if ( is_admin() ) {

	// load TinyMCE button
	if ( !in_array( 'WPPZ_HideLinks_Button', $declared ) ) {
	    require_once( $plugin_dir . 'class.hidelinks-button.php' );
	}
    add_action( 'init', array( 'WPPZ_HideLinks_Button', 'init' ) );

}


/**
 *
 *
 * Load textdomain.
 *
 */
function hidelinks_load_textdomain() {

	load_plugin_textdomain( 'hidelinks', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

}

add_action( 'plugins_loaded', 'hidelinks_load_textdomain' );
