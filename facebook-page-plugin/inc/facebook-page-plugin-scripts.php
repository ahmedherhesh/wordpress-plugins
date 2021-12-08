<?php
// add scripts

function herhesh_fpp_add_scripts(){
    wp_enqueue_style('herhesh_fpp_main_style',plugins_url() . '/facebook-page-plugin/assets/css/style.css');
    wp_enqueue_script('herhesh_fpp_main_script',plugins_url() . '/facebook-page-plugin/assets/js/main.js');
}
add_action('wp_enqueue_scripts','herhesh_fpp_add_scripts');