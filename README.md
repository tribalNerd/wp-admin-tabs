Wordpress Admin Tabs
=========================
Display Navigation Tabs within Wordpress Plugin & Theme Admin Areas

*Licensed under the MIT license: http://opensource.org/licenses/MIT*

:: Overview
--------

Simple function adds Navigation Tabs within Custom Admin Areas for Wordpress Plugins and Themes.

```php
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
```

:: Settings
------------
The $default_tab is the default key to be used from the tabs array. The tabs array includes page id names and page display values for each tab.

```php
$default_tab = '';
$tabs = array( 'key' => 'value' );
```

:: Usage
-----
Add the example_tabs() function to your Admin Area display scripts.

```php
echo example_tabs();
```

:: Change Log
----------

0.1.0
- Release

