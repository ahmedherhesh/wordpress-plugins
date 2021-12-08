<?php
//add admin scripts
if (is_admin()) {

    function herhesh_yvg_add_admin_scripts()
    {
        wp_enqueue_style('herhesh_yvg_main_style', plugins_url() . '/youtube-video-gallery/assets/css/style-admin.css');
        wp_enqueue_script('herhesh_yvg_main_script', plugins_url() . '/youtube-video-gallery/assets/js/main.js',['jquery']);
    }
    add_action('admin_init', 'herhesh_yvg_add_admin_scripts');
}

// add front end scripts
function herhesh_yvg_add_scripts()
{
    wp_enqueue_style('herhesh_yvg_main_style', plugins_url() . '/youtube-video-gallery/assets/css/style.css');
    wp_enqueue_script('herhesh_yvg_main_script', plugins_url() . '/youtube-video-gallery/assets/js/main.js',['jquery']);
}
add_action('wp_enqueue_scripts', 'herhesh_yvg_add_scripts');
