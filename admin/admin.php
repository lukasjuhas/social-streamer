<?php
/**
* Main Admin Class
*/
class WP_Social_Stream_Admin {

    function __construct() {
        #hooks
        add_action( 'admin_init', array( $this, 'settings' ) );
        add_action( 'admin_init', array( $this, 'scripts' ) );
        add_action( 'admin_menu', array( $this, 'ui' ) );
    }

    public function ui() {

    }

    public function enqueue_styles() {
        #settins page styles
        wp_enqueue_style( LJAMM_PLUGIN_NAME );
    }

    public function scripts() {
        #dependencies
        $deps = array();
        #register plugin styles
        wp_register_style( LJAMM_PLUGIN_NAME, LJAMM__PLUGIN_URL . 'styles/settings.css', $deps, LJAMM_VERSION );
    }

    public function settings() {

    }

    public function settings_page() {
        ob_start();
        include LJAMM__PLUGIN_DIR . 'admin/pages/settings.php';
        $settings = ob_get_contents();
        ob_end_clean();
        echo $settings;
    }

}

# init
$WP_Social_Stream_Admin = new WP_Social_Stream_Admin();
