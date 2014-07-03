<?php

/*
Plugin Name: errbit-wordpress
Description: Errbit Wordpress

Author: Aibrake.io, Michael Bianco (@iloveitaly)
Author URI: https://github.com/airbrake
Plugin URI: https://github.com/iloveitaly/wordpress-errbit

Description: Errbit lets you discover errors and bugs in your Wordpress install.

Version: 1.1
License: GPL
*/

global $wpdb;

define( 'AW_TITLE', 'Errbit Wordpress' );
define( 'AW_SLUG', 'errbit-wordpress' );

define( 'AW_DOCROOT', dirname( __FILE__ ) );
define( 'AW_WEBROOT', str_replace( getcwd(), home_url(), dirname(__FILE__) ) );

register_activation_hook( __FILE__, 'errbit_wordpress_install' );
register_deactivation_hook( __FILE__, 'errbit_wordpress_uninstall' );

add_action( 'admin_menu', 'errbit_wordpress_admin_menu' );

include 'classes/install.php';
include 'classes/controller.php';

// TODO should handle the JS errbit include here as well

if ( get_option('errbit_wordpress_setting_status') ) {
	require_once 'classes/errbit-php/lib/Errbit.php';
	$errbit_api  = trim( get_option( 'errbit_wordpress_setting_apikey' ) );
	$errbit_url  = trim( get_option( 'errbit_wordpress_setting_url' ) );

	$warnings = (int) get_option( 'errbit_wordpress_setting_warrings' );
	$handlers = array( 'error', 'exception', 'fatal' );
	if ($warnings === 0) {
		unset($handlers[0]);
	}

	// legacy from the airbrake plugin
	// $async = (boolean) get_option( 'errbit_wordpress_setting_async' );
	// $timeout = (int) get_option( 'errbit_wordpress_setting_timeout' );

	Errbit::instance()
	  ->configure(array(
	    'api_key'           => $errbit_api,
	    'host'              => $errbit_url,

	    // TODO support more of the options
	    // 'port'              => 80,                                   // optional
	    // 'secure'            => false,                                // optional
	    // 'project_root'      => '/your/project/root',                 // optional
	    // 'environment_name'  => 'production',                         // optional
	    // 'params_filters'    => array('/password/', '/card_number/'), // optional
	    // 'backtrace_filters' => array('#/some/long/path#' => '')      // optional
	  ))
	  ->start( $handlers );
}
