<?php
// add scripts

function herhesh_ns_add_scripts(){
    wp_enqueue_style('herhesh_ns_main_style',plugins_url() . '/newsletter-subscriber/assets/css/style.css');
    wp_enqueue_script('herhesh_ns_main_script',plugins_url() . '/newsletter-subscriber/assets/js/main.js',['jquery']);
}
add_action('wp_enqueue_scripts','herhesh_ns_add_scripts');