<?php

/**
 * Admin menu page
 */
function admin_menu_page()
{
    $menu_title = '뤼초록';
    $capability = 'manage_options';

    // @TODO[rser32] change temp to the icon.
    // $icon_url = plugins_url('wp-rchr-swiper/assets/rchr_wordpress_plugin_icon.png');
    $temp_icon_url = '';

    add_menu_page(
        'Header & Footer Script',
        $menu_title,
        $capability,
        'wp-rchr-swp',
        'render_admin_page_root_element',
        $temp_icon_url,
        90
    );
}
add_action('admin_menu', 'admin_menu_page');
function render_admin_page_root_element()
{
?>
    <?php
    echo  ABSPATH;
    ?>
    <div id="wpRchrSwpDashboardRoot"></div>
<?php
}

/**
 * Enques scripts in the root-element after which wp-footer element.
 * The scripts have been bundled where are frontend of React, Webpack.
 */
function enque_scripts_after_wp_footer()
{
    $current_screen = get_current_screen();
    if (!$current_screen || $current_screen->id !== 'toplevel_page_wp-rchr-swp') {
        return false;
    }
    $current_screen = get_current_screen();
    if (!$current_screen || $current_screen->id !== 'toplevel_page_wp-rchr-swp') {
        return false;
    }
    wp_enqueue_script(
        'react-vendors',
        plugin_dir_url(__DIR__) . 'assets/js/react-vendors.js',
        [],
        '1.0.0',
        true
    );
    wp_enqueue_script(
        'dev.wp-rchr-swp-dashboard.bundle',
        plugin_dir_url(__DIR__) . 'assets/js/dev.wp-rchr-swp-dashboard.bundle.js',
        [],
        '1.0.0',
        true
    );
}
add_action('admin_enqueue_scripts', 'enque_scripts_after_wp_footer');

/**
 * Enques styles on header 
 */
function enque_styles_on_header()
{
    wp_enqueue_style(
        'google-maerial-icons',
        "https://fonts.googleapis.com/icon?family=Material+Icons",
        array(),
        '1.0.0',
    );
    wp_enqueue_style(
        'rchr-index',
        plugin_dir_url(__DIR__) . 'assets/css/rchr-index.css',
        array(),
        '1.0.0',
    );
    wp_enqueue_style(
        'wp-rchr-swp-material-3-light',
        plugin_dir_url(__DIR__) . 'assets/css/wp-rchr-swp-material-3-light.css',
        array(),
        '1.0.0',
    );
}
add_action('admin_enqueue_scripts', 'enque_styles_on_header');
