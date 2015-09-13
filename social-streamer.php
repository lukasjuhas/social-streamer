<?php
/**
* Plugin Name: Social Streamer
* Plugin URI: https://github.com/lukasjuhas/social-streamer/
* Description: This plugin allows you to get all your social stream in to one timeline.
* Version: 0.1.0
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
define( 'SS__VERSION', '0.1' );
define( 'SS__MINIMUM_WP_VERSION', '3.8.0' );
define( 'SS__PLUGIN_BASENAME', plugin_basename( __FILE__ ));
define( 'SS__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SS__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SS__PLUGIN_NAME', substr(SS__PLUGIN_BASENAME, 0, strrpos( SS__PLUGIN_BASENAME, '/')) );
define( 'SS__CONTACT_EMAIL', 'hello@lukasjuhas.com' );

# hooks
add_action( 'activate_' . SS__PLUGIN_BASENAME, 'ss__install' );
add_action( 'init', 'ss__init' );

# on installation
function ss__install() {

}

# init
function ss__init() {
    require_once( SS__PLUGIN_DIR . 'init.php' );
}
