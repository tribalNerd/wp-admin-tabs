Wordpress Admin Tabs
=========================
Display Navigation Tabs within Wordpress Plugin & Theme Admin Areas

*Licensed under the MIT license: http://opensource.org/licenses/MIT*

:: Overview
--------

Simple function adds Navigation Tabs within Custom Admin Areas for Wordpress Plugins and Themes.

```php
/**
 * Display Navigation Tabs within Wordpress Plugin & Theme Admin Areas
 * Modify: $tabs array()
 * Call: <?php echo tabs();?>
 * @author Chris Winters
 * @version 0.1.2
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
```

:: Settings
------------
The $tabs array includes the tab id (key) and the tabs display name (value) for each tab.

```php
$tabs = array(
    'key' => 'value',
    'lower-case-name', __( 'Proper Name' )
);
```

:: Usage
-----
Add the tabs() function to your Admin Area display scripts.

```php
echo tabs();
```


:: Change Log
----------

0.1.2
- Removed sanitize_key()
- Removed esc_attr & esc_attr__
- Added filter_input()
- Added __() to array values.

0.1.1
- Set $current to use key()
- Added $tab !empty & !is_array checks


0.1.0
- Release
