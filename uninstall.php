<?php
# make sure uninstallation is triggered
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
		exit();

# on uninstall, clean up database removing plugin options
function ss__delete_plugin() {
		// delete_option( 'wpss-content' );
}

ss__delete_plugin();
