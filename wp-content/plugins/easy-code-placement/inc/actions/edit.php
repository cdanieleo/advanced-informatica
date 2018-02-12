<?php

// *******************
// block direct access
// *******************
ecp_check_access();

global $wpdb;

if( isset( $_GET[ 'pagenum' ] ) ) {
    $t_ecp_sendpage = $_GET[ 'pagenum' ];
    $ecp_sendpage = '&pagenum=' . $t_ecp_sendpage . '';
}

// ******************
// when form was sent
// ******************
if( isset( $_POST ) && isset( $_POST[ 'submit' ] ) ) {

    // secure post data and set variables
    $_POST = stripslashes_deep( $_POST );
    $t_ecp_code = $_POST[ 'code' ];
    $t_ecp_alignment = $_POST[ 'alignment' ];
    $t_ecp_status = $_POST[ 'status' ];
    $t_ecp_id = $_POST[ 'id' ];
    
    if( $t_ecp_id=="" || !is_numeric( $t_ecp_id ) ) {
        
        // when get emty or other than numbers goto error page
        $ecp_error = __( 'Modifying of the ID is not allowed', 'easy-code-placement' );
        $ecp_error_page = "";
        $ecp_error_id = "";
        return( ecp_error( $ecp_error, $ecp_error_page, $ecp_error_id ) );
    }

    if( $t_ecp_code == "" ) {
        
        // when post emty goto error page
	$ecp_error = __( 'The Code must be filled in', 'easy-code-placement' );
        $ecp_error_page = "&load=edit";
        $ecp_error_id = "&ecpid=$ecp_id";
        return( ecp_error( $ecp_error, $ecp_error_page, $ecp_error_id ) );
    }
    
    $wpdb->update( $wpdb->prefix . 'ecp_data', array( 'code' => $t_ecp_code, 'alignment' => $t_ecp_alignment, 'status' => $t_ecp_status, 'changed' => date( 'Y-m-d H:i:s' ) ), array( 'id' => $t_ecp_id ) );

    // when edited goto options page
    header( 'Location: options-general.php?page=ecp' . $ecp_sendpage . '' );
    exit();

}else{
    
// *****************
// when nothing done
// ******************
  
    // secure get data and set variables
    $_GET = stripslashes_deep( $_GET );
    $ecp_id = $_GET[ 'ecpid' ];

    if( $ecp_id == "" || !is_numeric( $ecp_id ) ) {
        
        // when get emty or other than numbers goto error page
        $ecp_error = __( 'Modifying of the ID is not allowed', 'easy-code-placement' );
        $ecp_error_page = "";
        $ecp_error_id = "";
        return( ecp_error( $ecp_error, $ecp_error_page, $ecp_error_id ) );
    }

    $ecp_load = $wpdb->get_row( 'SELECT * FROM ' . $wpdb->prefix . 'ecp_data WHERE id= ' . $ecp_id . '' );
?>

<div class="wrap">
    <h2>Easy Code Placement - <?php _e( 'Edit Code', 'easy-code-placement' ); ?></h2>

    <form method="post" class="uk-margin-top" action="<?php echo $_SERVER[ "REQUEST_URI" ]; ?>">
        <fieldset>
            <legend><?php _e( 'Name', 'easy-code-placement' ); ?>:</legend>
            <input name="name" type="text" class="uk-form-width-large" placeholder="<?php echo ( $ecp_load->name ); ?>" disabled>
            <input type="hidden" name="id" align="center" value="<?php echo ( $ecp_load->id ); ?>">
        </fieldset>
        <fieldset>
            <legend><?php _e( 'Code', 'easy-code-placement' ); ?>:</legend>
            <textarea name="code" rows="10" class="uk-form-width-large"><?php echo ( $ecp_load->code ); ?></textarea>
        </fieldset>
        <fieldset>
            <legend><?php _e( 'Alignment', 'easy-code-placement' ); ?>:</legend>
            <select name="alignment" class="uk-form-width-large">
                <option value="0"<?php if( $ecp_load->alignment == "0" OR $ecp_load->alignment == "" ) { echo " selected"; } else {echo ""; }; ?>><?php _e( 'None', 'easy-code-placement' ); ?></option>
                <option value="1"<?php if( $ecp_load->alignment == "1" ) { echo " selected"; } else { echo ""; }; ?>><?php _e( 'Left', 'easy-code-placement' ); ?></option>
                <option value="2"<?php if( $ecp_load->alignment == "2" ) { echo " selected"; } else { echo ""; }; ?>><?php _e( 'Center', 'easy-code-placement' ); ?></option>
                <option value="3"<?php if( $ecp_load->alignment == "3" ) { echo " selected"; } else { echo ""; }; ?>><?php _e( 'Right', 'easy-code-placement' ); ?></option>
            </select>
        </fieldset>
        <fieldset>
            <legend><?php _e('Status','easy-code-placement'); ?>:</legend>
            <select name="status" class="uk-form-width-large">
                <option value="1"<?php if( $ecp_load->status == "1" ) { echo " selected"; } else { echo ""; }; ?>><?php _e( 'Online', 'easy-code-placement' ); ?></option>
                <option value="2"<?php if( $ecp_load->status == "2" ) { echo " selected"; } else { echo ""; }; ?>><?php _e( 'Offline', 'easy-code-placement' ); ?></option>
            </select>
        </fieldset>
    <button type="button" class="uk-button" onClick='document.location.href="<?php echo admin_url( 'options-general.php?page=ecp' . $ecp_sendpage . '' );?>"'><?php _e( 'Back', 'easy-code-placement' ); ?></button>&nbsp;&nbsp;<button type="submit" name="submit" class="uk-button uk-button-primary"><?php _e( 'Save', 'easy-code-placement' ); ?></button>
    </form>

</div>

<?php
}
?>