<?php

// *******************
// block direct access
// *******************
ecp_check_access();

// ********************************************
// setup pagination and get codes from database
// ********************************************
global $wpdb;
$ecp_perpage = $wpdb->get_var( "SELECT option_value FROM " . $wpdb->prefix . "ecp_options WHERE option_name = 'perpage'" );
$ecp_total_rows = $wpdb->get_var( "SELECT COUNT( `id` ) FROM " . $wpdb->prefix . "ecp_data" );
$ecp_pagenum = isset( $_GET[ 'pagenum' ] ) ? absint( $_GET[ 'pagenum' ] ) : 1;
$ecp_calc = ( $ecp_pagenum - 1 ) * $ecp_perpage;
$ecp_codes = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "ecp_data LIMIT $ecp_calc, $ecp_perpage" );
$ecp_num_pages = ceil( $ecp_total_rows / $ecp_perpage );
$ecp_sendpage = '&pagenum=' . $ecp_pagenum. '';
$ecp_pagination = paginate_links( array(
    'base'       => add_query_arg( 'pagenum', '%#%' ),
    'format'     => '?pagenum=%#%',
    'total'      => $ecp_num_pages,
    'current'    => $ecp_pagenum,
    'prev_text'  => __( '« Previous', 'easy-code-placement' ),
    'next_text'  => __( 'Next »', 'easy-code-placement' ),
    'type'       => 'array'
    )
);

?>

<!-- Table for Codes -->
<table class="uk-table uk-table-hover uk-table-striped">
    <colgroup>
        <col width="40%" />
        <col width="15%" />
        <col width="45%" />
    </colgroup>
    <thead>
        <tr>
            <th><?php _e('Name', 'easy-code-placement'); ?></th>
            <th><?php _e('Shortcode', 'easy-code-placement'); ?></th>
            <th><?php _e('Action', 'easy-code-placement'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        // if codes in database
        if( !empty( $ecp_codes ) ) {
            
            // output codes to display
            foreach( $ecp_codes as $ecp_code ) {
            ?>
            <tr>
                <td class="uk-table-middle"><?php echo $ecp_code->name; ?></td>
                <td><button class="clipboard uk-button" data-uk-tooltip="{pos:'right'}" data-clipboard-text="[ecp code=&quot;<?php echo $ecp_code->shortcode; ?>&quot;]" href="#" title="<?php echo _e( 'Copy Shortcode to Clipboard', 'easy-code-placement' ); ?>"><i class="uk-icon-clipboard"></i> <?php _e( 'Copy', 'easy-code-placement' ); ?></button></td>
                <td>
                    <?php
                    
                    // Status
                    if( $ecp_code->status === '1' ) {
                        ?><a class="uk-button" data-uk-tooltip="{pos:'right'}" href="<?php echo admin_url( 'options-general.php?page=ecp&load=status&ecpid=' . $ecp_code->id . '&status=2'.$ecp_sendpage . '' ); ?>" title="<?php echo _e( 'Online - Click to change', 'easy-code-placement' ); ?>"><i class="uk-icon-check" style="width:14px;color:green;"></i></a>&nbsp;&nbsp;<?php
                    }elseif( $ecp_code->status === '2' ) {
                        ?><a class="uk-button" data-uk-tooltip="{pos:'right'}" href="<?php echo admin_url( 'options-general.php?page=ecp&load=status&ecpid=' . $ecp_code->id . '&status=1'.$ecp_sendpage . '' ); ?>" title="<?php echo _e( 'Offline - Click to change', 'easy-code-placement' ); ?>"><i class="uk-icon-times" style="width:14px;color:red;"></i></a>&nbsp;&nbsp;<?php
                    }
                    
                    // Alignment
                    if( $ecp_code->alignment === '0' ) {
                        ?><a class="uk-button" data-uk-tooltip="{pos:'right'}" href="<?php echo admin_url( 'options-general.php?page=ecp&load=alignment&ecpid=' . $ecp_code->id . '&alignment=1'.$ecp_sendpage . '' ); ?>" title="<?php echo _e( 'No Alignment - Click to change', 'easy-code-placement' ); ?>"><i class="uk-icon-ban" style="width:14px;color:red;"></i></a>&nbsp;<?php
                    }elseif ( $ecp_code->alignment === '1' ) {
                        ?><a class="uk-button" data-uk-tooltip="{pos:'right'}" href="<?php echo admin_url( 'options-general.php?page=ecp&load=alignment&ecpid=' . $ecp_code->id . '&alignment=2'.$ecp_sendpage . '' ); ?>" title="<?php echo _e( 'Alignment Left - Click to change', 'easy-code-placement' ); ?>"><i class="uk-icon-align-left"></i></a>&nbsp;<?php
                    }elseif ( $ecp_code->alignment === '2' ) {
                        ?><a class="uk-button" data-uk-tooltip="{pos:'right'}" href="<?php echo admin_url( 'options-general.php?page=ecp&load=alignment&ecpid=' . $ecp_code->id . '&alignment=3'.$ecp_sendpage . '' ); ?>" title="<?php echo _e( 'Alignment Center - Click to change', 'easy-code-placement' ); ?>"><i class="uk-icon-align-center"></i></a>&nbsp;<?php
                    }elseif ( $ecp_code->alignment === '3' ) {
                        ?><a class="uk-button" data-uk-tooltip="{pos:'right'}" href="<?php echo admin_url( 'options-general.php?page=ecp&load=alignment&ecpid=' . $ecp_code->id . '&alignment=0'.$ecp_sendpage . '' ); ?>" title="<?php echo _e( 'Alignment Right - Click to change', 'easy-code-placement' ); ?>"><i class="uk-icon-align-right"></i></a>&nbsp;<?php
                    }?>
                    <!-- Edit Button -->
                    <a class="uk-button uk-button-primary" data-uk-tooltip="{pos:'right'}" href="<?php echo admin_url( 'options-general.php?page=ecp&load=edit&ecpid=' . $ecp_code->id . '' . $ecp_sendpage . '' ); ?>" title="<?php echo _e('Edit','easy-code-placement'); ?>"><i class="uk-icon-cog"></i></a>&nbsp;
                    <!-- Delete Button -->
                    <button type="button" id="confirmtrigger<?php echo $ecp_code->id; ?>" class="uk-button uk-button-danger" data-uk-modal="{target:'#confirm<?php echo $ecp_code->id; ?>',center:true}" data-href<?php echo $ecp_code->id; ?>="<?php echo admin_url( 'options-general.php?page=ecp&load=delete&ecpid=' . $ecp_code->id ); ?>"><i class="uk-icon-trash"></i></button>
                    <?php echo ecp_confirm_modal( $ecp_code->id ); ?>
                    <!-- Button for Info Modal -->
                    <button type="button" id="infotrigger<?php echo $ecp_code->id; ?>" class="uk-button" data-uk-modal="{target:'#info<?php echo $ecp_code->id; ?>',center:true}" data-added<?php echo $ecp_code->id; ?>="<?php if( strtotime( $ecp_code->added ) > strtotime( '2000-01-01 01:00:00' ) ) { echo date( 'd.m.Y - H:i', strtotime( $ecp_code->added ) ); } else { echo "-";} ?>" data-modified<?php echo $ecp_code->id; ?>="<?php if( strtotime( $ecp_code->changed ) > strtotime( '2000-01-01 01:00:00' ) ) { echo date( 'd.m.Y - H:i', strtotime( $ecp_code->changed ) ); } else { echo "-"; } ?>"><i class="uk-icon-info"></i></button>
                    <?php echo ecp_info_modal( $ecp_code->id ); ?>
                </td>
            </tr>
            <?php }
            
        // if the database is empty    
        }else{ ?>
            <tr><td colspan="3"><center><?php _e( 'No Code found - Click "Add New Code" to add one.', 'easy-code-placement' ); ?></center></td></tr>
        <?php } ?>
    </tbody>
</table>

<!-- Pagination --> 
<table style="width:100%;">
    <tbody>
        <tr>
            <td width="200px"><button type="button" class="uk-button uk-button-primary" onClick='document.location.href="<?php echo admin_url( 'options-general.php?page=ecp&load=add' );?>"'><?php _e( 'Add New Code', 'easy-code-placement' ); ?></button></td>
            <td>
                <?php
                
                // output pagination
                if( is_array( $ecp_pagination ) ) {
                    echo '<ul class="uk-pagination uk-pagination-right">';
                    foreach( $ecp_pagination as $i => $ecp_page ) {
                        if( $ecp_pagenum == 1 && $i == 0 ) {
                            echo "<li class='uk-active'>$ecp_page</li>";
                        }else{
                            if( $ecp_pagenum != 1 && $ecp_pagenum == $i ) {
                                echo "<li class='uk-active'>$ecp_page</li>";
                            }else{
                                echo "<li>$ecp_page</li>";
                            }
                        }
                    }
                    echo '</ul>';
                } ?>
            </td>
        </tr>
    </tbody>
</table>

<!-- PayPal Donate Button -->
<table style="margin-top:60px;">
    <tbody>
        <tr>
            <td width="150px">
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="2X2EH5MYGPLL4">
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG_global.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
                    <img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
                </form>
            </td>
            <td><?php _e( 'If you want to thank the developer for this free Plugin, you are welcome to make a donation via PayPal (you don\'t need a PayPal account to make the donation).', 'easy-code-placement' ); ?></td>
        </tr>
    </tbody>
</table>