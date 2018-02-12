<?php

// *******************
// block direct access
// *******************
ecp_check_access();

?>

<h3><?php _e('General','easy-code-placement'); ?></h3>
<table class="uk-table">
    <tbody>
	<tr>
            <td class="uk-width-1-4"><?php _e( 'PHP Version', 'easy-code-placement' ); ?></td>
            <td class="uk-width-3-4"><?php echo PHP_VERSION; ?></td>
	</tr>
        <tr>
            <td class="uk-width-1-4"><?php _e( 'MySQL Version', 'easy-code-placement' ); ?></td>
            <td class="uk-width-3-4"><?php
                    if( isset( $GLOBALS[ 'wpdb' ]->dbh->server_info ) ) {
			echo $GLOBALS[ 'wpdb' ]->dbh->server_info;
                    }else if( function_exists( 'mysql_get_server_info' ) ) {
			echo mysql_get_server_info();
                    }else{
                        _e( 'Error', 'easy-code-placement' );
                    }
		?>
            </td>
        </tr>
	<tr>
            <td class="uk-width-1-4"><?php _e( 'WordPress Version', 'easy-code-placement' ); ?></td>
            <td class="uk-width-3-4"><?php echo get_bloginfo ( 'version' ); ?></td>
	</tr>
	<tr>
            <td class="uk-width-1-4"><?php _e( 'WordPress Network Page', 'easy-code-placement' ); ?></td>
            <td class="uk-width-3-4"><?php
                    if( is_multisite() ) {
                        _e( 'Yes', 'easy-code-placement' );
                    }else{
                        _e( 'No', 'easy-code-placement' );
                    }
                ?>
            </td>
	</tr>
	<tr>
            <td class="uk-width-1-4"><?php _e( 'Plugin Version (File)', 'easy-code-placement' ); ?></td>
            <td class="uk-width-3-4"><?php echo ECP_VERSION; ?></td>
	</tr>
	<tr>
            <td class="uk-width-1-4"><?php _e( 'Plugin Version (Database)', 'easy-code-placement' ); ?></td>
            <td class="uk-width-3-4"><?php
                    global $wpdb;
                    $ecp_options_version = $wpdb->get_var( "SELECT option_value FROM " . $wpdb->prefix . "ecp_options WHERE option_name = 'version'" );
                    if( $ecp_options_version === '' ) {
                        _e( 'Error', 'easy-code-placement' );
                    }else{
                        echo $ecp_options_version;
                    }
                ?>
            </td>
	</tr>
	<tr>
            <td class="uk-width-1-4"><?php _e( 'Role', 'easy-code-placement' ); ?></td>
            <td class="uk-width-3-4"><?php
                    global $wpdb;
                    $ecp_options_role = $wpdb->get_var( "SELECT option_value FROM " . $wpdb->prefix . "ecp_options WHERE option_name = 'role'" );
                    if( $ecp_options_role === '' ) {
                        _e( 'Error', 'easy-code-placement' );
                    }else{
                        echo $ecp_options_role;
                    }
                ?>
            </td>
	</tr>
        <tr>
            <td class="uk-width-1-4"><?php _e( 'Codes per Page' ,'easy-code-placement' ); ?></td>
            <td class="uk-width-3-4"><?php
                    global $wpdb;
                    $ecp_per_page = $wpdb->get_var( "SELECT option_value FROM " . $wpdb->prefix . "ecp_options WHERE option_name = 'perpage'" );
                    if( $ecp_per_page === '' ) {
                        _e( 'Error', 'easy-code-placement' );
                    }else{
                        echo $ecp_per_page;
                    }
                ?>
            </td>
	</tr>
    </tbody>
</table>

<h3><?php _e( 'Configuration', 'easy-code-placement' ); ?></h3>
<table class="uk-table">
    <tbody>
	<tr>
            <td class="uk-width-1-4"><?php _e( 'PHP max. execution time', 'easy-code-placement' ); ?></td>
            <td class="uk-width-3-4"><?php 
                if( function_exists( 'ini_get' ) ) {
                    echo ini_get( 'max_execution_time' ) . 's';
                }else{
                    _e( 'Error', 'easy-code-placement' );
                } ?>
            </td>
	</tr>
	<tr>
            <td class="uk-width-1-4"><?php _e( 'PHP memory limit', 'easy-code-placement' ); ?></td>
            <td class="uk-width-3-4"><?php 
                if( function_exists( 'ini_get' ) ) {
                    echo ini_get( 'memory_limit' ) . 'B';
                }else{
                    _e( 'Error', 'easy-code-placement' );
                } ?>
            </td>
	</tr>
	<tr>
            <td class="uk-width-1-4"><?php _e( 'WordPress memory limit', 'easy-code-placement' ); ?></td>
            <td class="uk-width-3-4"><?php echo WP_MEMORY_LIMIT; ?>B</td>
	</tr>
    </tbody>
</table>

<h3><?php _e( 'Paths', 'easy-code-placement' ); ?></h3>
<table class="uk-table">
    <tbody>
	<tr>
            <td class="uk-width-1-4"><?php _e( 'Home URL', 'easy-code-placement' ); ?></td>
            <td class="uk-width-3-4"><?php echo home_url(); ?></td>
	</tr>
	<tr>
            <td class="uk-width-1-4"><?php _e( 'Site URL', 'easy-code-placement' ); ?></td>
            <td class="uk-width-3-4"><?php echo site_url(); ?></td>
	</tr>
	<tr>
            <td class="uk-width-1-4"><?php _e( 'Plugin URL', 'easy-code-placement' ); ?></td>
            <td class="uk-width-3-4"><?php echo plugins_url(); ?></td>
	</tr>
    </tbody>
</table>