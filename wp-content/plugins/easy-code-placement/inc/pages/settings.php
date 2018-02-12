<?php

// *******************
// block direct access
// *******************
ecp_check_access();

?>

<form method="post" action="<?php echo admin_url( 'options-general.php?page=ecp&load=settings' ); ?>">
<table class="uk-table">
    <tbody>
	<tr>
            <td class="uk-width-1-4 uk-table-middle"><?php _e( 'Who can manage this Plugin?', 'easy-code-placement' ); ?></td>
            <td class="uk-width-3-4">
                <?php
                global $wpdb;
                $ecp_role = $wpdb->get_var( "SELECT option_value FROM " . $wpdb->prefix . "ecp_options WHERE option_name = 'role'" );
                ?>
                <select name="role">
                    <option <?php if( $ecp_role === 'manage_options' ) { echo 'selected'; }; ?> value="manage_options"><?php _e( 'Adminstrators and higher', 'easy-code-placement' ); ?></option>
                    <option <?php if( $ecp_role === 'manage_categories' ) { echo 'selected'; }; ?> value="manage_categories"><?php _e( 'Editors and higher', 'easy-code-placement' ); ?></option>
                    <option <?php if( $ecp_role === 'publish_posts' ) { echo 'selected'; }; ?> value="publish_posts"><?php _e( 'Authors and higher', 'easy-code-placement' ); ?></option>
                    <option <?php if( $ecp_role === 'edit_posts' ) { echo 'selected'; }; ?> value="edit_posts"><?php _e( 'Contributors and higher', 'easy-code-placement' ); ?></option>
                </select>
            </td>
	</tr>
        <tr>
            <td class="uk-width-1-4 uk-table-middle"><?php _e( 'Codes per Page', 'easy-code-placement' ); ?></td>
            <td class="uk-width-3-4">
                <?php
                global $wpdb;
                $ecp_per_page = $wpdb->get_var( "SELECT option_value FROM " . $wpdb->prefix . "ecp_options WHERE option_name = 'perpage'" );
                ?>
                <input type="text" name="perpage" value="<?php echo $ecp_per_page; ?>" size="10" maxlength="2">
            </td>
	</tr>
    </tbody>
</table>
<br><button type="submit" name="submit" class="uk-button uk-button-primary"><?php _e( 'Save', 'easy-code-placement' ); ?></button>
</form>