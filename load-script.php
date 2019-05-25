<?php

// Register front end style

// Register backend end style
function load_admin_style()
{
    wp_enqueue_script('my_custom_script', plugin_dir_url(__FILE__) . 'script/script.js');
}
add_action('admin_enqueue_scripts', 'load_admin_style');