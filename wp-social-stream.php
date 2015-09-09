<?php
/**
* Plugin Name: Social Stream
* Plugin URI: https://github.com/lukasjuhas/wp-social-stream/
* Description: This plugin allows you to get all your social stream in to one timeline.
* Version: 0.1
* Author: Lukas Juhas
* Author URI: http://lukasjuhas.com/
* License: GPL2
*/

/*  Copyright 2014-2015  Lukas Juhas  (email : hello@lukasjuhas.com)

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

# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

# define stuff
define( 'WPSS_VERSION', '0.1' );
define( 'WPSS_MINIMUM_WP_VERSION', '3.9.0' );
define( 'WPSS_PLUGIN_BASENAME', plugin_basename( __FILE__ ));
define( 'WPSS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WPSS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WPSS_PLUGIN_NAME', substr(WPSS_PLUGIN_BASENAME, 0, strrpos( WPSS_PLUGIN_BASENAME, '/')) );
define( 'WPSS_CONTACT_EMAIL', 'hello@lukasjuhas.com' );

# hooks
add_action( 'activate_' . LJAMM__PLUGIN_BASENAME, 'wpss_install' );
add_action( 'init', 'wpss_init' );

# on installation
function wpss_install() {

}

# init
function wpss_init() {
    require_once( LJAMM__PLUGIN_DIR . 'init.php' );
}
