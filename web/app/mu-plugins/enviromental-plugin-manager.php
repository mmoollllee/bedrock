<?php
/*
Plugin Name: Plugin control
Description: Force-enables or force-disables plugins, according to your rules
Version: 0.2
License: GPL version 2 or any later version
Author: Mark Jaquith
Author URI: http://coveredwebservices.com/
*/
class CWS_Disable_Plugins {
	protected $plugins = array();
	protected $message = 'Disabled in this environment';
	/**
	 * Sets up the options filter, and optionally handles an array of plugins to disable
	 * @param array $disables Optional array of plugin filenames to disable
	 */
	public function __construct( Array $plugins, $message = NULL ) {
		// Handle what was passed in
		foreach ( $plugins as $plugin )
				$this->choose( $plugin );
		if ( ! is_null( $message ) )
			$this->message = $message;
		// Add the filter
		add_filter( 'option_active_plugins', array( $this, 'alter' ) );
	}
	/**
	 * Adds a filename to the list of plugins to disable
	 */
	public function choose( $file ) {
		$this->plugins[] = $file;
		add_filter( 'plugin_action_links_' . plugin_basename( $file ), array( $this, 'change_action_links' ) );
	}
	function change_action_links( $actions ) {
		unset( $actions['activate'] );
		unset( $actions['delete'] );
		$actions['disabled'] = '<i>' . esc_html( $this->message ) . '</i>';
		return $actions;
	}
	/**
	 * Hooks in to the option_active_plugins filter and does the disabling
	 * @param array $plugins WP-provided list of plugin filenames
	 * @return array The filtered array of plugin filenames
	 */
	public function alter( $plugins ) {
		if ( count( $this->plugins ) ) {
			foreach ( (array) $this->plugins as $plugin ) {
				$key = array_search( $plugin, $plugins );
				if ( false !== $key )
					unset( $plugins[$key] );
			}
		}
		return $plugins;
	}
}
class CWS_Enable_Plugins extends CWS_Disable_Plugins {
	protected $message = 'Force-enabled';
	function change_action_links( $actions ) {
		unset( $actions['deactivate'] );
		unset( $actions['delete'] );
		$actions['enabled'] = '<i>' . esc_html( $this->message ) . '</i>';
		return $actions;
	}
	/**
	 * Hooks in to the option_active_plugins filter and does the enabling
	 * @param array $plugins WP-provided list of plugin filenames
	 * @return array The filtered array of plugin filenames
	 */
	public function alter( $plugins ) {
		if ( count( $this->plugins ) ) {
			foreach ( (array) $this->plugins as $plugin ) {
				$key = array_search( $plugin, $plugins );
				if ( false === $key )
					$plugins[] = $plugin;
			}
		}
		return $plugins;
	}
}
/* ============================================================== */
/* == Begin customization ======================================= */
/* ============================================================== */
/*
Usage:
new CWS_Enable_Plugins( array( 'plugin-dir/relative-path.php', 'another/path.php' ), 'Plugins screen message to replace action links' );
new CWS_Disable_Plugins( array( 'plugin-dir/relative-path.php', 'another/path.php' ), 'Plugins screen message to replace action links' );
Note that you can have multiple instances of each. Go nuts.


if ( defined( 'WP_LOCAL_DEV' ) && WP_LOCAL_DEV ) { // For local dev
	new CWS_Disable_Plugins( array( 'vaultpress.php', 'vaultpress/vaultpress.php' ), 'Only available in production' );
	new CWS_Enable_Plugins( array( 'debug-bar/debug-bar.php', 'debug-bar-console/debug-bar-console.php' ), 'Enabled for development' );
} else { // Else, production
	new CWS_Disable_Plugins( array( 'debug-bar/debug-bar.php', 'debug-bar-console/debug-bar-console.php' ), 'Disabled on production' );
}
// And always:
new CWS_Enable_Plugins( array(
	'manual-control/manual-control.php',
), 'Always enabled' );


*/

if (defined('DISABLED_PLUGINS')) {
    $plugins_to_disable = unserialize(DISABLED_PLUGINS);

    if (!empty($plugins_to_disable) && is_array($plugins_to_disable)) {
        new CWS_Disable_Plugins( $plugins_to_disable, 'Autodisabled' );
    }
}

if (defined('ENABLED_PLUGINS')) {
    $plugins_to_enable = unserialize(ENABLED_PLUGINS);

    if (!empty($plugins_to_enable) && is_array($plugins_to_enable)) {
        new CWS_Enable_Plugins( $plugins_to_enable, 'Autoenabled' );
    }
}
