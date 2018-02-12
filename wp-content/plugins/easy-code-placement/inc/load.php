<?php

// *******************
// block direct access
// *******************
ecp_check_access();

// ******************
// when get data load
// ******************
if( isset( $_GET[ 'load' ] ) && !empty( $_GET[ 'load' ] ) ) {
    switch( $_GET[ 'load' ] ) {
        
        // when delete load
        case "delete":
            include ( dirname( __FILE__ ) . '/actions/delete.php' );
        break;
    
        // when edit load
        case "edit":
            include ( dirname( __FILE__ ) . '/actions/edit.php' );
        break;
    
        // when add load
        case "add":
            include ( dirname( __FILE__ ) . '/actions/add.php' );
        break;
    
        // when status load
        case "status":
            include ( dirname( __FILE__ ) . '/actions/status.php' );
        break;
    
        // when alignment load
        case "alignment":
            include ( dirname( __FILE__ ) . '/actions/alignment.php' );
        break;
    
        // when alignment load
        case "settings":
            include ( dirname( __FILE__ ) . '/actions/settings.php' );
        break;
    }
}else{
    
// *****************
// when nothing done
// *****************
?>
    <div class="wrap">
        <h2><?php _e( 'Easy Code Placement', 'easy-code-placement' ); ?></h2><br>
        
        <!-- tab navigation -->
        <ul class="uk-tab uk-margin-top" data-uk-tab="{connect:'#ecp-tabs'}">
            <li class="active"><a href=""><?php _e( 'Home', 'easy-code-placement' ); ?></a></li>          
            <li><a href=""><?php _e( 'Settings', 'easy-code-placement' ); ?></a></li>
            <li><a href=""><?php _e( 'Help', 'easy-code-placement' ); ?></a></li>
            <li><a href=""><?php _e( 'System Information', 'easy-code-placement' ); ?></a></li>
        </ul>
        
        <!-- tab content general -->
        <ul id="ecp-tabs" class="uk-switcher uk-margin">
            <li><?php include( dirname( __FILE__ ) . '/home.php' ); ?></li>
            <li><?php include( dirname( __FILE__ ) . '/pages/settings.php' ); ?></li>
            <li><?php include( dirname( __FILE__ ) . '/pages/help.php' ); ?></li>
            <li><?php include( dirname( __FILE__ ) . '/pages/system.php' ); ?></li>
        </ul>
        
    </div>

<?php
}
?>