<?php


/**
 * Class WPPZ_HideLinks_Button
 */
class WPPZ_HideLinks_Button {

	/**
	 * WPPZ_HideLinks_Button constructor.
	 */
	function __construct() {

	}

	/**
	 * Register functions to add TinyMCE button
	 */
	public static function init() {

		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}

		if ( 'true' == get_user_option( 'rich_editing' ) ) {
			add_filter( 'mce_buttons', array( 'WPPZ_HideLinks_Button', 'hidelinksadmin_register_mce_button' ) );
			add_filter( 'mce_external_plugins', array( 'WPPZ_HideLinks_Button', 'hidelinksadmin_add_tinymce_plugin' ) );
			add_action( 'wp_enqueue_scripts', 'localize_button_scripts' ); //back end
		}

	}


	/**
	 * Register new button for TinyMCE
	 */
	public static function hidelinksadmin_register_mce_button( $buttons ) {
		$buttons[] = 'hidelinks_button';

		return $buttons;
	}


	/**
	 * Declare script for new button
	 */
	public static function hidelinksadmin_add_tinymce_plugin( $plugin_array ) {
		global $wp_version;
		if ( version_compare( $wp_version, '3.9', '>=' ) ) {
			$plugin_array['hidelinks_button'] = plugin_dir_url( __FILE__ ) . 'js/hidelinks_button.js';
		} else {
			$plugin_array['hidelinks_button'] = plugin_dir_url( __FILE__ ) . 'js/hidelinks_button.old.js'; // < WP 3.9
		}

		return $plugin_array;
	}

	/**
	 *
	 * @param $hook_suffix
	 */
	public static function localize_button_scripts( $hook_suffix ) {

		wp_localize_script( 'jquery', 'hidelinks', array(
			'title_text' => __( 'Place the cursor on the link in the editor and click the button to close the indexing of the hyperlink', 'hidelinks' )

		) );

	}


}