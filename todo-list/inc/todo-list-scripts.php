<?php
// add scripts

if (is_admin()) {
    function herhesh_tl_add_admin_scripts()
    {
        wp_enqueue_style('herhesh_tl_main_style', plugins_url() . '/social-links/assets/css/style-admin.css');
    }
    add_action('admin-init', 'herhesh_tl_add_admin_scripts');
}

function herhesh_tl_add_scripts()
{
    wp_enqueue_style('herhesh_tl_main_style', plugins_url() . '/social-links/assets/css/style.css');
    wp_enqueue_script('herhesh_tl_main_script', plugins_url() . '/social-links/assets/js/main.js');
}
add_action('wp_enqueue_scripts', 'herhesh_tl_add_scripts');
