<?php
// add scripts

function herhesh_mgr_add_scripts(){
    wp_enqueue_style('herhesh_mgr_main_style',plugins_url() . '/my-github-repos/assets/css/style.css');
    wp_enqueue_script('herhesh_mgr_main_script',plugins_url() . '/my-github-repos/assets/js/main.js');
}
add_action('wp_enqueue_scripts','herhesh_mgr_add_scripts');