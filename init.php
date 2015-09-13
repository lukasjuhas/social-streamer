<?php
# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

include_once('twitter/twitter.php');
require('instagram/vendor/instagram.php');
use MetzWeb\Instagram\Instagram;


class Social_Streamer {

    function __construct() {
        #requere admin
        require_once( SS__PLUGIN_DIR . 'admin/admin.php' );

        #plugin hooks
        add_filter( 'plugin_action_links_' . SS__PLUGIN_BASENAME, array($this, 'action_links') );

        // /add_action( 'wp', array($this, 'instagram_feed') );
    }

    function action_links( $links ) {
        $links[] = '<a href="'. get_admin_url(null, 'options-general.php?page=social-streamer') .'">Settings</a>'; //TODO: correct link
        return $links;
    }

    function twitter_feed() {
        $twitter = new SS__Twitter();
        $most_recent = $twitter->get_most_recent_tweets('itslukasjuhas');
        return $most_recent;
    }

    function instagram_feed() {
      $instagram = new Instagram(array(
        'apiKey'      => SS_INSTAGRAM_API_KEY,
        'apiSecret'   => SS_INSTAGRAM_API_SECRET,
        'apiCallback' => SS_INSTAGRAM_API_CALLBACK
      ));

      print_r($instagram->getUserFeed());
    }
}

#init
$Social_Streamer = new Social_Streamer();
