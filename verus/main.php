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
        <h1>My Admin Page</h1>
        <div id="app">
        </div>

<?php 
}

function enqueue_vue_script() {

    wp_enqueue_style('app-script', plugins_url('testproject/dist/assets/index-d7bd537c.js', __FILE__));
    wp_enqueue_style('app-style', plugins_url('testproject/dist/assets/index-fc5f319f.css', __FILE__));

    // wp_register_script('app-script', get_template_directory_uri() . 'testproject/dist/assets/index-d7bd537c.js', array(), null, true);
    // wp_register_style('app-style', get_template_directory_uri() . 'testproject/dist/assets/index-fc5f319f.css');

    // wp_enqueue_script('app-script');
    // wp_enqueue_style('app-style');
}
add_action('admin_enqueue_scripts', 'enqueue_vue_script');
