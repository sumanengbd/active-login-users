<?php
/*
 * Plugin Name: Active Login Users
 * Plugin URI: http://github.com/sumanengbd/
 * Description: The Active Login Users plugin is an outstanding resource that allows you to display all users and currently logged-in users on your posts, pages, and other locations.
 * Version: 1.0
 * Author: Suman Ali
 * Author URI: http://github.com/sumanengbd/
 * Text Domain: alu
 * License: GPL3
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'ACTIVE_LOGIN_USERS_VERSION' ) ) {
    define( 'ACTIVE_LOGIN_USERS_VERSION', '1.0' );
    define( 'ACTIVE_LOGIN_USERS_FILE', __FILE__ );
	define( 'ACTIVE_LOGIN_USERS_PATH', dirname( ACTIVE_LOGIN_USERS_FILE ) );
	define( 'ACTIVE_LOGIN_USERS_INCLUDES', ACTIVE_LOGIN_USERS_PATH . '/includes' );
    define( 'ACTIVE_LOGIN_USERS_URL', plugin_dir_URL( ACTIVE_LOGIN_USERS_FILE ) );
    define( 'ACTIVE_LOGIN_USERS_ASSETS', ACTIVE_LOGIN_USERS_URL . 'assets' );

    // Include the main LoginUsers class.
    require_once ACTIVE_LOGIN_USERS_INCLUDES . '/class-active-login-users.php';
}
