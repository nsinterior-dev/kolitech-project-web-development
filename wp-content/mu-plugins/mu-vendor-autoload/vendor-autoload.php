<?php
/**
 * Plugin Name: Vendor Autoload (MU)
 * Description: Require vendor/autoload
 * Version: 0.5
 * Author: abuyoyo
 * Author URI: https://github.com/abuyoyo/
 * Plugin URI: https://github.com/abuyoyo/mu-vendor-autoload
 * Last Update: 2020_02_10
 */
if ( ! defined( 'ABSPATH' ) )
	die( 'No soup for you!' );

if ( ! defined('VENDOR_DIR') )
	define( 'VENDOR_DIR', WP_CONTENT_DIR . '/vendor' );

require VENDOR_DIR . '/autoload.php';