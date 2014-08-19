Wordpress Admin Tabs
=========================
Display Navigation Tabs within Wordpress Plugin & Theme Admin Areas

*Licensed under the MIT license: http://opensource.org/licenses/MIT*

:: Overview
--------

Simple function adds Navigation Tabs within Custom Admin Areas for Wordpress Plugins and Themes.

```php
<?php
/**
 * Display Navigation Tabs within Wordpress Plugin & Theme Admin Areas
 * Modify: $tabs array()
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

    // Required
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

    return $admin_tabs;
}
```

:: Settings
------------
The $tabs array includes the tab id (key) and the tabs display name (value) for each tab.

```php
$tabs = array(
    'key' => 'value',
    'lower-case-name', 'Proper Name'
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

0.1.1
- Set $current to use key()
- Added $tab !empty & !is_array checks
- Added esc_attr & esc_attr__


0.1.0
- Release
