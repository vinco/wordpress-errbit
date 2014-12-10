<?php

function errbit_wordpress_install () {
  add_option( 'errbit_wordpress_setting_status', '0', '', 'yes' );
  add_option( 'errbit_wordpress_setting_url', '', '', 'yes' );
  add_option( 'errbit_wordpress_setting_apikey', '', '', 'yes' );
  add_option( 'errbit_wordpress_setting_warrings', '0', '', 'yes' );
  add_option( 'errbit_wordpress_setting_environment_name', 'production', '', 'yes' );
}

function errbit_wordpress_uninstall () {
  delete_option( 'errbit_wordpress_setting_status' );
  delete_option( 'errbit_wordpress_setting_url' );
  delete_option( 'errbit_wordpress_setting_warrings' );
  delete_option( 'errbit_wordpress_setting_environment_name' );
}