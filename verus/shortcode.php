<?php

function my_shortcode_function() { 
    ob_start();
?>
    <div id="app">
    </div> 

    <?php return ob_get_clean();
}

add_shortcode('vue_shortcode', 'my_shortcode_function');

function enqueue_vue_frontend() {

    wp_enqueue_script('app-script', plugins_url('/testproject/dist/assets/index-d7bd537c.js', __FILE__), array(), null, true);
    wp_enqueue_style('app-style', plugins_url('/testproject/dist/assets/index-fc5f319f.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'enqueue_vue_frontend');