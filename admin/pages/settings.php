<div class="wrap wpss ss--settings">
    <h2><?php _e('Social Stream', SS__PLUGIN_NAME ); ?></h2>

    <form method="post" action="options.php">
        <?php settings_fields( 'wpss' ); ?>
        <?php do_settings_sections( 'wpss' ); ?>

        <h3><?php _e('Twitter', SS__PLUGIN_NAME ); ?></h3>
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><?php _e('Consumer Key (API Key)', SS__PLUGIN_NAME ); ?></th>
                <td><input type="text" name="ss__twitter_consumer_key" value="<?php echo esc_attr( get_option('ss__twitter_consumer_key') ) ?>"></td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e('Consumer Secret (API Secret)', SS__PLUGIN_NAME ); ?></th>
                <td><input type="text" name="ss__twitter_consumer_secret" value="<?php echo esc_attr( get_option('ss__twitter_consumer_secret') ) ?>"></td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e('Access Token', SS__PLUGIN_NAME ); ?></th>
                <td><input type="text" name="ss__twitter_access_token" value="<?php echo esc_attr( get_option('ss__twitter_access_token') ) ?>"></td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e('Access Token Secret', SS__PLUGIN_NAME ); ?></th>
                <td><input type="text" name="ss__twitter_access_token_secret" value="<?php echo esc_attr( get_option('ss__twitter_access_token_secret') ) ?>"></td>
            </tr>
        </table>

        <?php submit_button(); ?>

    </form>
</div>
