<?php
/**
 * @package Social Stream
 */
/**
 * Plugin Name: Social Stream
 * Plugin URI: https://github.com/lukasjuhas/wp-social-stream/
 * Description: This plugin allows you to get all your social stream in to one timeline.
 * Version: 0.0.1
 * Author: Lukas Juhas
 * Author URI: http://lukasjuhas.com/
 * License: GPL2
 */

/*  Copyright 2014  Lukas Juhas  (email : hello@lukasjuhas.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

// Define some useful stuff
define( 'SOCSTRM_VERSION', '0.0.1' );
define( 'SOCSTRM__MINIMUM_WP_VERSION', '3.9.2' );
define( 'SOCSTRM__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SOCSTRM__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SOCSTRM_DELETE_LIMIT', 100000 );

/**
 * Init Plugin function
 * @author Lukas Juhas
 * @version 0.0.1
 * @package Social Stream
 * @since   2014-10-27
 */
function socstrm_init() {
	$includes = array(
			'functions.php'
	);
	$classes = array(
			'socstrm_class.php'
	);

	foreach($includes as $file) {
		require( dirname( __FILE__ ) . '/inc/' . $file);
	}

	foreach($classes as $class) {
		require( dirname( __FILE__ ) . '/class/' . $class);
	}
}
add_action( 'init', 'socstrm_init', 1);


/**
 * Activation of plugin
 * @author Lukas Juhas
 * @version 0.0.1
 * @package Social Stream
 * @since   2014-10-27
 */
function socstrm_activate() {
	// This function runs on plugin activation
}
register_activation_hook( __FILE__, 'socstrm_activate' );

// If logged in backed / is admin - get admin specified files
if ( is_admin() ) {
	//require_once( SOCSTRM__PLUGIN_DIR . '/class/admin.php' );
}

