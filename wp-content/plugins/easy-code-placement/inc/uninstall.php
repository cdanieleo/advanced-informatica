<?php

// *******************
// block direct access
// *******************
ecp_check_access();

// ******************
// uninstall function
// ******************
function ecp_uninstall(){
    global $wpdb;
    
    // delete tables
    $wpdb->query( "DROP TABLE " . $wpdb->prefix . "ecp_data" );
    $wpdb->query( "DROP TABLE " . $wpdb->prefix . "ecp_options" );
}

// ******************************
// multiside or single uninstall?
// ******************************
function ecp_net_uninstall() {
    global $wpdb;
    
    // multiside uninstallation
    if( is_multisite() ) {
	$blog = $wpdb->blogid;
        $blogids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
        foreach( $blogids as $blogid ) {
            switch_to_blog( $blogid );
            ecp_uninstall();
        }
	switch_to_blog( $blog );
    }else{
        
    // single uninstallation	
    ecp_uninstall();
    }
}

// register uninstall hook
register_uninstall_hook( ECP_FILE, 'ecp_net_uninstall' );

// *********************************************
// delete tables and data when a blog is deleted
// *********************************************
function ecp_deleted_blog( $tables ) {
    global $wpdb;
    $tables[] = $wpdb->prefix . 'ecp_options';
    $tables[] = $wpdb->prefix . 'ecp_data';
    return $tables;
}
add_filter( 'wpmu_drop_tables', 'ecp_deleted_blog', 99 );

?>