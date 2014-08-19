<?php
/**
 * Display Navigation Tabs within Wordpress Plugin & Theme Admin Areas
 * Modify: $default_tab and the $tabs array()
 * Call: <?php echo tabs();?>
 * @author Chris Winters
 * @version 0.1.1
 */
function tabs() {
    // Required
    if( !isset( $_GET['page'] ) ) { return; }

    // Tabs Names: &tab=home
    $tabs = array( 
        'home'      => 'Home', 
        'settings'  => 'Settings', 
        'contact'   => 'Contact' 
    );    

    // Required for foreach
    if( !empty( $tabs ) && !is_array( $tabs ) ) { return; }

    // Get page & current tab
    $page = sanitize_key( $_GET['page'] );
    $current = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : key( $tabs );

    // Tabs html
    $admin_tabs = '<div id="icon-edit-pages" class="icon32"><br /></div>';
    $admin_tabs .= '<h2 class="nav-tab-wrapper">';
        foreach( $tabs as $tab => $name ) {
            $class = ( $tab == $current ) ? ' nav-tab-active' : '';
            $admin_tabs .= '<a href="?page='. esc_attr( $page ) .'&amp;tab='. esc_attr( $tab ) .'" class="nav-tab'. esc_attr( $class ) .'">'. esc_attr__( $name ) .'</a>';
        }
    $admin_tabs .= '</h2><br />';

    //echo $admin_tabs; /** use for do_action */
    return $admin_tabs; /** use for echo function() */
}
