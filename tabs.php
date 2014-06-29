<?php
/**
 * Display Navigation Tabs within Wordpress Plugin & Theme Admin Areas
 * Modify: $default_tab and the $tabs array()
 * Call: <?php echo example_tabs();?>
 * @author Chris Winters, Wordpress
 * @version 0.1.0
 */
function example_tabs() {
    if( !isset( $_GET['page'] ) ) { return; }

    // Default Tab from array key
    $default_tab = 'home';

    // Tabs Names: &tab=home
    $tabs = array( 
        'home'      => 'Home', 
        'settings'  => 'Settings', 
        'contact'   => 'Contact' 
    );

    // Get page & current tab
    $page = sanitize_key( $_GET['page'] );
    $current = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : $default_tab;

    // Tabs html
    $admin_tabs = '<div id="icon-edit-pages" class="icon32"><br /></div>';
    $admin_tabs .= '<h2 class="nav-tab-wrapper">';
        foreach( $tabs as $tab => $name ) {
            $class = ( $tab == $current ) ? ' nav-tab-active' : '';
            $admin_tabs .= '<a href="?page='. $page .'&amp;tab='. $tab .'" class="nav-tab'. $class .'">'. $name .'</a>';
        }
    $admin_tabs .= '</h2><br />';

    return $admin_tabs;
}