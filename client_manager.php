<?php
/**
 * Plugin Name: Client Manager
 * Plugin URI:  http://ftscreations.com/cplugins/client-manager
 * Description: Manage client is, projects, invoices and more all from the backend of Wordpress.
 * Version:     0.1.0
 * Author:      Josh Cross
 * Author URI:  http://ftscreations.com
 * License:     GPLv2+
 * Text Domain: cmfts_
 * Domain Path: /languages
 */

/**
 * Copyright (c) 2014 Josh Cross (email : joshcross@ftscreations.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/**
 * Built using grunt-wp-plugin
 * Copyright (c) 2013 10up, LLC
 * https://github.com/10up/grunt-wp-plugin
 */

// Useful global constants
define( 'CMFTS__VERSION', '0.1.0' );
define( 'CMFTS__URL',     plugin_dir_url( __FILE__ ) );
define( 'CMFTS__PATH',    dirname( __FILE__ ) . '/' );

/**
 * Default initialization for the plugin:
 * - Registers the default textdomain.
 */
function cmfts__init() {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'cmfts_' );
	load_textdomain( 'cmfts_', WP_LANG_DIR . '/cmfts_/cmfts_-' . $locale . '.mo' );
	load_plugin_textdomain( 'cmfts_', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

/**
 * Activate the plugin
 */
function cmfts__activate() {
	// First load the init scripts in case any rewrite functionality is being loaded
	cmfts__init();

	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'cmfts__activate' );

/**
 * Deactivate the plugin
 * Uninstall routines should be in uninstall.php
 */
function cmfts__deactivate() {

}
register_deactivation_hook( __FILE__, 'cmfts__deactivate' );

// Wireup actions
add_action( 'init', 'cmfts__init' );

// Wireup filters

// Wireup shortcodes
