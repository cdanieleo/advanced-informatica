<?php

// *******************
// block direct access
// *******************
ecp_check_access();

// ***********************
// check if role >= option
// ***********************
function ecp_check_role() {
    global $wpdb;
    $ecp_role = $wpdb->get_var( "SELECT option_value FROM " . $wpdb->prefix . "ecp_options WHERE option_name = 'role'" );
    if( !current_user_can( $ecp_role ) ) {
        wp_die( "<h2>" . __( 'You don´t have the Permissions to access this Page. Please contact the Administrator.', 'easy-code-placement' ) . "</h2>" );
    }
}

// ****************************************
// generate options menu if user is allowed
// ****************************************
function ecp_add_page() {
    global $wpdb;
    global $ecp_settings_page;
    $ecp_role = $wpdb->get_var( "SELECT option_value FROM " . $wpdb->prefix . "ecp_options WHERE option_name = 'role'" );
    $ecp_settings_page = add_options_page( __( 'Easy Code Placement', 'easy-code-placement' ), __( 'Easy Code Placement', 'easy-code-placement' ), $ecp_role, 'ecp', 'ecp' );
}

// *******************
// add options to menu
// *******************
function ecp() {
    include( dirname( __FILE__ ) . '/load.php' );
}

// **********
// show error
// **********
function ecp_error( $ecp_error, $ecp_error_page, $ecp_error_id ) {
    include( dirname( __FILE__ ) . '/error.php' );
}

// ***************************
// replace shortcode with code
// ***************************
add_shortcode( 'ecp', 'ecp_replace' );
function ecp_replace( $ecp_code ) {
    global $wpdb;
    $query = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "ecp_data WHERE name=%s" ,$ecp_code ) );
    if( count( $query ) >0 ){
	foreach( $query as $code_load ) {
            
            // when status is activ
            if( $code_load->status === '1' ) {
                
                // allow php code
                if( strpos( $code_load->code, '<' . '?' ) !== false ) {
                    ob_start();
                    eval( '?' . '>' . $code_load->code );
                    $code_load->code = ob_get_contents();
                    ob_end_clean();
                }
                
                // set alignment
		if( $code_load->alignment === '0' OR $code_load->alignment === '' ) {
                    $ecp_output = $code_load->code;
                }elseif( $code_load->alignment === '1' ) {
                    $ecp_output = "<p align='left'>" . $code_load->code . "</p>";
                }elseif( $code_load->alignment === '2' ) {
                    $ecp_output = "<p align='center'>" . $code_load->code . "</p>";
                }elseif( $code_load->alignment === '3' ) {
                    $ecp_output = "<p align='right'>" . $code_load->code . "</p>"; 
                }
                return $ecp_output;
                
            // when status is deactive
            }else{
		return '';
            }
        }
    }else{
        
        // when shortcode not found
	return '';
    }

}

// ***************
// update to 16.11
// ***************
function ecp_update(){
    
    // multiside update
    if( is_multisite() ) {
        global $wpdb;
	$blog = $wpdb->blogid;
        $blogids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
        foreach( $blogids as $blogid ) {
            switch_to_blog( $blogid );
            
            // multi update
            $wpdb->query( "UPDATE " . $wpdb->prefix . "ecp_data SET version='17.08'" );
            $wpdb->update( $wpdb->prefix . 'ecp_options', array( 'option_value' => '17.08' ), array( 'option_name' => 'version' ) );
        }
	switch_to_blog( $blog );
    }else{
        
        // single update
        global $wpdb;
        $wpdb->query( "UPDATE " . $wpdb->prefix . "ecp_data SET version='17.08'" );
        $wpdb->update( $wpdb->prefix . 'ecp_options', array( 'option_value' => '17.08' ), array( 'option_name' => 'version' ) );
    }
}

// ***************
// update function
// ***************
function ecp_do_update(){
global $wpdb;
$ecp_options_version = $wpdb->get_var( "SELECT option_value FROM " . $wpdb->prefix . "ecp_options WHERE option_name = 'version'" );

    // check if user is admin
    if( !is_admin() ) {
        return;
        
    // check if we use the current version
    }elseif( $ecp_options_version === '17.08' ) {
        return;
        
    // if user is admin and we have an old version do the update
    }else{
        ecp_update();
        return;
    }
}

// ****************
// class for widget
// ****************
class ecp_widget extends WP_Widget {
    
    // id, name, description
    function __construct() {
        parent::__construct(
        'ecp_widget',
        __( 'Easy Code Placement', 'easy-code-placement' ),
        array( 'description' => __( 'Add a Code wherever you want it.', 'easy-code-placement' ), )
        );
    }
    
    // front-end
    public function widget( $args, $instance ) {
        global $wpdb;
        $query = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "ecp_data WHERE name=%s", $instance[ 'ecp_code' ] ) );
        
        // when no code selected output nothing
        if( $instance[ 'ecp_code' ] === "nothing" ) {
            echo '';
        }elseif( empty( $query ) ) {
            echo '';
            
        // otherwise output ecp code
        }else{
            
            // output border and design?
            if( $instance[ 'ecp_display' ] != "1" ) {
                if( array_key_exists( 'before_widget', $args ) ) echo $args[ 'before_widget' ];
            }
            
            // output
            $ecp_output = ecp_replace( $instance[ 'ecp_code' ] );
            echo $ecp_output;
            
            // output border and design?
            if( $instance[ 'ecp_display' ] != "1" ) {
                if( array_key_exists( 'after_widget', $args ) ) echo $args[ 'after_widget' ];
            }
        }
    }
    
    // back-end
    public function form($instance) {
        
        // load selected options er reset all
        if( empty( $instance[ 'ecp_code' ] ) ) {
            $instance['ecp_code'] = 'nothing';
        }
        if( empty( $instance[ 'ecp_display' ] ) ) {
            $instance[ 'ecp_display' ] = '0';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'ecp_code' ); ?>"><?php _e( 'Code to Display:', 'easy-code-placement' ); ?></label><br>
            <select id="<?php echo $this->get_field_id( 'ecp_code' ); ?>" name="<?php echo $this->get_field_name( 'ecp_code' ); ?>" style="width:100%;">
                <option value="nothing" <?php selected( $instance['ecp_code'], 'nothing'); ?>><?php _e( 'Please select a Code', 'easy-code-placement' ); ?></option>
                <?php
                
                // get codes
                global $wpdb;
                $ecp_codes = $wpdb->get_results( "SELECT name FROM " . $wpdb->prefix . "ecp_data" );
                
                // generate dropdown options
                foreach( $ecp_codes as $ecp_codeitem ) {
                    $selected = selected( $instance[ 'ecp_code' ], $ecp_codeitem->name );
                    echo '<option value="' . $ecp_codeitem->name . '"' . $selected . '>' . $ecp_codeitem->name . '</option>';
                    }
                ?>
            </select>
        </p>
        <p>
            <input class="checkbox" type="checkbox" value="1" <?php checked( '1', $instance[ 'ecp_display' ] ); ?> id="<?php echo $this->get_field_id( 'ecp_display' ); ?>" name="<?php echo $this->get_field_name( 'ecp_display' ); ?>"> 
            <label for="<?php echo $this->get_field_id( 'ecp_display' ); ?>"><?php _e( 'Remove Borders and Design from Widget?', 'easy-code-placement' ); ?></label>
        </p>
        <?php
    }

    // save selected code in back-end
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance[ 'ecp_code' ] = $new_instance[ 'ecp_code' ];
        $instance[ 'ecp_display' ] = $new_instance[ 'ecp_display' ];
        return $instance;
    }
}

// ***************
// register widget
// ***************
function ecp_register_widget() {
    register_widget( 'ecp_widget' );
}

// ********************************************************
// add clipboard.js, uikit and own css and js to admin area
// ********************************************************
function ecp_admin_enqueue( $hook ) {
    
    // check if on content page
    global $ecp_settings_page;
    if( $hook != $ecp_settings_page ) {
        return;
    }
    
    // add to wp
    wp_enqueue_script( 'ecp_admin_uikit_js', plugins_url( '/ext/uikit-2.27.1/js/uikit.min.js' , __FILE__ ), array( 'jquery' ), '2.27.1', false );
    wp_enqueue_script( 'ecp_admin_uikit_accordion_js', plugins_url( '/ext/uikit-2.27.1/js/components/accordion.min.js' , __FILE__ ), array( 'jquery' ), '2.27.1', false );
    wp_enqueue_script( 'ecp_admin_uikit_tooltip_js', plugins_url( '/ext/uikit-2.27.1/js/components/tooltip.min.js' , __FILE__ ), array( 'jquery' ), '2.27.1', false );
    wp_enqueue_script( 'ecp_admin_clipboard', plugins_url( '/ext/clipboard.js-1.7.1/clipboard.min.js', __FILE__ ), array( 'jquery' ), '1.7.1', false );
    wp_enqueue_script( 'ecp_admin_js', plugins_url( '/js/scripts.js', __FILE__ ), array( 'jquery' ), '16.10', true );
    wp_enqueue_style( 'ecp_admin_css', plugins_url( '/css/style.css', __FILE__ ), array(), '16.10', 'all' );
    wp_enqueue_style( 'ecp_admin_uikit_css', plugins_url( '/ext/uikit-2.27.1/css/uikit.gradient.min.css' , __FILE__ ), array(), '2.27.1', 'all' );
    wp_enqueue_style( 'ecp_admin_uikit_accordion_css', plugins_url( '/ext/uikit-2.27.1/css/components/accordion.gradient.min.css' , __FILE__ ), array(), '2.27.1', 'all' );
    wp_enqueue_style( 'ecp_admin_uikit_tooltip_css', plugins_url( '/ext/uikit-2.27.1/css/components/tooltip.gradient.min.css' , __FILE__ ), array(), '2.27.1', 'all' );
}
add_action( 'admin_enqueue_scripts', 'ecp_admin_enqueue' );

// **********
// info modal
// **********
function ecp_info_modal( $id ) {
    return "
    <script>
    jQuery('#info" . $id . "').appendTo('body');
    jQuery(document).on('click', '#infotrigger" . $id . "', infomodal_handler" . $id . ");
    function infomodal_handler" . $id . "(e)
    {
        console.log(e);
        var added" . $id . " = jQuery(this).data('added" . $id . "');
        var modified" . $id . " = jQuery(this).data('modified" . $id . "');
        jQuery('#info" . $id . "').on({
            'show.uk.modal':function(){
                jQuery('#added" . $id . "', jQuery(this)).text(added" . $id . ");
                jQuery('#modified" . $id . "', jQuery(this)).text(modified" . $id . ");
            }
        }).trigger('show.uk.modal');
    }
    </script>

    <!-- Info Modal -->
    <div class='uk-modal' id='info" . $id . "'>
        <div class='uk-modal-dialog'>
            <h4 style='margin-bottom:5px;'>" . __( 'Added on', 'easy-code-placement' ) . ":</h4>
            <div id='added" . $id . "'></div><br>
            <h4 style='margin-bottom:5px;'>" . __( 'Last Modified on', 'easy-code-placement' ) . ":</h4>    
            <div id='modified" . $id . "'></div>
            <div class='uk-modal-footer uk-text-right'>
              <button type='button' class='uk-button uk-modal-close'>" . __( 'Close', 'easy-code-placement' ) . "</button>        
            </div>
        </div>
    </div>
    ";   
}

// *************
// confirm modal
// *************
function ecp_confirm_modal( $id ) {
    return "
    <script>
    jQuery('#confirm" . $id . "').appendTo('body');
    jQuery(document).on('click', '#confirmtrigger" . $id . "', confirmmodal_handler" . $id . ");
    function confirmmodal_handler" . $id . "(e)
    {
        console.log(e);
        var href" . $id . " = jQuery(this).data('href" . $id . "');
        jQuery('#confirm" . $id . "').on({
            'show.uk.modal':function(){
                jQuery('#confirm" . $id . " a').attr('href', href" . $id . ");
            }
        }).trigger('show.uk.modal');
    }
    </script>

    <!-- Confirm Modal -->
    <div class='uk-modal' id='confirm" . $id . "'>
        <div class='uk-modal-dialog'>
            " . __( 'Are you really sure you want to permanently delete this Shortcode?', 'easy-code-placement' ) . "
            <div class='uk-modal-footer uk-text-right'>
                <button type='button' class='uk-button uk-modal-close'>" . __( 'No!', 'easy-code-placement' ) . "</button>
                <a type='button' class='uk-button uk-button-danger' href='' target='_self'>" . __( 'Confirm', 'easy-code-placement' ) . "</a>
            </div>
        </div>
    </div>
    ";   
}

?>