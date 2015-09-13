<?php
/**
* Main Admin Class
*/
class Social_Streamer_Admin {

    function __construct() {
        #hooks
        add_action( 'admin_init', array( $this, 'settings' ) );
        add_action( 'admin_init', array( $this, 'scripts' ) );
        add_action( 'admin_menu', array( $this, 'ui' ) );
    }

    public function ui() {
        add_menu_page( __('Social Stream', SS__PLUGIN_NAME), __('Social Stream', SS__PLUGIN_NAME), 'manage_options', 'social-streamer', array($this, 'settings_page'), 'dashicons-share', 100 );
    }

    public function enqueue_styles() {
        #settins page styles
        wp_enqueue_style( SS__PLUGIN_NAME );
    }

    public function scripts() {
        #dependencies
        $deps = array();
        #register plugin styles
        wp_register_style( SS__PLUGIN_NAME, SS__PLUGIN_URL . 'styles/settings.css', $deps, SS__VERSION );
    }

    public function settings() {
        //twitter
        register_setting( 'wpss', 'ss__twitter_consumer_key' );
        register_setting( 'wpss', 'ss__twitter_consumer_secret' );
        register_setting( 'wpss', 'ss__twitter_access_token' );
        register_setting( 'wpss', 'ss__twitter_access_token_secret' );

        //Instagram
        register_setting( 'wpss', 'ss__instagram_api_key' );
        register_setting( 'wpss', 'ss__instagram_api_secret' );
        register_setting( 'wpss', 'ss__instagram_api_callback' );
    }

    public function settings_page() {
        ob_start();
        include SS__PLUGIN_DIR . 'admin/pages/settings.php';
        $settings = ob_get_contents();
        ob_end_clean();
        echo $settings;
    }

}

# init
$Social_Streamer_Admin = new Social_Streamer_Admin();
