<?php

/*
Plugin Name: errbit-wordpress
Description: Errbit Wordpress

Author: Errbit.io
Author URI: https://github.com/airbrake/errbit-wordpress

Description: Errbit lets you discover errors and bugs in your Wordpress install. 

Version: 0.1
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

if ( get_option('errbit_wordpress_setting_status') ) {
	require_once 'classes/airbrake-php/src/Errbit/EventHandler.php';
	$apiKey  = trim( get_option( 'errbit_wordpress_setting_apikey' ) );

	$async = (boolean) get_option( 'errbit_wordpress_setting_async' );
	$timeout = (int) get_option( 'errbit_wordpress_setting_timeout' );
	$warrings = get_option( 'errbit_wordpress_setting_warrings' );

	$options = array(
		'async'   => $async,
		'timeout' => $timeout,
	);

	Errbit\EventHandler::start( $apiKey, $warrings, $options );
}

