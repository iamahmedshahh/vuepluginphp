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
    <div class="wrap">
        <h1>My Admin Page</h1>
        <!-- Add your admin page content here -->
        <div id="app">

        </div>
    </div>

<?php 
}

function enqueue_script() {
    wp_enqueue_script('app', get_template_directory_uri() . '/testproject/dist/assets/index-d7bd537c.js', array(), null, true);
}
add_action('admin_enqueue_scripts', 'enqueue_script');
