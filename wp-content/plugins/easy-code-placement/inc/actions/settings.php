<?php

// *******************
// block direct access
// *******************
ecp_check_access();

global $wpdb;

// secure post data and set variables
$_POST = stripslashes_deep( $_POST );
$t_ecp_per_page = $_POST[ 'perpage' ];
$t_ecp_role = $_POST[ 'role' ];

if( $t_ecp_per_page == "" ) {
    
    // when perpage is empty
    $ecp_error = __( 'The Option "Codes per Page" must be filled in', 'easy-code-placement' );
    $ecp_error_page = "&load=settings";
    $ecp_error_id = "";
    return( ecp_error( $ecp_error, $ecp_error_page, $ecp_error_id ) );
}

if( !is_numeric( $t_ecp_per_page ) ) {
    
    // when perpage not a number
    $ecp_error = __( 'The Value for the Option "Codes per Page" must be numeric', 'easy-code-placement' );
    $ecp_error_page = "&load=settings";
    $ecp_error_id = "";
    return( ecp_error( $ecp_error, $ecp_error_page, $ecp_error_id ) );
}

$wpdb->update( $wpdb->prefix . 'ecp_options', array( 'option_value' => $t_ecp_per_page ), array( 'option_name' => 'perpage' ) );
$wpdb->update( $wpdb->prefix . 'ecp_options', array( 'option_value' => $t_ecp_role ), array( 'option_name' => 'role' ) );

// when added to database goto options page
header( 'Location: options-general.php?page=ecp' );

?>