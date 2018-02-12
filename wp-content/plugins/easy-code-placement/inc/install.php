<?php

// *******************
// block direct access
// *******************
ecp_check_access();

// ****************
// install function
// ****************
function ecp_install(){
    global $wpdb;
    
    // create data table
    $ecp_table = "CREATE TABLE IF NOT EXISTS " . $wpdb->prefix . "ecp_data (
        `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
        `code` longtext COLLATE utf8_unicode_ci NOT NULL,
        `alignment` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
        `shortcode` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
        `status` int NOT NULL,
        `added` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
        `changed` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
        `version` varchar(10) COLLATE utf8_unicode_ci NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";
    $wpdb->query( $ecp_table );
    
    // create options table
    $ecp_options = "CREATE TABLE IF NOT EXISTS " . $wpdb->prefix . "ecp_options (
        `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `option_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL UNIQUE,
        `option_value` varchar(20) COLLATE utf8_unicode_ci NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";
    $wpdb->query( $ecp_options );
    
    // insert data (ignore for updates)
    $wpdb->query( "INSERT IGNORE INTO " . $wpdb->prefix . "ecp_options ( option_name, option_value ) VALUES ( 'version', '" . ECP_VERSION . "' )" );
    $wpdb->query( "INSERT IGNORE INTO " . $wpdb->prefix . "ecp_options ( option_name, option_value ) VALUES ( 'perpage', '10' )" );
    $wpdb->query( "INSERT IGNORE INTO " . $wpdb->prefix . "ecp_options ( option_name, option_value ) VALUES ( 'role', 'manage_options' )" );
}

// *********************************
// multiside or single installation?
// *********************************
function ecp_net_inst( $networkwide ) {
    global $wpdb;
    
    // multiside installation
    if( is_multisite() && $networkwide ) {
        $blog = $wpdb->blogid;
        $blogids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
        foreach ( $blogids as $blogid ) {
            switch_to_blog( $blogid );
            ecp_install();
        }
    switch_to_blog( $blog );
    }else{
        
        // single installation	
        ecp_install();
    }
}

// register install hook
register_activation_hook( ECP_FILE, 'ecp_net_inst' );

// ****************************************************
// add tables and data in it when a new blog is created
// ****************************************************
function ecp_new_blog( $blog_id ) {
    if( is_plugin_active_for_network( 'easy-code-placement/easy-code-placement.php' ) ) {
        switch_to_blog( $blog_id );
        ecp_install();
        restore_current_blog();
    }
}

// tell wordpress what to do when adding a new blog
add_action( 'wpmu_new_blog', 'ecp_new_blog', 99 );

?>