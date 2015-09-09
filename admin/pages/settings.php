<div class="wrap wpss wpss--settings">
    <h2><?php _e('Social Stream', WPSS_PLUGIN_NAME ); ?></h2>

    <form method="post" action="options.php">
        <?php settings_fields( 'wpss' ); ?>
        <?php do_settings_sections( 'wpss' ); ?>

        <table class="form-table">
            <tr valign="top">
                <th scope="row"><?php _e('Test', WPSS_PLUGIN_NAME ); ?></th>
                <td><input type="checkbox" name="wpss-test" value="1" <?php checked( esc_attr( get_option('wpss-test') ), 1 ); ?>></td>
            </tr>
        </table>

        <?php submit_button(); ?>

    </form>
</div>
