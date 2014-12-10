<div class="wrap">
<img style="float:left; padding:4px; padding-top:8px; padding-right:12px" src="<?php echo plugin_dir_url( __FILE__ ); ?>../plugin/images/icon.png"></img><h2 >Errbit Wordpress</h2>
<p>Errbit is a tool that collects and aggregates errors for webapps. This Plugin makes it simple to track PHP errors in your Wordpress install. Once installed it'll collect all errors with the Wordpress Core and Wordpress Plugins.</p>
<p>This plugin requires an Errbit installation. <a href="https://github.com/errbit/errbit">Learn more about errbit.</a>
<form method="post" action="options.php">
<?php wp_nonce_field( 'update-options' ); ?>

    <table class="form-table">
        <tr valign="top">
        <th scope="row">Status</th>
        <td>
		<select name="errbit_wordpress_setting_status">
		  <option value="0"<?php echo ! get_option( 'errbit_wordpress_setting_status' ) ? ' selected="selected"': '';?>>Disabled</option>
		  <option value="1"<?php echo get_option( 'errbit_wordpress_setting_status' ) ? ' selected="selected"': '';?>>Enabled</option>
		</select>
	</td>

        <tr valign="top">
        <th scope="row">URL</th>
        <td><input type="text" size="45" name="errbit_wordpress_setting_url" value="<?php echo get_option( 'errbit_wordpress_setting_url' ); ?>" /></td>
        </tr>

        </tr>
        <tr valign="top">
        <th scope="row">Enviroment Name</th>
        <td><input type="text" size="45" name="errbit_wordpress_setting_environment_name" value="<?php echo get_option( 'errbit_wordpress_setting_environment_name' ); ?>" /></td>
        </tr>

        </tr>
        <tr valign="top">
        <th scope="row">API Key</th>
        <td><input type="text" size="45" name="errbit_wordpress_setting_apikey" value="<?php echo get_option( 'errbit_wordpress_setting_apikey' ); ?>" /><br><p><a href="https://github.com/errbit/errbit">Learn more about Errbit</a></p></td>
        </tr>

        <tr valign="top">
        <th scope="row">Enable the logging of warning level messages</th>
        <td>
		<select name="errbit_wordpress_setting_warrings">
		  <option value="0"<?php echo !get_option( 'errbit_wordpress_setting_warrings' ) ? ' selected="selected"': '';?>>No</option>
		  <option value="1"<?php echo get_option( 'errbit_wordpress_setting_warrings' ) ? ' selected="selected"': '';?>>Yes</option>
		</select>
        <p>Warning: This option will create a lot of error notification.</p>
    	</td>
        </tr>
    </table>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="errbit_wordpress_setting_url,errbit_wordpress_setting_status,errbit_wordpress_setting_environment_name,errbit_wordpress_setting_apikey,errbit_wordpress_setting_warrings" />

    <?php submit_button(); ?>

</form>
</div>
