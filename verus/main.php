<?php

/*
Plugin Name: My Admin Plugin
Description: This plugin adds an admin dashboard view.
Version: 1.0
Author: Your Name
*/

function my_admin_menu_page() {
    add_menu_page(
        'My Admin Page',  // Page title
        'My Admin Plugin', // Menu title
        'manage_options',  // Capability required to access
        'my-admin-page',   // Menu slug
        'my_admin_page_callback', // Callback function to render content
        'dashicons-admin-plugins', // Icon URL or dashicon class
        20 // Menu position
    );
}
add_action('admin_menu', 'my_admin_menu_page');


function my_admin_page_callback() {
    ?>
        <h1>Verus Blocks</h1>
        <div id="app">
        </div>
<?php
}
add_shortcode('vue_shortcode', 'my_shortcode_function');


function admin_enqueue() {

    wp_enqueue_script('app-script', plugins_url('/verusapi/dist/assets/index-da85dad1.js', __FILE__), array(), null, true);
    wp_enqueue_style('app-style', plugins_url('/verusapi/dist/assets/index-37970cf5.css', __FILE__));
}

function enqueue_vue_script() {

    wp_enqueue_script('app-script', plugins_url('/verusapi/dist/assets/index-da85dad1.js', __FILE__), array(), null, true);
    wp_enqueue_style('app-style', plugins_url('/verusapi/dist/assets/index-37970cf5.css', __FILE__));
}

add_action('admin_enqueue_scripts', 'admin_enqueue');
add_action('wp_enqueue_scripts', 'enqueue_vue_script');