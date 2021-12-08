<?php
// add scripts

function herhesh_add_scripts(){
    wp_enqueue_style('herhesh_main_style',plugins_url() . '/facebook-footer-link/assets/css/style.css');
    wp_enqueue_script('herhesh_main_script',plugins_url() . '/facebook-footer-link/assets/js/main.js');
}
add_action('wp_enqueue_scripts','herhesh_add_scripts');