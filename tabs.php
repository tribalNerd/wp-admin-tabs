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
        'home'      => __( 'Home' ), 
        'settings'  => __( 'Settings' ), 
        'contact'   => __( 'Contact' ) 
    );

    // Required for foreach
    if( !empty( $tabs ) && !is_array( $tabs ) ) { return; }

    // $_GET['page']
    $get_page = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH );

    // $_GET['tab']
    $get_tab = filter_input( INPUT_GET, 'tab', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH );

    // Set current tab
    $current = isset( $_GET['tab'] ) ? $get_tab : key( $tabs );

    // Tabs html
    $admin_tabs = '<div id="icon-edit-pages" class="icon32"><br /></div>';
    $admin_tabs .= '<h2 class="nav-tab-wrapper">';
        foreach( $tabs as $tab => $name ) {
            // Current tab class
            $class = ( $tab == $current ) ? ' nav-tab-active' : '';

            // Tab links
            $admin_tabs .= '<a href="?page='. $get_page .'&tab='. $tab .'" class="nav-tab'. $class .'">'. $name .'</a>';
        }
    $admin_tabs .= '</h2><br />';

    //echo $admin_tabs; /** use for do_action */
    return $admin_tabs; /** use for echo function() */
}
