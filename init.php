<?php
# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class Social_Streamer {

    function __construct() {
        #requere admin
        require_once( SS__PLUGIN_DIR . 'admin/admin.php' );

        #plugin hooks
        add_filter( 'plugin_action_links_' . SS__PLUGIN_BASENAME, array($this, 'action_links') );
    }

    function action_links( $links ) {
        $links[] = '<a href="'. get_admin_url(null, 'options-general.php?page=social-streamer') .'">Settings</a>'; //TODO: correct link
        return $links;
    }
}

#init
$Social_Streamer = new Social_Streamer();
