<?php
/* ==========================================================================
 *  Plugin Name: Hide Links
 *   Plugin URI: http://wp-puzzle.com/hide-links/
 *  Description: Скрытие внешних ссылок сайта от индексации с помощью jQuery. Автоматически скрывает все авторские ссылки комментаторов. Кнопка в визуальном редакторе, шорткод [link] и замена всех ссылок, написанных в требуемом формате.
 *      Version: 1.2
 *       Author: Alexandra Vovk
 *   Author URI: http://wp-puzzle.com/
 *      License: GPLv2 or later
 *  Text Domain: hidelinks
 * ========================================================================== */


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
