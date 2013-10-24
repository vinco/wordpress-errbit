<?php

function errbit_wordpress_install () {
  add_option( 'errbit_wordpress_setting_status', '0', '', 'yes' );	
  add_option( 'errbit_wordpress_setting_apikey', '', '', 'yes' );	
  add_option( 'errbit_wordpress_setting_timeout', '2', '', 'yes' );	
  add_option( 'errbit_wordpress_setting_warrings', '0', '', 'yes' );	
  add_option( 'errbit_wordpress_setting_async', '0', '', 'yes' );	

}

function errbit_wordpress_uninstall () {
  delete_option( 'errbit_wordpress_setting_status' );	
  delete_option( 'errbit_wordpress_setting_apikey' );	
  delete_option( 'errbit_wordpress_setting_timeout' );	
  delete_option( 'errbit_wordpress_setting_warrings' );	
  delete_option( 'errbit_wordpress_setting_async' );	

}