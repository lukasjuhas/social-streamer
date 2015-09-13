<?php
# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class WP_Social_Stream {

    function __construct() {
        #requere admin
        require_once( WPSS_PLUGIN_DIR . 'admin/admin.php' );

        #plugin hooks
        add_filter( 'plugin_action_links_' . WPSS_PLUGIN_BASENAME, array($this, 'action_links') );
    }

    function action_links( $links ) {
        $links[] = '<a href="'. get_admin_url(null, 'options-general.php?page=wp-social-stream') .'">Settings</a>'; //TODO: correct link
        return $links;
    }
}

#init
$WP_Social_Stream = new WP_Social_Stream();
