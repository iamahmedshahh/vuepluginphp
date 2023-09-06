<?php

/*
Plugin Name: Verus Vue Plugin
Description: This plugin adds an admin dashboard view.
Version: 1.0
Author: Ahmed Shah
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function verus_vue_admin_menu_page() {
    add_menu_page(
        __('Verus Data'),  // Page title
        __('Staking Rewards'), // Menu title
        'manage_options',  // Capability required to access
        'verus-vue',   // Menu slug
        'verus_vue_render_content', // Callback function to render content
        'dashicons-admin-plugins', // Icon URL or dashicon class
        10 // Menu position
    );
}
add_action('admin_menu', 'verus_vue_admin_menu_page');

function verus_vue_render_content() {
    ?>
    <h1><?php _e('Verus Blocks'); ?></h1>
    <div id="plugin-verusvueapp">
    </div>
    <?php
}
add_shortcode('verus-vue', 'verus_vue_render_content'); // Short code usage: [verus-vue]


function admin_enqueue_vue_scripts( $hook ) {
    if ( 'toplevel_page_verus-vue' === $hook ) {
        wp_enqueue_script('app-script', plugins_url('/verusapi/dist/assets/index-63e4edbd.js', __FILE__), array(), null, true);
        wp_enqueue_style('app-style', plugins_url('/verusapi/dist/assets/index-438d7313.css', __FILE__));

        error_log($hook); // For testing (to be removed)
    }
}
add_action('admin_enqueue_scripts', 'admin_enqueue_vue_scripts');

function front_enqueue_vue_scripts() {
    wp_enqueue_script('app-script', plugins_url('/verusapi/dist/assets/index-63e4edbd.js', __FILE__), array(), null, true);
    wp_enqueue_style('app-style', plugins_url('/verusapi/dist/assets/index-438d7313.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'front_enqueue_vue_scripts');