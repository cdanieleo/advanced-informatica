<?php

// *******************
// block direct access
// *******************
ecp_check_access();

// ******************
// when form was sent
// ******************
global $wpdb;
if( isset( $_POST ) && isset( $_POST[ 'submit' ] ) ) {

    // secure post data and set variables
    $_POST = stripslashes_deep ( $_POST );
    $t_ecp_name = $_POST[ 'name' ];
    $t_ecp_code = $_POST[ 'code' ];
    $t_ecp_alignment = $_POST[ 'alignment' ];
    $t_ecp_status = $_POST[ 'status' ];

    if( strlen ( $t_ecp_name ) > 30 ) {
        
        // when name is longer than 30 chars
        $ecp_error = __( 'A maximum of 30 Characters is allowed', 'easy-code-placement' );
        $ecp_error_page = "&load=add";
        $ecp_error_id = "";
        return( ecp_error( $ecp_error, $ecp_error_page, $ecp_error_id ) );
    }

    if( preg_match ( "/[^a-zA-Z0-9\_-]/i", $t_ecp_name ) ) {
        
        // when name contains spechial chars
        $ecp_error = __( 'Special Characters are not allowed in the Code Name', 'easy-code-placement' );
        $ecp_error_page = "&load=add";
        $ecp_error_id = "";
        return( ecp_error( $ecp_error, $ecp_error_page, $ecp_error_id ) );
    }

    if( $t_ecp_name =="" || $t_ecp_code =="" ) {
        
        // when post emty goto error page
	$ecp_error = __( 'The Code Name and / or the Code must be filled in', 'easy-code-placement' );
        $ecp_error_page = "&load=add";
        $ecp_error_id = "";
        return( ecp_error( $ecp_error, $ecp_error_page, $ecp_error_id ) );
    }
    
    $ecp_count = $wpdb->get_results ( "SELECT * FROM " . $wpdb->prefix . "ecp_data WHERE name = '$t_ecp_name'" );
    if( $wpdb->num_rows ) {
        
        // when name in database goto error page
	$ecp_error = __( 'The Code Name already exist - It must be uniqe', 'easy-code-placement' );
        $ecp_error_page = "&load=add";
        $ecp_error_id = "";
        return( ecp_error( $ecp_error, $ecp_error_page, $ecp_error_id ) );
    }

    $wpdb->insert( $wpdb->prefix . 'ecp_data', array ( 'name' => $t_ecp_name, 'code' => $t_ecp_code, 'alignment' => $t_ecp_alignment, 'shortcode' => $t_ecp_name, 'status' => $t_ecp_status, 'added' => date ( 'Y-m-d H:i:s' ), 'version' => ECP_VERSION ) );

    // when added to database goto options page
    header( 'Location: options-general.php?page=ecp' );
    exit();

} else {
    
// *****************
// when nothing done
// *****************
?>

<div class="wrap">
    <h2>Easy Code Placement - <?php _e('New Code','easy-code-placement'); ?></h2>

    <form method="post" class="uk-margin-top" action="<?php echo $_SERVER[ "REQUEST_URI" ]; ?>">
        <fieldset>
            <legend><?php _e( 'Name', 'easy-code-placement' ); ?>:</legend>
            <input name="name" type="text" class="uk-form-width-large">
            <p class="help-block">
                <i class="uk-icon-info"></i>&nbsp;<?php _e( 'Only Letters and Numbers are allowed', 'easy-code-placement' ); ?><br>
                <i class="uk-icon-info"></i>&nbsp;<?php _e( 'Instead of Whitesspaces use Underlines', 'easy-code-placement' ); ?><br>
                <i class="uk-icon-info"></i>&nbsp;<?php _e( 'A maximum of 30 Characters is allowed', 'easy-code-placement' ); ?>
            </p>
        </fieldset>
        <fieldset>
            <legend><?php _e( 'Code', 'easy-code-placement' ); ?>:</legend>
            <textarea name="code" rows="10" class="uk-form-width-large"></textarea>
        </fieldset>
        <fieldset>
            <legend><?php _e( 'Alignment', 'easy-code-placement' ); ?>:</legend>
            <select name="alignment" class="uk-form-width-large">
                <option value="0" checked><?php _e( 'None', 'easy-code-placement' ); ?></option>
                <option value="1"><?php _e( 'Left', 'easy-code-placement' ); ?></option>
                <option value="2"><?php _e( 'Center', 'easy-code-placement' ); ?></option>
                <option value="3"><?php _e( 'Right', 'easy-code-placement' ); ?></option>
            </select>
        </fieldset>
        <fieldset>
            <legend><?php _e( 'Status', 'easy-code-placement' ); ?>:</legend>
            <select name="status" class="uk-form-width-large">
                <option value="1" checked><?php _e( 'Online', 'easy-code-placement' ); ?></option>
                <option value="2"><?php _e( 'Offline', 'easy-code-placement' ); ?></option>
            </select>
        </fieldset>
    <button type="button" class="uk-button" onClick='document.location.href="<?php echo admin_url( 'options-general.php?page=ecp' ); ?>"'><?php _e( 'Back', 'easy-code-placement' ); ?></button>&nbsp;&nbsp;<button type="submit" name="submit" class="uk-button uk-button-primary"><?php _e( 'Add','easy-code-placement' ); ?></button>
    </form>
    
</div> 

<?php
}
?>