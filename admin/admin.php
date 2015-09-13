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
        add_menu_page( __('Social Stream', WPSS_PLUGIN_NAME), __('Social Stream', WPSS_PLUGIN_NAME), 'manage_options', 'wp-social-stream', array($this, 'settings_page'), 'dashicons-share', 100 );
    }

    public function enqueue_styles() {
        #settins page styles
        wp_enqueue_style( WPSS_PLUGIN_NAME );
    }

    public function scripts() {
        #dependencies
        $deps = array();
        #register plugin styles
        wp_register_style( WPSS_PLUGIN_NAME, WPSS_PLUGIN_URL . 'styles/settings.css', $deps, WPSS_VERSION );
    }

    public function settings() {

    }

    public function settings_page() {
        ob_start();
        include WPSS_PLUGIN_DIR . 'admin/pages/settings.php';
        $settings = ob_get_contents();
        ob_end_clean();
        echo $settings;
    }

}

# init
$Social_Streamer_Admin = new Social_Streamer_Admin();
