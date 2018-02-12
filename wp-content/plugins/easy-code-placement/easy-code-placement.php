<?php
/*
 * Plugin Name: Easy Code Placement
 * Text Domain: easy-code-placement
 * Domain Path: /lang
 * Version: 17.08
 * Plugin URI: https://www.randnotizen.org/easy-code-placement/
 * Author: Jens Herdy
 * Author URI: https://www.randnotizen.org/
 * Description: A great Wordpress Plugin to place ANY Code ANYWHERE you want.
 * License: GPLv3
 */

// ************************
// check for direct accesss
// ************************
function ecp_check_access() {
    if ( !function_exists( 'add_action' ) ) {
        echo 'I\'s not allowed to access any file directly!';
        exit;
    }
}

// *******************
// block direct access
// *******************
ecp_check_access();

// *******************************************
// quick and dirty fix for output buffer error
// *******************************************
ob_start();

// *********
// standards
// *********
define( 'ECP_FILE', __FILE__ );
define( 'ECP_VERSION', '17.08' );

// ***********************
// load functions, classes
// ***********************
include( dirname( __FILE__ ) . '/inc/functions.php' );

// *********************************
// set filters to replace shortcodes
// *********************************
add_filter( 'the_title', 'do_shortcode', 99);
add_filter( 'the_content', 'do_shortcode', 99);
add_filter( 'widget_title', 'do_shortcode', 99);
add_filter( 'widget_text', 'do_shortcode', 99);
add_filter( 'the_excerpt', 'do_shortcode', 99);
add_filter( 'the_tags', 'do_shortcode', 99);

// **************
// load languages
// **************
load_plugin_textdomain( 'easy-code-placement', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );

// ***********************************
// include install and uninstall files
// ***********************************
include( dirname( __FILE__ ) . '/inc/install.php' );
include( dirname( __FILE__ ) . '/inc/uninstall.php' );

// *******************
// update if neccesary
// *******************
ecp_do_update();

// ****************
// add options menu
// ****************
add_action( 'admin_menu', 'ecp_add_page' );

// **********
// add widget
// **********
add_action( 'widgets_init', 'ecp_register_widget' );

?>