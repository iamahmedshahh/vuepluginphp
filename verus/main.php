<?php

/*
Plugin Name: Verus Vue Plugin
Description: This plugin adds an admin dashboard view.
Version: 1.0
Author: Ahmed Shah
*/

function my_admin_menu_page() {
    add_menu_page(
        'Verus Data',  // Page title
        'Staking Rewards', // Menu title
        'manage_options',  // Capability required to access
        'vue-admin-page',   // Menu slug
        'render_content', // Callback function to render content
        //'dashicons-admin-plugins', // Icon URL or dashicon class
        20, // Menu position
    );
}
add_action('admin_menu', 'my_admin_menu_page');


function render_content() {
    ?>
        <h1>Verus Blocks</h1>
        <div id="app">
        </div>
<?php
}

function render_shortcode() {
    // Start output buffering
    ob_start();

    ?>
    <div id="app">
    </div>
    <?php

    $shortcode_content = ob_get_clean();

    echo $shortcode_content;
}

add_shortcode('vue_shortcode', 'remder_content');


function admin_enqueue_vue() {

    wp_enqueue_script('adminscript', plugins_url('/verusapi/dist/assets/index-2194d466.js', __FILE__), array(), null, true);
    wp_enqueue_style('adminstyle', plugins_url('/verusapi/dist/assets/index-438d7313.css', __FILE__));
}

function enqueue_vue_script() {

    wp_enqueue_script('fontendscript', plugins_url('/verusapi/dist/assets/index-2194d466.js', __FILE__), array(), null, true);
    wp_enqueue_style('frontendstyle', plugins_url('/verusapi/dist/assets/index-438d7313.css', __FILE__));
}

add_action('admin_enqueue_scripts', 'admin_enqueue_vue');
add_action('wp_enqueue_scripts', 'enqueue_vue_script');